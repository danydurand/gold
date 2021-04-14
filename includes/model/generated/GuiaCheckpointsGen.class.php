<?php
	/**
	 * The abstract GuiaCheckpointsGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the GuiaCheckpoints subclass which
	 * extends this GuiaCheckpointsGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the GuiaCheckpoints class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property string $GuiaId the value for strGuiaId (PK)
	 * @property integer $CodiClie the value for intCodiClie 
	 * @property integer $ClienteId the value for intClienteId 
	 * @property string $NombRemi the value for strNombRemi 
	 * @property QDateTime $FechGuia the value for dttFechGuia 
	 * @property string $EstaOrig the value for strEstaOrig 
	 * @property string $EstaDest the value for strEstaDest 
	 * @property string $SistemaId the value for strSistemaId 
	 * @property string $FechaAR the value for strFechaAR 
	 * @property string $FechaAV the value for strFechaAV 
	 * @property string $FechaBC the value for strFechaBC 
	 * @property string $FechaBG the value for strFechaBG 
	 * @property string $FechaCG the value for strFechaCG 
	 * @property string $FechaCS the value for strFechaCS 
	 * @property string $FechaDA the value for strFechaDA 
	 * @property string $FechaDD the value for strFechaDD 
	 * @property string $FechaDE the value for strFechaDE 
	 * @property string $FechaDF the value for strFechaDF 
	 * @property string $FechaDI the value for strFechaDI 
	 * @property string $FechaDM the value for strFechaDM 
	 * @property string $FechaDP the value for strFechaDP 
	 * @property string $FechaDR the value for strFechaDR 
	 * @property string $FechaDV the value for strFechaDV 
	 * @property string $FechaEA the value for strFechaEA 
	 * @property string $FechaEC the value for strFechaEC 
	 * @property string $FechaEE the value for strFechaEE 
	 * @property string $FechaEI the value for strFechaEI 
	 * @property string $FechaEM the value for strFechaEM 
	 * @property string $FechaER the value for strFechaER 
	 * @property string $FechaEU the value for strFechaEU 
	 * @property string $FechaEX the value for strFechaEX 
	 * @property string $FechaFA the value for strFechaFA 
	 * @property string $FechaFB the value for strFechaFB 
	 * @property string $FechaFC the value for strFechaFC 
	 * @property string $FechaFE the value for strFechaFE 
	 * @property string $FechaFK the value for strFechaFK 
	 * @property string $FechaFR the value for strFechaFR 
	 * @property string $FechaIC the value for strFechaIC 
	 * @property string $FechaKM the value for strFechaKM 
	 * @property string $FechaKT the value for strFechaKT 
	 * @property string $FechaKU the value for strFechaKU 
	 * @property string $FechaKX the value for strFechaKX 
	 * @property string $FechaMA the value for strFechaMA 
	 * @property string $FechaMD the value for strFechaMD 
	 * @property string $FechaMG the value for strFechaMG 
	 * @property string $FechaNA the value for strFechaNA 
	 * @property string $FechaNC the value for strFechaNC 
	 * @property string $FechaNR the value for strFechaNR 
	 * @property string $FechaNT the value for strFechaNT 
	 * @property string $FechaOE the value for strFechaOE 
	 * @property string $FechaOK the value for strFechaOK 
	 * @property string $FechaOT the value for strFechaOT 
	 * @property string $FechaPA the value for strFechaPA 
	 * @property string $FechaPC the value for strFechaPC 
	 * @property string $FechaPP the value for strFechaPP 
	 * @property string $FechaPS the value for strFechaPS 
	 * @property string $FechaPU the value for strFechaPU 
	 * @property string $FechaRA the value for strFechaRA 
	 * @property string $FechaRC the value for strFechaRC 
	 * @property string $FechaRD the value for strFechaRD 
	 * @property string $FechaRE the value for strFechaRE 
	 * @property string $FechaRK the value for strFechaRK 
	 * @property string $FechaRM the value for strFechaRM 
	 * @property string $FechaRN the value for strFechaRN 
	 * @property string $FechaRR the value for strFechaRR 
	 * @property string $FechaRZ the value for strFechaRZ 
	 * @property string $FechaSE the value for strFechaSE 
	 * @property string $FechaSF the value for strFechaSF 
	 * @property string $FechaSM the value for strFechaSM 
	 * @property string $FechaSR the value for strFechaSR 
	 * @property string $FechaSS the value for strFechaSS 
	 * @property string $FechaTR the value for strFechaTR 
	 * @property string $FechaTU the value for strFechaTU 
	 * @property string $FechaTV the value for strFechaTV 
	 * @property string $FechaVD the value for strFechaVD 
	 * @property string $FechaWM the value for strFechaWM 
	 * @property string $FechaWT the value for strFechaWT 
	 * @property string $FechaWU the value for strFechaWU 
	 * @property string $FechaWX the value for strFechaWX 
	 * @property string $FechaZN the value for strFechaZN 
	 * @property string $FechaZR the value for strFechaZR 
	 * @property Guia $Guia the value for the Guia object referenced by strGuiaId (PK)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class GuiaCheckpointsGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK column guia_checkpoints.guia_id
		 * @var string strGuiaId
		 */
		protected $strGuiaId;
		const GuiaIdMaxLength = 20;
		const GuiaIdDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var string __strGuiaId;
		 */
		protected $__strGuiaId;

		/**
		 * Protected member variable that maps to the database column guia_checkpoints.codi_clie
		 * @var integer intCodiClie
		 */
		protected $intCodiClie;
		const CodiClieDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.cliente_id
		 * @var integer intClienteId
		 */
		protected $intClienteId;
		const ClienteIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.nomb_remi
		 * @var string strNombRemi
		 */
		protected $strNombRemi;
		const NombRemiMaxLength = 30;
		const NombRemiDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fech_guia
		 * @var QDateTime dttFechGuia
		 */
		protected $dttFechGuia;
		const FechGuiaDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.esta_orig
		 * @var string strEstaOrig
		 */
		protected $strEstaOrig;
		const EstaOrigMaxLength = 4;
		const EstaOrigDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.esta_dest
		 * @var string strEstaDest
		 */
		protected $strEstaDest;
		const EstaDestMaxLength = 4;
		const EstaDestDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.sistema_id
		 * @var string strSistemaId
		 */
		protected $strSistemaId;
		const SistemaIdMaxLength = 4;
		const SistemaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_AR
		 * @var string strFechaAR
		 */
		protected $strFechaAR;
		const FechaARMaxLength = 12;
		const FechaARDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_AV
		 * @var string strFechaAV
		 */
		protected $strFechaAV;
		const FechaAVMaxLength = 12;
		const FechaAVDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_BC
		 * @var string strFechaBC
		 */
		protected $strFechaBC;
		const FechaBCMaxLength = 12;
		const FechaBCDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_BG
		 * @var string strFechaBG
		 */
		protected $strFechaBG;
		const FechaBGMaxLength = 12;
		const FechaBGDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_CG
		 * @var string strFechaCG
		 */
		protected $strFechaCG;
		const FechaCGMaxLength = 12;
		const FechaCGDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_CS
		 * @var string strFechaCS
		 */
		protected $strFechaCS;
		const FechaCSMaxLength = 12;
		const FechaCSDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_DA
		 * @var string strFechaDA
		 */
		protected $strFechaDA;
		const FechaDAMaxLength = 12;
		const FechaDADefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_DD
		 * @var string strFechaDD
		 */
		protected $strFechaDD;
		const FechaDDMaxLength = 12;
		const FechaDDDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_DE
		 * @var string strFechaDE
		 */
		protected $strFechaDE;
		const FechaDEMaxLength = 12;
		const FechaDEDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_DF
		 * @var string strFechaDF
		 */
		protected $strFechaDF;
		const FechaDFMaxLength = 12;
		const FechaDFDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_DI
		 * @var string strFechaDI
		 */
		protected $strFechaDI;
		const FechaDIMaxLength = 12;
		const FechaDIDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_DM
		 * @var string strFechaDM
		 */
		protected $strFechaDM;
		const FechaDMMaxLength = 12;
		const FechaDMDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_DP
		 * @var string strFechaDP
		 */
		protected $strFechaDP;
		const FechaDPMaxLength = 12;
		const FechaDPDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_DR
		 * @var string strFechaDR
		 */
		protected $strFechaDR;
		const FechaDRMaxLength = 12;
		const FechaDRDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_DV
		 * @var string strFechaDV
		 */
		protected $strFechaDV;
		const FechaDVMaxLength = 12;
		const FechaDVDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_EA
		 * @var string strFechaEA
		 */
		protected $strFechaEA;
		const FechaEAMaxLength = 12;
		const FechaEADefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_EC
		 * @var string strFechaEC
		 */
		protected $strFechaEC;
		const FechaECMaxLength = 12;
		const FechaECDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_EE
		 * @var string strFechaEE
		 */
		protected $strFechaEE;
		const FechaEEMaxLength = 12;
		const FechaEEDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_EI
		 * @var string strFechaEI
		 */
		protected $strFechaEI;
		const FechaEIMaxLength = 12;
		const FechaEIDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_EM
		 * @var string strFechaEM
		 */
		protected $strFechaEM;
		const FechaEMMaxLength = 12;
		const FechaEMDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_ER
		 * @var string strFechaER
		 */
		protected $strFechaER;
		const FechaERMaxLength = 12;
		const FechaERDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_EU
		 * @var string strFechaEU
		 */
		protected $strFechaEU;
		const FechaEUMaxLength = 12;
		const FechaEUDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_EX
		 * @var string strFechaEX
		 */
		protected $strFechaEX;
		const FechaEXMaxLength = 12;
		const FechaEXDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_FA
		 * @var string strFechaFA
		 */
		protected $strFechaFA;
		const FechaFAMaxLength = 12;
		const FechaFADefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_FB
		 * @var string strFechaFB
		 */
		protected $strFechaFB;
		const FechaFBMaxLength = 12;
		const FechaFBDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_FC
		 * @var string strFechaFC
		 */
		protected $strFechaFC;
		const FechaFCMaxLength = 12;
		const FechaFCDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_FE
		 * @var string strFechaFE
		 */
		protected $strFechaFE;
		const FechaFEMaxLength = 12;
		const FechaFEDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_FK
		 * @var string strFechaFK
		 */
		protected $strFechaFK;
		const FechaFKMaxLength = 12;
		const FechaFKDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_FR
		 * @var string strFechaFR
		 */
		protected $strFechaFR;
		const FechaFRMaxLength = 12;
		const FechaFRDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_IC
		 * @var string strFechaIC
		 */
		protected $strFechaIC;
		const FechaICMaxLength = 12;
		const FechaICDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_KM
		 * @var string strFechaKM
		 */
		protected $strFechaKM;
		const FechaKMMaxLength = 12;
		const FechaKMDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_KT
		 * @var string strFechaKT
		 */
		protected $strFechaKT;
		const FechaKTMaxLength = 12;
		const FechaKTDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_KU
		 * @var string strFechaKU
		 */
		protected $strFechaKU;
		const FechaKUMaxLength = 12;
		const FechaKUDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_KX
		 * @var string strFechaKX
		 */
		protected $strFechaKX;
		const FechaKXMaxLength = 12;
		const FechaKXDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_MA
		 * @var string strFechaMA
		 */
		protected $strFechaMA;
		const FechaMAMaxLength = 12;
		const FechaMADefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_MD
		 * @var string strFechaMD
		 */
		protected $strFechaMD;
		const FechaMDMaxLength = 12;
		const FechaMDDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_MG
		 * @var string strFechaMG
		 */
		protected $strFechaMG;
		const FechaMGMaxLength = 12;
		const FechaMGDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_NA
		 * @var string strFechaNA
		 */
		protected $strFechaNA;
		const FechaNAMaxLength = 12;
		const FechaNADefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_NC
		 * @var string strFechaNC
		 */
		protected $strFechaNC;
		const FechaNCMaxLength = 12;
		const FechaNCDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_NR
		 * @var string strFechaNR
		 */
		protected $strFechaNR;
		const FechaNRMaxLength = 12;
		const FechaNRDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_NT
		 * @var string strFechaNT
		 */
		protected $strFechaNT;
		const FechaNTMaxLength = 12;
		const FechaNTDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_OE
		 * @var string strFechaOE
		 */
		protected $strFechaOE;
		const FechaOEMaxLength = 12;
		const FechaOEDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_OK
		 * @var string strFechaOK
		 */
		protected $strFechaOK;
		const FechaOKMaxLength = 12;
		const FechaOKDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_OT
		 * @var string strFechaOT
		 */
		protected $strFechaOT;
		const FechaOTMaxLength = 12;
		const FechaOTDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_PA
		 * @var string strFechaPA
		 */
		protected $strFechaPA;
		const FechaPAMaxLength = 12;
		const FechaPADefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_PC
		 * @var string strFechaPC
		 */
		protected $strFechaPC;
		const FechaPCMaxLength = 12;
		const FechaPCDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_PP
		 * @var string strFechaPP
		 */
		protected $strFechaPP;
		const FechaPPMaxLength = 12;
		const FechaPPDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_PS
		 * @var string strFechaPS
		 */
		protected $strFechaPS;
		const FechaPSMaxLength = 12;
		const FechaPSDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_PU
		 * @var string strFechaPU
		 */
		protected $strFechaPU;
		const FechaPUMaxLength = 12;
		const FechaPUDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_RA
		 * @var string strFechaRA
		 */
		protected $strFechaRA;
		const FechaRAMaxLength = 12;
		const FechaRADefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_RC
		 * @var string strFechaRC
		 */
		protected $strFechaRC;
		const FechaRCMaxLength = 12;
		const FechaRCDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_RD
		 * @var string strFechaRD
		 */
		protected $strFechaRD;
		const FechaRDMaxLength = 12;
		const FechaRDDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_RE
		 * @var string strFechaRE
		 */
		protected $strFechaRE;
		const FechaREMaxLength = 12;
		const FechaREDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_RK
		 * @var string strFechaRK
		 */
		protected $strFechaRK;
		const FechaRKMaxLength = 12;
		const FechaRKDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_RM
		 * @var string strFechaRM
		 */
		protected $strFechaRM;
		const FechaRMMaxLength = 12;
		const FechaRMDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_RN
		 * @var string strFechaRN
		 */
		protected $strFechaRN;
		const FechaRNMaxLength = 12;
		const FechaRNDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_RR
		 * @var string strFechaRR
		 */
		protected $strFechaRR;
		const FechaRRMaxLength = 12;
		const FechaRRDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_RZ
		 * @var string strFechaRZ
		 */
		protected $strFechaRZ;
		const FechaRZMaxLength = 12;
		const FechaRZDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_SE
		 * @var string strFechaSE
		 */
		protected $strFechaSE;
		const FechaSEMaxLength = 12;
		const FechaSEDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_SF
		 * @var string strFechaSF
		 */
		protected $strFechaSF;
		const FechaSFMaxLength = 12;
		const FechaSFDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_SM
		 * @var string strFechaSM
		 */
		protected $strFechaSM;
		const FechaSMMaxLength = 12;
		const FechaSMDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_SR
		 * @var string strFechaSR
		 */
		protected $strFechaSR;
		const FechaSRMaxLength = 12;
		const FechaSRDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_SS
		 * @var string strFechaSS
		 */
		protected $strFechaSS;
		const FechaSSMaxLength = 12;
		const FechaSSDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_TR
		 * @var string strFechaTR
		 */
		protected $strFechaTR;
		const FechaTRMaxLength = 12;
		const FechaTRDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_TU
		 * @var string strFechaTU
		 */
		protected $strFechaTU;
		const FechaTUMaxLength = 12;
		const FechaTUDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_TV
		 * @var string strFechaTV
		 */
		protected $strFechaTV;
		const FechaTVMaxLength = 12;
		const FechaTVDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_VD
		 * @var string strFechaVD
		 */
		protected $strFechaVD;
		const FechaVDMaxLength = 12;
		const FechaVDDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_WM
		 * @var string strFechaWM
		 */
		protected $strFechaWM;
		const FechaWMMaxLength = 12;
		const FechaWMDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_WT
		 * @var string strFechaWT
		 */
		protected $strFechaWT;
		const FechaWTMaxLength = 12;
		const FechaWTDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_WU
		 * @var string strFechaWU
		 */
		protected $strFechaWU;
		const FechaWUMaxLength = 12;
		const FechaWUDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_WX
		 * @var string strFechaWX
		 */
		protected $strFechaWX;
		const FechaWXMaxLength = 12;
		const FechaWXDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_ZN
		 * @var string strFechaZN
		 */
		protected $strFechaZN;
		const FechaZNMaxLength = 12;
		const FechaZNDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_checkpoints.fecha_ZR
		 * @var string strFechaZR
		 */
		protected $strFechaZR;
		const FechaZRMaxLength = 12;
		const FechaZRDefault = null;


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
		 * in the database column guia_checkpoints.guia_id.
		 *
		 * NOTE: Always use the Guia property getter to correctly retrieve this Guia object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Guia objGuia
		 */
		protected $objGuia;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->strGuiaId = GuiaCheckpoints::GuiaIdDefault;
			$this->intCodiClie = GuiaCheckpoints::CodiClieDefault;
			$this->intClienteId = GuiaCheckpoints::ClienteIdDefault;
			$this->strNombRemi = GuiaCheckpoints::NombRemiDefault;
			$this->dttFechGuia = (GuiaCheckpoints::FechGuiaDefault === null)?null:new QDateTime(GuiaCheckpoints::FechGuiaDefault);
			$this->strEstaOrig = GuiaCheckpoints::EstaOrigDefault;
			$this->strEstaDest = GuiaCheckpoints::EstaDestDefault;
			$this->strSistemaId = GuiaCheckpoints::SistemaIdDefault;
			$this->strFechaAR = GuiaCheckpoints::FechaARDefault;
			$this->strFechaAV = GuiaCheckpoints::FechaAVDefault;
			$this->strFechaBC = GuiaCheckpoints::FechaBCDefault;
			$this->strFechaBG = GuiaCheckpoints::FechaBGDefault;
			$this->strFechaCG = GuiaCheckpoints::FechaCGDefault;
			$this->strFechaCS = GuiaCheckpoints::FechaCSDefault;
			$this->strFechaDA = GuiaCheckpoints::FechaDADefault;
			$this->strFechaDD = GuiaCheckpoints::FechaDDDefault;
			$this->strFechaDE = GuiaCheckpoints::FechaDEDefault;
			$this->strFechaDF = GuiaCheckpoints::FechaDFDefault;
			$this->strFechaDI = GuiaCheckpoints::FechaDIDefault;
			$this->strFechaDM = GuiaCheckpoints::FechaDMDefault;
			$this->strFechaDP = GuiaCheckpoints::FechaDPDefault;
			$this->strFechaDR = GuiaCheckpoints::FechaDRDefault;
			$this->strFechaDV = GuiaCheckpoints::FechaDVDefault;
			$this->strFechaEA = GuiaCheckpoints::FechaEADefault;
			$this->strFechaEC = GuiaCheckpoints::FechaECDefault;
			$this->strFechaEE = GuiaCheckpoints::FechaEEDefault;
			$this->strFechaEI = GuiaCheckpoints::FechaEIDefault;
			$this->strFechaEM = GuiaCheckpoints::FechaEMDefault;
			$this->strFechaER = GuiaCheckpoints::FechaERDefault;
			$this->strFechaEU = GuiaCheckpoints::FechaEUDefault;
			$this->strFechaEX = GuiaCheckpoints::FechaEXDefault;
			$this->strFechaFA = GuiaCheckpoints::FechaFADefault;
			$this->strFechaFB = GuiaCheckpoints::FechaFBDefault;
			$this->strFechaFC = GuiaCheckpoints::FechaFCDefault;
			$this->strFechaFE = GuiaCheckpoints::FechaFEDefault;
			$this->strFechaFK = GuiaCheckpoints::FechaFKDefault;
			$this->strFechaFR = GuiaCheckpoints::FechaFRDefault;
			$this->strFechaIC = GuiaCheckpoints::FechaICDefault;
			$this->strFechaKM = GuiaCheckpoints::FechaKMDefault;
			$this->strFechaKT = GuiaCheckpoints::FechaKTDefault;
			$this->strFechaKU = GuiaCheckpoints::FechaKUDefault;
			$this->strFechaKX = GuiaCheckpoints::FechaKXDefault;
			$this->strFechaMA = GuiaCheckpoints::FechaMADefault;
			$this->strFechaMD = GuiaCheckpoints::FechaMDDefault;
			$this->strFechaMG = GuiaCheckpoints::FechaMGDefault;
			$this->strFechaNA = GuiaCheckpoints::FechaNADefault;
			$this->strFechaNC = GuiaCheckpoints::FechaNCDefault;
			$this->strFechaNR = GuiaCheckpoints::FechaNRDefault;
			$this->strFechaNT = GuiaCheckpoints::FechaNTDefault;
			$this->strFechaOE = GuiaCheckpoints::FechaOEDefault;
			$this->strFechaOK = GuiaCheckpoints::FechaOKDefault;
			$this->strFechaOT = GuiaCheckpoints::FechaOTDefault;
			$this->strFechaPA = GuiaCheckpoints::FechaPADefault;
			$this->strFechaPC = GuiaCheckpoints::FechaPCDefault;
			$this->strFechaPP = GuiaCheckpoints::FechaPPDefault;
			$this->strFechaPS = GuiaCheckpoints::FechaPSDefault;
			$this->strFechaPU = GuiaCheckpoints::FechaPUDefault;
			$this->strFechaRA = GuiaCheckpoints::FechaRADefault;
			$this->strFechaRC = GuiaCheckpoints::FechaRCDefault;
			$this->strFechaRD = GuiaCheckpoints::FechaRDDefault;
			$this->strFechaRE = GuiaCheckpoints::FechaREDefault;
			$this->strFechaRK = GuiaCheckpoints::FechaRKDefault;
			$this->strFechaRM = GuiaCheckpoints::FechaRMDefault;
			$this->strFechaRN = GuiaCheckpoints::FechaRNDefault;
			$this->strFechaRR = GuiaCheckpoints::FechaRRDefault;
			$this->strFechaRZ = GuiaCheckpoints::FechaRZDefault;
			$this->strFechaSE = GuiaCheckpoints::FechaSEDefault;
			$this->strFechaSF = GuiaCheckpoints::FechaSFDefault;
			$this->strFechaSM = GuiaCheckpoints::FechaSMDefault;
			$this->strFechaSR = GuiaCheckpoints::FechaSRDefault;
			$this->strFechaSS = GuiaCheckpoints::FechaSSDefault;
			$this->strFechaTR = GuiaCheckpoints::FechaTRDefault;
			$this->strFechaTU = GuiaCheckpoints::FechaTUDefault;
			$this->strFechaTV = GuiaCheckpoints::FechaTVDefault;
			$this->strFechaVD = GuiaCheckpoints::FechaVDDefault;
			$this->strFechaWM = GuiaCheckpoints::FechaWMDefault;
			$this->strFechaWT = GuiaCheckpoints::FechaWTDefault;
			$this->strFechaWU = GuiaCheckpoints::FechaWUDefault;
			$this->strFechaWX = GuiaCheckpoints::FechaWXDefault;
			$this->strFechaZN = GuiaCheckpoints::FechaZNDefault;
			$this->strFechaZR = GuiaCheckpoints::FechaZRDefault;
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
		 * Load a GuiaCheckpoints from PK Info
		 * @param string $strGuiaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaCheckpoints
		 */
		public static function Load($strGuiaId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'GuiaCheckpoints', $strGuiaId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = GuiaCheckpoints::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::GuiaCheckpoints()->GuiaId, $strGuiaId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all GuiaCheckpointses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaCheckpoints[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call GuiaCheckpoints::QueryArray to perform the LoadAll query
			try {
				return GuiaCheckpoints::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all GuiaCheckpointses
		 * @return int
		 */
		public static function CountAll() {
			// Call GuiaCheckpoints::QueryCount to perform the CountAll query
			return GuiaCheckpoints::QueryCount(QQ::All());
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
			$objDatabase = GuiaCheckpoints::GetDatabase();

			// Create/Build out the QueryBuilder object with GuiaCheckpoints-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'guia_checkpoints');

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
				GuiaCheckpoints::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('guia_checkpoints');

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
		 * Static Qcubed Query method to query for a single GuiaCheckpoints object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return GuiaCheckpoints the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GuiaCheckpoints::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new GuiaCheckpoints object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = GuiaCheckpoints::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->strGuiaId][] = $objItem;
		
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
				return GuiaCheckpoints::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of GuiaCheckpoints objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return GuiaCheckpoints[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GuiaCheckpoints::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return GuiaCheckpoints::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = GuiaCheckpoints::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of GuiaCheckpoints objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GuiaCheckpoints::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = GuiaCheckpoints::GetDatabase();

			$strQuery = GuiaCheckpoints::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/guiacheckpoints', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = GuiaCheckpoints::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this GuiaCheckpoints
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'guia_checkpoints';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'guia_id', $strAliasPrefix . 'guia_id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'guia_id', $strAliasPrefix . 'guia_id');
			    $objBuilder->AddSelectItem($strTableName, 'codi_clie', $strAliasPrefix . 'codi_clie');
			    $objBuilder->AddSelectItem($strTableName, 'cliente_id', $strAliasPrefix . 'cliente_id');
			    $objBuilder->AddSelectItem($strTableName, 'nomb_remi', $strAliasPrefix . 'nomb_remi');
			    $objBuilder->AddSelectItem($strTableName, 'fech_guia', $strAliasPrefix . 'fech_guia');
			    $objBuilder->AddSelectItem($strTableName, 'esta_orig', $strAliasPrefix . 'esta_orig');
			    $objBuilder->AddSelectItem($strTableName, 'esta_dest', $strAliasPrefix . 'esta_dest');
			    $objBuilder->AddSelectItem($strTableName, 'sistema_id', $strAliasPrefix . 'sistema_id');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_AR', $strAliasPrefix . 'fecha_AR');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_AV', $strAliasPrefix . 'fecha_AV');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_BC', $strAliasPrefix . 'fecha_BC');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_BG', $strAliasPrefix . 'fecha_BG');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_CG', $strAliasPrefix . 'fecha_CG');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_CS', $strAliasPrefix . 'fecha_CS');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_DA', $strAliasPrefix . 'fecha_DA');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_DD', $strAliasPrefix . 'fecha_DD');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_DE', $strAliasPrefix . 'fecha_DE');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_DF', $strAliasPrefix . 'fecha_DF');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_DI', $strAliasPrefix . 'fecha_DI');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_DM', $strAliasPrefix . 'fecha_DM');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_DP', $strAliasPrefix . 'fecha_DP');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_DR', $strAliasPrefix . 'fecha_DR');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_DV', $strAliasPrefix . 'fecha_DV');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_EA', $strAliasPrefix . 'fecha_EA');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_EC', $strAliasPrefix . 'fecha_EC');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_EE', $strAliasPrefix . 'fecha_EE');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_EI', $strAliasPrefix . 'fecha_EI');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_EM', $strAliasPrefix . 'fecha_EM');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_ER', $strAliasPrefix . 'fecha_ER');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_EU', $strAliasPrefix . 'fecha_EU');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_EX', $strAliasPrefix . 'fecha_EX');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_FA', $strAliasPrefix . 'fecha_FA');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_FB', $strAliasPrefix . 'fecha_FB');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_FC', $strAliasPrefix . 'fecha_FC');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_FE', $strAliasPrefix . 'fecha_FE');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_FK', $strAliasPrefix . 'fecha_FK');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_FR', $strAliasPrefix . 'fecha_FR');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_IC', $strAliasPrefix . 'fecha_IC');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_KM', $strAliasPrefix . 'fecha_KM');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_KT', $strAliasPrefix . 'fecha_KT');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_KU', $strAliasPrefix . 'fecha_KU');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_KX', $strAliasPrefix . 'fecha_KX');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_MA', $strAliasPrefix . 'fecha_MA');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_MD', $strAliasPrefix . 'fecha_MD');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_MG', $strAliasPrefix . 'fecha_MG');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_NA', $strAliasPrefix . 'fecha_NA');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_NC', $strAliasPrefix . 'fecha_NC');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_NR', $strAliasPrefix . 'fecha_NR');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_NT', $strAliasPrefix . 'fecha_NT');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_OE', $strAliasPrefix . 'fecha_OE');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_OK', $strAliasPrefix . 'fecha_OK');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_OT', $strAliasPrefix . 'fecha_OT');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_PA', $strAliasPrefix . 'fecha_PA');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_PC', $strAliasPrefix . 'fecha_PC');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_PP', $strAliasPrefix . 'fecha_PP');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_PS', $strAliasPrefix . 'fecha_PS');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_PU', $strAliasPrefix . 'fecha_PU');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_RA', $strAliasPrefix . 'fecha_RA');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_RC', $strAliasPrefix . 'fecha_RC');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_RD', $strAliasPrefix . 'fecha_RD');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_RE', $strAliasPrefix . 'fecha_RE');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_RK', $strAliasPrefix . 'fecha_RK');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_RM', $strAliasPrefix . 'fecha_RM');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_RN', $strAliasPrefix . 'fecha_RN');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_RR', $strAliasPrefix . 'fecha_RR');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_RZ', $strAliasPrefix . 'fecha_RZ');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_SE', $strAliasPrefix . 'fecha_SE');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_SF', $strAliasPrefix . 'fecha_SF');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_SM', $strAliasPrefix . 'fecha_SM');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_SR', $strAliasPrefix . 'fecha_SR');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_SS', $strAliasPrefix . 'fecha_SS');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_TR', $strAliasPrefix . 'fecha_TR');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_TU', $strAliasPrefix . 'fecha_TU');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_TV', $strAliasPrefix . 'fecha_TV');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_VD', $strAliasPrefix . 'fecha_VD');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_WM', $strAliasPrefix . 'fecha_WM');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_WT', $strAliasPrefix . 'fecha_WT');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_WU', $strAliasPrefix . 'fecha_WU');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_WX', $strAliasPrefix . 'fecha_WX');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_ZN', $strAliasPrefix . 'fecha_ZN');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_ZR', $strAliasPrefix . 'fecha_ZR');
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
			
			$strAlias = $strAliasPrefix . 'guia_id';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->strGuiaId != $objDbRow->GetColumn($strColumnAlias, 'VarChar')) {
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
		 * Instantiate a GuiaCheckpoints from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this GuiaCheckpoints::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a GuiaCheckpoints, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['guia_id']) ? $strColumnAliasArray['guia_id'] : 'guia_id';
				$key = $objDbRow->GetColumn($strColumnAlias, 'VarChar');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (GuiaCheckpoints::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the GuiaCheckpoints object
			$objToReturn = new GuiaCheckpoints();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'guia_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strGuiaId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$objToReturn->__strGuiaId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codi_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiClie = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'cliente_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intClienteId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nomb_remi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombRemi = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fech_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechGuia = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'esta_orig';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEstaOrig = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'esta_dest';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEstaDest = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'sistema_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strSistemaId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_AR';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaAR = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_AV';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaAV = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_BC';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaBC = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_BG';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaBG = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_CG';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaCG = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_CS';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaCS = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_DA';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaDA = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_DD';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaDD = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_DE';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaDE = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_DF';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaDF = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_DI';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaDI = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_DM';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaDM = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_DP';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaDP = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_DR';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaDR = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_DV';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaDV = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_EA';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaEA = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_EC';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaEC = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_EE';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaEE = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_EI';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaEI = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_EM';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaEM = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_ER';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaER = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_EU';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaEU = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_EX';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaEX = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_FA';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaFA = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_FB';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaFB = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_FC';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaFC = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_FE';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaFE = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_FK';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaFK = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_FR';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaFR = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_IC';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaIC = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_KM';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaKM = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_KT';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaKT = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_KU';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaKU = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_KX';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaKX = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_MA';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaMA = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_MD';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaMD = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_MG';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaMG = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_NA';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaNA = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_NC';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaNC = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_NR';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaNR = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_NT';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaNT = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_OE';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaOE = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_OK';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaOK = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_OT';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaOT = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_PA';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaPA = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_PC';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaPC = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_PP';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaPP = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_PS';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaPS = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_PU';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaPU = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_RA';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaRA = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_RC';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaRC = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_RD';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaRD = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_RE';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaRE = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_RK';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaRK = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_RM';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaRM = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_RN';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaRN = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_RR';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaRR = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_RZ';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaRZ = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_SE';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaSE = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_SF';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaSF = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_SM';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaSM = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_SR';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaSR = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_SS';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaSS = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_TR';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaTR = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_TU';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaTU = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_TV';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaTV = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_VD';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaVD = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_WM';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaWM = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_WT';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaWT = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_WU';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaWU = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_WX';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaWX = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_ZN';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaZN = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_ZR';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaZR = $objDbRow->GetColumn($strAliasName, 'VarChar');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->GuiaId != $objPreviousItem->GuiaId) {
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
				$strAliasPrefix = 'guia_checkpoints__';

			// Check for Guia Early Binding
			$strAlias = $strAliasPrefix . 'guia_id__nume_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['guia_id']) ? null : $objExpansionAliasArray['guia_id']);
				$objToReturn->objGuia = Guia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guia_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of GuiaCheckpointses from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return GuiaCheckpoints[]
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
					$objItem = GuiaCheckpoints::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->strGuiaId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = GuiaCheckpoints::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single GuiaCheckpoints object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return GuiaCheckpoints next row resulting from the query
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
			return GuiaCheckpoints::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single GuiaCheckpoints object,
		 * by GuiaId Index(es)
		 * @param string $strGuiaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaCheckpoints
		*/
		public static function LoadByGuiaId($strGuiaId, $objOptionalClauses = null) {
			return GuiaCheckpoints::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::GuiaCheckpoints()->GuiaId, $strGuiaId)
				),
				$objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this GuiaCheckpoints
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = GuiaCheckpoints::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `guia_checkpoints` (
							`guia_id`,
							`codi_clie`,
							`cliente_id`,
							`nomb_remi`,
							`fech_guia`,
							`esta_orig`,
							`esta_dest`,
							`sistema_id`,
							`fecha_AR`,
							`fecha_AV`,
							`fecha_BC`,
							`fecha_BG`,
							`fecha_CG`,
							`fecha_CS`,
							`fecha_DA`,
							`fecha_DD`,
							`fecha_DE`,
							`fecha_DF`,
							`fecha_DI`,
							`fecha_DM`,
							`fecha_DP`,
							`fecha_DR`,
							`fecha_DV`,
							`fecha_EA`,
							`fecha_EC`,
							`fecha_EE`,
							`fecha_EI`,
							`fecha_EM`,
							`fecha_ER`,
							`fecha_EU`,
							`fecha_EX`,
							`fecha_FA`,
							`fecha_FB`,
							`fecha_FC`,
							`fecha_FE`,
							`fecha_FK`,
							`fecha_FR`,
							`fecha_IC`,
							`fecha_KM`,
							`fecha_KT`,
							`fecha_KU`,
							`fecha_KX`,
							`fecha_MA`,
							`fecha_MD`,
							`fecha_MG`,
							`fecha_NA`,
							`fecha_NC`,
							`fecha_NR`,
							`fecha_NT`,
							`fecha_OE`,
							`fecha_OK`,
							`fecha_OT`,
							`fecha_PA`,
							`fecha_PC`,
							`fecha_PP`,
							`fecha_PS`,
							`fecha_PU`,
							`fecha_RA`,
							`fecha_RC`,
							`fecha_RD`,
							`fecha_RE`,
							`fecha_RK`,
							`fecha_RM`,
							`fecha_RN`,
							`fecha_RR`,
							`fecha_RZ`,
							`fecha_SE`,
							`fecha_SF`,
							`fecha_SM`,
							`fecha_SR`,
							`fecha_SS`,
							`fecha_TR`,
							`fecha_TU`,
							`fecha_TV`,
							`fecha_VD`,
							`fecha_WM`,
							`fecha_WT`,
							`fecha_WU`,
							`fecha_WX`,
							`fecha_ZN`,
							`fecha_ZR`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strGuiaId) . ',
							' . $objDatabase->SqlVariable($this->intCodiClie) . ',
							' . $objDatabase->SqlVariable($this->intClienteId) . ',
							' . $objDatabase->SqlVariable($this->strNombRemi) . ',
							' . $objDatabase->SqlVariable($this->dttFechGuia) . ',
							' . $objDatabase->SqlVariable($this->strEstaOrig) . ',
							' . $objDatabase->SqlVariable($this->strEstaDest) . ',
							' . $objDatabase->SqlVariable($this->strSistemaId) . ',
							' . $objDatabase->SqlVariable($this->strFechaAR) . ',
							' . $objDatabase->SqlVariable($this->strFechaAV) . ',
							' . $objDatabase->SqlVariable($this->strFechaBC) . ',
							' . $objDatabase->SqlVariable($this->strFechaBG) . ',
							' . $objDatabase->SqlVariable($this->strFechaCG) . ',
							' . $objDatabase->SqlVariable($this->strFechaCS) . ',
							' . $objDatabase->SqlVariable($this->strFechaDA) . ',
							' . $objDatabase->SqlVariable($this->strFechaDD) . ',
							' . $objDatabase->SqlVariable($this->strFechaDE) . ',
							' . $objDatabase->SqlVariable($this->strFechaDF) . ',
							' . $objDatabase->SqlVariable($this->strFechaDI) . ',
							' . $objDatabase->SqlVariable($this->strFechaDM) . ',
							' . $objDatabase->SqlVariable($this->strFechaDP) . ',
							' . $objDatabase->SqlVariable($this->strFechaDR) . ',
							' . $objDatabase->SqlVariable($this->strFechaDV) . ',
							' . $objDatabase->SqlVariable($this->strFechaEA) . ',
							' . $objDatabase->SqlVariable($this->strFechaEC) . ',
							' . $objDatabase->SqlVariable($this->strFechaEE) . ',
							' . $objDatabase->SqlVariable($this->strFechaEI) . ',
							' . $objDatabase->SqlVariable($this->strFechaEM) . ',
							' . $objDatabase->SqlVariable($this->strFechaER) . ',
							' . $objDatabase->SqlVariable($this->strFechaEU) . ',
							' . $objDatabase->SqlVariable($this->strFechaEX) . ',
							' . $objDatabase->SqlVariable($this->strFechaFA) . ',
							' . $objDatabase->SqlVariable($this->strFechaFB) . ',
							' . $objDatabase->SqlVariable($this->strFechaFC) . ',
							' . $objDatabase->SqlVariable($this->strFechaFE) . ',
							' . $objDatabase->SqlVariable($this->strFechaFK) . ',
							' . $objDatabase->SqlVariable($this->strFechaFR) . ',
							' . $objDatabase->SqlVariable($this->strFechaIC) . ',
							' . $objDatabase->SqlVariable($this->strFechaKM) . ',
							' . $objDatabase->SqlVariable($this->strFechaKT) . ',
							' . $objDatabase->SqlVariable($this->strFechaKU) . ',
							' . $objDatabase->SqlVariable($this->strFechaKX) . ',
							' . $objDatabase->SqlVariable($this->strFechaMA) . ',
							' . $objDatabase->SqlVariable($this->strFechaMD) . ',
							' . $objDatabase->SqlVariable($this->strFechaMG) . ',
							' . $objDatabase->SqlVariable($this->strFechaNA) . ',
							' . $objDatabase->SqlVariable($this->strFechaNC) . ',
							' . $objDatabase->SqlVariable($this->strFechaNR) . ',
							' . $objDatabase->SqlVariable($this->strFechaNT) . ',
							' . $objDatabase->SqlVariable($this->strFechaOE) . ',
							' . $objDatabase->SqlVariable($this->strFechaOK) . ',
							' . $objDatabase->SqlVariable($this->strFechaOT) . ',
							' . $objDatabase->SqlVariable($this->strFechaPA) . ',
							' . $objDatabase->SqlVariable($this->strFechaPC) . ',
							' . $objDatabase->SqlVariable($this->strFechaPP) . ',
							' . $objDatabase->SqlVariable($this->strFechaPS) . ',
							' . $objDatabase->SqlVariable($this->strFechaPU) . ',
							' . $objDatabase->SqlVariable($this->strFechaRA) . ',
							' . $objDatabase->SqlVariable($this->strFechaRC) . ',
							' . $objDatabase->SqlVariable($this->strFechaRD) . ',
							' . $objDatabase->SqlVariable($this->strFechaRE) . ',
							' . $objDatabase->SqlVariable($this->strFechaRK) . ',
							' . $objDatabase->SqlVariable($this->strFechaRM) . ',
							' . $objDatabase->SqlVariable($this->strFechaRN) . ',
							' . $objDatabase->SqlVariable($this->strFechaRR) . ',
							' . $objDatabase->SqlVariable($this->strFechaRZ) . ',
							' . $objDatabase->SqlVariable($this->strFechaSE) . ',
							' . $objDatabase->SqlVariable($this->strFechaSF) . ',
							' . $objDatabase->SqlVariable($this->strFechaSM) . ',
							' . $objDatabase->SqlVariable($this->strFechaSR) . ',
							' . $objDatabase->SqlVariable($this->strFechaSS) . ',
							' . $objDatabase->SqlVariable($this->strFechaTR) . ',
							' . $objDatabase->SqlVariable($this->strFechaTU) . ',
							' . $objDatabase->SqlVariable($this->strFechaTV) . ',
							' . $objDatabase->SqlVariable($this->strFechaVD) . ',
							' . $objDatabase->SqlVariable($this->strFechaWM) . ',
							' . $objDatabase->SqlVariable($this->strFechaWT) . ',
							' . $objDatabase->SqlVariable($this->strFechaWU) . ',
							' . $objDatabase->SqlVariable($this->strFechaWX) . ',
							' . $objDatabase->SqlVariable($this->strFechaZN) . ',
							' . $objDatabase->SqlVariable($this->strFechaZR) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`guia_checkpoints`
						SET
							`guia_id` = ' . $objDatabase->SqlVariable($this->strGuiaId) . ',
							`codi_clie` = ' . $objDatabase->SqlVariable($this->intCodiClie) . ',
							`cliente_id` = ' . $objDatabase->SqlVariable($this->intClienteId) . ',
							`nomb_remi` = ' . $objDatabase->SqlVariable($this->strNombRemi) . ',
							`fech_guia` = ' . $objDatabase->SqlVariable($this->dttFechGuia) . ',
							`esta_orig` = ' . $objDatabase->SqlVariable($this->strEstaOrig) . ',
							`esta_dest` = ' . $objDatabase->SqlVariable($this->strEstaDest) . ',
							`sistema_id` = ' . $objDatabase->SqlVariable($this->strSistemaId) . ',
							`fecha_AR` = ' . $objDatabase->SqlVariable($this->strFechaAR) . ',
							`fecha_AV` = ' . $objDatabase->SqlVariable($this->strFechaAV) . ',
							`fecha_BC` = ' . $objDatabase->SqlVariable($this->strFechaBC) . ',
							`fecha_BG` = ' . $objDatabase->SqlVariable($this->strFechaBG) . ',
							`fecha_CG` = ' . $objDatabase->SqlVariable($this->strFechaCG) . ',
							`fecha_CS` = ' . $objDatabase->SqlVariable($this->strFechaCS) . ',
							`fecha_DA` = ' . $objDatabase->SqlVariable($this->strFechaDA) . ',
							`fecha_DD` = ' . $objDatabase->SqlVariable($this->strFechaDD) . ',
							`fecha_DE` = ' . $objDatabase->SqlVariable($this->strFechaDE) . ',
							`fecha_DF` = ' . $objDatabase->SqlVariable($this->strFechaDF) . ',
							`fecha_DI` = ' . $objDatabase->SqlVariable($this->strFechaDI) . ',
							`fecha_DM` = ' . $objDatabase->SqlVariable($this->strFechaDM) . ',
							`fecha_DP` = ' . $objDatabase->SqlVariable($this->strFechaDP) . ',
							`fecha_DR` = ' . $objDatabase->SqlVariable($this->strFechaDR) . ',
							`fecha_DV` = ' . $objDatabase->SqlVariable($this->strFechaDV) . ',
							`fecha_EA` = ' . $objDatabase->SqlVariable($this->strFechaEA) . ',
							`fecha_EC` = ' . $objDatabase->SqlVariable($this->strFechaEC) . ',
							`fecha_EE` = ' . $objDatabase->SqlVariable($this->strFechaEE) . ',
							`fecha_EI` = ' . $objDatabase->SqlVariable($this->strFechaEI) . ',
							`fecha_EM` = ' . $objDatabase->SqlVariable($this->strFechaEM) . ',
							`fecha_ER` = ' . $objDatabase->SqlVariable($this->strFechaER) . ',
							`fecha_EU` = ' . $objDatabase->SqlVariable($this->strFechaEU) . ',
							`fecha_EX` = ' . $objDatabase->SqlVariable($this->strFechaEX) . ',
							`fecha_FA` = ' . $objDatabase->SqlVariable($this->strFechaFA) . ',
							`fecha_FB` = ' . $objDatabase->SqlVariable($this->strFechaFB) . ',
							`fecha_FC` = ' . $objDatabase->SqlVariable($this->strFechaFC) . ',
							`fecha_FE` = ' . $objDatabase->SqlVariable($this->strFechaFE) . ',
							`fecha_FK` = ' . $objDatabase->SqlVariable($this->strFechaFK) . ',
							`fecha_FR` = ' . $objDatabase->SqlVariable($this->strFechaFR) . ',
							`fecha_IC` = ' . $objDatabase->SqlVariable($this->strFechaIC) . ',
							`fecha_KM` = ' . $objDatabase->SqlVariable($this->strFechaKM) . ',
							`fecha_KT` = ' . $objDatabase->SqlVariable($this->strFechaKT) . ',
							`fecha_KU` = ' . $objDatabase->SqlVariable($this->strFechaKU) . ',
							`fecha_KX` = ' . $objDatabase->SqlVariable($this->strFechaKX) . ',
							`fecha_MA` = ' . $objDatabase->SqlVariable($this->strFechaMA) . ',
							`fecha_MD` = ' . $objDatabase->SqlVariable($this->strFechaMD) . ',
							`fecha_MG` = ' . $objDatabase->SqlVariable($this->strFechaMG) . ',
							`fecha_NA` = ' . $objDatabase->SqlVariable($this->strFechaNA) . ',
							`fecha_NC` = ' . $objDatabase->SqlVariable($this->strFechaNC) . ',
							`fecha_NR` = ' . $objDatabase->SqlVariable($this->strFechaNR) . ',
							`fecha_NT` = ' . $objDatabase->SqlVariable($this->strFechaNT) . ',
							`fecha_OE` = ' . $objDatabase->SqlVariable($this->strFechaOE) . ',
							`fecha_OK` = ' . $objDatabase->SqlVariable($this->strFechaOK) . ',
							`fecha_OT` = ' . $objDatabase->SqlVariable($this->strFechaOT) . ',
							`fecha_PA` = ' . $objDatabase->SqlVariable($this->strFechaPA) . ',
							`fecha_PC` = ' . $objDatabase->SqlVariable($this->strFechaPC) . ',
							`fecha_PP` = ' . $objDatabase->SqlVariable($this->strFechaPP) . ',
							`fecha_PS` = ' . $objDatabase->SqlVariable($this->strFechaPS) . ',
							`fecha_PU` = ' . $objDatabase->SqlVariable($this->strFechaPU) . ',
							`fecha_RA` = ' . $objDatabase->SqlVariable($this->strFechaRA) . ',
							`fecha_RC` = ' . $objDatabase->SqlVariable($this->strFechaRC) . ',
							`fecha_RD` = ' . $objDatabase->SqlVariable($this->strFechaRD) . ',
							`fecha_RE` = ' . $objDatabase->SqlVariable($this->strFechaRE) . ',
							`fecha_RK` = ' . $objDatabase->SqlVariable($this->strFechaRK) . ',
							`fecha_RM` = ' . $objDatabase->SqlVariable($this->strFechaRM) . ',
							`fecha_RN` = ' . $objDatabase->SqlVariable($this->strFechaRN) . ',
							`fecha_RR` = ' . $objDatabase->SqlVariable($this->strFechaRR) . ',
							`fecha_RZ` = ' . $objDatabase->SqlVariable($this->strFechaRZ) . ',
							`fecha_SE` = ' . $objDatabase->SqlVariable($this->strFechaSE) . ',
							`fecha_SF` = ' . $objDatabase->SqlVariable($this->strFechaSF) . ',
							`fecha_SM` = ' . $objDatabase->SqlVariable($this->strFechaSM) . ',
							`fecha_SR` = ' . $objDatabase->SqlVariable($this->strFechaSR) . ',
							`fecha_SS` = ' . $objDatabase->SqlVariable($this->strFechaSS) . ',
							`fecha_TR` = ' . $objDatabase->SqlVariable($this->strFechaTR) . ',
							`fecha_TU` = ' . $objDatabase->SqlVariable($this->strFechaTU) . ',
							`fecha_TV` = ' . $objDatabase->SqlVariable($this->strFechaTV) . ',
							`fecha_VD` = ' . $objDatabase->SqlVariable($this->strFechaVD) . ',
							`fecha_WM` = ' . $objDatabase->SqlVariable($this->strFechaWM) . ',
							`fecha_WT` = ' . $objDatabase->SqlVariable($this->strFechaWT) . ',
							`fecha_WU` = ' . $objDatabase->SqlVariable($this->strFechaWU) . ',
							`fecha_WX` = ' . $objDatabase->SqlVariable($this->strFechaWX) . ',
							`fecha_ZN` = ' . $objDatabase->SqlVariable($this->strFechaZN) . ',
							`fecha_ZR` = ' . $objDatabase->SqlVariable($this->strFechaZR) . '
						WHERE
							`guia_id` = ' . $objDatabase->SqlVariable($this->__strGuiaId) . '
					');
				}
					

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__strGuiaId = $this->strGuiaId;


			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this GuiaCheckpoints
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->strGuiaId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this GuiaCheckpoints with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = GuiaCheckpoints::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_checkpoints`
				WHERE
					`guia_id` = ' . $objDatabase->SqlVariable($this->strGuiaId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this GuiaCheckpoints ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'GuiaCheckpoints', $this->strGuiaId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all GuiaCheckpointses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = GuiaCheckpoints::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_checkpoints`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate guia_checkpoints table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = GuiaCheckpoints::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `guia_checkpoints`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this GuiaCheckpoints from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved GuiaCheckpoints object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = GuiaCheckpoints::Load($this->strGuiaId);

			// Update $this's local variables to match
			$this->GuiaId = $objReloaded->GuiaId;
			$this->__strGuiaId = $this->strGuiaId;
			$this->intCodiClie = $objReloaded->intCodiClie;
			$this->intClienteId = $objReloaded->intClienteId;
			$this->strNombRemi = $objReloaded->strNombRemi;
			$this->dttFechGuia = $objReloaded->dttFechGuia;
			$this->strEstaOrig = $objReloaded->strEstaOrig;
			$this->strEstaDest = $objReloaded->strEstaDest;
			$this->strSistemaId = $objReloaded->strSistemaId;
			$this->strFechaAR = $objReloaded->strFechaAR;
			$this->strFechaAV = $objReloaded->strFechaAV;
			$this->strFechaBC = $objReloaded->strFechaBC;
			$this->strFechaBG = $objReloaded->strFechaBG;
			$this->strFechaCG = $objReloaded->strFechaCG;
			$this->strFechaCS = $objReloaded->strFechaCS;
			$this->strFechaDA = $objReloaded->strFechaDA;
			$this->strFechaDD = $objReloaded->strFechaDD;
			$this->strFechaDE = $objReloaded->strFechaDE;
			$this->strFechaDF = $objReloaded->strFechaDF;
			$this->strFechaDI = $objReloaded->strFechaDI;
			$this->strFechaDM = $objReloaded->strFechaDM;
			$this->strFechaDP = $objReloaded->strFechaDP;
			$this->strFechaDR = $objReloaded->strFechaDR;
			$this->strFechaDV = $objReloaded->strFechaDV;
			$this->strFechaEA = $objReloaded->strFechaEA;
			$this->strFechaEC = $objReloaded->strFechaEC;
			$this->strFechaEE = $objReloaded->strFechaEE;
			$this->strFechaEI = $objReloaded->strFechaEI;
			$this->strFechaEM = $objReloaded->strFechaEM;
			$this->strFechaER = $objReloaded->strFechaER;
			$this->strFechaEU = $objReloaded->strFechaEU;
			$this->strFechaEX = $objReloaded->strFechaEX;
			$this->strFechaFA = $objReloaded->strFechaFA;
			$this->strFechaFB = $objReloaded->strFechaFB;
			$this->strFechaFC = $objReloaded->strFechaFC;
			$this->strFechaFE = $objReloaded->strFechaFE;
			$this->strFechaFK = $objReloaded->strFechaFK;
			$this->strFechaFR = $objReloaded->strFechaFR;
			$this->strFechaIC = $objReloaded->strFechaIC;
			$this->strFechaKM = $objReloaded->strFechaKM;
			$this->strFechaKT = $objReloaded->strFechaKT;
			$this->strFechaKU = $objReloaded->strFechaKU;
			$this->strFechaKX = $objReloaded->strFechaKX;
			$this->strFechaMA = $objReloaded->strFechaMA;
			$this->strFechaMD = $objReloaded->strFechaMD;
			$this->strFechaMG = $objReloaded->strFechaMG;
			$this->strFechaNA = $objReloaded->strFechaNA;
			$this->strFechaNC = $objReloaded->strFechaNC;
			$this->strFechaNR = $objReloaded->strFechaNR;
			$this->strFechaNT = $objReloaded->strFechaNT;
			$this->strFechaOE = $objReloaded->strFechaOE;
			$this->strFechaOK = $objReloaded->strFechaOK;
			$this->strFechaOT = $objReloaded->strFechaOT;
			$this->strFechaPA = $objReloaded->strFechaPA;
			$this->strFechaPC = $objReloaded->strFechaPC;
			$this->strFechaPP = $objReloaded->strFechaPP;
			$this->strFechaPS = $objReloaded->strFechaPS;
			$this->strFechaPU = $objReloaded->strFechaPU;
			$this->strFechaRA = $objReloaded->strFechaRA;
			$this->strFechaRC = $objReloaded->strFechaRC;
			$this->strFechaRD = $objReloaded->strFechaRD;
			$this->strFechaRE = $objReloaded->strFechaRE;
			$this->strFechaRK = $objReloaded->strFechaRK;
			$this->strFechaRM = $objReloaded->strFechaRM;
			$this->strFechaRN = $objReloaded->strFechaRN;
			$this->strFechaRR = $objReloaded->strFechaRR;
			$this->strFechaRZ = $objReloaded->strFechaRZ;
			$this->strFechaSE = $objReloaded->strFechaSE;
			$this->strFechaSF = $objReloaded->strFechaSF;
			$this->strFechaSM = $objReloaded->strFechaSM;
			$this->strFechaSR = $objReloaded->strFechaSR;
			$this->strFechaSS = $objReloaded->strFechaSS;
			$this->strFechaTR = $objReloaded->strFechaTR;
			$this->strFechaTU = $objReloaded->strFechaTU;
			$this->strFechaTV = $objReloaded->strFechaTV;
			$this->strFechaVD = $objReloaded->strFechaVD;
			$this->strFechaWM = $objReloaded->strFechaWM;
			$this->strFechaWT = $objReloaded->strFechaWT;
			$this->strFechaWU = $objReloaded->strFechaWU;
			$this->strFechaWX = $objReloaded->strFechaWX;
			$this->strFechaZN = $objReloaded->strFechaZN;
			$this->strFechaZR = $objReloaded->strFechaZR;
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
				case 'GuiaId':
					/**
					 * Gets the value for strGuiaId (PK)
					 * @return string
					 */
					return $this->strGuiaId;

				case 'CodiClie':
					/**
					 * Gets the value for intCodiClie 
					 * @return integer
					 */
					return $this->intCodiClie;

				case 'ClienteId':
					/**
					 * Gets the value for intClienteId 
					 * @return integer
					 */
					return $this->intClienteId;

				case 'NombRemi':
					/**
					 * Gets the value for strNombRemi 
					 * @return string
					 */
					return $this->strNombRemi;

				case 'FechGuia':
					/**
					 * Gets the value for dttFechGuia 
					 * @return QDateTime
					 */
					return $this->dttFechGuia;

				case 'EstaOrig':
					/**
					 * Gets the value for strEstaOrig 
					 * @return string
					 */
					return $this->strEstaOrig;

				case 'EstaDest':
					/**
					 * Gets the value for strEstaDest 
					 * @return string
					 */
					return $this->strEstaDest;

				case 'SistemaId':
					/**
					 * Gets the value for strSistemaId 
					 * @return string
					 */
					return $this->strSistemaId;

				case 'FechaAR':
					/**
					 * Gets the value for strFechaAR 
					 * @return string
					 */
					return $this->strFechaAR;

				case 'FechaAV':
					/**
					 * Gets the value for strFechaAV 
					 * @return string
					 */
					return $this->strFechaAV;

				case 'FechaBC':
					/**
					 * Gets the value for strFechaBC 
					 * @return string
					 */
					return $this->strFechaBC;

				case 'FechaBG':
					/**
					 * Gets the value for strFechaBG 
					 * @return string
					 */
					return $this->strFechaBG;

				case 'FechaCG':
					/**
					 * Gets the value for strFechaCG 
					 * @return string
					 */
					return $this->strFechaCG;

				case 'FechaCS':
					/**
					 * Gets the value for strFechaCS 
					 * @return string
					 */
					return $this->strFechaCS;

				case 'FechaDA':
					/**
					 * Gets the value for strFechaDA 
					 * @return string
					 */
					return $this->strFechaDA;

				case 'FechaDD':
					/**
					 * Gets the value for strFechaDD 
					 * @return string
					 */
					return $this->strFechaDD;

				case 'FechaDE':
					/**
					 * Gets the value for strFechaDE 
					 * @return string
					 */
					return $this->strFechaDE;

				case 'FechaDF':
					/**
					 * Gets the value for strFechaDF 
					 * @return string
					 */
					return $this->strFechaDF;

				case 'FechaDI':
					/**
					 * Gets the value for strFechaDI 
					 * @return string
					 */
					return $this->strFechaDI;

				case 'FechaDM':
					/**
					 * Gets the value for strFechaDM 
					 * @return string
					 */
					return $this->strFechaDM;

				case 'FechaDP':
					/**
					 * Gets the value for strFechaDP 
					 * @return string
					 */
					return $this->strFechaDP;

				case 'FechaDR':
					/**
					 * Gets the value for strFechaDR 
					 * @return string
					 */
					return $this->strFechaDR;

				case 'FechaDV':
					/**
					 * Gets the value for strFechaDV 
					 * @return string
					 */
					return $this->strFechaDV;

				case 'FechaEA':
					/**
					 * Gets the value for strFechaEA 
					 * @return string
					 */
					return $this->strFechaEA;

				case 'FechaEC':
					/**
					 * Gets the value for strFechaEC 
					 * @return string
					 */
					return $this->strFechaEC;

				case 'FechaEE':
					/**
					 * Gets the value for strFechaEE 
					 * @return string
					 */
					return $this->strFechaEE;

				case 'FechaEI':
					/**
					 * Gets the value for strFechaEI 
					 * @return string
					 */
					return $this->strFechaEI;

				case 'FechaEM':
					/**
					 * Gets the value for strFechaEM 
					 * @return string
					 */
					return $this->strFechaEM;

				case 'FechaER':
					/**
					 * Gets the value for strFechaER 
					 * @return string
					 */
					return $this->strFechaER;

				case 'FechaEU':
					/**
					 * Gets the value for strFechaEU 
					 * @return string
					 */
					return $this->strFechaEU;

				case 'FechaEX':
					/**
					 * Gets the value for strFechaEX 
					 * @return string
					 */
					return $this->strFechaEX;

				case 'FechaFA':
					/**
					 * Gets the value for strFechaFA 
					 * @return string
					 */
					return $this->strFechaFA;

				case 'FechaFB':
					/**
					 * Gets the value for strFechaFB 
					 * @return string
					 */
					return $this->strFechaFB;

				case 'FechaFC':
					/**
					 * Gets the value for strFechaFC 
					 * @return string
					 */
					return $this->strFechaFC;

				case 'FechaFE':
					/**
					 * Gets the value for strFechaFE 
					 * @return string
					 */
					return $this->strFechaFE;

				case 'FechaFK':
					/**
					 * Gets the value for strFechaFK 
					 * @return string
					 */
					return $this->strFechaFK;

				case 'FechaFR':
					/**
					 * Gets the value for strFechaFR 
					 * @return string
					 */
					return $this->strFechaFR;

				case 'FechaIC':
					/**
					 * Gets the value for strFechaIC 
					 * @return string
					 */
					return $this->strFechaIC;

				case 'FechaKM':
					/**
					 * Gets the value for strFechaKM 
					 * @return string
					 */
					return $this->strFechaKM;

				case 'FechaKT':
					/**
					 * Gets the value for strFechaKT 
					 * @return string
					 */
					return $this->strFechaKT;

				case 'FechaKU':
					/**
					 * Gets the value for strFechaKU 
					 * @return string
					 */
					return $this->strFechaKU;

				case 'FechaKX':
					/**
					 * Gets the value for strFechaKX 
					 * @return string
					 */
					return $this->strFechaKX;

				case 'FechaMA':
					/**
					 * Gets the value for strFechaMA 
					 * @return string
					 */
					return $this->strFechaMA;

				case 'FechaMD':
					/**
					 * Gets the value for strFechaMD 
					 * @return string
					 */
					return $this->strFechaMD;

				case 'FechaMG':
					/**
					 * Gets the value for strFechaMG 
					 * @return string
					 */
					return $this->strFechaMG;

				case 'FechaNA':
					/**
					 * Gets the value for strFechaNA 
					 * @return string
					 */
					return $this->strFechaNA;

				case 'FechaNC':
					/**
					 * Gets the value for strFechaNC 
					 * @return string
					 */
					return $this->strFechaNC;

				case 'FechaNR':
					/**
					 * Gets the value for strFechaNR 
					 * @return string
					 */
					return $this->strFechaNR;

				case 'FechaNT':
					/**
					 * Gets the value for strFechaNT 
					 * @return string
					 */
					return $this->strFechaNT;

				case 'FechaOE':
					/**
					 * Gets the value for strFechaOE 
					 * @return string
					 */
					return $this->strFechaOE;

				case 'FechaOK':
					/**
					 * Gets the value for strFechaOK 
					 * @return string
					 */
					return $this->strFechaOK;

				case 'FechaOT':
					/**
					 * Gets the value for strFechaOT 
					 * @return string
					 */
					return $this->strFechaOT;

				case 'FechaPA':
					/**
					 * Gets the value for strFechaPA 
					 * @return string
					 */
					return $this->strFechaPA;

				case 'FechaPC':
					/**
					 * Gets the value for strFechaPC 
					 * @return string
					 */
					return $this->strFechaPC;

				case 'FechaPP':
					/**
					 * Gets the value for strFechaPP 
					 * @return string
					 */
					return $this->strFechaPP;

				case 'FechaPS':
					/**
					 * Gets the value for strFechaPS 
					 * @return string
					 */
					return $this->strFechaPS;

				case 'FechaPU':
					/**
					 * Gets the value for strFechaPU 
					 * @return string
					 */
					return $this->strFechaPU;

				case 'FechaRA':
					/**
					 * Gets the value for strFechaRA 
					 * @return string
					 */
					return $this->strFechaRA;

				case 'FechaRC':
					/**
					 * Gets the value for strFechaRC 
					 * @return string
					 */
					return $this->strFechaRC;

				case 'FechaRD':
					/**
					 * Gets the value for strFechaRD 
					 * @return string
					 */
					return $this->strFechaRD;

				case 'FechaRE':
					/**
					 * Gets the value for strFechaRE 
					 * @return string
					 */
					return $this->strFechaRE;

				case 'FechaRK':
					/**
					 * Gets the value for strFechaRK 
					 * @return string
					 */
					return $this->strFechaRK;

				case 'FechaRM':
					/**
					 * Gets the value for strFechaRM 
					 * @return string
					 */
					return $this->strFechaRM;

				case 'FechaRN':
					/**
					 * Gets the value for strFechaRN 
					 * @return string
					 */
					return $this->strFechaRN;

				case 'FechaRR':
					/**
					 * Gets the value for strFechaRR 
					 * @return string
					 */
					return $this->strFechaRR;

				case 'FechaRZ':
					/**
					 * Gets the value for strFechaRZ 
					 * @return string
					 */
					return $this->strFechaRZ;

				case 'FechaSE':
					/**
					 * Gets the value for strFechaSE 
					 * @return string
					 */
					return $this->strFechaSE;

				case 'FechaSF':
					/**
					 * Gets the value for strFechaSF 
					 * @return string
					 */
					return $this->strFechaSF;

				case 'FechaSM':
					/**
					 * Gets the value for strFechaSM 
					 * @return string
					 */
					return $this->strFechaSM;

				case 'FechaSR':
					/**
					 * Gets the value for strFechaSR 
					 * @return string
					 */
					return $this->strFechaSR;

				case 'FechaSS':
					/**
					 * Gets the value for strFechaSS 
					 * @return string
					 */
					return $this->strFechaSS;

				case 'FechaTR':
					/**
					 * Gets the value for strFechaTR 
					 * @return string
					 */
					return $this->strFechaTR;

				case 'FechaTU':
					/**
					 * Gets the value for strFechaTU 
					 * @return string
					 */
					return $this->strFechaTU;

				case 'FechaTV':
					/**
					 * Gets the value for strFechaTV 
					 * @return string
					 */
					return $this->strFechaTV;

				case 'FechaVD':
					/**
					 * Gets the value for strFechaVD 
					 * @return string
					 */
					return $this->strFechaVD;

				case 'FechaWM':
					/**
					 * Gets the value for strFechaWM 
					 * @return string
					 */
					return $this->strFechaWM;

				case 'FechaWT':
					/**
					 * Gets the value for strFechaWT 
					 * @return string
					 */
					return $this->strFechaWT;

				case 'FechaWU':
					/**
					 * Gets the value for strFechaWU 
					 * @return string
					 */
					return $this->strFechaWU;

				case 'FechaWX':
					/**
					 * Gets the value for strFechaWX 
					 * @return string
					 */
					return $this->strFechaWX;

				case 'FechaZN':
					/**
					 * Gets the value for strFechaZN 
					 * @return string
					 */
					return $this->strFechaZN;

				case 'FechaZR':
					/**
					 * Gets the value for strFechaZR 
					 * @return string
					 */
					return $this->strFechaZR;


				///////////////////
				// Member Objects
				///////////////////
				case 'Guia':
					/**
					 * Gets the value for the Guia object referenced by strGuiaId (PK)
					 * @return Guia
					 */
					try {
						if ((!$this->objGuia) && (!is_null($this->strGuiaId)))
							$this->objGuia = Guia::Load($this->strGuiaId);
						return $this->objGuia;
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
				case 'GuiaId':
					/**
					 * Sets the value for strGuiaId (PK)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objGuia = null;
						return ($this->strGuiaId = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiClie':
					/**
					 * Sets the value for intCodiClie 
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

				case 'NombRemi':
					/**
					 * Sets the value for strNombRemi 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNombRemi = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechGuia':
					/**
					 * Sets the value for dttFechGuia 
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
					 * Sets the value for strEstaOrig 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEstaOrig = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EstaDest':
					/**
					 * Sets the value for strEstaDest 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEstaDest = QType::Cast($mixValue, QType::String));
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

				case 'FechaAR':
					/**
					 * Sets the value for strFechaAR 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaAR = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaAV':
					/**
					 * Sets the value for strFechaAV 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaAV = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaBC':
					/**
					 * Sets the value for strFechaBC 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaBC = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaBG':
					/**
					 * Sets the value for strFechaBG 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaBG = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaCG':
					/**
					 * Sets the value for strFechaCG 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaCG = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaCS':
					/**
					 * Sets the value for strFechaCS 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaCS = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaDA':
					/**
					 * Sets the value for strFechaDA 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaDA = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaDD':
					/**
					 * Sets the value for strFechaDD 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaDD = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaDE':
					/**
					 * Sets the value for strFechaDE 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaDE = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaDF':
					/**
					 * Sets the value for strFechaDF 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaDF = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaDI':
					/**
					 * Sets the value for strFechaDI 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaDI = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaDM':
					/**
					 * Sets the value for strFechaDM 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaDM = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaDP':
					/**
					 * Sets the value for strFechaDP 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaDP = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaDR':
					/**
					 * Sets the value for strFechaDR 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaDR = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaDV':
					/**
					 * Sets the value for strFechaDV 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaDV = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaEA':
					/**
					 * Sets the value for strFechaEA 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaEA = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaEC':
					/**
					 * Sets the value for strFechaEC 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaEC = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaEE':
					/**
					 * Sets the value for strFechaEE 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaEE = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaEI':
					/**
					 * Sets the value for strFechaEI 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaEI = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaEM':
					/**
					 * Sets the value for strFechaEM 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaEM = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaER':
					/**
					 * Sets the value for strFechaER 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaER = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaEU':
					/**
					 * Sets the value for strFechaEU 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaEU = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaEX':
					/**
					 * Sets the value for strFechaEX 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaEX = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaFA':
					/**
					 * Sets the value for strFechaFA 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaFA = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaFB':
					/**
					 * Sets the value for strFechaFB 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaFB = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaFC':
					/**
					 * Sets the value for strFechaFC 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaFC = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaFE':
					/**
					 * Sets the value for strFechaFE 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaFE = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaFK':
					/**
					 * Sets the value for strFechaFK 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaFK = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaFR':
					/**
					 * Sets the value for strFechaFR 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaFR = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaIC':
					/**
					 * Sets the value for strFechaIC 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaIC = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaKM':
					/**
					 * Sets the value for strFechaKM 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaKM = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaKT':
					/**
					 * Sets the value for strFechaKT 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaKT = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaKU':
					/**
					 * Sets the value for strFechaKU 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaKU = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaKX':
					/**
					 * Sets the value for strFechaKX 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaKX = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaMA':
					/**
					 * Sets the value for strFechaMA 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaMA = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaMD':
					/**
					 * Sets the value for strFechaMD 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaMD = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaMG':
					/**
					 * Sets the value for strFechaMG 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaMG = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaNA':
					/**
					 * Sets the value for strFechaNA 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaNA = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaNC':
					/**
					 * Sets the value for strFechaNC 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaNC = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaNR':
					/**
					 * Sets the value for strFechaNR 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaNR = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaNT':
					/**
					 * Sets the value for strFechaNT 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaNT = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaOE':
					/**
					 * Sets the value for strFechaOE 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaOE = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaOK':
					/**
					 * Sets the value for strFechaOK 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaOK = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaOT':
					/**
					 * Sets the value for strFechaOT 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaOT = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaPA':
					/**
					 * Sets the value for strFechaPA 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaPA = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaPC':
					/**
					 * Sets the value for strFechaPC 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaPC = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaPP':
					/**
					 * Sets the value for strFechaPP 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaPP = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaPS':
					/**
					 * Sets the value for strFechaPS 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaPS = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaPU':
					/**
					 * Sets the value for strFechaPU 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaPU = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaRA':
					/**
					 * Sets the value for strFechaRA 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaRA = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaRC':
					/**
					 * Sets the value for strFechaRC 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaRC = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaRD':
					/**
					 * Sets the value for strFechaRD 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaRD = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaRE':
					/**
					 * Sets the value for strFechaRE 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaRE = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaRK':
					/**
					 * Sets the value for strFechaRK 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaRK = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaRM':
					/**
					 * Sets the value for strFechaRM 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaRM = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaRN':
					/**
					 * Sets the value for strFechaRN 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaRN = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaRR':
					/**
					 * Sets the value for strFechaRR 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaRR = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaRZ':
					/**
					 * Sets the value for strFechaRZ 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaRZ = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaSE':
					/**
					 * Sets the value for strFechaSE 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaSE = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaSF':
					/**
					 * Sets the value for strFechaSF 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaSF = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaSM':
					/**
					 * Sets the value for strFechaSM 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaSM = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaSR':
					/**
					 * Sets the value for strFechaSR 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaSR = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaSS':
					/**
					 * Sets the value for strFechaSS 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaSS = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaTR':
					/**
					 * Sets the value for strFechaTR 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaTR = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaTU':
					/**
					 * Sets the value for strFechaTU 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaTU = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaTV':
					/**
					 * Sets the value for strFechaTV 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaTV = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaVD':
					/**
					 * Sets the value for strFechaVD 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaVD = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaWM':
					/**
					 * Sets the value for strFechaWM 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaWM = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaWT':
					/**
					 * Sets the value for strFechaWT 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaWT = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaWU':
					/**
					 * Sets the value for strFechaWU 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaWU = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaWX':
					/**
					 * Sets the value for strFechaWX 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaWX = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaZN':
					/**
					 * Sets the value for strFechaZN 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaZN = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaZR':
					/**
					 * Sets the value for strFechaZR 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaZR = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Guia':
					/**
					 * Sets the value for the Guia object referenced by strGuiaId (PK)
					 * @param Guia $mixValue
					 * @return Guia
					 */
					if (is_null($mixValue)) {
						$this->strGuiaId = null;
						$this->objGuia = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Guia object
						try {
							$mixValue = QType::Cast($mixValue, 'Guia');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Guia object
						if (is_null($mixValue->NumeGuia))
							throw new QCallerException('Unable to set an unsaved Guia for this GuiaCheckpoints');

						// Update Local Member Variables
						$this->objGuia = $mixValue;
						$this->strGuiaId = $mixValue->NumeGuia;

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
			return "guia_checkpoints";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[GuiaCheckpoints::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="GuiaCheckpoints"><sequence>';
			$strToReturn .= '<element name="Guia" type="xsd1:Guia"/>';
			$strToReturn .= '<element name="CodiClie" type="xsd:int"/>';
			$strToReturn .= '<element name="ClienteId" type="xsd:int"/>';
			$strToReturn .= '<element name="NombRemi" type="xsd:string"/>';
			$strToReturn .= '<element name="FechGuia" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="EstaOrig" type="xsd:string"/>';
			$strToReturn .= '<element name="EstaDest" type="xsd:string"/>';
			$strToReturn .= '<element name="SistemaId" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaAR" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaAV" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaBC" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaBG" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaCG" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaCS" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaDA" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaDD" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaDE" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaDF" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaDI" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaDM" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaDP" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaDR" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaDV" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaEA" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaEC" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaEE" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaEI" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaEM" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaER" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaEU" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaEX" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaFA" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaFB" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaFC" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaFE" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaFK" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaFR" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaIC" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaKM" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaKT" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaKU" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaKX" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaMA" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaMD" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaMG" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaNA" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaNC" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaNR" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaNT" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaOE" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaOK" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaOT" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaPA" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaPC" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaPP" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaPS" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaPU" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaRA" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaRC" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaRD" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaRE" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaRK" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaRM" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaRN" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaRR" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaRZ" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaSE" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaSF" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaSM" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaSR" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaSS" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaTR" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaTU" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaTV" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaVD" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaWM" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaWT" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaWU" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaWX" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaZN" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaZR" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('GuiaCheckpoints', $strComplexTypeArray)) {
				$strComplexTypeArray['GuiaCheckpoints'] = GuiaCheckpoints::GetSoapComplexTypeXml();
				Guia::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, GuiaCheckpoints::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new GuiaCheckpoints();
			if ((property_exists($objSoapObject, 'Guia')) &&
				($objSoapObject->Guia))
				$objToReturn->Guia = Guia::GetObjectFromSoapObject($objSoapObject->Guia);
			if (property_exists($objSoapObject, 'CodiClie'))
				$objToReturn->intCodiClie = $objSoapObject->CodiClie;
			if (property_exists($objSoapObject, 'ClienteId'))
				$objToReturn->intClienteId = $objSoapObject->ClienteId;
			if (property_exists($objSoapObject, 'NombRemi'))
				$objToReturn->strNombRemi = $objSoapObject->NombRemi;
			if (property_exists($objSoapObject, 'FechGuia'))
				$objToReturn->dttFechGuia = new QDateTime($objSoapObject->FechGuia);
			if (property_exists($objSoapObject, 'EstaOrig'))
				$objToReturn->strEstaOrig = $objSoapObject->EstaOrig;
			if (property_exists($objSoapObject, 'EstaDest'))
				$objToReturn->strEstaDest = $objSoapObject->EstaDest;
			if (property_exists($objSoapObject, 'SistemaId'))
				$objToReturn->strSistemaId = $objSoapObject->SistemaId;
			if (property_exists($objSoapObject, 'FechaAR'))
				$objToReturn->strFechaAR = $objSoapObject->FechaAR;
			if (property_exists($objSoapObject, 'FechaAV'))
				$objToReturn->strFechaAV = $objSoapObject->FechaAV;
			if (property_exists($objSoapObject, 'FechaBC'))
				$objToReturn->strFechaBC = $objSoapObject->FechaBC;
			if (property_exists($objSoapObject, 'FechaBG'))
				$objToReturn->strFechaBG = $objSoapObject->FechaBG;
			if (property_exists($objSoapObject, 'FechaCG'))
				$objToReturn->strFechaCG = $objSoapObject->FechaCG;
			if (property_exists($objSoapObject, 'FechaCS'))
				$objToReturn->strFechaCS = $objSoapObject->FechaCS;
			if (property_exists($objSoapObject, 'FechaDA'))
				$objToReturn->strFechaDA = $objSoapObject->FechaDA;
			if (property_exists($objSoapObject, 'FechaDD'))
				$objToReturn->strFechaDD = $objSoapObject->FechaDD;
			if (property_exists($objSoapObject, 'FechaDE'))
				$objToReturn->strFechaDE = $objSoapObject->FechaDE;
			if (property_exists($objSoapObject, 'FechaDF'))
				$objToReturn->strFechaDF = $objSoapObject->FechaDF;
			if (property_exists($objSoapObject, 'FechaDI'))
				$objToReturn->strFechaDI = $objSoapObject->FechaDI;
			if (property_exists($objSoapObject, 'FechaDM'))
				$objToReturn->strFechaDM = $objSoapObject->FechaDM;
			if (property_exists($objSoapObject, 'FechaDP'))
				$objToReturn->strFechaDP = $objSoapObject->FechaDP;
			if (property_exists($objSoapObject, 'FechaDR'))
				$objToReturn->strFechaDR = $objSoapObject->FechaDR;
			if (property_exists($objSoapObject, 'FechaDV'))
				$objToReturn->strFechaDV = $objSoapObject->FechaDV;
			if (property_exists($objSoapObject, 'FechaEA'))
				$objToReturn->strFechaEA = $objSoapObject->FechaEA;
			if (property_exists($objSoapObject, 'FechaEC'))
				$objToReturn->strFechaEC = $objSoapObject->FechaEC;
			if (property_exists($objSoapObject, 'FechaEE'))
				$objToReturn->strFechaEE = $objSoapObject->FechaEE;
			if (property_exists($objSoapObject, 'FechaEI'))
				$objToReturn->strFechaEI = $objSoapObject->FechaEI;
			if (property_exists($objSoapObject, 'FechaEM'))
				$objToReturn->strFechaEM = $objSoapObject->FechaEM;
			if (property_exists($objSoapObject, 'FechaER'))
				$objToReturn->strFechaER = $objSoapObject->FechaER;
			if (property_exists($objSoapObject, 'FechaEU'))
				$objToReturn->strFechaEU = $objSoapObject->FechaEU;
			if (property_exists($objSoapObject, 'FechaEX'))
				$objToReturn->strFechaEX = $objSoapObject->FechaEX;
			if (property_exists($objSoapObject, 'FechaFA'))
				$objToReturn->strFechaFA = $objSoapObject->FechaFA;
			if (property_exists($objSoapObject, 'FechaFB'))
				$objToReturn->strFechaFB = $objSoapObject->FechaFB;
			if (property_exists($objSoapObject, 'FechaFC'))
				$objToReturn->strFechaFC = $objSoapObject->FechaFC;
			if (property_exists($objSoapObject, 'FechaFE'))
				$objToReturn->strFechaFE = $objSoapObject->FechaFE;
			if (property_exists($objSoapObject, 'FechaFK'))
				$objToReturn->strFechaFK = $objSoapObject->FechaFK;
			if (property_exists($objSoapObject, 'FechaFR'))
				$objToReturn->strFechaFR = $objSoapObject->FechaFR;
			if (property_exists($objSoapObject, 'FechaIC'))
				$objToReturn->strFechaIC = $objSoapObject->FechaIC;
			if (property_exists($objSoapObject, 'FechaKM'))
				$objToReturn->strFechaKM = $objSoapObject->FechaKM;
			if (property_exists($objSoapObject, 'FechaKT'))
				$objToReturn->strFechaKT = $objSoapObject->FechaKT;
			if (property_exists($objSoapObject, 'FechaKU'))
				$objToReturn->strFechaKU = $objSoapObject->FechaKU;
			if (property_exists($objSoapObject, 'FechaKX'))
				$objToReturn->strFechaKX = $objSoapObject->FechaKX;
			if (property_exists($objSoapObject, 'FechaMA'))
				$objToReturn->strFechaMA = $objSoapObject->FechaMA;
			if (property_exists($objSoapObject, 'FechaMD'))
				$objToReturn->strFechaMD = $objSoapObject->FechaMD;
			if (property_exists($objSoapObject, 'FechaMG'))
				$objToReturn->strFechaMG = $objSoapObject->FechaMG;
			if (property_exists($objSoapObject, 'FechaNA'))
				$objToReturn->strFechaNA = $objSoapObject->FechaNA;
			if (property_exists($objSoapObject, 'FechaNC'))
				$objToReturn->strFechaNC = $objSoapObject->FechaNC;
			if (property_exists($objSoapObject, 'FechaNR'))
				$objToReturn->strFechaNR = $objSoapObject->FechaNR;
			if (property_exists($objSoapObject, 'FechaNT'))
				$objToReturn->strFechaNT = $objSoapObject->FechaNT;
			if (property_exists($objSoapObject, 'FechaOE'))
				$objToReturn->strFechaOE = $objSoapObject->FechaOE;
			if (property_exists($objSoapObject, 'FechaOK'))
				$objToReturn->strFechaOK = $objSoapObject->FechaOK;
			if (property_exists($objSoapObject, 'FechaOT'))
				$objToReturn->strFechaOT = $objSoapObject->FechaOT;
			if (property_exists($objSoapObject, 'FechaPA'))
				$objToReturn->strFechaPA = $objSoapObject->FechaPA;
			if (property_exists($objSoapObject, 'FechaPC'))
				$objToReturn->strFechaPC = $objSoapObject->FechaPC;
			if (property_exists($objSoapObject, 'FechaPP'))
				$objToReturn->strFechaPP = $objSoapObject->FechaPP;
			if (property_exists($objSoapObject, 'FechaPS'))
				$objToReturn->strFechaPS = $objSoapObject->FechaPS;
			if (property_exists($objSoapObject, 'FechaPU'))
				$objToReturn->strFechaPU = $objSoapObject->FechaPU;
			if (property_exists($objSoapObject, 'FechaRA'))
				$objToReturn->strFechaRA = $objSoapObject->FechaRA;
			if (property_exists($objSoapObject, 'FechaRC'))
				$objToReturn->strFechaRC = $objSoapObject->FechaRC;
			if (property_exists($objSoapObject, 'FechaRD'))
				$objToReturn->strFechaRD = $objSoapObject->FechaRD;
			if (property_exists($objSoapObject, 'FechaRE'))
				$objToReturn->strFechaRE = $objSoapObject->FechaRE;
			if (property_exists($objSoapObject, 'FechaRK'))
				$objToReturn->strFechaRK = $objSoapObject->FechaRK;
			if (property_exists($objSoapObject, 'FechaRM'))
				$objToReturn->strFechaRM = $objSoapObject->FechaRM;
			if (property_exists($objSoapObject, 'FechaRN'))
				$objToReturn->strFechaRN = $objSoapObject->FechaRN;
			if (property_exists($objSoapObject, 'FechaRR'))
				$objToReturn->strFechaRR = $objSoapObject->FechaRR;
			if (property_exists($objSoapObject, 'FechaRZ'))
				$objToReturn->strFechaRZ = $objSoapObject->FechaRZ;
			if (property_exists($objSoapObject, 'FechaSE'))
				$objToReturn->strFechaSE = $objSoapObject->FechaSE;
			if (property_exists($objSoapObject, 'FechaSF'))
				$objToReturn->strFechaSF = $objSoapObject->FechaSF;
			if (property_exists($objSoapObject, 'FechaSM'))
				$objToReturn->strFechaSM = $objSoapObject->FechaSM;
			if (property_exists($objSoapObject, 'FechaSR'))
				$objToReturn->strFechaSR = $objSoapObject->FechaSR;
			if (property_exists($objSoapObject, 'FechaSS'))
				$objToReturn->strFechaSS = $objSoapObject->FechaSS;
			if (property_exists($objSoapObject, 'FechaTR'))
				$objToReturn->strFechaTR = $objSoapObject->FechaTR;
			if (property_exists($objSoapObject, 'FechaTU'))
				$objToReturn->strFechaTU = $objSoapObject->FechaTU;
			if (property_exists($objSoapObject, 'FechaTV'))
				$objToReturn->strFechaTV = $objSoapObject->FechaTV;
			if (property_exists($objSoapObject, 'FechaVD'))
				$objToReturn->strFechaVD = $objSoapObject->FechaVD;
			if (property_exists($objSoapObject, 'FechaWM'))
				$objToReturn->strFechaWM = $objSoapObject->FechaWM;
			if (property_exists($objSoapObject, 'FechaWT'))
				$objToReturn->strFechaWT = $objSoapObject->FechaWT;
			if (property_exists($objSoapObject, 'FechaWU'))
				$objToReturn->strFechaWU = $objSoapObject->FechaWU;
			if (property_exists($objSoapObject, 'FechaWX'))
				$objToReturn->strFechaWX = $objSoapObject->FechaWX;
			if (property_exists($objSoapObject, 'FechaZN'))
				$objToReturn->strFechaZN = $objSoapObject->FechaZN;
			if (property_exists($objSoapObject, 'FechaZR'))
				$objToReturn->strFechaZR = $objSoapObject->FechaZR;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, GuiaCheckpoints::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objGuia)
				$objObject->objGuia = Guia::GetSoapObjectFromObject($objObject->objGuia, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strGuiaId = null;
			if ($objObject->dttFechGuia)
				$objObject->dttFechGuia = $objObject->dttFechGuia->qFormat(QDateTime::FormatSoap);
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
			$iArray['GuiaId'] = $this->strGuiaId;
			$iArray['CodiClie'] = $this->intCodiClie;
			$iArray['ClienteId'] = $this->intClienteId;
			$iArray['NombRemi'] = $this->strNombRemi;
			$iArray['FechGuia'] = $this->dttFechGuia;
			$iArray['EstaOrig'] = $this->strEstaOrig;
			$iArray['EstaDest'] = $this->strEstaDest;
			$iArray['SistemaId'] = $this->strSistemaId;
			$iArray['FechaAR'] = $this->strFechaAR;
			$iArray['FechaAV'] = $this->strFechaAV;
			$iArray['FechaBC'] = $this->strFechaBC;
			$iArray['FechaBG'] = $this->strFechaBG;
			$iArray['FechaCG'] = $this->strFechaCG;
			$iArray['FechaCS'] = $this->strFechaCS;
			$iArray['FechaDA'] = $this->strFechaDA;
			$iArray['FechaDD'] = $this->strFechaDD;
			$iArray['FechaDE'] = $this->strFechaDE;
			$iArray['FechaDF'] = $this->strFechaDF;
			$iArray['FechaDI'] = $this->strFechaDI;
			$iArray['FechaDM'] = $this->strFechaDM;
			$iArray['FechaDP'] = $this->strFechaDP;
			$iArray['FechaDR'] = $this->strFechaDR;
			$iArray['FechaDV'] = $this->strFechaDV;
			$iArray['FechaEA'] = $this->strFechaEA;
			$iArray['FechaEC'] = $this->strFechaEC;
			$iArray['FechaEE'] = $this->strFechaEE;
			$iArray['FechaEI'] = $this->strFechaEI;
			$iArray['FechaEM'] = $this->strFechaEM;
			$iArray['FechaER'] = $this->strFechaER;
			$iArray['FechaEU'] = $this->strFechaEU;
			$iArray['FechaEX'] = $this->strFechaEX;
			$iArray['FechaFA'] = $this->strFechaFA;
			$iArray['FechaFB'] = $this->strFechaFB;
			$iArray['FechaFC'] = $this->strFechaFC;
			$iArray['FechaFE'] = $this->strFechaFE;
			$iArray['FechaFK'] = $this->strFechaFK;
			$iArray['FechaFR'] = $this->strFechaFR;
			$iArray['FechaIC'] = $this->strFechaIC;
			$iArray['FechaKM'] = $this->strFechaKM;
			$iArray['FechaKT'] = $this->strFechaKT;
			$iArray['FechaKU'] = $this->strFechaKU;
			$iArray['FechaKX'] = $this->strFechaKX;
			$iArray['FechaMA'] = $this->strFechaMA;
			$iArray['FechaMD'] = $this->strFechaMD;
			$iArray['FechaMG'] = $this->strFechaMG;
			$iArray['FechaNA'] = $this->strFechaNA;
			$iArray['FechaNC'] = $this->strFechaNC;
			$iArray['FechaNR'] = $this->strFechaNR;
			$iArray['FechaNT'] = $this->strFechaNT;
			$iArray['FechaOE'] = $this->strFechaOE;
			$iArray['FechaOK'] = $this->strFechaOK;
			$iArray['FechaOT'] = $this->strFechaOT;
			$iArray['FechaPA'] = $this->strFechaPA;
			$iArray['FechaPC'] = $this->strFechaPC;
			$iArray['FechaPP'] = $this->strFechaPP;
			$iArray['FechaPS'] = $this->strFechaPS;
			$iArray['FechaPU'] = $this->strFechaPU;
			$iArray['FechaRA'] = $this->strFechaRA;
			$iArray['FechaRC'] = $this->strFechaRC;
			$iArray['FechaRD'] = $this->strFechaRD;
			$iArray['FechaRE'] = $this->strFechaRE;
			$iArray['FechaRK'] = $this->strFechaRK;
			$iArray['FechaRM'] = $this->strFechaRM;
			$iArray['FechaRN'] = $this->strFechaRN;
			$iArray['FechaRR'] = $this->strFechaRR;
			$iArray['FechaRZ'] = $this->strFechaRZ;
			$iArray['FechaSE'] = $this->strFechaSE;
			$iArray['FechaSF'] = $this->strFechaSF;
			$iArray['FechaSM'] = $this->strFechaSM;
			$iArray['FechaSR'] = $this->strFechaSR;
			$iArray['FechaSS'] = $this->strFechaSS;
			$iArray['FechaTR'] = $this->strFechaTR;
			$iArray['FechaTU'] = $this->strFechaTU;
			$iArray['FechaTV'] = $this->strFechaTV;
			$iArray['FechaVD'] = $this->strFechaVD;
			$iArray['FechaWM'] = $this->strFechaWM;
			$iArray['FechaWT'] = $this->strFechaWT;
			$iArray['FechaWU'] = $this->strFechaWU;
			$iArray['FechaWX'] = $this->strFechaWX;
			$iArray['FechaZN'] = $this->strFechaZN;
			$iArray['FechaZR'] = $this->strFechaZR;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->strGuiaId ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $GuiaId
     * @property-read QQNodeGuia $Guia
     * @property-read QQNode $CodiClie
     * @property-read QQNode $ClienteId
     * @property-read QQNode $NombRemi
     * @property-read QQNode $FechGuia
     * @property-read QQNode $EstaOrig
     * @property-read QQNode $EstaDest
     * @property-read QQNode $SistemaId
     * @property-read QQNode $FechaAR
     * @property-read QQNode $FechaAV
     * @property-read QQNode $FechaBC
     * @property-read QQNode $FechaBG
     * @property-read QQNode $FechaCG
     * @property-read QQNode $FechaCS
     * @property-read QQNode $FechaDA
     * @property-read QQNode $FechaDD
     * @property-read QQNode $FechaDE
     * @property-read QQNode $FechaDF
     * @property-read QQNode $FechaDI
     * @property-read QQNode $FechaDM
     * @property-read QQNode $FechaDP
     * @property-read QQNode $FechaDR
     * @property-read QQNode $FechaDV
     * @property-read QQNode $FechaEA
     * @property-read QQNode $FechaEC
     * @property-read QQNode $FechaEE
     * @property-read QQNode $FechaEI
     * @property-read QQNode $FechaEM
     * @property-read QQNode $FechaER
     * @property-read QQNode $FechaEU
     * @property-read QQNode $FechaEX
     * @property-read QQNode $FechaFA
     * @property-read QQNode $FechaFB
     * @property-read QQNode $FechaFC
     * @property-read QQNode $FechaFE
     * @property-read QQNode $FechaFK
     * @property-read QQNode $FechaFR
     * @property-read QQNode $FechaIC
     * @property-read QQNode $FechaKM
     * @property-read QQNode $FechaKT
     * @property-read QQNode $FechaKU
     * @property-read QQNode $FechaKX
     * @property-read QQNode $FechaMA
     * @property-read QQNode $FechaMD
     * @property-read QQNode $FechaMG
     * @property-read QQNode $FechaNA
     * @property-read QQNode $FechaNC
     * @property-read QQNode $FechaNR
     * @property-read QQNode $FechaNT
     * @property-read QQNode $FechaOE
     * @property-read QQNode $FechaOK
     * @property-read QQNode $FechaOT
     * @property-read QQNode $FechaPA
     * @property-read QQNode $FechaPC
     * @property-read QQNode $FechaPP
     * @property-read QQNode $FechaPS
     * @property-read QQNode $FechaPU
     * @property-read QQNode $FechaRA
     * @property-read QQNode $FechaRC
     * @property-read QQNode $FechaRD
     * @property-read QQNode $FechaRE
     * @property-read QQNode $FechaRK
     * @property-read QQNode $FechaRM
     * @property-read QQNode $FechaRN
     * @property-read QQNode $FechaRR
     * @property-read QQNode $FechaRZ
     * @property-read QQNode $FechaSE
     * @property-read QQNode $FechaSF
     * @property-read QQNode $FechaSM
     * @property-read QQNode $FechaSR
     * @property-read QQNode $FechaSS
     * @property-read QQNode $FechaTR
     * @property-read QQNode $FechaTU
     * @property-read QQNode $FechaTV
     * @property-read QQNode $FechaVD
     * @property-read QQNode $FechaWM
     * @property-read QQNode $FechaWT
     * @property-read QQNode $FechaWU
     * @property-read QQNode $FechaWX
     * @property-read QQNode $FechaZN
     * @property-read QQNode $FechaZR
     *
     *

     * @property-read QQNodeGuia $_PrimaryKeyNode
     **/
	class QQNodeGuiaCheckpoints extends QQNode {
		protected $strTableName = 'guia_checkpoints';
		protected $strPrimaryKey = 'guia_id';
		protected $strClassName = 'GuiaCheckpoints';
		public function __get($strName) {
			switch ($strName) {
				case 'GuiaId':
					return new QQNode('guia_id', 'GuiaId', 'VarChar', $this);
				case 'Guia':
					return new QQNodeGuia('guia_id', 'Guia', 'VarChar', $this);
				case 'CodiClie':
					return new QQNode('codi_clie', 'CodiClie', 'Integer', $this);
				case 'ClienteId':
					return new QQNode('cliente_id', 'ClienteId', 'Integer', $this);
				case 'NombRemi':
					return new QQNode('nomb_remi', 'NombRemi', 'VarChar', $this);
				case 'FechGuia':
					return new QQNode('fech_guia', 'FechGuia', 'Date', $this);
				case 'EstaOrig':
					return new QQNode('esta_orig', 'EstaOrig', 'VarChar', $this);
				case 'EstaDest':
					return new QQNode('esta_dest', 'EstaDest', 'VarChar', $this);
				case 'SistemaId':
					return new QQNode('sistema_id', 'SistemaId', 'VarChar', $this);
				case 'FechaAR':
					return new QQNode('fecha_AR', 'FechaAR', 'VarChar', $this);
				case 'FechaAV':
					return new QQNode('fecha_AV', 'FechaAV', 'VarChar', $this);
				case 'FechaBC':
					return new QQNode('fecha_BC', 'FechaBC', 'VarChar', $this);
				case 'FechaBG':
					return new QQNode('fecha_BG', 'FechaBG', 'VarChar', $this);
				case 'FechaCG':
					return new QQNode('fecha_CG', 'FechaCG', 'VarChar', $this);
				case 'FechaCS':
					return new QQNode('fecha_CS', 'FechaCS', 'VarChar', $this);
				case 'FechaDA':
					return new QQNode('fecha_DA', 'FechaDA', 'VarChar', $this);
				case 'FechaDD':
					return new QQNode('fecha_DD', 'FechaDD', 'VarChar', $this);
				case 'FechaDE':
					return new QQNode('fecha_DE', 'FechaDE', 'VarChar', $this);
				case 'FechaDF':
					return new QQNode('fecha_DF', 'FechaDF', 'VarChar', $this);
				case 'FechaDI':
					return new QQNode('fecha_DI', 'FechaDI', 'VarChar', $this);
				case 'FechaDM':
					return new QQNode('fecha_DM', 'FechaDM', 'VarChar', $this);
				case 'FechaDP':
					return new QQNode('fecha_DP', 'FechaDP', 'VarChar', $this);
				case 'FechaDR':
					return new QQNode('fecha_DR', 'FechaDR', 'VarChar', $this);
				case 'FechaDV':
					return new QQNode('fecha_DV', 'FechaDV', 'VarChar', $this);
				case 'FechaEA':
					return new QQNode('fecha_EA', 'FechaEA', 'VarChar', $this);
				case 'FechaEC':
					return new QQNode('fecha_EC', 'FechaEC', 'VarChar', $this);
				case 'FechaEE':
					return new QQNode('fecha_EE', 'FechaEE', 'VarChar', $this);
				case 'FechaEI':
					return new QQNode('fecha_EI', 'FechaEI', 'VarChar', $this);
				case 'FechaEM':
					return new QQNode('fecha_EM', 'FechaEM', 'VarChar', $this);
				case 'FechaER':
					return new QQNode('fecha_ER', 'FechaER', 'VarChar', $this);
				case 'FechaEU':
					return new QQNode('fecha_EU', 'FechaEU', 'VarChar', $this);
				case 'FechaEX':
					return new QQNode('fecha_EX', 'FechaEX', 'VarChar', $this);
				case 'FechaFA':
					return new QQNode('fecha_FA', 'FechaFA', 'VarChar', $this);
				case 'FechaFB':
					return new QQNode('fecha_FB', 'FechaFB', 'VarChar', $this);
				case 'FechaFC':
					return new QQNode('fecha_FC', 'FechaFC', 'VarChar', $this);
				case 'FechaFE':
					return new QQNode('fecha_FE', 'FechaFE', 'VarChar', $this);
				case 'FechaFK':
					return new QQNode('fecha_FK', 'FechaFK', 'VarChar', $this);
				case 'FechaFR':
					return new QQNode('fecha_FR', 'FechaFR', 'VarChar', $this);
				case 'FechaIC':
					return new QQNode('fecha_IC', 'FechaIC', 'VarChar', $this);
				case 'FechaKM':
					return new QQNode('fecha_KM', 'FechaKM', 'VarChar', $this);
				case 'FechaKT':
					return new QQNode('fecha_KT', 'FechaKT', 'VarChar', $this);
				case 'FechaKU':
					return new QQNode('fecha_KU', 'FechaKU', 'VarChar', $this);
				case 'FechaKX':
					return new QQNode('fecha_KX', 'FechaKX', 'VarChar', $this);
				case 'FechaMA':
					return new QQNode('fecha_MA', 'FechaMA', 'VarChar', $this);
				case 'FechaMD':
					return new QQNode('fecha_MD', 'FechaMD', 'VarChar', $this);
				case 'FechaMG':
					return new QQNode('fecha_MG', 'FechaMG', 'VarChar', $this);
				case 'FechaNA':
					return new QQNode('fecha_NA', 'FechaNA', 'VarChar', $this);
				case 'FechaNC':
					return new QQNode('fecha_NC', 'FechaNC', 'VarChar', $this);
				case 'FechaNR':
					return new QQNode('fecha_NR', 'FechaNR', 'VarChar', $this);
				case 'FechaNT':
					return new QQNode('fecha_NT', 'FechaNT', 'VarChar', $this);
				case 'FechaOE':
					return new QQNode('fecha_OE', 'FechaOE', 'VarChar', $this);
				case 'FechaOK':
					return new QQNode('fecha_OK', 'FechaOK', 'VarChar', $this);
				case 'FechaOT':
					return new QQNode('fecha_OT', 'FechaOT', 'VarChar', $this);
				case 'FechaPA':
					return new QQNode('fecha_PA', 'FechaPA', 'VarChar', $this);
				case 'FechaPC':
					return new QQNode('fecha_PC', 'FechaPC', 'VarChar', $this);
				case 'FechaPP':
					return new QQNode('fecha_PP', 'FechaPP', 'VarChar', $this);
				case 'FechaPS':
					return new QQNode('fecha_PS', 'FechaPS', 'VarChar', $this);
				case 'FechaPU':
					return new QQNode('fecha_PU', 'FechaPU', 'VarChar', $this);
				case 'FechaRA':
					return new QQNode('fecha_RA', 'FechaRA', 'VarChar', $this);
				case 'FechaRC':
					return new QQNode('fecha_RC', 'FechaRC', 'VarChar', $this);
				case 'FechaRD':
					return new QQNode('fecha_RD', 'FechaRD', 'VarChar', $this);
				case 'FechaRE':
					return new QQNode('fecha_RE', 'FechaRE', 'VarChar', $this);
				case 'FechaRK':
					return new QQNode('fecha_RK', 'FechaRK', 'VarChar', $this);
				case 'FechaRM':
					return new QQNode('fecha_RM', 'FechaRM', 'VarChar', $this);
				case 'FechaRN':
					return new QQNode('fecha_RN', 'FechaRN', 'VarChar', $this);
				case 'FechaRR':
					return new QQNode('fecha_RR', 'FechaRR', 'VarChar', $this);
				case 'FechaRZ':
					return new QQNode('fecha_RZ', 'FechaRZ', 'VarChar', $this);
				case 'FechaSE':
					return new QQNode('fecha_SE', 'FechaSE', 'VarChar', $this);
				case 'FechaSF':
					return new QQNode('fecha_SF', 'FechaSF', 'VarChar', $this);
				case 'FechaSM':
					return new QQNode('fecha_SM', 'FechaSM', 'VarChar', $this);
				case 'FechaSR':
					return new QQNode('fecha_SR', 'FechaSR', 'VarChar', $this);
				case 'FechaSS':
					return new QQNode('fecha_SS', 'FechaSS', 'VarChar', $this);
				case 'FechaTR':
					return new QQNode('fecha_TR', 'FechaTR', 'VarChar', $this);
				case 'FechaTU':
					return new QQNode('fecha_TU', 'FechaTU', 'VarChar', $this);
				case 'FechaTV':
					return new QQNode('fecha_TV', 'FechaTV', 'VarChar', $this);
				case 'FechaVD':
					return new QQNode('fecha_VD', 'FechaVD', 'VarChar', $this);
				case 'FechaWM':
					return new QQNode('fecha_WM', 'FechaWM', 'VarChar', $this);
				case 'FechaWT':
					return new QQNode('fecha_WT', 'FechaWT', 'VarChar', $this);
				case 'FechaWU':
					return new QQNode('fecha_WU', 'FechaWU', 'VarChar', $this);
				case 'FechaWX':
					return new QQNode('fecha_WX', 'FechaWX', 'VarChar', $this);
				case 'FechaZN':
					return new QQNode('fecha_ZN', 'FechaZN', 'VarChar', $this);
				case 'FechaZR':
					return new QQNode('fecha_ZR', 'FechaZR', 'VarChar', $this);

				case '_PrimaryKeyNode':
					return new QQNodeGuia('guia_id', 'GuiaId', 'VarChar', $this);
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
     * @property-read QQNode $GuiaId
     * @property-read QQNodeGuia $Guia
     * @property-read QQNode $CodiClie
     * @property-read QQNode $ClienteId
     * @property-read QQNode $NombRemi
     * @property-read QQNode $FechGuia
     * @property-read QQNode $EstaOrig
     * @property-read QQNode $EstaDest
     * @property-read QQNode $SistemaId
     * @property-read QQNode $FechaAR
     * @property-read QQNode $FechaAV
     * @property-read QQNode $FechaBC
     * @property-read QQNode $FechaBG
     * @property-read QQNode $FechaCG
     * @property-read QQNode $FechaCS
     * @property-read QQNode $FechaDA
     * @property-read QQNode $FechaDD
     * @property-read QQNode $FechaDE
     * @property-read QQNode $FechaDF
     * @property-read QQNode $FechaDI
     * @property-read QQNode $FechaDM
     * @property-read QQNode $FechaDP
     * @property-read QQNode $FechaDR
     * @property-read QQNode $FechaDV
     * @property-read QQNode $FechaEA
     * @property-read QQNode $FechaEC
     * @property-read QQNode $FechaEE
     * @property-read QQNode $FechaEI
     * @property-read QQNode $FechaEM
     * @property-read QQNode $FechaER
     * @property-read QQNode $FechaEU
     * @property-read QQNode $FechaEX
     * @property-read QQNode $FechaFA
     * @property-read QQNode $FechaFB
     * @property-read QQNode $FechaFC
     * @property-read QQNode $FechaFE
     * @property-read QQNode $FechaFK
     * @property-read QQNode $FechaFR
     * @property-read QQNode $FechaIC
     * @property-read QQNode $FechaKM
     * @property-read QQNode $FechaKT
     * @property-read QQNode $FechaKU
     * @property-read QQNode $FechaKX
     * @property-read QQNode $FechaMA
     * @property-read QQNode $FechaMD
     * @property-read QQNode $FechaMG
     * @property-read QQNode $FechaNA
     * @property-read QQNode $FechaNC
     * @property-read QQNode $FechaNR
     * @property-read QQNode $FechaNT
     * @property-read QQNode $FechaOE
     * @property-read QQNode $FechaOK
     * @property-read QQNode $FechaOT
     * @property-read QQNode $FechaPA
     * @property-read QQNode $FechaPC
     * @property-read QQNode $FechaPP
     * @property-read QQNode $FechaPS
     * @property-read QQNode $FechaPU
     * @property-read QQNode $FechaRA
     * @property-read QQNode $FechaRC
     * @property-read QQNode $FechaRD
     * @property-read QQNode $FechaRE
     * @property-read QQNode $FechaRK
     * @property-read QQNode $FechaRM
     * @property-read QQNode $FechaRN
     * @property-read QQNode $FechaRR
     * @property-read QQNode $FechaRZ
     * @property-read QQNode $FechaSE
     * @property-read QQNode $FechaSF
     * @property-read QQNode $FechaSM
     * @property-read QQNode $FechaSR
     * @property-read QQNode $FechaSS
     * @property-read QQNode $FechaTR
     * @property-read QQNode $FechaTU
     * @property-read QQNode $FechaTV
     * @property-read QQNode $FechaVD
     * @property-read QQNode $FechaWM
     * @property-read QQNode $FechaWT
     * @property-read QQNode $FechaWU
     * @property-read QQNode $FechaWX
     * @property-read QQNode $FechaZN
     * @property-read QQNode $FechaZR
     *
     *

     * @property-read QQNodeGuia $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeGuiaCheckpoints extends QQReverseReferenceNode {
		protected $strTableName = 'guia_checkpoints';
		protected $strPrimaryKey = 'guia_id';
		protected $strClassName = 'GuiaCheckpoints';
		public function __get($strName) {
			switch ($strName) {
				case 'GuiaId':
					return new QQNode('guia_id', 'GuiaId', 'string', $this);
				case 'Guia':
					return new QQNodeGuia('guia_id', 'Guia', 'string', $this);
				case 'CodiClie':
					return new QQNode('codi_clie', 'CodiClie', 'integer', $this);
				case 'ClienteId':
					return new QQNode('cliente_id', 'ClienteId', 'integer', $this);
				case 'NombRemi':
					return new QQNode('nomb_remi', 'NombRemi', 'string', $this);
				case 'FechGuia':
					return new QQNode('fech_guia', 'FechGuia', 'QDateTime', $this);
				case 'EstaOrig':
					return new QQNode('esta_orig', 'EstaOrig', 'string', $this);
				case 'EstaDest':
					return new QQNode('esta_dest', 'EstaDest', 'string', $this);
				case 'SistemaId':
					return new QQNode('sistema_id', 'SistemaId', 'string', $this);
				case 'FechaAR':
					return new QQNode('fecha_AR', 'FechaAR', 'string', $this);
				case 'FechaAV':
					return new QQNode('fecha_AV', 'FechaAV', 'string', $this);
				case 'FechaBC':
					return new QQNode('fecha_BC', 'FechaBC', 'string', $this);
				case 'FechaBG':
					return new QQNode('fecha_BG', 'FechaBG', 'string', $this);
				case 'FechaCG':
					return new QQNode('fecha_CG', 'FechaCG', 'string', $this);
				case 'FechaCS':
					return new QQNode('fecha_CS', 'FechaCS', 'string', $this);
				case 'FechaDA':
					return new QQNode('fecha_DA', 'FechaDA', 'string', $this);
				case 'FechaDD':
					return new QQNode('fecha_DD', 'FechaDD', 'string', $this);
				case 'FechaDE':
					return new QQNode('fecha_DE', 'FechaDE', 'string', $this);
				case 'FechaDF':
					return new QQNode('fecha_DF', 'FechaDF', 'string', $this);
				case 'FechaDI':
					return new QQNode('fecha_DI', 'FechaDI', 'string', $this);
				case 'FechaDM':
					return new QQNode('fecha_DM', 'FechaDM', 'string', $this);
				case 'FechaDP':
					return new QQNode('fecha_DP', 'FechaDP', 'string', $this);
				case 'FechaDR':
					return new QQNode('fecha_DR', 'FechaDR', 'string', $this);
				case 'FechaDV':
					return new QQNode('fecha_DV', 'FechaDV', 'string', $this);
				case 'FechaEA':
					return new QQNode('fecha_EA', 'FechaEA', 'string', $this);
				case 'FechaEC':
					return new QQNode('fecha_EC', 'FechaEC', 'string', $this);
				case 'FechaEE':
					return new QQNode('fecha_EE', 'FechaEE', 'string', $this);
				case 'FechaEI':
					return new QQNode('fecha_EI', 'FechaEI', 'string', $this);
				case 'FechaEM':
					return new QQNode('fecha_EM', 'FechaEM', 'string', $this);
				case 'FechaER':
					return new QQNode('fecha_ER', 'FechaER', 'string', $this);
				case 'FechaEU':
					return new QQNode('fecha_EU', 'FechaEU', 'string', $this);
				case 'FechaEX':
					return new QQNode('fecha_EX', 'FechaEX', 'string', $this);
				case 'FechaFA':
					return new QQNode('fecha_FA', 'FechaFA', 'string', $this);
				case 'FechaFB':
					return new QQNode('fecha_FB', 'FechaFB', 'string', $this);
				case 'FechaFC':
					return new QQNode('fecha_FC', 'FechaFC', 'string', $this);
				case 'FechaFE':
					return new QQNode('fecha_FE', 'FechaFE', 'string', $this);
				case 'FechaFK':
					return new QQNode('fecha_FK', 'FechaFK', 'string', $this);
				case 'FechaFR':
					return new QQNode('fecha_FR', 'FechaFR', 'string', $this);
				case 'FechaIC':
					return new QQNode('fecha_IC', 'FechaIC', 'string', $this);
				case 'FechaKM':
					return new QQNode('fecha_KM', 'FechaKM', 'string', $this);
				case 'FechaKT':
					return new QQNode('fecha_KT', 'FechaKT', 'string', $this);
				case 'FechaKU':
					return new QQNode('fecha_KU', 'FechaKU', 'string', $this);
				case 'FechaKX':
					return new QQNode('fecha_KX', 'FechaKX', 'string', $this);
				case 'FechaMA':
					return new QQNode('fecha_MA', 'FechaMA', 'string', $this);
				case 'FechaMD':
					return new QQNode('fecha_MD', 'FechaMD', 'string', $this);
				case 'FechaMG':
					return new QQNode('fecha_MG', 'FechaMG', 'string', $this);
				case 'FechaNA':
					return new QQNode('fecha_NA', 'FechaNA', 'string', $this);
				case 'FechaNC':
					return new QQNode('fecha_NC', 'FechaNC', 'string', $this);
				case 'FechaNR':
					return new QQNode('fecha_NR', 'FechaNR', 'string', $this);
				case 'FechaNT':
					return new QQNode('fecha_NT', 'FechaNT', 'string', $this);
				case 'FechaOE':
					return new QQNode('fecha_OE', 'FechaOE', 'string', $this);
				case 'FechaOK':
					return new QQNode('fecha_OK', 'FechaOK', 'string', $this);
				case 'FechaOT':
					return new QQNode('fecha_OT', 'FechaOT', 'string', $this);
				case 'FechaPA':
					return new QQNode('fecha_PA', 'FechaPA', 'string', $this);
				case 'FechaPC':
					return new QQNode('fecha_PC', 'FechaPC', 'string', $this);
				case 'FechaPP':
					return new QQNode('fecha_PP', 'FechaPP', 'string', $this);
				case 'FechaPS':
					return new QQNode('fecha_PS', 'FechaPS', 'string', $this);
				case 'FechaPU':
					return new QQNode('fecha_PU', 'FechaPU', 'string', $this);
				case 'FechaRA':
					return new QQNode('fecha_RA', 'FechaRA', 'string', $this);
				case 'FechaRC':
					return new QQNode('fecha_RC', 'FechaRC', 'string', $this);
				case 'FechaRD':
					return new QQNode('fecha_RD', 'FechaRD', 'string', $this);
				case 'FechaRE':
					return new QQNode('fecha_RE', 'FechaRE', 'string', $this);
				case 'FechaRK':
					return new QQNode('fecha_RK', 'FechaRK', 'string', $this);
				case 'FechaRM':
					return new QQNode('fecha_RM', 'FechaRM', 'string', $this);
				case 'FechaRN':
					return new QQNode('fecha_RN', 'FechaRN', 'string', $this);
				case 'FechaRR':
					return new QQNode('fecha_RR', 'FechaRR', 'string', $this);
				case 'FechaRZ':
					return new QQNode('fecha_RZ', 'FechaRZ', 'string', $this);
				case 'FechaSE':
					return new QQNode('fecha_SE', 'FechaSE', 'string', $this);
				case 'FechaSF':
					return new QQNode('fecha_SF', 'FechaSF', 'string', $this);
				case 'FechaSM':
					return new QQNode('fecha_SM', 'FechaSM', 'string', $this);
				case 'FechaSR':
					return new QQNode('fecha_SR', 'FechaSR', 'string', $this);
				case 'FechaSS':
					return new QQNode('fecha_SS', 'FechaSS', 'string', $this);
				case 'FechaTR':
					return new QQNode('fecha_TR', 'FechaTR', 'string', $this);
				case 'FechaTU':
					return new QQNode('fecha_TU', 'FechaTU', 'string', $this);
				case 'FechaTV':
					return new QQNode('fecha_TV', 'FechaTV', 'string', $this);
				case 'FechaVD':
					return new QQNode('fecha_VD', 'FechaVD', 'string', $this);
				case 'FechaWM':
					return new QQNode('fecha_WM', 'FechaWM', 'string', $this);
				case 'FechaWT':
					return new QQNode('fecha_WT', 'FechaWT', 'string', $this);
				case 'FechaWU':
					return new QQNode('fecha_WU', 'FechaWU', 'string', $this);
				case 'FechaWX':
					return new QQNode('fecha_WX', 'FechaWX', 'string', $this);
				case 'FechaZN':
					return new QQNode('fecha_ZN', 'FechaZN', 'string', $this);
				case 'FechaZR':
					return new QQNode('fecha_ZR', 'FechaZR', 'string', $this);

				case '_PrimaryKeyNode':
					return new QQNodeGuia('guia_id', 'GuiaId', 'string', $this);
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
