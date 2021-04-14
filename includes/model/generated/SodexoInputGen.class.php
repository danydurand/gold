<?php
	/**
	 * The abstract SodexoInputGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the SodexoInput subclass which
	 * extends this SodexoInputGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the SodexoInput class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property double $CodigoTurpial the value for fltCodigoTurpial (Not Null)
	 * @property string $RazonSocial the value for strRazonSocial (Not Null)
	 * @property string $GuiaSodexo the value for strGuiaSodexo (Unique)
	 * @property integer $CantidadEnvases the value for intCantidadEnvases (Not Null)
	 * @property string $FechaDespacho the value for strFechaDespacho (Not Null)
	 * @property string $DireccionEntrega the value for strDireccionEntrega (Not Null)
	 * @property string $Ciudad the value for strCiudad (Not Null)
	 * @property string $Estado the value for strEstado (Not Null)
	 * @property string $ZonaFiscal the value for strZonaFiscal 
	 * @property string $TipoCliente the value for strTipoCliente (Not Null)
	 * @property string $RegistradoPor the value for strRegistradoPor (Not Null)
	 * @property QDateTime $FechaRegistro the value for dttFechaRegistro (Not Null)
	 * @property string $HoraRegistro the value for strHoraRegistro (Not Null)
	 * @property string $ArchivoInput the value for strArchivoInput (Not Null)
	 * @property string $GuiaId the value for strGuiaId 
	 * @property string $ProcesadoPor the value for strProcesadoPor 
	 * @property QDateTime $FechaProceso the value for dttFechaProceso 
	 * @property string $HoraProceso the value for strHoraProceso 
	 * @property string $CodiEsta the value for strCodiEsta 
	 * @property string $CodiCkpt the value for strCodiCkpt 
	 * @property QDateTime $FechCkpt the value for dttFechCkpt 
	 * @property string $HoraCkpt the value for strHoraCkpt 
	 * @property integer $CierreCiclo the value for intCierreCiclo 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class SodexoInputGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column sodexo_input.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column sodexo_input.codigo_turpial
		 * @var double fltCodigoTurpial
		 */
		protected $fltCodigoTurpial;
		const CodigoTurpialDefault = null;


		/**
		 * Protected member variable that maps to the database column sodexo_input.razon_social
		 * @var string strRazonSocial
		 */
		protected $strRazonSocial;
		const RazonSocialMaxLength = 100;
		const RazonSocialDefault = null;


		/**
		 * Protected member variable that maps to the database column sodexo_input.guia_sodexo
		 * @var string strGuiaSodexo
		 */
		protected $strGuiaSodexo;
		const GuiaSodexoMaxLength = 15;
		const GuiaSodexoDefault = null;


		/**
		 * Protected member variable that maps to the database column sodexo_input.cantidad_envases
		 * @var integer intCantidadEnvases
		 */
		protected $intCantidadEnvases;
		const CantidadEnvasesDefault = null;


		/**
		 * Protected member variable that maps to the database column sodexo_input.fecha_despacho
		 * @var string strFechaDespacho
		 */
		protected $strFechaDespacho;
		const FechaDespachoMaxLength = 10;
		const FechaDespachoDefault = null;


		/**
		 * Protected member variable that maps to the database column sodexo_input.direccion_entrega
		 * @var string strDireccionEntrega
		 */
		protected $strDireccionEntrega;
		const DireccionEntregaMaxLength = 200;
		const DireccionEntregaDefault = null;


		/**
		 * Protected member variable that maps to the database column sodexo_input.ciudad
		 * @var string strCiudad
		 */
		protected $strCiudad;
		const CiudadMaxLength = 45;
		const CiudadDefault = null;


		/**
		 * Protected member variable that maps to the database column sodexo_input.estado
		 * @var string strEstado
		 */
		protected $strEstado;
		const EstadoMaxLength = 45;
		const EstadoDefault = null;


		/**
		 * Protected member variable that maps to the database column sodexo_input.zona_fiscal
		 * @var string strZonaFiscal
		 */
		protected $strZonaFiscal;
		const ZonaFiscalMaxLength = 45;
		const ZonaFiscalDefault = null;


		/**
		 * Protected member variable that maps to the database column sodexo_input.tipo_cliente
		 * @var string strTipoCliente
		 */
		protected $strTipoCliente;
		const TipoClienteMaxLength = 10;
		const TipoClienteDefault = null;


		/**
		 * Protected member variable that maps to the database column sodexo_input.registrado_por
		 * @var string strRegistradoPor
		 */
		protected $strRegistradoPor;
		const RegistradoPorMaxLength = 8;
		const RegistradoPorDefault = null;


		/**
		 * Protected member variable that maps to the database column sodexo_input.fecha_registro
		 * @var QDateTime dttFechaRegistro
		 */
		protected $dttFechaRegistro;
		const FechaRegistroDefault = null;


		/**
		 * Protected member variable that maps to the database column sodexo_input.hora_registro
		 * @var string strHoraRegistro
		 */
		protected $strHoraRegistro;
		const HoraRegistroMaxLength = 5;
		const HoraRegistroDefault = null;


		/**
		 * Protected member variable that maps to the database column sodexo_input.archivo_input
		 * @var string strArchivoInput
		 */
		protected $strArchivoInput;
		const ArchivoInputMaxLength = 45;
		const ArchivoInputDefault = null;


		/**
		 * Protected member variable that maps to the database column sodexo_input.guia_id
		 * @var string strGuiaId
		 */
		protected $strGuiaId;
		const GuiaIdMaxLength = 20;
		const GuiaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column sodexo_input.procesado_por
		 * @var string strProcesadoPor
		 */
		protected $strProcesadoPor;
		const ProcesadoPorMaxLength = 8;
		const ProcesadoPorDefault = null;


		/**
		 * Protected member variable that maps to the database column sodexo_input.fecha_proceso
		 * @var QDateTime dttFechaProceso
		 */
		protected $dttFechaProceso;
		const FechaProcesoDefault = null;


		/**
		 * Protected member variable that maps to the database column sodexo_input.hora_proceso
		 * @var string strHoraProceso
		 */
		protected $strHoraProceso;
		const HoraProcesoMaxLength = 5;
		const HoraProcesoDefault = null;


		/**
		 * Protected member variable that maps to the database column sodexo_input.codi_esta
		 * @var string strCodiEsta
		 */
		protected $strCodiEsta;
		const CodiEstaMaxLength = 3;
		const CodiEstaDefault = null;


		/**
		 * Protected member variable that maps to the database column sodexo_input.codi_ckpt
		 * @var string strCodiCkpt
		 */
		protected $strCodiCkpt;
		const CodiCkptMaxLength = 2;
		const CodiCkptDefault = null;


		/**
		 * Protected member variable that maps to the database column sodexo_input.fech_ckpt
		 * @var QDateTime dttFechCkpt
		 */
		protected $dttFechCkpt;
		const FechCkptDefault = null;


		/**
		 * Protected member variable that maps to the database column sodexo_input.hora_ckpt
		 * @var string strHoraCkpt
		 */
		protected $strHoraCkpt;
		const HoraCkptMaxLength = 5;
		const HoraCkptDefault = null;


		/**
		 * Protected member variable that maps to the database column sodexo_input.cierre_ciclo
		 * @var integer intCierreCiclo
		 */
		protected $intCierreCiclo;
		const CierreCicloDefault = null;


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
			$this->intId = SodexoInput::IdDefault;
			$this->fltCodigoTurpial = SodexoInput::CodigoTurpialDefault;
			$this->strRazonSocial = SodexoInput::RazonSocialDefault;
			$this->strGuiaSodexo = SodexoInput::GuiaSodexoDefault;
			$this->intCantidadEnvases = SodexoInput::CantidadEnvasesDefault;
			$this->strFechaDespacho = SodexoInput::FechaDespachoDefault;
			$this->strDireccionEntrega = SodexoInput::DireccionEntregaDefault;
			$this->strCiudad = SodexoInput::CiudadDefault;
			$this->strEstado = SodexoInput::EstadoDefault;
			$this->strZonaFiscal = SodexoInput::ZonaFiscalDefault;
			$this->strTipoCliente = SodexoInput::TipoClienteDefault;
			$this->strRegistradoPor = SodexoInput::RegistradoPorDefault;
			$this->dttFechaRegistro = (SodexoInput::FechaRegistroDefault === null)?null:new QDateTime(SodexoInput::FechaRegistroDefault);
			$this->strHoraRegistro = SodexoInput::HoraRegistroDefault;
			$this->strArchivoInput = SodexoInput::ArchivoInputDefault;
			$this->strGuiaId = SodexoInput::GuiaIdDefault;
			$this->strProcesadoPor = SodexoInput::ProcesadoPorDefault;
			$this->dttFechaProceso = (SodexoInput::FechaProcesoDefault === null)?null:new QDateTime(SodexoInput::FechaProcesoDefault);
			$this->strHoraProceso = SodexoInput::HoraProcesoDefault;
			$this->strCodiEsta = SodexoInput::CodiEstaDefault;
			$this->strCodiCkpt = SodexoInput::CodiCkptDefault;
			$this->dttFechCkpt = (SodexoInput::FechCkptDefault === null)?null:new QDateTime(SodexoInput::FechCkptDefault);
			$this->strHoraCkpt = SodexoInput::HoraCkptDefault;
			$this->intCierreCiclo = SodexoInput::CierreCicloDefault;
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
		 * Load a SodexoInput from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SodexoInput
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'SodexoInput', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = SodexoInput::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::SodexoInput()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all SodexoInputs
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SodexoInput[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call SodexoInput::QueryArray to perform the LoadAll query
			try {
				return SodexoInput::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all SodexoInputs
		 * @return int
		 */
		public static function CountAll() {
			// Call SodexoInput::QueryCount to perform the CountAll query
			return SodexoInput::QueryCount(QQ::All());
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
			$objDatabase = SodexoInput::GetDatabase();

			// Create/Build out the QueryBuilder object with SodexoInput-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'sodexo_input');

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
				SodexoInput::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('sodexo_input');

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
		 * Static Qcubed Query method to query for a single SodexoInput object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return SodexoInput the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SodexoInput::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new SodexoInput object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = SodexoInput::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return SodexoInput::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of SodexoInput objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return SodexoInput[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SodexoInput::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return SodexoInput::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = SodexoInput::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of SodexoInput objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SodexoInput::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = SodexoInput::GetDatabase();

			$strQuery = SodexoInput::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/sodexoinput', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = SodexoInput::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this SodexoInput
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'sodexo_input';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'codigo_turpial', $strAliasPrefix . 'codigo_turpial');
			    $objBuilder->AddSelectItem($strTableName, 'razon_social', $strAliasPrefix . 'razon_social');
			    $objBuilder->AddSelectItem($strTableName, 'guia_sodexo', $strAliasPrefix . 'guia_sodexo');
			    $objBuilder->AddSelectItem($strTableName, 'cantidad_envases', $strAliasPrefix . 'cantidad_envases');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_despacho', $strAliasPrefix . 'fecha_despacho');
			    $objBuilder->AddSelectItem($strTableName, 'direccion_entrega', $strAliasPrefix . 'direccion_entrega');
			    $objBuilder->AddSelectItem($strTableName, 'ciudad', $strAliasPrefix . 'ciudad');
			    $objBuilder->AddSelectItem($strTableName, 'estado', $strAliasPrefix . 'estado');
			    $objBuilder->AddSelectItem($strTableName, 'zona_fiscal', $strAliasPrefix . 'zona_fiscal');
			    $objBuilder->AddSelectItem($strTableName, 'tipo_cliente', $strAliasPrefix . 'tipo_cliente');
			    $objBuilder->AddSelectItem($strTableName, 'registrado_por', $strAliasPrefix . 'registrado_por');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_registro', $strAliasPrefix . 'fecha_registro');
			    $objBuilder->AddSelectItem($strTableName, 'hora_registro', $strAliasPrefix . 'hora_registro');
			    $objBuilder->AddSelectItem($strTableName, 'archivo_input', $strAliasPrefix . 'archivo_input');
			    $objBuilder->AddSelectItem($strTableName, 'guia_id', $strAliasPrefix . 'guia_id');
			    $objBuilder->AddSelectItem($strTableName, 'procesado_por', $strAliasPrefix . 'procesado_por');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_proceso', $strAliasPrefix . 'fecha_proceso');
			    $objBuilder->AddSelectItem($strTableName, 'hora_proceso', $strAliasPrefix . 'hora_proceso');
			    $objBuilder->AddSelectItem($strTableName, 'codi_esta', $strAliasPrefix . 'codi_esta');
			    $objBuilder->AddSelectItem($strTableName, 'codi_ckpt', $strAliasPrefix . 'codi_ckpt');
			    $objBuilder->AddSelectItem($strTableName, 'fech_ckpt', $strAliasPrefix . 'fech_ckpt');
			    $objBuilder->AddSelectItem($strTableName, 'hora_ckpt', $strAliasPrefix . 'hora_ckpt');
			    $objBuilder->AddSelectItem($strTableName, 'cierre_ciclo', $strAliasPrefix . 'cierre_ciclo');
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
		 * Instantiate a SodexoInput from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this SodexoInput::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a SodexoInput, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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
			
			

			// Create a new instance of the SodexoInput object
			$objToReturn = new SodexoInput();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codigo_turpial';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltCodigoTurpial = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'razon_social';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strRazonSocial = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'guia_sodexo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strGuiaSodexo = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'cantidad_envases';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCantidadEnvases = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fecha_despacho';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaDespacho = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'direccion_entrega';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireccionEntrega = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'ciudad';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCiudad = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'estado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEstado = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'zona_fiscal';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strZonaFiscal = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tipo_cliente';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTipoCliente = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'registrado_por';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strRegistradoPor = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_registro';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaRegistro = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'hora_registro';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHoraRegistro = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'archivo_input';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strArchivoInput = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'guia_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strGuiaId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'procesado_por';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strProcesadoPor = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_proceso';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaProceso = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'hora_proceso';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHoraProceso = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodiEsta = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codi_ckpt';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodiCkpt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fech_ckpt';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechCkpt = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'hora_ckpt';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHoraCkpt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'cierre_ciclo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCierreCiclo = $objDbRow->GetColumn($strAliasName, 'Integer');

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
				$strAliasPrefix = 'sodexo_input__';


				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of SodexoInputs from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return SodexoInput[]
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
					$objItem = SodexoInput::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = SodexoInput::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single SodexoInput object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return SodexoInput next row resulting from the query
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
			return SodexoInput::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single SodexoInput object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SodexoInput
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return SodexoInput::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::SodexoInput()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single SodexoInput object,
		 * by GuiaSodexo Index(es)
		 * @param string $strGuiaSodexo
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SodexoInput
		*/
		public static function LoadByGuiaSodexo($strGuiaSodexo, $objOptionalClauses = null) {
			return SodexoInput::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::SodexoInput()->GuiaSodexo, $strGuiaSodexo)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of SodexoInput objects,
		 * by GuiaId Index(es)
		 * @param string $strGuiaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SodexoInput[]
		*/
		public static function LoadArrayByGuiaId($strGuiaId, $objOptionalClauses = null) {
			// Call SodexoInput::QueryArray to perform the LoadArrayByGuiaId query
			try {
				return SodexoInput::QueryArray(
					QQ::Equal(QQN::SodexoInput()->GuiaId, $strGuiaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SodexoInputs
		 * by GuiaId Index(es)
		 * @param string $strGuiaId
		 * @return int
		*/
		public static function CountByGuiaId($strGuiaId) {
			// Call SodexoInput::QueryCount to perform the CountByGuiaId query
			return SodexoInput::QueryCount(
				QQ::Equal(QQN::SodexoInput()->GuiaId, $strGuiaId)
			);
		}

		/**
		 * Load an array of SodexoInput objects,
		 * by CierreCiclo Index(es)
		 * @param integer $intCierreCiclo
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SodexoInput[]
		*/
		public static function LoadArrayByCierreCiclo($intCierreCiclo, $objOptionalClauses = null) {
			// Call SodexoInput::QueryArray to perform the LoadArrayByCierreCiclo query
			try {
				return SodexoInput::QueryArray(
					QQ::Equal(QQN::SodexoInput()->CierreCiclo, $intCierreCiclo),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SodexoInputs
		 * by CierreCiclo Index(es)
		 * @param integer $intCierreCiclo
		 * @return int
		*/
		public static function CountByCierreCiclo($intCierreCiclo) {
			// Call SodexoInput::QueryCount to perform the CountByCierreCiclo query
			return SodexoInput::QueryCount(
				QQ::Equal(QQN::SodexoInput()->CierreCiclo, $intCierreCiclo)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this SodexoInput
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = SodexoInput::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `sodexo_input` (
							`codigo_turpial`,
							`razon_social`,
							`guia_sodexo`,
							`cantidad_envases`,
							`fecha_despacho`,
							`direccion_entrega`,
							`ciudad`,
							`estado`,
							`zona_fiscal`,
							`tipo_cliente`,
							`registrado_por`,
							`fecha_registro`,
							`hora_registro`,
							`archivo_input`,
							`guia_id`,
							`procesado_por`,
							`fecha_proceso`,
							`hora_proceso`,
							`codi_esta`,
							`codi_ckpt`,
							`fech_ckpt`,
							`hora_ckpt`,
							`cierre_ciclo`
						) VALUES (
							' . $objDatabase->SqlVariable($this->fltCodigoTurpial) . ',
							' . $objDatabase->SqlVariable($this->strRazonSocial) . ',
							' . $objDatabase->SqlVariable($this->strGuiaSodexo) . ',
							' . $objDatabase->SqlVariable($this->intCantidadEnvases) . ',
							' . $objDatabase->SqlVariable($this->strFechaDespacho) . ',
							' . $objDatabase->SqlVariable($this->strDireccionEntrega) . ',
							' . $objDatabase->SqlVariable($this->strCiudad) . ',
							' . $objDatabase->SqlVariable($this->strEstado) . ',
							' . $objDatabase->SqlVariable($this->strZonaFiscal) . ',
							' . $objDatabase->SqlVariable($this->strTipoCliente) . ',
							' . $objDatabase->SqlVariable($this->strRegistradoPor) . ',
							' . $objDatabase->SqlVariable($this->dttFechaRegistro) . ',
							' . $objDatabase->SqlVariable($this->strHoraRegistro) . ',
							' . $objDatabase->SqlVariable($this->strArchivoInput) . ',
							' . $objDatabase->SqlVariable($this->strGuiaId) . ',
							' . $objDatabase->SqlVariable($this->strProcesadoPor) . ',
							' . $objDatabase->SqlVariable($this->dttFechaProceso) . ',
							' . $objDatabase->SqlVariable($this->strHoraProceso) . ',
							' . $objDatabase->SqlVariable($this->strCodiEsta) . ',
							' . $objDatabase->SqlVariable($this->strCodiCkpt) . ',
							' . $objDatabase->SqlVariable($this->dttFechCkpt) . ',
							' . $objDatabase->SqlVariable($this->strHoraCkpt) . ',
							' . $objDatabase->SqlVariable($this->intCierreCiclo) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('sodexo_input', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`sodexo_input`
						SET
							`codigo_turpial` = ' . $objDatabase->SqlVariable($this->fltCodigoTurpial) . ',
							`razon_social` = ' . $objDatabase->SqlVariable($this->strRazonSocial) . ',
							`guia_sodexo` = ' . $objDatabase->SqlVariable($this->strGuiaSodexo) . ',
							`cantidad_envases` = ' . $objDatabase->SqlVariable($this->intCantidadEnvases) . ',
							`fecha_despacho` = ' . $objDatabase->SqlVariable($this->strFechaDespacho) . ',
							`direccion_entrega` = ' . $objDatabase->SqlVariable($this->strDireccionEntrega) . ',
							`ciudad` = ' . $objDatabase->SqlVariable($this->strCiudad) . ',
							`estado` = ' . $objDatabase->SqlVariable($this->strEstado) . ',
							`zona_fiscal` = ' . $objDatabase->SqlVariable($this->strZonaFiscal) . ',
							`tipo_cliente` = ' . $objDatabase->SqlVariable($this->strTipoCliente) . ',
							`registrado_por` = ' . $objDatabase->SqlVariable($this->strRegistradoPor) . ',
							`fecha_registro` = ' . $objDatabase->SqlVariable($this->dttFechaRegistro) . ',
							`hora_registro` = ' . $objDatabase->SqlVariable($this->strHoraRegistro) . ',
							`archivo_input` = ' . $objDatabase->SqlVariable($this->strArchivoInput) . ',
							`guia_id` = ' . $objDatabase->SqlVariable($this->strGuiaId) . ',
							`procesado_por` = ' . $objDatabase->SqlVariable($this->strProcesadoPor) . ',
							`fecha_proceso` = ' . $objDatabase->SqlVariable($this->dttFechaProceso) . ',
							`hora_proceso` = ' . $objDatabase->SqlVariable($this->strHoraProceso) . ',
							`codi_esta` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . ',
							`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . ',
							`fech_ckpt` = ' . $objDatabase->SqlVariable($this->dttFechCkpt) . ',
							`hora_ckpt` = ' . $objDatabase->SqlVariable($this->strHoraCkpt) . ',
							`cierre_ciclo` = ' . $objDatabase->SqlVariable($this->intCierreCiclo) . '
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
		 * Delete this SodexoInput
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this SodexoInput with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = SodexoInput::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sodexo_input`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this SodexoInput ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'SodexoInput', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all SodexoInputs
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = SodexoInput::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sodexo_input`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate sodexo_input table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = SodexoInput::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `sodexo_input`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this SodexoInput from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved SodexoInput object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = SodexoInput::Load($this->intId);

			// Update $this's local variables to match
			$this->fltCodigoTurpial = $objReloaded->fltCodigoTurpial;
			$this->strRazonSocial = $objReloaded->strRazonSocial;
			$this->strGuiaSodexo = $objReloaded->strGuiaSodexo;
			$this->intCantidadEnvases = $objReloaded->intCantidadEnvases;
			$this->strFechaDespacho = $objReloaded->strFechaDespacho;
			$this->strDireccionEntrega = $objReloaded->strDireccionEntrega;
			$this->strCiudad = $objReloaded->strCiudad;
			$this->strEstado = $objReloaded->strEstado;
			$this->strZonaFiscal = $objReloaded->strZonaFiscal;
			$this->strTipoCliente = $objReloaded->strTipoCliente;
			$this->strRegistradoPor = $objReloaded->strRegistradoPor;
			$this->dttFechaRegistro = $objReloaded->dttFechaRegistro;
			$this->strHoraRegistro = $objReloaded->strHoraRegistro;
			$this->strArchivoInput = $objReloaded->strArchivoInput;
			$this->strGuiaId = $objReloaded->strGuiaId;
			$this->strProcesadoPor = $objReloaded->strProcesadoPor;
			$this->dttFechaProceso = $objReloaded->dttFechaProceso;
			$this->strHoraProceso = $objReloaded->strHoraProceso;
			$this->strCodiEsta = $objReloaded->strCodiEsta;
			$this->strCodiCkpt = $objReloaded->strCodiCkpt;
			$this->dttFechCkpt = $objReloaded->dttFechCkpt;
			$this->strHoraCkpt = $objReloaded->strHoraCkpt;
			$this->CierreCiclo = $objReloaded->CierreCiclo;
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

				case 'CodigoTurpial':
					/**
					 * Gets the value for fltCodigoTurpial (Not Null)
					 * @return double
					 */
					return $this->fltCodigoTurpial;

				case 'RazonSocial':
					/**
					 * Gets the value for strRazonSocial (Not Null)
					 * @return string
					 */
					return $this->strRazonSocial;

				case 'GuiaSodexo':
					/**
					 * Gets the value for strGuiaSodexo (Unique)
					 * @return string
					 */
					return $this->strGuiaSodexo;

				case 'CantidadEnvases':
					/**
					 * Gets the value for intCantidadEnvases (Not Null)
					 * @return integer
					 */
					return $this->intCantidadEnvases;

				case 'FechaDespacho':
					/**
					 * Gets the value for strFechaDespacho (Not Null)
					 * @return string
					 */
					return $this->strFechaDespacho;

				case 'DireccionEntrega':
					/**
					 * Gets the value for strDireccionEntrega (Not Null)
					 * @return string
					 */
					return $this->strDireccionEntrega;

				case 'Ciudad':
					/**
					 * Gets the value for strCiudad (Not Null)
					 * @return string
					 */
					return $this->strCiudad;

				case 'Estado':
					/**
					 * Gets the value for strEstado (Not Null)
					 * @return string
					 */
					return $this->strEstado;

				case 'ZonaFiscal':
					/**
					 * Gets the value for strZonaFiscal 
					 * @return string
					 */
					return $this->strZonaFiscal;

				case 'TipoCliente':
					/**
					 * Gets the value for strTipoCliente (Not Null)
					 * @return string
					 */
					return $this->strTipoCliente;

				case 'RegistradoPor':
					/**
					 * Gets the value for strRegistradoPor (Not Null)
					 * @return string
					 */
					return $this->strRegistradoPor;

				case 'FechaRegistro':
					/**
					 * Gets the value for dttFechaRegistro (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFechaRegistro;

				case 'HoraRegistro':
					/**
					 * Gets the value for strHoraRegistro (Not Null)
					 * @return string
					 */
					return $this->strHoraRegistro;

				case 'ArchivoInput':
					/**
					 * Gets the value for strArchivoInput (Not Null)
					 * @return string
					 */
					return $this->strArchivoInput;

				case 'GuiaId':
					/**
					 * Gets the value for strGuiaId 
					 * @return string
					 */
					return $this->strGuiaId;

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
					 * Gets the value for strHoraProceso 
					 * @return string
					 */
					return $this->strHoraProceso;

				case 'CodiEsta':
					/**
					 * Gets the value for strCodiEsta 
					 * @return string
					 */
					return $this->strCodiEsta;

				case 'CodiCkpt':
					/**
					 * Gets the value for strCodiCkpt 
					 * @return string
					 */
					return $this->strCodiCkpt;

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

				case 'CierreCiclo':
					/**
					 * Gets the value for intCierreCiclo 
					 * @return integer
					 */
					return $this->intCierreCiclo;


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
				case 'CodigoTurpial':
					/**
					 * Sets the value for fltCodigoTurpial (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltCodigoTurpial = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RazonSocial':
					/**
					 * Sets the value for strRazonSocial (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strRazonSocial = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GuiaSodexo':
					/**
					 * Sets the value for strGuiaSodexo (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strGuiaSodexo = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CantidadEnvases':
					/**
					 * Sets the value for intCantidadEnvases (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCantidadEnvases = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaDespacho':
					/**
					 * Sets the value for strFechaDespacho (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaDespacho = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DireccionEntrega':
					/**
					 * Sets the value for strDireccionEntrega (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDireccionEntrega = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Ciudad':
					/**
					 * Sets the value for strCiudad (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCiudad = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Estado':
					/**
					 * Sets the value for strEstado (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEstado = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ZonaFiscal':
					/**
					 * Sets the value for strZonaFiscal 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strZonaFiscal = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TipoCliente':
					/**
					 * Sets the value for strTipoCliente (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTipoCliente = QType::Cast($mixValue, QType::String));
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

				case 'FechaRegistro':
					/**
					 * Sets the value for dttFechaRegistro (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaRegistro = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HoraRegistro':
					/**
					 * Sets the value for strHoraRegistro (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHoraRegistro = QType::Cast($mixValue, QType::String));
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

				case 'GuiaId':
					/**
					 * Sets the value for strGuiaId 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strGuiaId = QType::Cast($mixValue, QType::String));
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
					 * Sets the value for strHoraProceso 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHoraProceso = QType::Cast($mixValue, QType::String));
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

				case 'CierreCiclo':
					/**
					 * Sets the value for intCierreCiclo 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCierreCiclo = QType::Cast($mixValue, QType::Integer));
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
			return "sodexo_input";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[SodexoInput::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="SodexoInput"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="CodigoTurpial" type="xsd:float"/>';
			$strToReturn .= '<element name="RazonSocial" type="xsd:string"/>';
			$strToReturn .= '<element name="GuiaSodexo" type="xsd:string"/>';
			$strToReturn .= '<element name="CantidadEnvases" type="xsd:int"/>';
			$strToReturn .= '<element name="FechaDespacho" type="xsd:string"/>';
			$strToReturn .= '<element name="DireccionEntrega" type="xsd:string"/>';
			$strToReturn .= '<element name="Ciudad" type="xsd:string"/>';
			$strToReturn .= '<element name="Estado" type="xsd:string"/>';
			$strToReturn .= '<element name="ZonaFiscal" type="xsd:string"/>';
			$strToReturn .= '<element name="TipoCliente" type="xsd:string"/>';
			$strToReturn .= '<element name="RegistradoPor" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaRegistro" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="HoraRegistro" type="xsd:string"/>';
			$strToReturn .= '<element name="ArchivoInput" type="xsd:string"/>';
			$strToReturn .= '<element name="GuiaId" type="xsd:string"/>';
			$strToReturn .= '<element name="ProcesadoPor" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaProceso" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="HoraProceso" type="xsd:string"/>';
			$strToReturn .= '<element name="CodiEsta" type="xsd:string"/>';
			$strToReturn .= '<element name="CodiCkpt" type="xsd:string"/>';
			$strToReturn .= '<element name="FechCkpt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="HoraCkpt" type="xsd:string"/>';
			$strToReturn .= '<element name="CierreCiclo" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('SodexoInput', $strComplexTypeArray)) {
				$strComplexTypeArray['SodexoInput'] = SodexoInput::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, SodexoInput::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new SodexoInput();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'CodigoTurpial'))
				$objToReturn->fltCodigoTurpial = $objSoapObject->CodigoTurpial;
			if (property_exists($objSoapObject, 'RazonSocial'))
				$objToReturn->strRazonSocial = $objSoapObject->RazonSocial;
			if (property_exists($objSoapObject, 'GuiaSodexo'))
				$objToReturn->strGuiaSodexo = $objSoapObject->GuiaSodexo;
			if (property_exists($objSoapObject, 'CantidadEnvases'))
				$objToReturn->intCantidadEnvases = $objSoapObject->CantidadEnvases;
			if (property_exists($objSoapObject, 'FechaDespacho'))
				$objToReturn->strFechaDespacho = $objSoapObject->FechaDespacho;
			if (property_exists($objSoapObject, 'DireccionEntrega'))
				$objToReturn->strDireccionEntrega = $objSoapObject->DireccionEntrega;
			if (property_exists($objSoapObject, 'Ciudad'))
				$objToReturn->strCiudad = $objSoapObject->Ciudad;
			if (property_exists($objSoapObject, 'Estado'))
				$objToReturn->strEstado = $objSoapObject->Estado;
			if (property_exists($objSoapObject, 'ZonaFiscal'))
				$objToReturn->strZonaFiscal = $objSoapObject->ZonaFiscal;
			if (property_exists($objSoapObject, 'TipoCliente'))
				$objToReturn->strTipoCliente = $objSoapObject->TipoCliente;
			if (property_exists($objSoapObject, 'RegistradoPor'))
				$objToReturn->strRegistradoPor = $objSoapObject->RegistradoPor;
			if (property_exists($objSoapObject, 'FechaRegistro'))
				$objToReturn->dttFechaRegistro = new QDateTime($objSoapObject->FechaRegistro);
			if (property_exists($objSoapObject, 'HoraRegistro'))
				$objToReturn->strHoraRegistro = $objSoapObject->HoraRegistro;
			if (property_exists($objSoapObject, 'ArchivoInput'))
				$objToReturn->strArchivoInput = $objSoapObject->ArchivoInput;
			if (property_exists($objSoapObject, 'GuiaId'))
				$objToReturn->strGuiaId = $objSoapObject->GuiaId;
			if (property_exists($objSoapObject, 'ProcesadoPor'))
				$objToReturn->strProcesadoPor = $objSoapObject->ProcesadoPor;
			if (property_exists($objSoapObject, 'FechaProceso'))
				$objToReturn->dttFechaProceso = new QDateTime($objSoapObject->FechaProceso);
			if (property_exists($objSoapObject, 'HoraProceso'))
				$objToReturn->strHoraProceso = $objSoapObject->HoraProceso;
			if (property_exists($objSoapObject, 'CodiEsta'))
				$objToReturn->strCodiEsta = $objSoapObject->CodiEsta;
			if (property_exists($objSoapObject, 'CodiCkpt'))
				$objToReturn->strCodiCkpt = $objSoapObject->CodiCkpt;
			if (property_exists($objSoapObject, 'FechCkpt'))
				$objToReturn->dttFechCkpt = new QDateTime($objSoapObject->FechCkpt);
			if (property_exists($objSoapObject, 'HoraCkpt'))
				$objToReturn->strHoraCkpt = $objSoapObject->HoraCkpt;
			if (property_exists($objSoapObject, 'CierreCiclo'))
				$objToReturn->intCierreCiclo = $objSoapObject->CierreCiclo;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, SodexoInput::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttFechaRegistro)
				$objObject->dttFechaRegistro = $objObject->dttFechaRegistro->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechaProceso)
				$objObject->dttFechaProceso = $objObject->dttFechaProceso->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechCkpt)
				$objObject->dttFechCkpt = $objObject->dttFechCkpt->qFormat(QDateTime::FormatSoap);
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
			$iArray['CodigoTurpial'] = $this->fltCodigoTurpial;
			$iArray['RazonSocial'] = $this->strRazonSocial;
			$iArray['GuiaSodexo'] = $this->strGuiaSodexo;
			$iArray['CantidadEnvases'] = $this->intCantidadEnvases;
			$iArray['FechaDespacho'] = $this->strFechaDespacho;
			$iArray['DireccionEntrega'] = $this->strDireccionEntrega;
			$iArray['Ciudad'] = $this->strCiudad;
			$iArray['Estado'] = $this->strEstado;
			$iArray['ZonaFiscal'] = $this->strZonaFiscal;
			$iArray['TipoCliente'] = $this->strTipoCliente;
			$iArray['RegistradoPor'] = $this->strRegistradoPor;
			$iArray['FechaRegistro'] = $this->dttFechaRegistro;
			$iArray['HoraRegistro'] = $this->strHoraRegistro;
			$iArray['ArchivoInput'] = $this->strArchivoInput;
			$iArray['GuiaId'] = $this->strGuiaId;
			$iArray['ProcesadoPor'] = $this->strProcesadoPor;
			$iArray['FechaProceso'] = $this->dttFechaProceso;
			$iArray['HoraProceso'] = $this->strHoraProceso;
			$iArray['CodiEsta'] = $this->strCodiEsta;
			$iArray['CodiCkpt'] = $this->strCodiCkpt;
			$iArray['FechCkpt'] = $this->dttFechCkpt;
			$iArray['HoraCkpt'] = $this->strHoraCkpt;
			$iArray['CierreCiclo'] = $this->intCierreCiclo;
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
     * @property-read QQNode $CodigoTurpial
     * @property-read QQNode $RazonSocial
     * @property-read QQNode $GuiaSodexo
     * @property-read QQNode $CantidadEnvases
     * @property-read QQNode $FechaDespacho
     * @property-read QQNode $DireccionEntrega
     * @property-read QQNode $Ciudad
     * @property-read QQNode $Estado
     * @property-read QQNode $ZonaFiscal
     * @property-read QQNode $TipoCliente
     * @property-read QQNode $RegistradoPor
     * @property-read QQNode $FechaRegistro
     * @property-read QQNode $HoraRegistro
     * @property-read QQNode $ArchivoInput
     * @property-read QQNode $GuiaId
     * @property-read QQNode $ProcesadoPor
     * @property-read QQNode $FechaProceso
     * @property-read QQNode $HoraProceso
     * @property-read QQNode $CodiEsta
     * @property-read QQNode $CodiCkpt
     * @property-read QQNode $FechCkpt
     * @property-read QQNode $HoraCkpt
     * @property-read QQNode $CierreCiclo
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeSodexoInput extends QQNode {
		protected $strTableName = 'sodexo_input';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'SodexoInput';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'CodigoTurpial':
					return new QQNode('codigo_turpial', 'CodigoTurpial', 'Float', $this);
				case 'RazonSocial':
					return new QQNode('razon_social', 'RazonSocial', 'VarChar', $this);
				case 'GuiaSodexo':
					return new QQNode('guia_sodexo', 'GuiaSodexo', 'VarChar', $this);
				case 'CantidadEnvases':
					return new QQNode('cantidad_envases', 'CantidadEnvases', 'Integer', $this);
				case 'FechaDespacho':
					return new QQNode('fecha_despacho', 'FechaDespacho', 'VarChar', $this);
				case 'DireccionEntrega':
					return new QQNode('direccion_entrega', 'DireccionEntrega', 'VarChar', $this);
				case 'Ciudad':
					return new QQNode('ciudad', 'Ciudad', 'VarChar', $this);
				case 'Estado':
					return new QQNode('estado', 'Estado', 'VarChar', $this);
				case 'ZonaFiscal':
					return new QQNode('zona_fiscal', 'ZonaFiscal', 'VarChar', $this);
				case 'TipoCliente':
					return new QQNode('tipo_cliente', 'TipoCliente', 'VarChar', $this);
				case 'RegistradoPor':
					return new QQNode('registrado_por', 'RegistradoPor', 'VarChar', $this);
				case 'FechaRegistro':
					return new QQNode('fecha_registro', 'FechaRegistro', 'Date', $this);
				case 'HoraRegistro':
					return new QQNode('hora_registro', 'HoraRegistro', 'VarChar', $this);
				case 'ArchivoInput':
					return new QQNode('archivo_input', 'ArchivoInput', 'VarChar', $this);
				case 'GuiaId':
					return new QQNode('guia_id', 'GuiaId', 'VarChar', $this);
				case 'ProcesadoPor':
					return new QQNode('procesado_por', 'ProcesadoPor', 'VarChar', $this);
				case 'FechaProceso':
					return new QQNode('fecha_proceso', 'FechaProceso', 'Date', $this);
				case 'HoraProceso':
					return new QQNode('hora_proceso', 'HoraProceso', 'VarChar', $this);
				case 'CodiEsta':
					return new QQNode('codi_esta', 'CodiEsta', 'VarChar', $this);
				case 'CodiCkpt':
					return new QQNode('codi_ckpt', 'CodiCkpt', 'VarChar', $this);
				case 'FechCkpt':
					return new QQNode('fech_ckpt', 'FechCkpt', 'Date', $this);
				case 'HoraCkpt':
					return new QQNode('hora_ckpt', 'HoraCkpt', 'VarChar', $this);
				case 'CierreCiclo':
					return new QQNode('cierre_ciclo', 'CierreCiclo', 'Integer', $this);

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
     * @property-read QQNode $CodigoTurpial
     * @property-read QQNode $RazonSocial
     * @property-read QQNode $GuiaSodexo
     * @property-read QQNode $CantidadEnvases
     * @property-read QQNode $FechaDespacho
     * @property-read QQNode $DireccionEntrega
     * @property-read QQNode $Ciudad
     * @property-read QQNode $Estado
     * @property-read QQNode $ZonaFiscal
     * @property-read QQNode $TipoCliente
     * @property-read QQNode $RegistradoPor
     * @property-read QQNode $FechaRegistro
     * @property-read QQNode $HoraRegistro
     * @property-read QQNode $ArchivoInput
     * @property-read QQNode $GuiaId
     * @property-read QQNode $ProcesadoPor
     * @property-read QQNode $FechaProceso
     * @property-read QQNode $HoraProceso
     * @property-read QQNode $CodiEsta
     * @property-read QQNode $CodiCkpt
     * @property-read QQNode $FechCkpt
     * @property-read QQNode $HoraCkpt
     * @property-read QQNode $CierreCiclo
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeSodexoInput extends QQReverseReferenceNode {
		protected $strTableName = 'sodexo_input';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'SodexoInput';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'CodigoTurpial':
					return new QQNode('codigo_turpial', 'CodigoTurpial', 'double', $this);
				case 'RazonSocial':
					return new QQNode('razon_social', 'RazonSocial', 'string', $this);
				case 'GuiaSodexo':
					return new QQNode('guia_sodexo', 'GuiaSodexo', 'string', $this);
				case 'CantidadEnvases':
					return new QQNode('cantidad_envases', 'CantidadEnvases', 'integer', $this);
				case 'FechaDespacho':
					return new QQNode('fecha_despacho', 'FechaDespacho', 'string', $this);
				case 'DireccionEntrega':
					return new QQNode('direccion_entrega', 'DireccionEntrega', 'string', $this);
				case 'Ciudad':
					return new QQNode('ciudad', 'Ciudad', 'string', $this);
				case 'Estado':
					return new QQNode('estado', 'Estado', 'string', $this);
				case 'ZonaFiscal':
					return new QQNode('zona_fiscal', 'ZonaFiscal', 'string', $this);
				case 'TipoCliente':
					return new QQNode('tipo_cliente', 'TipoCliente', 'string', $this);
				case 'RegistradoPor':
					return new QQNode('registrado_por', 'RegistradoPor', 'string', $this);
				case 'FechaRegistro':
					return new QQNode('fecha_registro', 'FechaRegistro', 'QDateTime', $this);
				case 'HoraRegistro':
					return new QQNode('hora_registro', 'HoraRegistro', 'string', $this);
				case 'ArchivoInput':
					return new QQNode('archivo_input', 'ArchivoInput', 'string', $this);
				case 'GuiaId':
					return new QQNode('guia_id', 'GuiaId', 'string', $this);
				case 'ProcesadoPor':
					return new QQNode('procesado_por', 'ProcesadoPor', 'string', $this);
				case 'FechaProceso':
					return new QQNode('fecha_proceso', 'FechaProceso', 'QDateTime', $this);
				case 'HoraProceso':
					return new QQNode('hora_proceso', 'HoraProceso', 'string', $this);
				case 'CodiEsta':
					return new QQNode('codi_esta', 'CodiEsta', 'string', $this);
				case 'CodiCkpt':
					return new QQNode('codi_ckpt', 'CodiCkpt', 'string', $this);
				case 'FechCkpt':
					return new QQNode('fech_ckpt', 'FechCkpt', 'QDateTime', $this);
				case 'HoraCkpt':
					return new QQNode('hora_ckpt', 'HoraCkpt', 'string', $this);
				case 'CierreCiclo':
					return new QQNode('cierre_ciclo', 'CierreCiclo', 'integer', $this);

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
