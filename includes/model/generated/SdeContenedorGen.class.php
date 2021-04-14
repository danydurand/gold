<?php
	/**
	 * The abstract SdeContenedorGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the SdeContenedor subclass which
	 * extends this SdeContenedorGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the SdeContenedor class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property string $NumeCont the value for strNumeCont (PK)
	 * @property integer $CodiOper the value for intCodiOper (Not Null)
	 * @property QDateTime $Fecha the value for dttFecha (Not Null)
	 * @property string $StatCont the value for strStatCont 
	 * @property string $NombreChofer the value for strNombreChofer 
	 * @property string $CedulaChofer the value for strCedulaChofer 
	 * @property string $PlacaVehiculo the value for strPlacaVehiculo 
	 * @property string $DescipcionVehiculo the value for strDescipcionVehiculo 
	 * @property double $MontoFlete the value for fltMontoFlete 
	 * @property integer $Master the value for intMaster 
	 * @property integer $NumeroValijas the value for intNumeroValijas 
	 * @property string $Valijas the value for strValijas 
	 * @property integer $PaisId 	 
	 * @property string $Hora the value for strHora 
	 * @property SdeOperacion $CodiOperObject the value for the SdeOperacion object referenced by intCodiOper (Not Null)
	 * @property-read SdeContenedor $_ParentSdeContenedorAsSdeContCont the value for the private _objParentSdeContenedorAsSdeContCont (Read-Only) if set due to an expansion on the sde_cont_cont_assn association table
	 * @property-read SdeContenedor[] $_ParentSdeContenedorAsSdeContContArray the value for the private _objParentSdeContenedorAsSdeContContArray (Read-Only) if set due to an ExpandAsArray on the sde_cont_cont_assn association table
	 * @property-read SdeContenedor $_SdeContenedorAsSdeContCont the value for the private _objSdeContenedorAsSdeContCont (Read-Only) if set due to an expansion on the sde_cont_cont_assn association table
	 * @property-read SdeContenedor[] $_SdeContenedorAsSdeContContArray the value for the private _objSdeContenedorAsSdeContContArray (Read-Only) if set due to an ExpandAsArray on the sde_cont_cont_assn association table
	 * @property-read GuiaPiezas $_GuiaPiezasAsGuia the value for the private _objGuiaPiezasAsGuia (Read-Only) if set due to an expansion on the sde_contenedor_guia_assn association table
	 * @property-read GuiaPiezas[] $_GuiaPiezasAsGuiaArray the value for the private _objGuiaPiezasAsGuiaArray (Read-Only) if set due to an ExpandAsArray on the sde_contenedor_guia_assn association table
	 * @property-read ContenedorCkpt $_ContenedorCkptAsValija the value for the private _objContenedorCkptAsValija (Read-Only) if set due to an expansion on the contenedor_ckpt.valija reverse relationship
	 * @property-read ContenedorCkpt[] $_ContenedorCkptAsValijaArray the value for the private _objContenedorCkptAsValijaArray (Read-Only) if set due to an ExpandAsArray on the contenedor_ckpt.valija reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class SdeContenedorGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK column sde_contenedor.nume_cont
		 * @var string strNumeCont
		 */
		protected $strNumeCont;
		const NumeContMaxLength = 20;
		const NumeContDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var string __strNumeCont;
		 */
		protected $__strNumeCont;

		/**
		 * Protected member variable that maps to the database column sde_contenedor.codi_oper
		 * @var integer intCodiOper
		 */
		protected $intCodiOper;
		const CodiOperDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_contenedor.fecha
		 * @var QDateTime dttFecha
		 */
		protected $dttFecha;
		const FechaDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_contenedor.stat_cont
		 * @var string strStatCont
		 */
		protected $strStatCont;
		const StatContMaxLength = 1;
		const StatContDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_contenedor.nombre_chofer
		 * @var string strNombreChofer
		 */
		protected $strNombreChofer;
		const NombreChoferMaxLength = 50;
		const NombreChoferDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_contenedor.cedula_chofer
		 * @var string strCedulaChofer
		 */
		protected $strCedulaChofer;
		const CedulaChoferMaxLength = 50;
		const CedulaChoferDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_contenedor.placa_vehiculo
		 * @var string strPlacaVehiculo
		 */
		protected $strPlacaVehiculo;
		const PlacaVehiculoMaxLength = 10;
		const PlacaVehiculoDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_contenedor.descipcion_vehiculo
		 * @var string strDescipcionVehiculo
		 */
		protected $strDescipcionVehiculo;
		const DescipcionVehiculoMaxLength = 50;
		const DescipcionVehiculoDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_contenedor.monto_flete
		 * @var double fltMontoFlete
		 */
		protected $fltMontoFlete;
		const MontoFleteDefault = 0;


		/**
		 * Protected member variable that maps to the database column sde_contenedor.master
		 * @var integer intMaster
		 */
		protected $intMaster;
		const MasterDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_contenedor.numero_valijas
		 * @var integer intNumeroValijas
		 */
		protected $intNumeroValijas;
		const NumeroValijasDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_contenedor.valijas
		 * @var string strValijas
		 */
		protected $strValijas;
		const ValijasMaxLength = 250;
		const ValijasDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_contenedor.pais_id
		 * 			 * @var integer intPaisId
		 */
		protected $intPaisId;
		const PaisIdDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_contenedor.hora
		 * @var string strHora
		 */
		protected $strHora;
		const HoraMaxLength = 5;
		const HoraDefault = null;


		/**
		 * Private member variable that stores a reference to a single ParentSdeContenedorAsSdeContCont object
		 * (of type SdeContenedor), if this SdeContenedor object was restored with
		 * an expansion on the sde_cont_cont_assn association table.
		 * @var SdeContenedor _objParentSdeContenedorAsSdeContCont;
		 */
		private $_objParentSdeContenedorAsSdeContCont;

		/**
		 * Private member variable that stores a reference to an array of ParentSdeContenedorAsSdeContCont objects
		 * (of type SdeContenedor[]), if this SdeContenedor object was restored with
		 * an ExpandAsArray on the sde_cont_cont_assn association table.
		 * @var SdeContenedor[] _objParentSdeContenedorAsSdeContContArray;
		 */
		private $_objParentSdeContenedorAsSdeContContArray = null;

		/**
		 * Private member variable that stores a reference to a single SdeContenedorAsSdeContCont object
		 * (of type SdeContenedor), if this SdeContenedor object was restored with
		 * an expansion on the sde_cont_cont_assn association table.
		 * @var SdeContenedor _objSdeContenedorAsSdeContCont;
		 */
		private $_objSdeContenedorAsSdeContCont;

		/**
		 * Private member variable that stores a reference to an array of SdeContenedorAsSdeContCont objects
		 * (of type SdeContenedor[]), if this SdeContenedor object was restored with
		 * an ExpandAsArray on the sde_cont_cont_assn association table.
		 * @var SdeContenedor[] _objSdeContenedorAsSdeContContArray;
		 */
		private $_objSdeContenedorAsSdeContContArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiaPiezasAsGuia object
		 * (of type GuiaPiezas), if this SdeContenedor object was restored with
		 * an expansion on the sde_contenedor_guia_assn association table.
		 * @var GuiaPiezas _objGuiaPiezasAsGuia;
		 */
		private $_objGuiaPiezasAsGuia;

		/**
		 * Private member variable that stores a reference to an array of GuiaPiezasAsGuia objects
		 * (of type GuiaPiezas[]), if this SdeContenedor object was restored with
		 * an ExpandAsArray on the sde_contenedor_guia_assn association table.
		 * @var GuiaPiezas[] _objGuiaPiezasAsGuiaArray;
		 */
		private $_objGuiaPiezasAsGuiaArray = null;

		/**
		 * Private member variable that stores a reference to a single ContenedorCkptAsValija object
		 * (of type ContenedorCkpt), if this SdeContenedor object was restored with
		 * an expansion on the contenedor_ckpt association table.
		 * @var ContenedorCkpt _objContenedorCkptAsValija;
		 */
		private $_objContenedorCkptAsValija;

		/**
		 * Private member variable that stores a reference to an array of ContenedorCkptAsValija objects
		 * (of type ContenedorCkpt[]), if this SdeContenedor object was restored with
		 * an ExpandAsArray on the contenedor_ckpt association table.
		 * @var ContenedorCkpt[] _objContenedorCkptAsValijaArray;
		 */
		private $_objContenedorCkptAsValijaArray = null;

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
		 * in the database column sde_contenedor.codi_oper.
		 *
		 * NOTE: Always use the CodiOperObject property getter to correctly retrieve this SdeOperacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var SdeOperacion objCodiOperObject
		 */
		protected $objCodiOperObject;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->strNumeCont = SdeContenedor::NumeContDefault;
			$this->intCodiOper = SdeContenedor::CodiOperDefault;
			$this->dttFecha = (SdeContenedor::FechaDefault === null)?null:new QDateTime(SdeContenedor::FechaDefault);
			$this->strStatCont = SdeContenedor::StatContDefault;
			$this->strNombreChofer = SdeContenedor::NombreChoferDefault;
			$this->strCedulaChofer = SdeContenedor::CedulaChoferDefault;
			$this->strPlacaVehiculo = SdeContenedor::PlacaVehiculoDefault;
			$this->strDescipcionVehiculo = SdeContenedor::DescipcionVehiculoDefault;
			$this->fltMontoFlete = SdeContenedor::MontoFleteDefault;
			$this->intMaster = SdeContenedor::MasterDefault;
			$this->intNumeroValijas = SdeContenedor::NumeroValijasDefault;
			$this->strValijas = SdeContenedor::ValijasDefault;
			$this->intPaisId = SdeContenedor::PaisIdDefault;
			$this->strHora = SdeContenedor::HoraDefault;
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
		 * Load a SdeContenedor from PK Info
		 * @param string $strNumeCont
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeContenedor
		 */
		public static function Load($strNumeCont, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'SdeContenedor', $strNumeCont);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = SdeContenedor::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::SdeContenedor()->NumeCont, $strNumeCont)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all SdeContenedors
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeContenedor[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call SdeContenedor::QueryArray to perform the LoadAll query
			try {
				return SdeContenedor::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all SdeContenedors
		 * @return int
		 */
		public static function CountAll() {
			// Call SdeContenedor::QueryCount to perform the CountAll query
			return SdeContenedor::QueryCount(QQ::All());
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
			$objDatabase = SdeContenedor::GetDatabase();

			// Create/Build out the QueryBuilder object with SdeContenedor-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'sde_contenedor');

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
				SdeContenedor::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('sde_contenedor');

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
		 * Static Qcubed Query method to query for a single SdeContenedor object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return SdeContenedor the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SdeContenedor::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new SdeContenedor object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = SdeContenedor::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->strNumeCont][] = $objItem;
		
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
				return SdeContenedor::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of SdeContenedor objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return SdeContenedor[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SdeContenedor::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return SdeContenedor::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = SdeContenedor::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of SdeContenedor objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SdeContenedor::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = SdeContenedor::GetDatabase();

			$strQuery = SdeContenedor::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/sdecontenedor', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = SdeContenedor::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this SdeContenedor
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'sde_contenedor';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'nume_cont', $strAliasPrefix . 'nume_cont');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'nume_cont', $strAliasPrefix . 'nume_cont');
			    $objBuilder->AddSelectItem($strTableName, 'codi_oper', $strAliasPrefix . 'codi_oper');
			    $objBuilder->AddSelectItem($strTableName, 'fecha', $strAliasPrefix . 'fecha');
			    $objBuilder->AddSelectItem($strTableName, 'stat_cont', $strAliasPrefix . 'stat_cont');
			    $objBuilder->AddSelectItem($strTableName, 'nombre_chofer', $strAliasPrefix . 'nombre_chofer');
			    $objBuilder->AddSelectItem($strTableName, 'cedula_chofer', $strAliasPrefix . 'cedula_chofer');
			    $objBuilder->AddSelectItem($strTableName, 'placa_vehiculo', $strAliasPrefix . 'placa_vehiculo');
			    $objBuilder->AddSelectItem($strTableName, 'descipcion_vehiculo', $strAliasPrefix . 'descipcion_vehiculo');
			    $objBuilder->AddSelectItem($strTableName, 'monto_flete', $strAliasPrefix . 'monto_flete');
			    $objBuilder->AddSelectItem($strTableName, 'master', $strAliasPrefix . 'master');
			    $objBuilder->AddSelectItem($strTableName, 'numero_valijas', $strAliasPrefix . 'numero_valijas');
			    $objBuilder->AddSelectItem($strTableName, 'valijas', $strAliasPrefix . 'valijas');
			    $objBuilder->AddSelectItem($strTableName, 'pais_id', $strAliasPrefix . 'pais_id');
			    $objBuilder->AddSelectItem($strTableName, 'hora', $strAliasPrefix . 'hora');
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
			
			$strAlias = $strAliasPrefix . 'nume_cont';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->strNumeCont != $objDbRow->GetColumn($strColumnAlias, 'VarChar')) {
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
		 * Instantiate a SdeContenedor from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this SdeContenedor::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a SdeContenedor, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['nume_cont']) ? $strColumnAliasArray['nume_cont'] : 'nume_cont';
				$key = $objDbRow->GetColumn($strColumnAlias, 'VarChar');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (SdeContenedor::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the SdeContenedor object
			$objToReturn = new SdeContenedor();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'nume_cont';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNumeCont = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$objToReturn->__strNumeCont = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codi_oper';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiOper = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fecha';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFecha = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'stat_cont';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strStatCont = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'nombre_chofer';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombreChofer = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'cedula_chofer';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCedulaChofer = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'placa_vehiculo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strPlacaVehiculo = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'descipcion_vehiculo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescipcionVehiculo = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'monto_flete';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoFlete = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'master';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intMaster = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'numero_valijas';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intNumeroValijas = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'valijas';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strValijas = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'pais_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intPaisId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'hora';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHora = $objDbRow->GetColumn($strAliasName, 'VarChar');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->NumeCont != $objPreviousItem->NumeCont) {
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
				$strAliasPrefix = 'sde_contenedor__';

			// Check for CodiOperObject Early Binding
			$strAlias = $strAliasPrefix . 'codi_oper__codi_oper';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['codi_oper']) ? null : $objExpansionAliasArray['codi_oper']);
				$objToReturn->objCodiOperObject = SdeOperacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'codi_oper__', $objExpansionNode, null, $strColumnAliasArray);
			}

				
			// Check for ParentSdeContenedorAsSdeContCont Virtual Binding
			$strAlias = $strAliasPrefix . 'parentsdecontenedorassdecontcont__nume_vali__nume_cont';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['parentsdecontenedorassdecontcont']) ? null : $objExpansionAliasArray['parentsdecontenedorassdecontcont']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objParentSdeContenedorAsSdeContContArray) {
				$objToReturn->_objParentSdeContenedorAsSdeContContArray = array();
			}
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objParentSdeContenedorAsSdeContContArray[] = SdeContenedor::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentsdecontenedorassdecontcont__nume_vali__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objParentSdeContenedorAsSdeContCont)) {
					$objToReturn->_objParentSdeContenedorAsSdeContCont = SdeContenedor::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentsdecontenedorassdecontcont__nume_vali__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for SdeContenedorAsSdeContCont Virtual Binding
			$strAlias = $strAliasPrefix . 'sdecontenedorassdecontcont__nume_cont__nume_cont';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['sdecontenedorassdecontcont']) ? null : $objExpansionAliasArray['sdecontenedorassdecontcont']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objSdeContenedorAsSdeContContArray) {
				$objToReturn->_objSdeContenedorAsSdeContContArray = array();
			}
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objSdeContenedorAsSdeContContArray[] = SdeContenedor::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sdecontenedorassdecontcont__nume_cont__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objSdeContenedorAsSdeContCont)) {
					$objToReturn->_objSdeContenedorAsSdeContCont = SdeContenedor::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sdecontenedorassdecontcont__nume_cont__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiaPiezasAsGuia Virtual Binding
			$strAlias = $strAliasPrefix . 'guiapiezasasguia__guia_pieza_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiapiezasasguia']) ? null : $objExpansionAliasArray['guiapiezasasguia']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiaPiezasAsGuiaArray) {
				$objToReturn->_objGuiaPiezasAsGuiaArray = array();
			}
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiaPiezasAsGuiaArray[] = GuiaPiezas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiapiezasasguia__guia_pieza_id__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiaPiezasAsGuia)) {
					$objToReturn->_objGuiaPiezasAsGuia = GuiaPiezas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiapiezasasguia__guia_pieza_id__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}


			// Check for ContenedorCkptAsValija Virtual Binding
			$strAlias = $strAliasPrefix . 'contenedorckptasvalija__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['contenedorckptasvalija']) ? null : $objExpansionAliasArray['contenedorckptasvalija']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objContenedorCkptAsValijaArray)
				$objToReturn->_objContenedorCkptAsValijaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objContenedorCkptAsValijaArray[] = ContenedorCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'contenedorckptasvalija__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objContenedorCkptAsValija)) {
					$objToReturn->_objContenedorCkptAsValija = ContenedorCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'contenedorckptasvalija__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of SdeContenedors from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return SdeContenedor[]
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
					$objItem = SdeContenedor::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->strNumeCont][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = SdeContenedor::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single SdeContenedor object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return SdeContenedor next row resulting from the query
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
			return SdeContenedor::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single SdeContenedor object,
		 * by NumeCont Index(es)
		 * @param string $strNumeCont
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeContenedor
		*/
		public static function LoadByNumeCont($strNumeCont, $objOptionalClauses = null) {
			return SdeContenedor::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::SdeContenedor()->NumeCont, $strNumeCont)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of SdeContenedor objects,
		 * by CodiOper Index(es)
		 * @param integer $intCodiOper
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeContenedor[]
		*/
		public static function LoadArrayByCodiOper($intCodiOper, $objOptionalClauses = null) {
			// Call SdeContenedor::QueryArray to perform the LoadArrayByCodiOper query
			try {
				return SdeContenedor::QueryArray(
					QQ::Equal(QQN::SdeContenedor()->CodiOper, $intCodiOper),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SdeContenedors
		 * by CodiOper Index(es)
		 * @param integer $intCodiOper
		 * @return int
		*/
		public static function CountByCodiOper($intCodiOper) {
			// Call SdeContenedor::QueryCount to perform the CountByCodiOper query
			return SdeContenedor::QueryCount(
				QQ::Equal(QQN::SdeContenedor()->CodiOper, $intCodiOper)
			);
		}

		/**
		 * Load an array of SdeContenedor objects,
		 * by StatCont Index(es)
		 * @param string $strStatCont
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeContenedor[]
		*/
		public static function LoadArrayByStatCont($strStatCont, $objOptionalClauses = null) {
			// Call SdeContenedor::QueryArray to perform the LoadArrayByStatCont query
			try {
				return SdeContenedor::QueryArray(
					QQ::Equal(QQN::SdeContenedor()->StatCont, $strStatCont),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SdeContenedors
		 * by StatCont Index(es)
		 * @param string $strStatCont
		 * @return int
		*/
		public static function CountByStatCont($strStatCont) {
			// Call SdeContenedor::QueryCount to perform the CountByStatCont query
			return SdeContenedor::QueryCount(
				QQ::Equal(QQN::SdeContenedor()->StatCont, $strStatCont)
			);
		}

		/**
		 * Load an array of SdeContenedor objects,
		 * by Fecha Index(es)
		 * @param QDateTime $dttFecha
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeContenedor[]
		*/
		public static function LoadArrayByFecha($dttFecha, $objOptionalClauses = null) {
			// Call SdeContenedor::QueryArray to perform the LoadArrayByFecha query
			try {
				return SdeContenedor::QueryArray(
					QQ::Equal(QQN::SdeContenedor()->Fecha, $dttFecha),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SdeContenedors
		 * by Fecha Index(es)
		 * @param QDateTime $dttFecha
		 * @return int
		*/
		public static function CountByFecha($dttFecha) {
			// Call SdeContenedor::QueryCount to perform the CountByFecha query
			return SdeContenedor::QueryCount(
				QQ::Equal(QQN::SdeContenedor()->Fecha, $dttFecha)
			);
		}

		/**
		 * Load an array of SdeContenedor objects,
		 * by CodiOper, Fecha Index(es)
		 * @param integer $intCodiOper
		 * @param QDateTime $dttFecha
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeContenedor[]
		*/
		public static function LoadArrayByCodiOperFecha($intCodiOper, $dttFecha, $objOptionalClauses = null) {
			// Call SdeContenedor::QueryArray to perform the LoadArrayByCodiOperFecha query
			try {
				return SdeContenedor::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::SdeContenedor()->CodiOper, $intCodiOper),
					QQ::Equal(QQN::SdeContenedor()->Fecha, $dttFecha)					)
,
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SdeContenedors
		 * by CodiOper, Fecha Index(es)
		 * @param integer $intCodiOper
		 * @param QDateTime $dttFecha
		 * @return int
		*/
		public static function CountByCodiOperFecha($intCodiOper, $dttFecha) {
			// Call SdeContenedor::QueryCount to perform the CountByCodiOperFecha query
			return SdeContenedor::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::SdeContenedor()->CodiOper, $intCodiOper),
				QQ::Equal(QQN::SdeContenedor()->Fecha, $dttFecha)				)

			);
		}

		/**
		 * Load an array of SdeContenedor objects,
		 * by CodiOper, StatCont Index(es)
		 * @param integer $intCodiOper
		 * @param string $strStatCont
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeContenedor[]
		*/
		public static function LoadArrayByCodiOperStatCont($intCodiOper, $strStatCont, $objOptionalClauses = null) {
			// Call SdeContenedor::QueryArray to perform the LoadArrayByCodiOperStatCont query
			try {
				return SdeContenedor::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::SdeContenedor()->CodiOper, $intCodiOper),
					QQ::Equal(QQN::SdeContenedor()->StatCont, $strStatCont)					)
,
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SdeContenedors
		 * by CodiOper, StatCont Index(es)
		 * @param integer $intCodiOper
		 * @param string $strStatCont
		 * @return int
		*/
		public static function CountByCodiOperStatCont($intCodiOper, $strStatCont) {
			// Call SdeContenedor::QueryCount to perform the CountByCodiOperStatCont query
			return SdeContenedor::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::SdeContenedor()->CodiOper, $intCodiOper),
				QQ::Equal(QQN::SdeContenedor()->StatCont, $strStatCont)				)

			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////
			/**
		 * Load an array of SdeContenedor objects for a given ParentSdeContenedorAsSdeContCont
		 * via the sde_cont_cont_assn table
		 * @param string $strNumeVali
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeContenedor[]
		*/
		public static function LoadArrayByParentSdeContenedorAsSdeContCont($strNumeVali, $objOptionalClauses = null, $objClauses = null) {
			// Call SdeContenedor::QueryArray to perform the LoadArrayByParentSdeContenedorAsSdeContCont query
			try {
				return SdeContenedor::QueryArray(
					QQ::Equal(QQN::SdeContenedor()->ParentSdeContenedorAsSdeContCont->NumeVali, $strNumeVali),
					$objOptionalClauses, $objClauses 
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SdeContenedors for a given ParentSdeContenedorAsSdeContCont
		 * via the sde_cont_cont_assn table
		 * @param string $strNumeVali
		 * @return int
		*/
		public static function CountByParentSdeContenedorAsSdeContCont($strNumeVali) {
			return SdeContenedor::QueryCount(
				QQ::Equal(QQN::SdeContenedor()->ParentSdeContenedorAsSdeContCont->NumeVali, $strNumeVali)
			);
		}
			/**
		 * Load an array of SdeContenedor objects for a given SdeContenedorAsSdeContCont
		 * via the sde_cont_cont_assn table
		 * @param string $strNumeCont
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeContenedor[]
		*/
		public static function LoadArrayBySdeContenedorAsSdeContCont($strNumeCont, $objOptionalClauses = null, $objClauses = null) {
			// Call SdeContenedor::QueryArray to perform the LoadArrayBySdeContenedorAsSdeContCont query
			try {
				return SdeContenedor::QueryArray(
					QQ::Equal(QQN::SdeContenedor()->SdeContenedorAsSdeContCont->NumeCont, $strNumeCont),
					$objOptionalClauses, $objClauses 
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SdeContenedors for a given SdeContenedorAsSdeContCont
		 * via the sde_cont_cont_assn table
		 * @param string $strNumeCont
		 * @return int
		*/
		public static function CountBySdeContenedorAsSdeContCont($strNumeCont) {
			return SdeContenedor::QueryCount(
				QQ::Equal(QQN::SdeContenedor()->SdeContenedorAsSdeContCont->NumeCont, $strNumeCont)
			);
		}
			/**
		 * Load an array of GuiaPiezas objects for a given GuiaPiezasAsGuia
		 * via the sde_contenedor_guia_assn table
		 * @param integer $intGuiaPiezaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeContenedor[]
		*/
		public static function LoadArrayByGuiaPiezasAsGuia($intGuiaPiezaId, $objOptionalClauses = null, $objClauses = null) {
			// Call SdeContenedor::QueryArray to perform the LoadArrayByGuiaPiezasAsGuia query
			try {
				return SdeContenedor::QueryArray(
					QQ::Equal(QQN::SdeContenedor()->GuiaPiezasAsGuia->GuiaPiezaId, $intGuiaPiezaId),
					$objOptionalClauses, $objClauses 
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SdeContenedors for a given GuiaPiezasAsGuia
		 * via the sde_contenedor_guia_assn table
		 * @param integer $intGuiaPiezaId
		 * @return int
		*/
		public static function CountByGuiaPiezasAsGuia($intGuiaPiezaId) {
			return SdeContenedor::QueryCount(
				QQ::Equal(QQN::SdeContenedor()->GuiaPiezasAsGuia->GuiaPiezaId, $intGuiaPiezaId)
			);
		}





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this SdeContenedor
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = SdeContenedor::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `sde_contenedor` (
							`nume_cont`,
							`codi_oper`,
							`fecha`,
							`stat_cont`,
							`nombre_chofer`,
							`cedula_chofer`,
							`placa_vehiculo`,
							`descipcion_vehiculo`,
							`monto_flete`,
							`master`,
							`numero_valijas`,
							`valijas`,
							`pais_id`,
							`hora`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strNumeCont) . ',
							' . $objDatabase->SqlVariable($this->intCodiOper) . ',
							' . $objDatabase->SqlVariable($this->dttFecha) . ',
							' . $objDatabase->SqlVariable($this->strStatCont) . ',
							' . $objDatabase->SqlVariable($this->strNombreChofer) . ',
							' . $objDatabase->SqlVariable($this->strCedulaChofer) . ',
							' . $objDatabase->SqlVariable($this->strPlacaVehiculo) . ',
							' . $objDatabase->SqlVariable($this->strDescipcionVehiculo) . ',
							' . $objDatabase->SqlVariable($this->fltMontoFlete) . ',
							' . $objDatabase->SqlVariable($this->intMaster) . ',
							' . $objDatabase->SqlVariable($this->intNumeroValijas) . ',
							' . $objDatabase->SqlVariable($this->strValijas) . ',
							' . $objDatabase->SqlVariable($this->intPaisId) . ',
							' . $objDatabase->SqlVariable($this->strHora) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`sde_contenedor`
						SET
							`nume_cont` = ' . $objDatabase->SqlVariable($this->strNumeCont) . ',
							`codi_oper` = ' . $objDatabase->SqlVariable($this->intCodiOper) . ',
							`fecha` = ' . $objDatabase->SqlVariable($this->dttFecha) . ',
							`stat_cont` = ' . $objDatabase->SqlVariable($this->strStatCont) . ',
							`nombre_chofer` = ' . $objDatabase->SqlVariable($this->strNombreChofer) . ',
							`cedula_chofer` = ' . $objDatabase->SqlVariable($this->strCedulaChofer) . ',
							`placa_vehiculo` = ' . $objDatabase->SqlVariable($this->strPlacaVehiculo) . ',
							`descipcion_vehiculo` = ' . $objDatabase->SqlVariable($this->strDescipcionVehiculo) . ',
							`monto_flete` = ' . $objDatabase->SqlVariable($this->fltMontoFlete) . ',
							`master` = ' . $objDatabase->SqlVariable($this->intMaster) . ',
							`numero_valijas` = ' . $objDatabase->SqlVariable($this->intNumeroValijas) . ',
							`valijas` = ' . $objDatabase->SqlVariable($this->strValijas) . ',
							`pais_id` = ' . $objDatabase->SqlVariable($this->intPaisId) . ',
							`hora` = ' . $objDatabase->SqlVariable($this->strHora) . '
						WHERE
							`nume_cont` = ' . $objDatabase->SqlVariable($this->__strNumeCont) . '
					');
				}
					

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__strNumeCont = $this->strNumeCont;


			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this SdeContenedor
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->strNumeCont)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this SdeContenedor with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = SdeContenedor::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sde_contenedor`
				WHERE
					`nume_cont` = ' . $objDatabase->SqlVariable($this->strNumeCont) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this SdeContenedor ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'SdeContenedor', $this->strNumeCont);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all SdeContenedors
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = SdeContenedor::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sde_contenedor`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate sde_contenedor table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = SdeContenedor::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `sde_contenedor`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this SdeContenedor from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved SdeContenedor object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = SdeContenedor::Load($this->strNumeCont);

			// Update $this's local variables to match
			$this->strNumeCont = $objReloaded->strNumeCont;
			$this->__strNumeCont = $this->strNumeCont;
			$this->CodiOper = $objReloaded->CodiOper;
			$this->dttFecha = $objReloaded->dttFecha;
			$this->strStatCont = $objReloaded->strStatCont;
			$this->strNombreChofer = $objReloaded->strNombreChofer;
			$this->strCedulaChofer = $objReloaded->strCedulaChofer;
			$this->strPlacaVehiculo = $objReloaded->strPlacaVehiculo;
			$this->strDescipcionVehiculo = $objReloaded->strDescipcionVehiculo;
			$this->fltMontoFlete = $objReloaded->fltMontoFlete;
			$this->intMaster = $objReloaded->intMaster;
			$this->intNumeroValijas = $objReloaded->intNumeroValijas;
			$this->strValijas = $objReloaded->strValijas;
			$this->intPaisId = $objReloaded->intPaisId;
			$this->strHora = $objReloaded->strHora;
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
				case 'NumeCont':
					/**
					 * Gets the value for strNumeCont (PK)
					 * @return string
					 */
					return $this->strNumeCont;

				case 'CodiOper':
					/**
					 * Gets the value for intCodiOper (Not Null)
					 * @return integer
					 */
					return $this->intCodiOper;

				case 'Fecha':
					/**
					 * Gets the value for dttFecha (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFecha;

				case 'StatCont':
					/**
					 * Gets the value for strStatCont 
					 * @return string
					 */
					return $this->strStatCont;

				case 'NombreChofer':
					/**
					 * Gets the value for strNombreChofer 
					 * @return string
					 */
					return $this->strNombreChofer;

				case 'CedulaChofer':
					/**
					 * Gets the value for strCedulaChofer 
					 * @return string
					 */
					return $this->strCedulaChofer;

				case 'PlacaVehiculo':
					/**
					 * Gets the value for strPlacaVehiculo 
					 * @return string
					 */
					return $this->strPlacaVehiculo;

				case 'DescipcionVehiculo':
					/**
					 * Gets the value for strDescipcionVehiculo 
					 * @return string
					 */
					return $this->strDescipcionVehiculo;

				case 'MontoFlete':
					/**
					 * Gets the value for fltMontoFlete 
					 * @return double
					 */
					return $this->fltMontoFlete;

				case 'Master':
					/**
					 * Gets the value for intMaster 
					 * @return integer
					 */
					return $this->intMaster;

				case 'NumeroValijas':
					/**
					 * Gets the value for intNumeroValijas 
					 * @return integer
					 */
					return $this->intNumeroValijas;

				case 'Valijas':
					/**
					 * Gets the value for strValijas 
					 * @return string
					 */
					return $this->strValijas;

				case 'PaisId':
					/**
					 * Gets the value for intPaisId 
					 * @return integer
					 */
					return $this->intPaisId;

				case 'Hora':
					/**
					 * Gets the value for strHora 
					 * @return string
					 */
					return $this->strHora;


				///////////////////
				// Member Objects
				///////////////////
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


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_ParentSdeContenedorAsSdeContCont':
					/**
					 * Gets the value for the private _objParentSdeContenedorAsSdeContCont (Read-Only)
					 * if set due to an expansion on the sde_cont_cont_assn association table
					 * @return SdeContenedor
					 */
					return $this->_objParentSdeContenedorAsSdeContCont;

				case '_ParentSdeContenedorAsSdeContContArray':
					/**
					 * Gets the value for the private _objParentSdeContenedorAsSdeContContArray (Read-Only)
					 * if set due to an ExpandAsArray on the sde_cont_cont_assn association table
					 * @return SdeContenedor[]
					 */
					return $this->_objParentSdeContenedorAsSdeContContArray;

				case '_SdeContenedorAsSdeContCont':
					/**
					 * Gets the value for the private _objSdeContenedorAsSdeContCont (Read-Only)
					 * if set due to an expansion on the sde_cont_cont_assn association table
					 * @return SdeContenedor
					 */
					return $this->_objSdeContenedorAsSdeContCont;

				case '_SdeContenedorAsSdeContContArray':
					/**
					 * Gets the value for the private _objSdeContenedorAsSdeContContArray (Read-Only)
					 * if set due to an ExpandAsArray on the sde_cont_cont_assn association table
					 * @return SdeContenedor[]
					 */
					return $this->_objSdeContenedorAsSdeContContArray;

				case '_GuiaPiezasAsGuia':
					/**
					 * Gets the value for the private _objGuiaPiezasAsGuia (Read-Only)
					 * if set due to an expansion on the sde_contenedor_guia_assn association table
					 * @return GuiaPiezas
					 */
					return $this->_objGuiaPiezasAsGuia;

				case '_GuiaPiezasAsGuiaArray':
					/**
					 * Gets the value for the private _objGuiaPiezasAsGuiaArray (Read-Only)
					 * if set due to an ExpandAsArray on the sde_contenedor_guia_assn association table
					 * @return GuiaPiezas[]
					 */
					return $this->_objGuiaPiezasAsGuiaArray;

				case '_ContenedorCkptAsValija':
					/**
					 * Gets the value for the private _objContenedorCkptAsValija (Read-Only)
					 * if set due to an expansion on the contenedor_ckpt.valija reverse relationship
					 * @return ContenedorCkpt
					 */
					return $this->_objContenedorCkptAsValija;

				case '_ContenedorCkptAsValijaArray':
					/**
					 * Gets the value for the private _objContenedorCkptAsValijaArray (Read-Only)
					 * if set due to an ExpandAsArray on the contenedor_ckpt.valija reverse relationship
					 * @return ContenedorCkpt[]
					 */
					return $this->_objContenedorCkptAsValijaArray;


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
				case 'NumeCont':
					/**
					 * Sets the value for strNumeCont (PK)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNumeCont = QType::Cast($mixValue, QType::String));
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

				case 'StatCont':
					/**
					 * Sets the value for strStatCont 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strStatCont = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NombreChofer':
					/**
					 * Sets the value for strNombreChofer 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNombreChofer = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CedulaChofer':
					/**
					 * Sets the value for strCedulaChofer 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCedulaChofer = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PlacaVehiculo':
					/**
					 * Sets the value for strPlacaVehiculo 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strPlacaVehiculo = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DescipcionVehiculo':
					/**
					 * Sets the value for strDescipcionVehiculo 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescipcionVehiculo = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoFlete':
					/**
					 * Sets the value for fltMontoFlete 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoFlete = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Master':
					/**
					 * Sets the value for intMaster 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intMaster = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NumeroValijas':
					/**
					 * Sets the value for intNumeroValijas 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intNumeroValijas = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Valijas':
					/**
					 * Sets the value for strValijas 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strValijas = QType::Cast($mixValue, QType::String));
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
						return ($this->intPaisId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Hora':
					/**
					 * Sets the value for strHora 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHora = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
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
							throw new QCallerException('Unable to set an unsaved CodiOperObject for this SdeContenedor');

						// Update Local Member Variables
						$this->objCodiOperObject = $mixValue;
						$this->intCodiOper = $mixValue->CodiOper;

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
			if ($this->CountContenedorCkptsAsValija()) {
				$arrTablRela[] = 'contenedor_ckpt';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for ContenedorCkptAsValija
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ContenedorCkptsAsValija as an array of ContenedorCkpt objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ContenedorCkpt[]
		*/
		public function GetContenedorCkptAsValijaArray($objOptionalClauses = null) {
			if ((is_null($this->strNumeCont)))
				return array();

			try {
				return ContenedorCkpt::LoadArrayByValija($this->strNumeCont, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ContenedorCkptsAsValija
		 * @return int
		*/
		public function CountContenedorCkptsAsValija() {
			if ((is_null($this->strNumeCont)))
				return 0;

			return ContenedorCkpt::CountByValija($this->strNumeCont);
		}

		/**
		 * Associates a ContenedorCkptAsValija
		 * @param ContenedorCkpt $objContenedorCkpt
		 * @return void
		*/
		public function AssociateContenedorCkptAsValija(ContenedorCkpt $objContenedorCkpt) {
			if ((is_null($this->strNumeCont)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateContenedorCkptAsValija on this unsaved SdeContenedor.');
			if ((is_null($objContenedorCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateContenedorCkptAsValija on this SdeContenedor with an unsaved ContenedorCkpt.');

			// Get the Database Object for this Class
			$objDatabase = SdeContenedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`contenedor_ckpt`
				SET
					`valija` = ' . $objDatabase->SqlVariable($this->strNumeCont) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContenedorCkpt->Id) . '
			');
		}

		/**
		 * Unassociates a ContenedorCkptAsValija
		 * @param ContenedorCkpt $objContenedorCkpt
		 * @return void
		*/
		public function UnassociateContenedorCkptAsValija(ContenedorCkpt $objContenedorCkpt) {
			if ((is_null($this->strNumeCont)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContenedorCkptAsValija on this unsaved SdeContenedor.');
			if ((is_null($objContenedorCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContenedorCkptAsValija on this SdeContenedor with an unsaved ContenedorCkpt.');

			// Get the Database Object for this Class
			$objDatabase = SdeContenedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`contenedor_ckpt`
				SET
					`valija` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContenedorCkpt->Id) . ' AND
					`valija` = ' . $objDatabase->SqlVariable($this->strNumeCont) . '
			');
		}

		/**
		 * Unassociates all ContenedorCkptsAsValija
		 * @return void
		*/
		public function UnassociateAllContenedorCkptsAsValija() {
			if ((is_null($this->strNumeCont)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContenedorCkptAsValija on this unsaved SdeContenedor.');

			// Get the Database Object for this Class
			$objDatabase = SdeContenedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`contenedor_ckpt`
				SET
					`valija` = null
				WHERE
					`valija` = ' . $objDatabase->SqlVariable($this->strNumeCont) . '
			');
		}

		/**
		 * Deletes an associated ContenedorCkptAsValija
		 * @param ContenedorCkpt $objContenedorCkpt
		 * @return void
		*/
		public function DeleteAssociatedContenedorCkptAsValija(ContenedorCkpt $objContenedorCkpt) {
			if ((is_null($this->strNumeCont)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContenedorCkptAsValija on this unsaved SdeContenedor.');
			if ((is_null($objContenedorCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContenedorCkptAsValija on this SdeContenedor with an unsaved ContenedorCkpt.');

			// Get the Database Object for this Class
			$objDatabase = SdeContenedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`contenedor_ckpt`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContenedorCkpt->Id) . ' AND
					`valija` = ' . $objDatabase->SqlVariable($this->strNumeCont) . '
			');
		}

		/**
		 * Deletes all associated ContenedorCkptsAsValija
		 * @return void
		*/
		public function DeleteAllContenedorCkptsAsValija() {
			if ((is_null($this->strNumeCont)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContenedorCkptAsValija on this unsaved SdeContenedor.');

			// Get the Database Object for this Class
			$objDatabase = SdeContenedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`contenedor_ckpt`
				WHERE
					`valija` = ' . $objDatabase->SqlVariable($this->strNumeCont) . '
			');
		}


		// Related Many-to-Many Objects' Methods for ParentSdeContenedorAsSdeContCont
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated ParentSdeContenedorsAsSdeContCont as an array of SdeContenedor objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeContenedor[]
		*/
		public function GetParentSdeContenedorAsSdeContContArray($objOptionalClauses = null, $objClauses = null) {
			if ((is_null($this->strNumeCont)))
				return array();

			try {
				return SdeContenedor::LoadArrayBySdeContenedorAsSdeContCont($this->strNumeCont, $objClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated ParentSdeContenedorsAsSdeContCont
		 * @return int
		*/
		public function CountParentSdeContenedorsAsSdeContCont() {
			if ((is_null($this->strNumeCont)))
				return 0;

			return SdeContenedor::CountBySdeContenedorAsSdeContCont($this->strNumeCont);
		}

		/**
		 * Checks to see if an association exists with a specific ParentSdeContenedorAsSdeContCont
		 * @param SdeContenedor $objSdeContenedor
		 * @return bool
		*/
		public function IsParentSdeContenedorAsSdeContContAssociated(SdeContenedor $objSdeContenedor) {
			if ((is_null($this->strNumeCont)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsParentSdeContenedorAsSdeContContAssociated on this unsaved SdeContenedor.');
			if ((is_null($objSdeContenedor->NumeCont)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsParentSdeContenedorAsSdeContContAssociated on this SdeContenedor with an unsaved SdeContenedor.');

			$intRowCount = SdeContenedor::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::SdeContenedor()->NumeCont, $this->strNumeCont),
					QQ::Equal(QQN::SdeContenedor()->ParentSdeContenedorAsSdeContCont->NumeVali, $objSdeContenedor->NumeCont)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Associates a ParentSdeContenedorAsSdeContCont
		 * @param SdeContenedor $objSdeContenedor
		 * @return void
		*/
		public function AssociateParentSdeContenedorAsSdeContCont(SdeContenedor $objSdeContenedor) {
			if ((is_null($this->strNumeCont)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateParentSdeContenedorAsSdeContCont on this unsaved SdeContenedor.');
			if ((is_null($objSdeContenedor->NumeCont)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateParentSdeContenedorAsSdeContCont on this SdeContenedor with an unsaved SdeContenedor.');

			// Get the Database Object for this Class
			$objDatabase = SdeContenedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `sde_cont_cont_assn` (
					`nume_cont`,
					`nume_vali`
				) VALUES (
					' . $objDatabase->SqlVariable($this->strNumeCont) . ',
					' . $objDatabase->SqlVariable($objSdeContenedor->NumeCont) . '
				)
			');
		}

		/**
		 * Unassociates a ParentSdeContenedorAsSdeContCont
		 * @param SdeContenedor $objSdeContenedor
		 * @return void
		*/
		public function UnassociateParentSdeContenedorAsSdeContCont(SdeContenedor $objSdeContenedor) {
			if ((is_null($this->strNumeCont)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentSdeContenedorAsSdeContCont on this unsaved SdeContenedor.');
			if ((is_null($objSdeContenedor->NumeCont)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentSdeContenedorAsSdeContCont on this SdeContenedor with an unsaved SdeContenedor.');

			// Get the Database Object for this Class
			$objDatabase = SdeContenedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sde_cont_cont_assn`
				WHERE
					`nume_cont` = ' . $objDatabase->SqlVariable($this->strNumeCont) . ' AND
					`nume_vali` = ' . $objDatabase->SqlVariable($objSdeContenedor->NumeCont) . '
			');
		}

		/**
		 * Unassociates all ParentSdeContenedorsAsSdeContCont
		 * @return void
		*/
		public function UnassociateAllParentSdeContenedorsAsSdeContCont() {
			if ((is_null($this->strNumeCont)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllParentSdeContenedorAsSdeContContArray on this unsaved SdeContenedor.');

			// Get the Database Object for this Class
			$objDatabase = SdeContenedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sde_cont_cont_assn`
				WHERE
					`nume_cont` = ' . $objDatabase->SqlVariable($this->strNumeCont) . '
			');
		}

		// Related Many-to-Many Objects' Methods for SdeContenedorAsSdeContCont
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated SdeContenedorsAsSdeContCont as an array of SdeContenedor objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeContenedor[]
		*/
		public function GetSdeContenedorAsSdeContContArray($objOptionalClauses = null, $objClauses = null) {
			if ((is_null($this->strNumeCont)))
				return array();

			try {
				return SdeContenedor::LoadArrayByParentSdeContenedorAsSdeContCont($this->strNumeCont, $objClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated SdeContenedorsAsSdeContCont
		 * @return int
		*/
		public function CountSdeContenedorsAsSdeContCont() {
			if ((is_null($this->strNumeCont)))
				return 0;

			return SdeContenedor::CountByParentSdeContenedorAsSdeContCont($this->strNumeCont);
		}

		/**
		 * Checks to see if an association exists with a specific SdeContenedorAsSdeContCont
		 * @param SdeContenedor $objSdeContenedor
		 * @return bool
		*/
		public function IsSdeContenedorAsSdeContContAssociated(SdeContenedor $objSdeContenedor) {
			if ((is_null($this->strNumeCont)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsSdeContenedorAsSdeContContAssociated on this unsaved SdeContenedor.');
			if ((is_null($objSdeContenedor->NumeCont)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsSdeContenedorAsSdeContContAssociated on this SdeContenedor with an unsaved SdeContenedor.');

			$intRowCount = SdeContenedor::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::SdeContenedor()->NumeCont, $this->strNumeCont),
					QQ::Equal(QQN::SdeContenedor()->SdeContenedorAsSdeContCont->NumeCont, $objSdeContenedor->NumeCont)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Associates a SdeContenedorAsSdeContCont
		 * @param SdeContenedor $objSdeContenedor
		 * @return void
		*/
		public function AssociateSdeContenedorAsSdeContCont(SdeContenedor $objSdeContenedor) {
			if ((is_null($this->strNumeCont)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSdeContenedorAsSdeContCont on this unsaved SdeContenedor.');
			if ((is_null($objSdeContenedor->NumeCont)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSdeContenedorAsSdeContCont on this SdeContenedor with an unsaved SdeContenedor.');

			// Get the Database Object for this Class
			$objDatabase = SdeContenedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `sde_cont_cont_assn` (
					`nume_vali`,
					`nume_cont`
				) VALUES (
					' . $objDatabase->SqlVariable($this->strNumeCont) . ',
					' . $objDatabase->SqlVariable($objSdeContenedor->NumeCont) . '
				)
			');
		}

		/**
		 * Unassociates a SdeContenedorAsSdeContCont
		 * @param SdeContenedor $objSdeContenedor
		 * @return void
		*/
		public function UnassociateSdeContenedorAsSdeContCont(SdeContenedor $objSdeContenedor) {
			if ((is_null($this->strNumeCont)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeContenedorAsSdeContCont on this unsaved SdeContenedor.');
			if ((is_null($objSdeContenedor->NumeCont)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeContenedorAsSdeContCont on this SdeContenedor with an unsaved SdeContenedor.');

			// Get the Database Object for this Class
			$objDatabase = SdeContenedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sde_cont_cont_assn`
				WHERE
					`nume_vali` = ' . $objDatabase->SqlVariable($this->strNumeCont) . ' AND
					`nume_cont` = ' . $objDatabase->SqlVariable($objSdeContenedor->NumeCont) . '
			');
		}

		/**
		 * Unassociates all SdeContenedorsAsSdeContCont
		 * @return void
		*/
		public function UnassociateAllSdeContenedorsAsSdeContCont() {
			if ((is_null($this->strNumeCont)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllSdeContenedorAsSdeContContArray on this unsaved SdeContenedor.');

			// Get the Database Object for this Class
			$objDatabase = SdeContenedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sde_cont_cont_assn`
				WHERE
					`nume_vali` = ' . $objDatabase->SqlVariable($this->strNumeCont) . '
			');
		}

		// Related Many-to-Many Objects' Methods for GuiaPiezasAsGuia
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated GuiaPiezasesAsGuia as an array of GuiaPiezas objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaPiezas[]
		*/
		public function GetGuiaPiezasAsGuiaArray($objOptionalClauses = null, $objClauses = null) {
			if ((is_null($this->strNumeCont)))
				return array();

			try {
				return GuiaPiezas::LoadArrayBySdeContenedorAsGuia($this->strNumeCont, $objClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated GuiaPiezasesAsGuia
		 * @return int
		*/
		public function CountGuiaPiezasesAsGuia() {
			if ((is_null($this->strNumeCont)))
				return 0;

			return GuiaPiezas::CountBySdeContenedorAsGuia($this->strNumeCont);
		}

		/**
		 * Checks to see if an association exists with a specific GuiaPiezasAsGuia
		 * @param GuiaPiezas $objGuiaPiezas
		 * @return bool
		*/
		public function IsGuiaPiezasAsGuiaAssociated(GuiaPiezas $objGuiaPiezas) {
			if ((is_null($this->strNumeCont)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsGuiaPiezasAsGuiaAssociated on this unsaved SdeContenedor.');
			if ((is_null($objGuiaPiezas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsGuiaPiezasAsGuiaAssociated on this SdeContenedor with an unsaved GuiaPiezas.');

			$intRowCount = SdeContenedor::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::SdeContenedor()->NumeCont, $this->strNumeCont),
					QQ::Equal(QQN::SdeContenedor()->GuiaPiezasAsGuia->GuiaPiezaId, $objGuiaPiezas->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Associates a GuiaPiezasAsGuia
		 * @param GuiaPiezas $objGuiaPiezas
		 * @return void
		*/
		public function AssociateGuiaPiezasAsGuia(GuiaPiezas $objGuiaPiezas) {
			if ((is_null($this->strNumeCont)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaPiezasAsGuia on this unsaved SdeContenedor.');
			if ((is_null($objGuiaPiezas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaPiezasAsGuia on this SdeContenedor with an unsaved GuiaPiezas.');

			// Get the Database Object for this Class
			$objDatabase = SdeContenedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `sde_contenedor_guia_assn` (
					`nume_cont`,
					`guia_pieza_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->strNumeCont) . ',
					' . $objDatabase->SqlVariable($objGuiaPiezas->Id) . '
				)
			');
		}

		/**
		 * Unassociates a GuiaPiezasAsGuia
		 * @param GuiaPiezas $objGuiaPiezas
		 * @return void
		*/
		public function UnassociateGuiaPiezasAsGuia(GuiaPiezas $objGuiaPiezas) {
			if ((is_null($this->strNumeCont)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaPiezasAsGuia on this unsaved SdeContenedor.');
			if ((is_null($objGuiaPiezas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaPiezasAsGuia on this SdeContenedor with an unsaved GuiaPiezas.');

			// Get the Database Object for this Class
			$objDatabase = SdeContenedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sde_contenedor_guia_assn`
				WHERE
					`nume_cont` = ' . $objDatabase->SqlVariable($this->strNumeCont) . ' AND
					`guia_pieza_id` = ' . $objDatabase->SqlVariable($objGuiaPiezas->Id) . '
			');
		}

		/**
		 * Unassociates all GuiaPiezasesAsGuia
		 * @return void
		*/
		public function UnassociateAllGuiaPiezasesAsGuia() {
			if ((is_null($this->strNumeCont)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllGuiaPiezasAsGuiaArray on this unsaved SdeContenedor.');

			// Get the Database Object for this Class
			$objDatabase = SdeContenedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sde_contenedor_guia_assn`
				WHERE
					`nume_cont` = ' . $objDatabase->SqlVariable($this->strNumeCont) . '
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
			return "sde_contenedor";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[SdeContenedor::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="SdeContenedor"><sequence>';
			$strToReturn .= '<element name="NumeCont" type="xsd:string"/>';
			$strToReturn .= '<element name="CodiOperObject" type="xsd1:SdeOperacion"/>';
			$strToReturn .= '<element name="Fecha" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="StatCont" type="xsd:string"/>';
			$strToReturn .= '<element name="NombreChofer" type="xsd:string"/>';
			$strToReturn .= '<element name="CedulaChofer" type="xsd:string"/>';
			$strToReturn .= '<element name="PlacaVehiculo" type="xsd:string"/>';
			$strToReturn .= '<element name="DescipcionVehiculo" type="xsd:string"/>';
			$strToReturn .= '<element name="MontoFlete" type="xsd:float"/>';
			$strToReturn .= '<element name="Master" type="xsd:int"/>';
			$strToReturn .= '<element name="NumeroValijas" type="xsd:int"/>';
			$strToReturn .= '<element name="Valijas" type="xsd:string"/>';
			$strToReturn .= '<element name="PaisId" type="xsd:int"/>';
			$strToReturn .= '<element name="Hora" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('SdeContenedor', $strComplexTypeArray)) {
				$strComplexTypeArray['SdeContenedor'] = SdeContenedor::GetSoapComplexTypeXml();
				SdeOperacion::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, SdeContenedor::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new SdeContenedor();
			if (property_exists($objSoapObject, 'NumeCont'))
				$objToReturn->strNumeCont = $objSoapObject->NumeCont;
			if ((property_exists($objSoapObject, 'CodiOperObject')) &&
				($objSoapObject->CodiOperObject))
				$objToReturn->CodiOperObject = SdeOperacion::GetObjectFromSoapObject($objSoapObject->CodiOperObject);
			if (property_exists($objSoapObject, 'Fecha'))
				$objToReturn->dttFecha = new QDateTime($objSoapObject->Fecha);
			if (property_exists($objSoapObject, 'StatCont'))
				$objToReturn->strStatCont = $objSoapObject->StatCont;
			if (property_exists($objSoapObject, 'NombreChofer'))
				$objToReturn->strNombreChofer = $objSoapObject->NombreChofer;
			if (property_exists($objSoapObject, 'CedulaChofer'))
				$objToReturn->strCedulaChofer = $objSoapObject->CedulaChofer;
			if (property_exists($objSoapObject, 'PlacaVehiculo'))
				$objToReturn->strPlacaVehiculo = $objSoapObject->PlacaVehiculo;
			if (property_exists($objSoapObject, 'DescipcionVehiculo'))
				$objToReturn->strDescipcionVehiculo = $objSoapObject->DescipcionVehiculo;
			if (property_exists($objSoapObject, 'MontoFlete'))
				$objToReturn->fltMontoFlete = $objSoapObject->MontoFlete;
			if (property_exists($objSoapObject, 'Master'))
				$objToReturn->intMaster = $objSoapObject->Master;
			if (property_exists($objSoapObject, 'NumeroValijas'))
				$objToReturn->intNumeroValijas = $objSoapObject->NumeroValijas;
			if (property_exists($objSoapObject, 'Valijas'))
				$objToReturn->strValijas = $objSoapObject->Valijas;
			if (property_exists($objSoapObject, 'PaisId'))
				$objToReturn->intPaisId = $objSoapObject->PaisId;
			if (property_exists($objSoapObject, 'Hora'))
				$objToReturn->strHora = $objSoapObject->Hora;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, SdeContenedor::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objCodiOperObject)
				$objObject->objCodiOperObject = SdeOperacion::GetSoapObjectFromObject($objObject->objCodiOperObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCodiOper = null;
			if ($objObject->dttFecha)
				$objObject->dttFecha = $objObject->dttFecha->qFormat(QDateTime::FormatSoap);
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
			$iArray['NumeCont'] = $this->strNumeCont;
			$iArray['CodiOper'] = $this->intCodiOper;
			$iArray['Fecha'] = $this->dttFecha;
			$iArray['StatCont'] = $this->strStatCont;
			$iArray['NombreChofer'] = $this->strNombreChofer;
			$iArray['CedulaChofer'] = $this->strCedulaChofer;
			$iArray['PlacaVehiculo'] = $this->strPlacaVehiculo;
			$iArray['DescipcionVehiculo'] = $this->strDescipcionVehiculo;
			$iArray['MontoFlete'] = $this->fltMontoFlete;
			$iArray['Master'] = $this->intMaster;
			$iArray['NumeroValijas'] = $this->intNumeroValijas;
			$iArray['Valijas'] = $this->strValijas;
			$iArray['PaisId'] = $this->intPaisId;
			$iArray['Hora'] = $this->strHora;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->strNumeCont ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQAssociationNode
     *
     * @property-read QQNode $NumeVali
     * @property-read QQNodeSdeContenedor $SdeContenedor
     * @property-read QQNodeSdeContenedor $_ChildTableNode
     **/
	class QQNodeSdeContenedorParentSdeContenedorAsSdeContCont extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'parentsdecontenedorassdecontcont';

		protected $strTableName = 'sde_cont_cont_assn';
		protected $strPrimaryKey = 'nume_cont';
		protected $strClassName = 'SdeContenedor';
		protected $strPropertyName = 'ParentSdeContenedorAsSdeContCont';
		protected $strAlias = 'parentsdecontenedorassdecontcont';

		public function __get($strName) {
			switch ($strName) {
				case 'NumeVali':
					return new QQNode('nume_vali', 'NumeVali', 'string', $this);
				case 'SdeContenedor':
					return new QQNodeSdeContenedor('nume_vali', 'NumeVali', 'string', $this);
				case '_ChildTableNode':
					return new QQNodeSdeContenedor('nume_vali', 'NumeVali', 'string', $this);
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
	class QQNodeSdeContenedorSdeContenedorAsSdeContCont extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'sdecontenedorassdecontcont';

		protected $strTableName = 'sde_cont_cont_assn';
		protected $strPrimaryKey = 'nume_vali';
		protected $strClassName = 'SdeContenedor';
		protected $strPropertyName = 'SdeContenedorAsSdeContCont';
		protected $strAlias = 'sdecontenedorassdecontcont';

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
     * @uses QQAssociationNode
     *
     * @property-read QQNode $GuiaPiezaId
     * @property-read QQNodeGuiaPiezas $GuiaPiezas
     * @property-read QQNodeGuiaPiezas $_ChildTableNode
     **/
	class QQNodeSdeContenedorGuiaPiezasAsGuia extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'guiapiezasasguia';

		protected $strTableName = 'sde_contenedor_guia_assn';
		protected $strPrimaryKey = 'nume_cont';
		protected $strClassName = 'GuiaPiezas';
		protected $strPropertyName = 'GuiaPiezasAsGuia';
		protected $strAlias = 'guiapiezasasguia';

		public function __get($strName) {
			switch ($strName) {
				case 'GuiaPiezaId':
					return new QQNode('guia_pieza_id', 'GuiaPiezaId', 'integer', $this);
				case 'GuiaPiezas':
					return new QQNodeGuiaPiezas('guia_pieza_id', 'GuiaPiezaId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeGuiaPiezas('guia_pieza_id', 'GuiaPiezaId', 'integer', $this);
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
     * @property-read QQNode $NumeCont
     * @property-read QQNode $CodiOper
     * @property-read QQNodeSdeOperacion $CodiOperObject
     * @property-read QQNode $Fecha
     * @property-read QQNode $StatCont
     * @property-read QQNode $NombreChofer
     * @property-read QQNode $CedulaChofer
     * @property-read QQNode $PlacaVehiculo
     * @property-read QQNode $DescipcionVehiculo
     * @property-read QQNode $MontoFlete
     * @property-read QQNode $Master
     * @property-read QQNode $NumeroValijas
     * @property-read QQNode $Valijas
     * @property-read QQNode $PaisId
     * @property-read QQNode $Hora
     *
     * @property-read QQNodeSdeContenedorParentSdeContenedorAsSdeContCont $ParentSdeContenedorAsSdeContCont
     * @property-read QQNodeSdeContenedorSdeContenedorAsSdeContCont $SdeContenedorAsSdeContCont
     * @property-read QQNodeSdeContenedorGuiaPiezasAsGuia $GuiaPiezasAsGuia
     *
     * @property-read QQReverseReferenceNodeContenedorCkpt $ContenedorCkptAsValija

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeSdeContenedor extends QQNode {
		protected $strTableName = 'sde_contenedor';
		protected $strPrimaryKey = 'nume_cont';
		protected $strClassName = 'SdeContenedor';
		public function __get($strName) {
			switch ($strName) {
				case 'NumeCont':
					return new QQNode('nume_cont', 'NumeCont', 'VarChar', $this);
				case 'CodiOper':
					return new QQNode('codi_oper', 'CodiOper', 'Integer', $this);
				case 'CodiOperObject':
					return new QQNodeSdeOperacion('codi_oper', 'CodiOperObject', 'Integer', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'Date', $this);
				case 'StatCont':
					return new QQNode('stat_cont', 'StatCont', 'VarChar', $this);
				case 'NombreChofer':
					return new QQNode('nombre_chofer', 'NombreChofer', 'VarChar', $this);
				case 'CedulaChofer':
					return new QQNode('cedula_chofer', 'CedulaChofer', 'VarChar', $this);
				case 'PlacaVehiculo':
					return new QQNode('placa_vehiculo', 'PlacaVehiculo', 'VarChar', $this);
				case 'DescipcionVehiculo':
					return new QQNode('descipcion_vehiculo', 'DescipcionVehiculo', 'VarChar', $this);
				case 'MontoFlete':
					return new QQNode('monto_flete', 'MontoFlete', 'Float', $this);
				case 'Master':
					return new QQNode('master', 'Master', 'Integer', $this);
				case 'NumeroValijas':
					return new QQNode('numero_valijas', 'NumeroValijas', 'Integer', $this);
				case 'Valijas':
					return new QQNode('valijas', 'Valijas', 'VarChar', $this);
				case 'PaisId':
					return new QQNode('pais_id', 'PaisId', 'Integer', $this);
				case 'Hora':
					return new QQNode('hora', 'Hora', 'VarChar', $this);
				case 'ParentSdeContenedorAsSdeContCont':
					return new QQNodeSdeContenedorParentSdeContenedorAsSdeContCont($this);
				case 'SdeContenedorAsSdeContCont':
					return new QQNodeSdeContenedorSdeContenedorAsSdeContCont($this);
				case 'GuiaPiezasAsGuia':
					return new QQNodeSdeContenedorGuiaPiezasAsGuia($this);
				case 'ContenedorCkptAsValija':
					return new QQReverseReferenceNodeContenedorCkpt($this, 'contenedorckptasvalija', 'reverse_reference', 'valija', 'ContenedorCkptAsValija');

				case '_PrimaryKeyNode':
					return new QQNode('nume_cont', 'NumeCont', 'VarChar', $this);
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
     * @property-read QQNode $NumeCont
     * @property-read QQNode $CodiOper
     * @property-read QQNodeSdeOperacion $CodiOperObject
     * @property-read QQNode $Fecha
     * @property-read QQNode $StatCont
     * @property-read QQNode $NombreChofer
     * @property-read QQNode $CedulaChofer
     * @property-read QQNode $PlacaVehiculo
     * @property-read QQNode $DescipcionVehiculo
     * @property-read QQNode $MontoFlete
     * @property-read QQNode $Master
     * @property-read QQNode $NumeroValijas
     * @property-read QQNode $Valijas
     * @property-read QQNode $PaisId
     * @property-read QQNode $Hora
     *
     * @property-read QQNodeSdeContenedorParentSdeContenedorAsSdeContCont $ParentSdeContenedorAsSdeContCont
     * @property-read QQNodeSdeContenedorSdeContenedorAsSdeContCont $SdeContenedorAsSdeContCont
     * @property-read QQNodeSdeContenedorGuiaPiezasAsGuia $GuiaPiezasAsGuia
     *
     * @property-read QQReverseReferenceNodeContenedorCkpt $ContenedorCkptAsValija

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeSdeContenedor extends QQReverseReferenceNode {
		protected $strTableName = 'sde_contenedor';
		protected $strPrimaryKey = 'nume_cont';
		protected $strClassName = 'SdeContenedor';
		public function __get($strName) {
			switch ($strName) {
				case 'NumeCont':
					return new QQNode('nume_cont', 'NumeCont', 'string', $this);
				case 'CodiOper':
					return new QQNode('codi_oper', 'CodiOper', 'integer', $this);
				case 'CodiOperObject':
					return new QQNodeSdeOperacion('codi_oper', 'CodiOperObject', 'integer', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'QDateTime', $this);
				case 'StatCont':
					return new QQNode('stat_cont', 'StatCont', 'string', $this);
				case 'NombreChofer':
					return new QQNode('nombre_chofer', 'NombreChofer', 'string', $this);
				case 'CedulaChofer':
					return new QQNode('cedula_chofer', 'CedulaChofer', 'string', $this);
				case 'PlacaVehiculo':
					return new QQNode('placa_vehiculo', 'PlacaVehiculo', 'string', $this);
				case 'DescipcionVehiculo':
					return new QQNode('descipcion_vehiculo', 'DescipcionVehiculo', 'string', $this);
				case 'MontoFlete':
					return new QQNode('monto_flete', 'MontoFlete', 'double', $this);
				case 'Master':
					return new QQNode('master', 'Master', 'integer', $this);
				case 'NumeroValijas':
					return new QQNode('numero_valijas', 'NumeroValijas', 'integer', $this);
				case 'Valijas':
					return new QQNode('valijas', 'Valijas', 'string', $this);
				case 'PaisId':
					return new QQNode('pais_id', 'PaisId', 'integer', $this);
				case 'Hora':
					return new QQNode('hora', 'Hora', 'string', $this);
				case 'ParentSdeContenedorAsSdeContCont':
					return new QQNodeSdeContenedorParentSdeContenedorAsSdeContCont($this);
				case 'SdeContenedorAsSdeContCont':
					return new QQNodeSdeContenedorSdeContenedorAsSdeContCont($this);
				case 'GuiaPiezasAsGuia':
					return new QQNodeSdeContenedorGuiaPiezasAsGuia($this);
				case 'ContenedorCkptAsValija':
					return new QQReverseReferenceNodeContenedorCkpt($this, 'contenedorckptasvalija', 'reverse_reference', 'valija', 'ContenedorCkptAsValija');

				case '_PrimaryKeyNode':
					return new QQNode('nume_cont', 'NumeCont', 'string', $this);
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
