<?php
	/**
	 * The abstract GuiaMasivaConnectGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the GuiaMasivaConnect subclass which
	 * extends this GuiaMasivaConnectGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the GuiaMasivaConnect class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $CodiClie the value for intCodiClie (Not Null)
	 * @property QDateTime $FechCarg the value for dttFechCarg (Not Null)
	 * @property QDateTime $HoraCarg the value for dttHoraCarg (Not Null)
	 * @property string $GuiaLiberty the value for strGuiaLiberty 
	 * @property string $GuiaCliente the value for strGuiaCliente 
	 * @property string $Destino the value for strDestino (Not Null)
	 * @property integer $CantPiezas the value for intCantPiezas (Not Null)
	 * @property boolean $Asegurado the value for blnAsegurado (Not Null)
	 * @property string $Empaque the value for strEmpaque (Not Null)
	 * @property string $ModoPago the value for strModoPago (Not Null)
	 * @property string $DescCont the value for strDescCont (Not Null)
	 * @property double $ValorDecl the value for fltValorDecl 
	 * @property string $NombDest the value for strNombDest (Not Null)
	 * @property string $DireDest the value for strDireDest (Not Null)
	 * @property string $TeleDest the value for strTeleDest (Not Null)
	 * @property string $CeduDest the value for strCeduDest (Not Null)
	 * @property boolean $DestiFrec the value for blnDestiFrec 
	 * @property string $RegistradoPor the value for strRegistradoPor (Not Null)
	 * @property string $ArchivoInput the value for strArchivoInput (Not Null)
	 * @property string $ProcesadoPor the value for strProcesadoPor 
	 * @property QDateTime $FechaProceso the value for dttFechaProceso 
	 * @property QDateTime $HoraProceso the value for dttHoraProceso 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class GuiaMasivaConnectGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column guia_masiva_connect.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_masiva_connect.codi_clie
		 * @var integer intCodiClie
		 */
		protected $intCodiClie;
		const CodiClieDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_masiva_connect.fech_carg
		 * @var QDateTime dttFechCarg
		 */
		protected $dttFechCarg;
		const FechCargDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_masiva_connect.hora_carg
		 * @var QDateTime dttHoraCarg
		 */
		protected $dttHoraCarg;
		const HoraCargDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_masiva_connect.guia_liberty
		 * @var string strGuiaLiberty
		 */
		protected $strGuiaLiberty;
		const GuiaLibertyMaxLength = 20;
		const GuiaLibertyDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_masiva_connect.guia_cliente
		 * @var string strGuiaCliente
		 */
		protected $strGuiaCliente;
		const GuiaClienteMaxLength = 50;
		const GuiaClienteDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_masiva_connect.destino
		 * @var string strDestino
		 */
		protected $strDestino;
		const DestinoMaxLength = 3;
		const DestinoDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_masiva_connect.cant_piezas
		 * @var integer intCantPiezas
		 */
		protected $intCantPiezas;
		const CantPiezasDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_masiva_connect.asegurado
		 * @var boolean blnAsegurado
		 */
		protected $blnAsegurado;
		const AseguradoDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_masiva_connect.empaque
		 * @var string strEmpaque
		 */
		protected $strEmpaque;
		const EmpaqueMaxLength = 5;
		const EmpaqueDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_masiva_connect.modo_pago
		 * @var string strModoPago
		 */
		protected $strModoPago;
		const ModoPagoMaxLength = 3;
		const ModoPagoDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_masiva_connect.desc_cont
		 * @var string strDescCont
		 */
		protected $strDescCont;
		const DescContMaxLength = 200;
		const DescContDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_masiva_connect.valor_decl
		 * @var double fltValorDecl
		 */
		protected $fltValorDecl;
		const ValorDeclDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_masiva_connect.nomb_dest
		 * @var string strNombDest
		 */
		protected $strNombDest;
		const NombDestMaxLength = 100;
		const NombDestDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_masiva_connect.dire_dest
		 * @var string strDireDest
		 */
		protected $strDireDest;
		const DireDestMaxLength = 300;
		const DireDestDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_masiva_connect.tele_dest
		 * @var string strTeleDest
		 */
		protected $strTeleDest;
		const TeleDestMaxLength = 50;
		const TeleDestDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_masiva_connect.cedu_dest
		 * @var string strCeduDest
		 */
		protected $strCeduDest;
		const CeduDestMaxLength = 20;
		const CeduDestDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_masiva_connect.desti_frec
		 * @var boolean blnDestiFrec
		 */
		protected $blnDestiFrec;
		const DestiFrecDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_masiva_connect.registrado_por
		 * @var string strRegistradoPor
		 */
		protected $strRegistradoPor;
		const RegistradoPorMaxLength = 8;
		const RegistradoPorDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_masiva_connect.archivo_input
		 * @var string strArchivoInput
		 */
		protected $strArchivoInput;
		const ArchivoInputMaxLength = 50;
		const ArchivoInputDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_masiva_connect.procesado_por
		 * @var string strProcesadoPor
		 */
		protected $strProcesadoPor;
		const ProcesadoPorMaxLength = 8;
		const ProcesadoPorDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_masiva_connect.fecha_proceso
		 * @var QDateTime dttFechaProceso
		 */
		protected $dttFechaProceso;
		const FechaProcesoDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_masiva_connect.hora_proceso
		 * @var QDateTime dttHoraProceso
		 */
		protected $dttHoraProceso;
		const HoraProcesoDefault = null;


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
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = GuiaMasivaConnect::IdDefault;
			$this->intCodiClie = GuiaMasivaConnect::CodiClieDefault;
			$this->dttFechCarg = (GuiaMasivaConnect::FechCargDefault === null)?null:new QDateTime(GuiaMasivaConnect::FechCargDefault);
			$this->dttHoraCarg = (GuiaMasivaConnect::HoraCargDefault === null)?null:new QDateTime(GuiaMasivaConnect::HoraCargDefault);
			$this->strGuiaLiberty = GuiaMasivaConnect::GuiaLibertyDefault;
			$this->strGuiaCliente = GuiaMasivaConnect::GuiaClienteDefault;
			$this->strDestino = GuiaMasivaConnect::DestinoDefault;
			$this->intCantPiezas = GuiaMasivaConnect::CantPiezasDefault;
			$this->blnAsegurado = GuiaMasivaConnect::AseguradoDefault;
			$this->strEmpaque = GuiaMasivaConnect::EmpaqueDefault;
			$this->strModoPago = GuiaMasivaConnect::ModoPagoDefault;
			$this->strDescCont = GuiaMasivaConnect::DescContDefault;
			$this->fltValorDecl = GuiaMasivaConnect::ValorDeclDefault;
			$this->strNombDest = GuiaMasivaConnect::NombDestDefault;
			$this->strDireDest = GuiaMasivaConnect::DireDestDefault;
			$this->strTeleDest = GuiaMasivaConnect::TeleDestDefault;
			$this->strCeduDest = GuiaMasivaConnect::CeduDestDefault;
			$this->blnDestiFrec = GuiaMasivaConnect::DestiFrecDefault;
			$this->strRegistradoPor = GuiaMasivaConnect::RegistradoPorDefault;
			$this->strArchivoInput = GuiaMasivaConnect::ArchivoInputDefault;
			$this->strProcesadoPor = GuiaMasivaConnect::ProcesadoPorDefault;
			$this->dttFechaProceso = (GuiaMasivaConnect::FechaProcesoDefault === null)?null:new QDateTime(GuiaMasivaConnect::FechaProcesoDefault);
			$this->dttHoraProceso = (GuiaMasivaConnect::HoraProcesoDefault === null)?null:new QDateTime(GuiaMasivaConnect::HoraProcesoDefault);
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
		 * Load a GuiaMasivaConnect from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaMasivaConnect
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'GuiaMasivaConnect', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = GuiaMasivaConnect::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::GuiaMasivaConnect()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all GuiaMasivaConnects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaMasivaConnect[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call GuiaMasivaConnect::QueryArray to perform the LoadAll query
			try {
				return GuiaMasivaConnect::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all GuiaMasivaConnects
		 * @return int
		 */
		public static function CountAll() {
			// Call GuiaMasivaConnect::QueryCount to perform the CountAll query
			return GuiaMasivaConnect::QueryCount(QQ::All());
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
			$objDatabase = GuiaMasivaConnect::GetDatabase();

			// Create/Build out the QueryBuilder object with GuiaMasivaConnect-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'guia_masiva_connect');

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
				GuiaMasivaConnect::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('guia_masiva_connect');

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
		 * Static Qcubed Query method to query for a single GuiaMasivaConnect object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return GuiaMasivaConnect the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GuiaMasivaConnect::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new GuiaMasivaConnect object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = GuiaMasivaConnect::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return GuiaMasivaConnect::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of GuiaMasivaConnect objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return GuiaMasivaConnect[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GuiaMasivaConnect::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return GuiaMasivaConnect::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = GuiaMasivaConnect::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of GuiaMasivaConnect objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GuiaMasivaConnect::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = GuiaMasivaConnect::GetDatabase();

			$strQuery = GuiaMasivaConnect::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/guiamasivaconnect', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = GuiaMasivaConnect::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this GuiaMasivaConnect
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'guia_masiva_connect';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'codi_clie', $strAliasPrefix . 'codi_clie');
			    $objBuilder->AddSelectItem($strTableName, 'fech_carg', $strAliasPrefix . 'fech_carg');
			    $objBuilder->AddSelectItem($strTableName, 'hora_carg', $strAliasPrefix . 'hora_carg');
			    $objBuilder->AddSelectItem($strTableName, 'guia_liberty', $strAliasPrefix . 'guia_liberty');
			    $objBuilder->AddSelectItem($strTableName, 'guia_cliente', $strAliasPrefix . 'guia_cliente');
			    $objBuilder->AddSelectItem($strTableName, 'destino', $strAliasPrefix . 'destino');
			    $objBuilder->AddSelectItem($strTableName, 'cant_piezas', $strAliasPrefix . 'cant_piezas');
			    $objBuilder->AddSelectItem($strTableName, 'asegurado', $strAliasPrefix . 'asegurado');
			    $objBuilder->AddSelectItem($strTableName, 'empaque', $strAliasPrefix . 'empaque');
			    $objBuilder->AddSelectItem($strTableName, 'modo_pago', $strAliasPrefix . 'modo_pago');
			    $objBuilder->AddSelectItem($strTableName, 'desc_cont', $strAliasPrefix . 'desc_cont');
			    $objBuilder->AddSelectItem($strTableName, 'valor_decl', $strAliasPrefix . 'valor_decl');
			    $objBuilder->AddSelectItem($strTableName, 'nomb_dest', $strAliasPrefix . 'nomb_dest');
			    $objBuilder->AddSelectItem($strTableName, 'dire_dest', $strAliasPrefix . 'dire_dest');
			    $objBuilder->AddSelectItem($strTableName, 'tele_dest', $strAliasPrefix . 'tele_dest');
			    $objBuilder->AddSelectItem($strTableName, 'cedu_dest', $strAliasPrefix . 'cedu_dest');
			    $objBuilder->AddSelectItem($strTableName, 'desti_frec', $strAliasPrefix . 'desti_frec');
			    $objBuilder->AddSelectItem($strTableName, 'registrado_por', $strAliasPrefix . 'registrado_por');
			    $objBuilder->AddSelectItem($strTableName, 'archivo_input', $strAliasPrefix . 'archivo_input');
			    $objBuilder->AddSelectItem($strTableName, 'procesado_por', $strAliasPrefix . 'procesado_por');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_proceso', $strAliasPrefix . 'fecha_proceso');
			    $objBuilder->AddSelectItem($strTableName, 'hora_proceso', $strAliasPrefix . 'hora_proceso');
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
		 * Instantiate a GuiaMasivaConnect from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this GuiaMasivaConnect::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a GuiaMasivaConnect, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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
			
			

			// Create a new instance of the GuiaMasivaConnect object
			$objToReturn = new GuiaMasivaConnect();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codi_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiClie = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fech_carg';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechCarg = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'hora_carg';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttHoraCarg = $objDbRow->GetColumn($strAliasName, 'Time');
			$strAlias = $strAliasPrefix . 'guia_liberty';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strGuiaLiberty = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'guia_cliente';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strGuiaCliente = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'destino';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDestino = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'cant_piezas';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCantPiezas = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'asegurado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnAsegurado = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'empaque';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEmpaque = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'modo_pago';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strModoPago = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'desc_cont';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescCont = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'valor_decl';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltValorDecl = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'nomb_dest';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombDest = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'dire_dest';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireDest = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tele_dest';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTeleDest = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'cedu_dest';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCeduDest = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'desti_frec';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnDestiFrec = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'registrado_por';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strRegistradoPor = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'archivo_input';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strArchivoInput = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'procesado_por';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strProcesadoPor = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_proceso';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaProceso = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'hora_proceso';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttHoraProceso = $objDbRow->GetColumn($strAliasName, 'Time');

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
				$strAliasPrefix = 'guia_masiva_connect__';


				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of GuiaMasivaConnects from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return GuiaMasivaConnect[]
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
					$objItem = GuiaMasivaConnect::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = GuiaMasivaConnect::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single GuiaMasivaConnect object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return GuiaMasivaConnect next row resulting from the query
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
			return GuiaMasivaConnect::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single GuiaMasivaConnect object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaMasivaConnect
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return GuiaMasivaConnect::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::GuiaMasivaConnect()->Id, $intId)
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
		 * Save this GuiaMasivaConnect
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = GuiaMasivaConnect::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `guia_masiva_connect` (
							`codi_clie`,
							`fech_carg`,
							`hora_carg`,
							`guia_liberty`,
							`guia_cliente`,
							`destino`,
							`cant_piezas`,
							`asegurado`,
							`empaque`,
							`modo_pago`,
							`desc_cont`,
							`valor_decl`,
							`nomb_dest`,
							`dire_dest`,
							`tele_dest`,
							`cedu_dest`,
							`desti_frec`,
							`registrado_por`,
							`archivo_input`,
							`procesado_por`,
							`fecha_proceso`,
							`hora_proceso`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intCodiClie) . ',
							' . $objDatabase->SqlVariable($this->dttFechCarg) . ',
							' . $objDatabase->SqlVariable($this->dttHoraCarg) . ',
							' . $objDatabase->SqlVariable($this->strGuiaLiberty) . ',
							' . $objDatabase->SqlVariable($this->strGuiaCliente) . ',
							' . $objDatabase->SqlVariable($this->strDestino) . ',
							' . $objDatabase->SqlVariable($this->intCantPiezas) . ',
							' . $objDatabase->SqlVariable($this->blnAsegurado) . ',
							' . $objDatabase->SqlVariable($this->strEmpaque) . ',
							' . $objDatabase->SqlVariable($this->strModoPago) . ',
							' . $objDatabase->SqlVariable($this->strDescCont) . ',
							' . $objDatabase->SqlVariable($this->fltValorDecl) . ',
							' . $objDatabase->SqlVariable($this->strNombDest) . ',
							' . $objDatabase->SqlVariable($this->strDireDest) . ',
							' . $objDatabase->SqlVariable($this->strTeleDest) . ',
							' . $objDatabase->SqlVariable($this->strCeduDest) . ',
							' . $objDatabase->SqlVariable($this->blnDestiFrec) . ',
							' . $objDatabase->SqlVariable($this->strRegistradoPor) . ',
							' . $objDatabase->SqlVariable($this->strArchivoInput) . ',
							' . $objDatabase->SqlVariable($this->strProcesadoPor) . ',
							' . $objDatabase->SqlVariable($this->dttFechaProceso) . ',
							' . $objDatabase->SqlVariable($this->dttHoraProceso) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('guia_masiva_connect', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`guia_masiva_connect`
						SET
							`codi_clie` = ' . $objDatabase->SqlVariable($this->intCodiClie) . ',
							`fech_carg` = ' . $objDatabase->SqlVariable($this->dttFechCarg) . ',
							`hora_carg` = ' . $objDatabase->SqlVariable($this->dttHoraCarg) . ',
							`guia_liberty` = ' . $objDatabase->SqlVariable($this->strGuiaLiberty) . ',
							`guia_cliente` = ' . $objDatabase->SqlVariable($this->strGuiaCliente) . ',
							`destino` = ' . $objDatabase->SqlVariable($this->strDestino) . ',
							`cant_piezas` = ' . $objDatabase->SqlVariable($this->intCantPiezas) . ',
							`asegurado` = ' . $objDatabase->SqlVariable($this->blnAsegurado) . ',
							`empaque` = ' . $objDatabase->SqlVariable($this->strEmpaque) . ',
							`modo_pago` = ' . $objDatabase->SqlVariable($this->strModoPago) . ',
							`desc_cont` = ' . $objDatabase->SqlVariable($this->strDescCont) . ',
							`valor_decl` = ' . $objDatabase->SqlVariable($this->fltValorDecl) . ',
							`nomb_dest` = ' . $objDatabase->SqlVariable($this->strNombDest) . ',
							`dire_dest` = ' . $objDatabase->SqlVariable($this->strDireDest) . ',
							`tele_dest` = ' . $objDatabase->SqlVariable($this->strTeleDest) . ',
							`cedu_dest` = ' . $objDatabase->SqlVariable($this->strCeduDest) . ',
							`desti_frec` = ' . $objDatabase->SqlVariable($this->blnDestiFrec) . ',
							`registrado_por` = ' . $objDatabase->SqlVariable($this->strRegistradoPor) . ',
							`archivo_input` = ' . $objDatabase->SqlVariable($this->strArchivoInput) . ',
							`procesado_por` = ' . $objDatabase->SqlVariable($this->strProcesadoPor) . ',
							`fecha_proceso` = ' . $objDatabase->SqlVariable($this->dttFechaProceso) . ',
							`hora_proceso` = ' . $objDatabase->SqlVariable($this->dttHoraProceso) . '
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
		 * Delete this GuiaMasivaConnect
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this GuiaMasivaConnect with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = GuiaMasivaConnect::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_masiva_connect`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this GuiaMasivaConnect ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'GuiaMasivaConnect', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all GuiaMasivaConnects
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = GuiaMasivaConnect::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_masiva_connect`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate guia_masiva_connect table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = GuiaMasivaConnect::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `guia_masiva_connect`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this GuiaMasivaConnect from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved GuiaMasivaConnect object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = GuiaMasivaConnect::Load($this->intId);

			// Update $this's local variables to match
			$this->intCodiClie = $objReloaded->intCodiClie;
			$this->dttFechCarg = $objReloaded->dttFechCarg;
			$this->dttHoraCarg = $objReloaded->dttHoraCarg;
			$this->strGuiaLiberty = $objReloaded->strGuiaLiberty;
			$this->strGuiaCliente = $objReloaded->strGuiaCliente;
			$this->strDestino = $objReloaded->strDestino;
			$this->intCantPiezas = $objReloaded->intCantPiezas;
			$this->blnAsegurado = $objReloaded->blnAsegurado;
			$this->strEmpaque = $objReloaded->strEmpaque;
			$this->strModoPago = $objReloaded->strModoPago;
			$this->strDescCont = $objReloaded->strDescCont;
			$this->fltValorDecl = $objReloaded->fltValorDecl;
			$this->strNombDest = $objReloaded->strNombDest;
			$this->strDireDest = $objReloaded->strDireDest;
			$this->strTeleDest = $objReloaded->strTeleDest;
			$this->strCeduDest = $objReloaded->strCeduDest;
			$this->blnDestiFrec = $objReloaded->blnDestiFrec;
			$this->strRegistradoPor = $objReloaded->strRegistradoPor;
			$this->strArchivoInput = $objReloaded->strArchivoInput;
			$this->strProcesadoPor = $objReloaded->strProcesadoPor;
			$this->dttFechaProceso = $objReloaded->dttFechaProceso;
			$this->dttHoraProceso = $objReloaded->dttHoraProceso;
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

				case 'CodiClie':
					/**
					 * Gets the value for intCodiClie (Not Null)
					 * @return integer
					 */
					return $this->intCodiClie;

				case 'FechCarg':
					/**
					 * Gets the value for dttFechCarg (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFechCarg;

				case 'HoraCarg':
					/**
					 * Gets the value for dttHoraCarg (Not Null)
					 * @return QDateTime
					 */
					return $this->dttHoraCarg;

				case 'GuiaLiberty':
					/**
					 * Gets the value for strGuiaLiberty 
					 * @return string
					 */
					return $this->strGuiaLiberty;

				case 'GuiaCliente':
					/**
					 * Gets the value for strGuiaCliente 
					 * @return string
					 */
					return $this->strGuiaCliente;

				case 'Destino':
					/**
					 * Gets the value for strDestino (Not Null)
					 * @return string
					 */
					return $this->strDestino;

				case 'CantPiezas':
					/**
					 * Gets the value for intCantPiezas (Not Null)
					 * @return integer
					 */
					return $this->intCantPiezas;

				case 'Asegurado':
					/**
					 * Gets the value for blnAsegurado (Not Null)
					 * @return boolean
					 */
					return $this->blnAsegurado;

				case 'Empaque':
					/**
					 * Gets the value for strEmpaque (Not Null)
					 * @return string
					 */
					return $this->strEmpaque;

				case 'ModoPago':
					/**
					 * Gets the value for strModoPago (Not Null)
					 * @return string
					 */
					return $this->strModoPago;

				case 'DescCont':
					/**
					 * Gets the value for strDescCont (Not Null)
					 * @return string
					 */
					return $this->strDescCont;

				case 'ValorDecl':
					/**
					 * Gets the value for fltValorDecl 
					 * @return double
					 */
					return $this->fltValorDecl;

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

				case 'CeduDest':
					/**
					 * Gets the value for strCeduDest (Not Null)
					 * @return string
					 */
					return $this->strCeduDest;

				case 'DestiFrec':
					/**
					 * Gets the value for blnDestiFrec 
					 * @return boolean
					 */
					return $this->blnDestiFrec;

				case 'RegistradoPor':
					/**
					 * Gets the value for strRegistradoPor (Not Null)
					 * @return string
					 */
					return $this->strRegistradoPor;

				case 'ArchivoInput':
					/**
					 * Gets the value for strArchivoInput (Not Null)
					 * @return string
					 */
					return $this->strArchivoInput;

				case 'ProcesadoPor':
					/**
					 * Gets the value for strProcesadoPor 
					 * @return string
					 */
					return $this->strProcesadoPor;

				case 'FechaProceso':
					/**
					 * Gets the value for dttFechaProceso 
					 * @return QDateTime
					 */
					return $this->dttFechaProceso;

				case 'HoraProceso':
					/**
					 * Gets the value for dttHoraProceso 
					 * @return QDateTime
					 */
					return $this->dttHoraProceso;


				///////////////////
				// Member Objects
				///////////////////

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

				case 'FechCarg':
					/**
					 * Sets the value for dttFechCarg (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechCarg = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HoraCarg':
					/**
					 * Sets the value for dttHoraCarg (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttHoraCarg = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GuiaLiberty':
					/**
					 * Sets the value for strGuiaLiberty 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strGuiaLiberty = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GuiaCliente':
					/**
					 * Sets the value for strGuiaCliente 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strGuiaCliente = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Destino':
					/**
					 * Sets the value for strDestino (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDestino = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CantPiezas':
					/**
					 * Sets the value for intCantPiezas (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCantPiezas = QType::Cast($mixValue, QType::Integer));
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

				case 'Empaque':
					/**
					 * Sets the value for strEmpaque (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEmpaque = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ModoPago':
					/**
					 * Sets the value for strModoPago (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strModoPago = QType::Cast($mixValue, QType::String));
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

				case 'ValorDecl':
					/**
					 * Sets the value for fltValorDecl 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltValorDecl = QType::Cast($mixValue, QType::Float));
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

				case 'CeduDest':
					/**
					 * Sets the value for strCeduDest (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCeduDest = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DestiFrec':
					/**
					 * Sets the value for blnDestiFrec 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnDestiFrec = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RegistradoPor':
					/**
					 * Sets the value for strRegistradoPor (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strRegistradoPor = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ArchivoInput':
					/**
					 * Sets the value for strArchivoInput (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strArchivoInput = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ProcesadoPor':
					/**
					 * Sets the value for strProcesadoPor 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strProcesadoPor = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaProceso':
					/**
					 * Sets the value for dttFechaProceso 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaProceso = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HoraProceso':
					/**
					 * Sets the value for dttHoraProceso 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttHoraProceso = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
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
			return "guia_masiva_connect";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[GuiaMasivaConnect::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="GuiaMasivaConnect"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="CodiClie" type="xsd:int"/>';
			$strToReturn .= '<element name="FechCarg" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="HoraCarg" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="GuiaLiberty" type="xsd:string"/>';
			$strToReturn .= '<element name="GuiaCliente" type="xsd:string"/>';
			$strToReturn .= '<element name="Destino" type="xsd:string"/>';
			$strToReturn .= '<element name="CantPiezas" type="xsd:int"/>';
			$strToReturn .= '<element name="Asegurado" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Empaque" type="xsd:string"/>';
			$strToReturn .= '<element name="ModoPago" type="xsd:string"/>';
			$strToReturn .= '<element name="DescCont" type="xsd:string"/>';
			$strToReturn .= '<element name="ValorDecl" type="xsd:float"/>';
			$strToReturn .= '<element name="NombDest" type="xsd:string"/>';
			$strToReturn .= '<element name="DireDest" type="xsd:string"/>';
			$strToReturn .= '<element name="TeleDest" type="xsd:string"/>';
			$strToReturn .= '<element name="CeduDest" type="xsd:string"/>';
			$strToReturn .= '<element name="DestiFrec" type="xsd:boolean"/>';
			$strToReturn .= '<element name="RegistradoPor" type="xsd:string"/>';
			$strToReturn .= '<element name="ArchivoInput" type="xsd:string"/>';
			$strToReturn .= '<element name="ProcesadoPor" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaProceso" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="HoraProceso" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('GuiaMasivaConnect', $strComplexTypeArray)) {
				$strComplexTypeArray['GuiaMasivaConnect'] = GuiaMasivaConnect::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, GuiaMasivaConnect::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new GuiaMasivaConnect();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'CodiClie'))
				$objToReturn->intCodiClie = $objSoapObject->CodiClie;
			if (property_exists($objSoapObject, 'FechCarg'))
				$objToReturn->dttFechCarg = new QDateTime($objSoapObject->FechCarg);
			if (property_exists($objSoapObject, 'HoraCarg'))
				$objToReturn->dttHoraCarg = new QDateTime($objSoapObject->HoraCarg);
			if (property_exists($objSoapObject, 'GuiaLiberty'))
				$objToReturn->strGuiaLiberty = $objSoapObject->GuiaLiberty;
			if (property_exists($objSoapObject, 'GuiaCliente'))
				$objToReturn->strGuiaCliente = $objSoapObject->GuiaCliente;
			if (property_exists($objSoapObject, 'Destino'))
				$objToReturn->strDestino = $objSoapObject->Destino;
			if (property_exists($objSoapObject, 'CantPiezas'))
				$objToReturn->intCantPiezas = $objSoapObject->CantPiezas;
			if (property_exists($objSoapObject, 'Asegurado'))
				$objToReturn->blnAsegurado = $objSoapObject->Asegurado;
			if (property_exists($objSoapObject, 'Empaque'))
				$objToReturn->strEmpaque = $objSoapObject->Empaque;
			if (property_exists($objSoapObject, 'ModoPago'))
				$objToReturn->strModoPago = $objSoapObject->ModoPago;
			if (property_exists($objSoapObject, 'DescCont'))
				$objToReturn->strDescCont = $objSoapObject->DescCont;
			if (property_exists($objSoapObject, 'ValorDecl'))
				$objToReturn->fltValorDecl = $objSoapObject->ValorDecl;
			if (property_exists($objSoapObject, 'NombDest'))
				$objToReturn->strNombDest = $objSoapObject->NombDest;
			if (property_exists($objSoapObject, 'DireDest'))
				$objToReturn->strDireDest = $objSoapObject->DireDest;
			if (property_exists($objSoapObject, 'TeleDest'))
				$objToReturn->strTeleDest = $objSoapObject->TeleDest;
			if (property_exists($objSoapObject, 'CeduDest'))
				$objToReturn->strCeduDest = $objSoapObject->CeduDest;
			if (property_exists($objSoapObject, 'DestiFrec'))
				$objToReturn->blnDestiFrec = $objSoapObject->DestiFrec;
			if (property_exists($objSoapObject, 'RegistradoPor'))
				$objToReturn->strRegistradoPor = $objSoapObject->RegistradoPor;
			if (property_exists($objSoapObject, 'ArchivoInput'))
				$objToReturn->strArchivoInput = $objSoapObject->ArchivoInput;
			if (property_exists($objSoapObject, 'ProcesadoPor'))
				$objToReturn->strProcesadoPor = $objSoapObject->ProcesadoPor;
			if (property_exists($objSoapObject, 'FechaProceso'))
				$objToReturn->dttFechaProceso = new QDateTime($objSoapObject->FechaProceso);
			if (property_exists($objSoapObject, 'HoraProceso'))
				$objToReturn->dttHoraProceso = new QDateTime($objSoapObject->HoraProceso);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, GuiaMasivaConnect::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttFechCarg)
				$objObject->dttFechCarg = $objObject->dttFechCarg->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttHoraCarg)
				$objObject->dttHoraCarg = $objObject->dttHoraCarg->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechaProceso)
				$objObject->dttFechaProceso = $objObject->dttFechaProceso->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttHoraProceso)
				$objObject->dttHoraProceso = $objObject->dttHoraProceso->qFormat(QDateTime::FormatSoap);
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
			$iArray['CodiClie'] = $this->intCodiClie;
			$iArray['FechCarg'] = $this->dttFechCarg;
			$iArray['HoraCarg'] = $this->dttHoraCarg;
			$iArray['GuiaLiberty'] = $this->strGuiaLiberty;
			$iArray['GuiaCliente'] = $this->strGuiaCliente;
			$iArray['Destino'] = $this->strDestino;
			$iArray['CantPiezas'] = $this->intCantPiezas;
			$iArray['Asegurado'] = $this->blnAsegurado;
			$iArray['Empaque'] = $this->strEmpaque;
			$iArray['ModoPago'] = $this->strModoPago;
			$iArray['DescCont'] = $this->strDescCont;
			$iArray['ValorDecl'] = $this->fltValorDecl;
			$iArray['NombDest'] = $this->strNombDest;
			$iArray['DireDest'] = $this->strDireDest;
			$iArray['TeleDest'] = $this->strTeleDest;
			$iArray['CeduDest'] = $this->strCeduDest;
			$iArray['DestiFrec'] = $this->blnDestiFrec;
			$iArray['RegistradoPor'] = $this->strRegistradoPor;
			$iArray['ArchivoInput'] = $this->strArchivoInput;
			$iArray['ProcesadoPor'] = $this->strProcesadoPor;
			$iArray['FechaProceso'] = $this->dttFechaProceso;
			$iArray['HoraProceso'] = $this->dttHoraProceso;
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
     * @property-read QQNode $CodiClie
     * @property-read QQNode $FechCarg
     * @property-read QQNode $HoraCarg
     * @property-read QQNode $GuiaLiberty
     * @property-read QQNode $GuiaCliente
     * @property-read QQNode $Destino
     * @property-read QQNode $CantPiezas
     * @property-read QQNode $Asegurado
     * @property-read QQNode $Empaque
     * @property-read QQNode $ModoPago
     * @property-read QQNode $DescCont
     * @property-read QQNode $ValorDecl
     * @property-read QQNode $NombDest
     * @property-read QQNode $DireDest
     * @property-read QQNode $TeleDest
     * @property-read QQNode $CeduDest
     * @property-read QQNode $DestiFrec
     * @property-read QQNode $RegistradoPor
     * @property-read QQNode $ArchivoInput
     * @property-read QQNode $ProcesadoPor
     * @property-read QQNode $FechaProceso
     * @property-read QQNode $HoraProceso
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeGuiaMasivaConnect extends QQNode {
		protected $strTableName = 'guia_masiva_connect';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'GuiaMasivaConnect';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'CodiClie':
					return new QQNode('codi_clie', 'CodiClie', 'Integer', $this);
				case 'FechCarg':
					return new QQNode('fech_carg', 'FechCarg', 'Date', $this);
				case 'HoraCarg':
					return new QQNode('hora_carg', 'HoraCarg', 'Time', $this);
				case 'GuiaLiberty':
					return new QQNode('guia_liberty', 'GuiaLiberty', 'VarChar', $this);
				case 'GuiaCliente':
					return new QQNode('guia_cliente', 'GuiaCliente', 'VarChar', $this);
				case 'Destino':
					return new QQNode('destino', 'Destino', 'VarChar', $this);
				case 'CantPiezas':
					return new QQNode('cant_piezas', 'CantPiezas', 'Integer', $this);
				case 'Asegurado':
					return new QQNode('asegurado', 'Asegurado', 'Bit', $this);
				case 'Empaque':
					return new QQNode('empaque', 'Empaque', 'VarChar', $this);
				case 'ModoPago':
					return new QQNode('modo_pago', 'ModoPago', 'VarChar', $this);
				case 'DescCont':
					return new QQNode('desc_cont', 'DescCont', 'VarChar', $this);
				case 'ValorDecl':
					return new QQNode('valor_decl', 'ValorDecl', 'Float', $this);
				case 'NombDest':
					return new QQNode('nomb_dest', 'NombDest', 'VarChar', $this);
				case 'DireDest':
					return new QQNode('dire_dest', 'DireDest', 'VarChar', $this);
				case 'TeleDest':
					return new QQNode('tele_dest', 'TeleDest', 'VarChar', $this);
				case 'CeduDest':
					return new QQNode('cedu_dest', 'CeduDest', 'VarChar', $this);
				case 'DestiFrec':
					return new QQNode('desti_frec', 'DestiFrec', 'Bit', $this);
				case 'RegistradoPor':
					return new QQNode('registrado_por', 'RegistradoPor', 'VarChar', $this);
				case 'ArchivoInput':
					return new QQNode('archivo_input', 'ArchivoInput', 'VarChar', $this);
				case 'ProcesadoPor':
					return new QQNode('procesado_por', 'ProcesadoPor', 'VarChar', $this);
				case 'FechaProceso':
					return new QQNode('fecha_proceso', 'FechaProceso', 'Date', $this);
				case 'HoraProceso':
					return new QQNode('hora_proceso', 'HoraProceso', 'Time', $this);

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
     * @property-read QQNode $CodiClie
     * @property-read QQNode $FechCarg
     * @property-read QQNode $HoraCarg
     * @property-read QQNode $GuiaLiberty
     * @property-read QQNode $GuiaCliente
     * @property-read QQNode $Destino
     * @property-read QQNode $CantPiezas
     * @property-read QQNode $Asegurado
     * @property-read QQNode $Empaque
     * @property-read QQNode $ModoPago
     * @property-read QQNode $DescCont
     * @property-read QQNode $ValorDecl
     * @property-read QQNode $NombDest
     * @property-read QQNode $DireDest
     * @property-read QQNode $TeleDest
     * @property-read QQNode $CeduDest
     * @property-read QQNode $DestiFrec
     * @property-read QQNode $RegistradoPor
     * @property-read QQNode $ArchivoInput
     * @property-read QQNode $ProcesadoPor
     * @property-read QQNode $FechaProceso
     * @property-read QQNode $HoraProceso
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeGuiaMasivaConnect extends QQReverseReferenceNode {
		protected $strTableName = 'guia_masiva_connect';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'GuiaMasivaConnect';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'CodiClie':
					return new QQNode('codi_clie', 'CodiClie', 'integer', $this);
				case 'FechCarg':
					return new QQNode('fech_carg', 'FechCarg', 'QDateTime', $this);
				case 'HoraCarg':
					return new QQNode('hora_carg', 'HoraCarg', 'QDateTime', $this);
				case 'GuiaLiberty':
					return new QQNode('guia_liberty', 'GuiaLiberty', 'string', $this);
				case 'GuiaCliente':
					return new QQNode('guia_cliente', 'GuiaCliente', 'string', $this);
				case 'Destino':
					return new QQNode('destino', 'Destino', 'string', $this);
				case 'CantPiezas':
					return new QQNode('cant_piezas', 'CantPiezas', 'integer', $this);
				case 'Asegurado':
					return new QQNode('asegurado', 'Asegurado', 'boolean', $this);
				case 'Empaque':
					return new QQNode('empaque', 'Empaque', 'string', $this);
				case 'ModoPago':
					return new QQNode('modo_pago', 'ModoPago', 'string', $this);
				case 'DescCont':
					return new QQNode('desc_cont', 'DescCont', 'string', $this);
				case 'ValorDecl':
					return new QQNode('valor_decl', 'ValorDecl', 'double', $this);
				case 'NombDest':
					return new QQNode('nomb_dest', 'NombDest', 'string', $this);
				case 'DireDest':
					return new QQNode('dire_dest', 'DireDest', 'string', $this);
				case 'TeleDest':
					return new QQNode('tele_dest', 'TeleDest', 'string', $this);
				case 'CeduDest':
					return new QQNode('cedu_dest', 'CeduDest', 'string', $this);
				case 'DestiFrec':
					return new QQNode('desti_frec', 'DestiFrec', 'boolean', $this);
				case 'RegistradoPor':
					return new QQNode('registrado_por', 'RegistradoPor', 'string', $this);
				case 'ArchivoInput':
					return new QQNode('archivo_input', 'ArchivoInput', 'string', $this);
				case 'ProcesadoPor':
					return new QQNode('procesado_por', 'ProcesadoPor', 'string', $this);
				case 'FechaProceso':
					return new QQNode('fecha_proceso', 'FechaProceso', 'QDateTime', $this);
				case 'HoraProceso':
					return new QQNode('hora_proceso', 'HoraProceso', 'QDateTime', $this);

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
