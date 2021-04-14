<?php
	/**
	 * The abstract GuiaAduanaGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the GuiaAduana subclass which
	 * extends this GuiaAduanaGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the GuiaAduana class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property string $GuiaId the value for strGuiaId (PK)
	 * @property double $Fob the value for fltFob 
	 * @property double $Flete the value for fltFlete 
	 * @property double $Seguro the value for fltSeguro 
	 * @property double $ValorCif the value for fltValorCif 
	 * @property double $ImpImportacion the value for fltImpImportacion 
	 * @property double $FobUsd the value for fltFobUsd 
	 * @property double $FleteUsd the value for fltFleteUsd 
	 * @property double $SeguroUsd the value for fltSeguroUsd 
	 * @property double $ValorCifUsd the value for fltValorCifUsd 
	 * @property double $Tasa1 the value for fltTasa1 
	 * @property double $PorcentajeIva the value for fltPorcentajeIva 
	 * @property double $Iva the value for fltIva 
	 * @property double $Tasa2 the value for fltTasa2 
	 * @property double $Agenciamiento the value for fltAgenciamiento 
	 * @property double $TotalAduana the value for fltTotalAduana 
	 * @property double $Bodegaje the value for fltBodegaje 
	 * @property double $Permisos the value for fltPermisos 
	 * @property double $ManejoAduanal the value for fltManejoAduanal 
	 * @property double $GastosLocales the value for fltGastosLocales 
	 * @property double $TransporteLocal the value for fltTransporteLocal 
	 * @property double $OtrosCargos the value for fltOtrosCargos 
	 * @property double $TramiteExoneracion the value for fltTramiteExoneracion 
	 * @property Guia $Guia the value for the Guia object referenced by strGuiaId (PK)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class GuiaAduanaGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK column guia_aduana.guia_id
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
		 * Protected member variable that maps to the database column guia_aduana.fob
		 * @var double fltFob
		 */
		protected $fltFob;
		const FobDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_aduana.flete
		 * @var double fltFlete
		 */
		protected $fltFlete;
		const FleteDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_aduana.seguro
		 * @var double fltSeguro
		 */
		protected $fltSeguro;
		const SeguroDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_aduana.valor_cif
		 * @var double fltValorCif
		 */
		protected $fltValorCif;
		const ValorCifDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_aduana.imp_importacion
		 * @var double fltImpImportacion
		 */
		protected $fltImpImportacion;
		const ImpImportacionDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_aduana.fob_usd
		 * @var double fltFobUsd
		 */
		protected $fltFobUsd;
		const FobUsdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_aduana.flete_usd
		 * @var double fltFleteUsd
		 */
		protected $fltFleteUsd;
		const FleteUsdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_aduana.seguro_usd
		 * @var double fltSeguroUsd
		 */
		protected $fltSeguroUsd;
		const SeguroUsdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_aduana.valor_cif_usd
		 * @var double fltValorCifUsd
		 */
		protected $fltValorCifUsd;
		const ValorCifUsdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_aduana.tasa1
		 * @var double fltTasa1
		 */
		protected $fltTasa1;
		const Tasa1Default = null;


		/**
		 * Protected member variable that maps to the database column guia_aduana.porcentaje_iva
		 * @var double fltPorcentajeIva
		 */
		protected $fltPorcentajeIva;
		const PorcentajeIvaDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_aduana.iva
		 * @var double fltIva
		 */
		protected $fltIva;
		const IvaDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_aduana.tasa2
		 * @var double fltTasa2
		 */
		protected $fltTasa2;
		const Tasa2Default = null;


		/**
		 * Protected member variable that maps to the database column guia_aduana.agenciamiento
		 * @var double fltAgenciamiento
		 */
		protected $fltAgenciamiento;
		const AgenciamientoDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_aduana.total_aduana
		 * @var double fltTotalAduana
		 */
		protected $fltTotalAduana;
		const TotalAduanaDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_aduana.bodegaje
		 * @var double fltBodegaje
		 */
		protected $fltBodegaje;
		const BodegajeDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_aduana.permisos
		 * @var double fltPermisos
		 */
		protected $fltPermisos;
		const PermisosDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_aduana.manejo_aduanal
		 * @var double fltManejoAduanal
		 */
		protected $fltManejoAduanal;
		const ManejoAduanalDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia_aduana.gastos_locales
		 * @var double fltGastosLocales
		 */
		protected $fltGastosLocales;
		const GastosLocalesDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia_aduana.transporte_local
		 * @var double fltTransporteLocal
		 */
		protected $fltTransporteLocal;
		const TransporteLocalDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia_aduana.otros_cargos
		 * @var double fltOtrosCargos
		 */
		protected $fltOtrosCargos;
		const OtrosCargosDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia_aduana.tramite_exoneracion
		 * @var double fltTramiteExoneracion
		 */
		protected $fltTramiteExoneracion;
		const TramiteExoneracionDefault = 0;


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
		 * in the database column guia_aduana.guia_id.
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
			$this->strGuiaId = GuiaAduana::GuiaIdDefault;
			$this->fltFob = GuiaAduana::FobDefault;
			$this->fltFlete = GuiaAduana::FleteDefault;
			$this->fltSeguro = GuiaAduana::SeguroDefault;
			$this->fltValorCif = GuiaAduana::ValorCifDefault;
			$this->fltImpImportacion = GuiaAduana::ImpImportacionDefault;
			$this->fltFobUsd = GuiaAduana::FobUsdDefault;
			$this->fltFleteUsd = GuiaAduana::FleteUsdDefault;
			$this->fltSeguroUsd = GuiaAduana::SeguroUsdDefault;
			$this->fltValorCifUsd = GuiaAduana::ValorCifUsdDefault;
			$this->fltTasa1 = GuiaAduana::Tasa1Default;
			$this->fltPorcentajeIva = GuiaAduana::PorcentajeIvaDefault;
			$this->fltIva = GuiaAduana::IvaDefault;
			$this->fltTasa2 = GuiaAduana::Tasa2Default;
			$this->fltAgenciamiento = GuiaAduana::AgenciamientoDefault;
			$this->fltTotalAduana = GuiaAduana::TotalAduanaDefault;
			$this->fltBodegaje = GuiaAduana::BodegajeDefault;
			$this->fltPermisos = GuiaAduana::PermisosDefault;
			$this->fltManejoAduanal = GuiaAduana::ManejoAduanalDefault;
			$this->fltGastosLocales = GuiaAduana::GastosLocalesDefault;
			$this->fltTransporteLocal = GuiaAduana::TransporteLocalDefault;
			$this->fltOtrosCargos = GuiaAduana::OtrosCargosDefault;
			$this->fltTramiteExoneracion = GuiaAduana::TramiteExoneracionDefault;
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
		 * Load a GuiaAduana from PK Info
		 * @param string $strGuiaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaAduana
		 */
		public static function Load($strGuiaId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'GuiaAduana', $strGuiaId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = GuiaAduana::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::GuiaAduana()->GuiaId, $strGuiaId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all GuiaAduanas
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaAduana[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call GuiaAduana::QueryArray to perform the LoadAll query
			try {
				return GuiaAduana::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all GuiaAduanas
		 * @return int
		 */
		public static function CountAll() {
			// Call GuiaAduana::QueryCount to perform the CountAll query
			return GuiaAduana::QueryCount(QQ::All());
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
			$objDatabase = GuiaAduana::GetDatabase();

			// Create/Build out the QueryBuilder object with GuiaAduana-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'guia_aduana');

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
				GuiaAduana::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('guia_aduana');

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
		 * Static Qcubed Query method to query for a single GuiaAduana object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return GuiaAduana the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GuiaAduana::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new GuiaAduana object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = GuiaAduana::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return GuiaAduana::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of GuiaAduana objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return GuiaAduana[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GuiaAduana::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return GuiaAduana::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = GuiaAduana::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of GuiaAduana objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GuiaAduana::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = GuiaAduana::GetDatabase();

			$strQuery = GuiaAduana::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/guiaaduana', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = GuiaAduana::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this GuiaAduana
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'guia_aduana';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'guia_id', $strAliasPrefix . 'guia_id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'guia_id', $strAliasPrefix . 'guia_id');
			    $objBuilder->AddSelectItem($strTableName, 'fob', $strAliasPrefix . 'fob');
			    $objBuilder->AddSelectItem($strTableName, 'flete', $strAliasPrefix . 'flete');
			    $objBuilder->AddSelectItem($strTableName, 'seguro', $strAliasPrefix . 'seguro');
			    $objBuilder->AddSelectItem($strTableName, 'valor_cif', $strAliasPrefix . 'valor_cif');
			    $objBuilder->AddSelectItem($strTableName, 'imp_importacion', $strAliasPrefix . 'imp_importacion');
			    $objBuilder->AddSelectItem($strTableName, 'fob_usd', $strAliasPrefix . 'fob_usd');
			    $objBuilder->AddSelectItem($strTableName, 'flete_usd', $strAliasPrefix . 'flete_usd');
			    $objBuilder->AddSelectItem($strTableName, 'seguro_usd', $strAliasPrefix . 'seguro_usd');
			    $objBuilder->AddSelectItem($strTableName, 'valor_cif_usd', $strAliasPrefix . 'valor_cif_usd');
			    $objBuilder->AddSelectItem($strTableName, 'tasa1', $strAliasPrefix . 'tasa1');
			    $objBuilder->AddSelectItem($strTableName, 'porcentaje_iva', $strAliasPrefix . 'porcentaje_iva');
			    $objBuilder->AddSelectItem($strTableName, 'iva', $strAliasPrefix . 'iva');
			    $objBuilder->AddSelectItem($strTableName, 'tasa2', $strAliasPrefix . 'tasa2');
			    $objBuilder->AddSelectItem($strTableName, 'agenciamiento', $strAliasPrefix . 'agenciamiento');
			    $objBuilder->AddSelectItem($strTableName, 'total_aduana', $strAliasPrefix . 'total_aduana');
			    $objBuilder->AddSelectItem($strTableName, 'bodegaje', $strAliasPrefix . 'bodegaje');
			    $objBuilder->AddSelectItem($strTableName, 'permisos', $strAliasPrefix . 'permisos');
			    $objBuilder->AddSelectItem($strTableName, 'manejo_aduanal', $strAliasPrefix . 'manejo_aduanal');
			    $objBuilder->AddSelectItem($strTableName, 'gastos_locales', $strAliasPrefix . 'gastos_locales');
			    $objBuilder->AddSelectItem($strTableName, 'transporte_local', $strAliasPrefix . 'transporte_local');
			    $objBuilder->AddSelectItem($strTableName, 'otros_cargos', $strAliasPrefix . 'otros_cargos');
			    $objBuilder->AddSelectItem($strTableName, 'tramite_exoneracion', $strAliasPrefix . 'tramite_exoneracion');
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
		 * Instantiate a GuiaAduana from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this GuiaAduana::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a GuiaAduana, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (GuiaAduana::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the GuiaAduana object
			$objToReturn = new GuiaAduana();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'guia_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strGuiaId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$objToReturn->__strGuiaId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fob';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltFob = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'flete';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltFlete = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'seguro';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltSeguro = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'valor_cif';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltValorCif = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'imp_importacion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltImpImportacion = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'fob_usd';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltFobUsd = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'flete_usd';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltFleteUsd = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'seguro_usd';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltSeguroUsd = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'valor_cif_usd';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltValorCifUsd = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'tasa1';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltTasa1 = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'porcentaje_iva';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPorcentajeIva = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'iva';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltIva = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'tasa2';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltTasa2 = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'agenciamiento';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltAgenciamiento = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'total_aduana';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltTotalAduana = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'bodegaje';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltBodegaje = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'permisos';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPermisos = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'manejo_aduanal';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltManejoAduanal = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'gastos_locales';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltGastosLocales = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'transporte_local';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltTransporteLocal = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'otros_cargos';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltOtrosCargos = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'tramite_exoneracion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltTramiteExoneracion = $objDbRow->GetColumn($strAliasName, 'Float');

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
				$strAliasPrefix = 'guia_aduana__';

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
		 * Instantiate an array of GuiaAduanas from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return GuiaAduana[]
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
					$objItem = GuiaAduana::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->strGuiaId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = GuiaAduana::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single GuiaAduana object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return GuiaAduana next row resulting from the query
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
			return GuiaAduana::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single GuiaAduana object,
		 * by GuiaId Index(es)
		 * @param string $strGuiaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaAduana
		*/
		public static function LoadByGuiaId($strGuiaId, $objOptionalClauses = null) {
			return GuiaAduana::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::GuiaAduana()->GuiaId, $strGuiaId)
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
		 * Save this GuiaAduana
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = GuiaAduana::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `guia_aduana` (
							`guia_id`,
							`fob`,
							`flete`,
							`seguro`,
							`valor_cif`,
							`imp_importacion`,
							`fob_usd`,
							`flete_usd`,
							`seguro_usd`,
							`valor_cif_usd`,
							`tasa1`,
							`porcentaje_iva`,
							`iva`,
							`tasa2`,
							`agenciamiento`,
							`total_aduana`,
							`bodegaje`,
							`permisos`,
							`manejo_aduanal`,
							`gastos_locales`,
							`transporte_local`,
							`otros_cargos`,
							`tramite_exoneracion`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strGuiaId) . ',
							' . $objDatabase->SqlVariable($this->fltFob) . ',
							' . $objDatabase->SqlVariable($this->fltFlete) . ',
							' . $objDatabase->SqlVariable($this->fltSeguro) . ',
							' . $objDatabase->SqlVariable($this->fltValorCif) . ',
							' . $objDatabase->SqlVariable($this->fltImpImportacion) . ',
							' . $objDatabase->SqlVariable($this->fltFobUsd) . ',
							' . $objDatabase->SqlVariable($this->fltFleteUsd) . ',
							' . $objDatabase->SqlVariable($this->fltSeguroUsd) . ',
							' . $objDatabase->SqlVariable($this->fltValorCifUsd) . ',
							' . $objDatabase->SqlVariable($this->fltTasa1) . ',
							' . $objDatabase->SqlVariable($this->fltPorcentajeIva) . ',
							' . $objDatabase->SqlVariable($this->fltIva) . ',
							' . $objDatabase->SqlVariable($this->fltTasa2) . ',
							' . $objDatabase->SqlVariable($this->fltAgenciamiento) . ',
							' . $objDatabase->SqlVariable($this->fltTotalAduana) . ',
							' . $objDatabase->SqlVariable($this->fltBodegaje) . ',
							' . $objDatabase->SqlVariable($this->fltPermisos) . ',
							' . $objDatabase->SqlVariable($this->fltManejoAduanal) . ',
							' . $objDatabase->SqlVariable($this->fltGastosLocales) . ',
							' . $objDatabase->SqlVariable($this->fltTransporteLocal) . ',
							' . $objDatabase->SqlVariable($this->fltOtrosCargos) . ',
							' . $objDatabase->SqlVariable($this->fltTramiteExoneracion) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`guia_aduana`
						SET
							`guia_id` = ' . $objDatabase->SqlVariable($this->strGuiaId) . ',
							`fob` = ' . $objDatabase->SqlVariable($this->fltFob) . ',
							`flete` = ' . $objDatabase->SqlVariable($this->fltFlete) . ',
							`seguro` = ' . $objDatabase->SqlVariable($this->fltSeguro) . ',
							`valor_cif` = ' . $objDatabase->SqlVariable($this->fltValorCif) . ',
							`imp_importacion` = ' . $objDatabase->SqlVariable($this->fltImpImportacion) . ',
							`fob_usd` = ' . $objDatabase->SqlVariable($this->fltFobUsd) . ',
							`flete_usd` = ' . $objDatabase->SqlVariable($this->fltFleteUsd) . ',
							`seguro_usd` = ' . $objDatabase->SqlVariable($this->fltSeguroUsd) . ',
							`valor_cif_usd` = ' . $objDatabase->SqlVariable($this->fltValorCifUsd) . ',
							`tasa1` = ' . $objDatabase->SqlVariable($this->fltTasa1) . ',
							`porcentaje_iva` = ' . $objDatabase->SqlVariable($this->fltPorcentajeIva) . ',
							`iva` = ' . $objDatabase->SqlVariable($this->fltIva) . ',
							`tasa2` = ' . $objDatabase->SqlVariable($this->fltTasa2) . ',
							`agenciamiento` = ' . $objDatabase->SqlVariable($this->fltAgenciamiento) . ',
							`total_aduana` = ' . $objDatabase->SqlVariable($this->fltTotalAduana) . ',
							`bodegaje` = ' . $objDatabase->SqlVariable($this->fltBodegaje) . ',
							`permisos` = ' . $objDatabase->SqlVariable($this->fltPermisos) . ',
							`manejo_aduanal` = ' . $objDatabase->SqlVariable($this->fltManejoAduanal) . ',
							`gastos_locales` = ' . $objDatabase->SqlVariable($this->fltGastosLocales) . ',
							`transporte_local` = ' . $objDatabase->SqlVariable($this->fltTransporteLocal) . ',
							`otros_cargos` = ' . $objDatabase->SqlVariable($this->fltOtrosCargos) . ',
							`tramite_exoneracion` = ' . $objDatabase->SqlVariable($this->fltTramiteExoneracion) . '
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
		 * Delete this GuiaAduana
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->strGuiaId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this GuiaAduana with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = GuiaAduana::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_aduana`
				WHERE
					`guia_id` = ' . $objDatabase->SqlVariable($this->strGuiaId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this GuiaAduana ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'GuiaAduana', $this->strGuiaId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all GuiaAduanas
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = GuiaAduana::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_aduana`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate guia_aduana table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = GuiaAduana::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `guia_aduana`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this GuiaAduana from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved GuiaAduana object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = GuiaAduana::Load($this->strGuiaId);

			// Update $this's local variables to match
			$this->GuiaId = $objReloaded->GuiaId;
			$this->__strGuiaId = $this->strGuiaId;
			$this->fltFob = $objReloaded->fltFob;
			$this->fltFlete = $objReloaded->fltFlete;
			$this->fltSeguro = $objReloaded->fltSeguro;
			$this->fltValorCif = $objReloaded->fltValorCif;
			$this->fltImpImportacion = $objReloaded->fltImpImportacion;
			$this->fltFobUsd = $objReloaded->fltFobUsd;
			$this->fltFleteUsd = $objReloaded->fltFleteUsd;
			$this->fltSeguroUsd = $objReloaded->fltSeguroUsd;
			$this->fltValorCifUsd = $objReloaded->fltValorCifUsd;
			$this->fltTasa1 = $objReloaded->fltTasa1;
			$this->fltPorcentajeIva = $objReloaded->fltPorcentajeIva;
			$this->fltIva = $objReloaded->fltIva;
			$this->fltTasa2 = $objReloaded->fltTasa2;
			$this->fltAgenciamiento = $objReloaded->fltAgenciamiento;
			$this->fltTotalAduana = $objReloaded->fltTotalAduana;
			$this->fltBodegaje = $objReloaded->fltBodegaje;
			$this->fltPermisos = $objReloaded->fltPermisos;
			$this->fltManejoAduanal = $objReloaded->fltManejoAduanal;
			$this->fltGastosLocales = $objReloaded->fltGastosLocales;
			$this->fltTransporteLocal = $objReloaded->fltTransporteLocal;
			$this->fltOtrosCargos = $objReloaded->fltOtrosCargos;
			$this->fltTramiteExoneracion = $objReloaded->fltTramiteExoneracion;
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

				case 'Fob':
					/**
					 * Gets the value for fltFob 
					 * @return double
					 */
					return $this->fltFob;

				case 'Flete':
					/**
					 * Gets the value for fltFlete 
					 * @return double
					 */
					return $this->fltFlete;

				case 'Seguro':
					/**
					 * Gets the value for fltSeguro 
					 * @return double
					 */
					return $this->fltSeguro;

				case 'ValorCif':
					/**
					 * Gets the value for fltValorCif 
					 * @return double
					 */
					return $this->fltValorCif;

				case 'ImpImportacion':
					/**
					 * Gets the value for fltImpImportacion 
					 * @return double
					 */
					return $this->fltImpImportacion;

				case 'FobUsd':
					/**
					 * Gets the value for fltFobUsd 
					 * @return double
					 */
					return $this->fltFobUsd;

				case 'FleteUsd':
					/**
					 * Gets the value for fltFleteUsd 
					 * @return double
					 */
					return $this->fltFleteUsd;

				case 'SeguroUsd':
					/**
					 * Gets the value for fltSeguroUsd 
					 * @return double
					 */
					return $this->fltSeguroUsd;

				case 'ValorCifUsd':
					/**
					 * Gets the value for fltValorCifUsd 
					 * @return double
					 */
					return $this->fltValorCifUsd;

				case 'Tasa1':
					/**
					 * Gets the value for fltTasa1 
					 * @return double
					 */
					return $this->fltTasa1;

				case 'PorcentajeIva':
					/**
					 * Gets the value for fltPorcentajeIva 
					 * @return double
					 */
					return $this->fltPorcentajeIva;

				case 'Iva':
					/**
					 * Gets the value for fltIva 
					 * @return double
					 */
					return $this->fltIva;

				case 'Tasa2':
					/**
					 * Gets the value for fltTasa2 
					 * @return double
					 */
					return $this->fltTasa2;

				case 'Agenciamiento':
					/**
					 * Gets the value for fltAgenciamiento 
					 * @return double
					 */
					return $this->fltAgenciamiento;

				case 'TotalAduana':
					/**
					 * Gets the value for fltTotalAduana 
					 * @return double
					 */
					return $this->fltTotalAduana;

				case 'Bodegaje':
					/**
					 * Gets the value for fltBodegaje 
					 * @return double
					 */
					return $this->fltBodegaje;

				case 'Permisos':
					/**
					 * Gets the value for fltPermisos 
					 * @return double
					 */
					return $this->fltPermisos;

				case 'ManejoAduanal':
					/**
					 * Gets the value for fltManejoAduanal 
					 * @return double
					 */
					return $this->fltManejoAduanal;

				case 'GastosLocales':
					/**
					 * Gets the value for fltGastosLocales 
					 * @return double
					 */
					return $this->fltGastosLocales;

				case 'TransporteLocal':
					/**
					 * Gets the value for fltTransporteLocal 
					 * @return double
					 */
					return $this->fltTransporteLocal;

				case 'OtrosCargos':
					/**
					 * Gets the value for fltOtrosCargos 
					 * @return double
					 */
					return $this->fltOtrosCargos;

				case 'TramiteExoneracion':
					/**
					 * Gets the value for fltTramiteExoneracion 
					 * @return double
					 */
					return $this->fltTramiteExoneracion;


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

				case 'Fob':
					/**
					 * Sets the value for fltFob 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltFob = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Flete':
					/**
					 * Sets the value for fltFlete 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltFlete = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Seguro':
					/**
					 * Sets the value for fltSeguro 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltSeguro = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ValorCif':
					/**
					 * Sets the value for fltValorCif 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltValorCif = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ImpImportacion':
					/**
					 * Sets the value for fltImpImportacion 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltImpImportacion = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FobUsd':
					/**
					 * Sets the value for fltFobUsd 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltFobUsd = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FleteUsd':
					/**
					 * Sets the value for fltFleteUsd 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltFleteUsd = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SeguroUsd':
					/**
					 * Sets the value for fltSeguroUsd 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltSeguroUsd = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ValorCifUsd':
					/**
					 * Sets the value for fltValorCifUsd 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltValorCifUsd = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Tasa1':
					/**
					 * Sets the value for fltTasa1 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltTasa1 = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PorcentajeIva':
					/**
					 * Sets the value for fltPorcentajeIva 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPorcentajeIva = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Iva':
					/**
					 * Sets the value for fltIva 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltIva = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Tasa2':
					/**
					 * Sets the value for fltTasa2 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltTasa2 = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Agenciamiento':
					/**
					 * Sets the value for fltAgenciamiento 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltAgenciamiento = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TotalAduana':
					/**
					 * Sets the value for fltTotalAduana 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltTotalAduana = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Bodegaje':
					/**
					 * Sets the value for fltBodegaje 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltBodegaje = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Permisos':
					/**
					 * Sets the value for fltPermisos 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPermisos = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ManejoAduanal':
					/**
					 * Sets the value for fltManejoAduanal 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltManejoAduanal = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GastosLocales':
					/**
					 * Sets the value for fltGastosLocales 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltGastosLocales = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TransporteLocal':
					/**
					 * Sets the value for fltTransporteLocal 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltTransporteLocal = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'OtrosCargos':
					/**
					 * Sets the value for fltOtrosCargos 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltOtrosCargos = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TramiteExoneracion':
					/**
					 * Sets the value for fltTramiteExoneracion 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltTramiteExoneracion = QType::Cast($mixValue, QType::Float));
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
							throw new QCallerException('Unable to set an unsaved Guia for this GuiaAduana');

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
			return "guia_aduana";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[GuiaAduana::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="GuiaAduana"><sequence>';
			$strToReturn .= '<element name="Guia" type="xsd1:Guia"/>';
			$strToReturn .= '<element name="Fob" type="xsd:float"/>';
			$strToReturn .= '<element name="Flete" type="xsd:float"/>';
			$strToReturn .= '<element name="Seguro" type="xsd:float"/>';
			$strToReturn .= '<element name="ValorCif" type="xsd:float"/>';
			$strToReturn .= '<element name="ImpImportacion" type="xsd:float"/>';
			$strToReturn .= '<element name="FobUsd" type="xsd:float"/>';
			$strToReturn .= '<element name="FleteUsd" type="xsd:float"/>';
			$strToReturn .= '<element name="SeguroUsd" type="xsd:float"/>';
			$strToReturn .= '<element name="ValorCifUsd" type="xsd:float"/>';
			$strToReturn .= '<element name="Tasa1" type="xsd:float"/>';
			$strToReturn .= '<element name="PorcentajeIva" type="xsd:float"/>';
			$strToReturn .= '<element name="Iva" type="xsd:float"/>';
			$strToReturn .= '<element name="Tasa2" type="xsd:float"/>';
			$strToReturn .= '<element name="Agenciamiento" type="xsd:float"/>';
			$strToReturn .= '<element name="TotalAduana" type="xsd:float"/>';
			$strToReturn .= '<element name="Bodegaje" type="xsd:float"/>';
			$strToReturn .= '<element name="Permisos" type="xsd:float"/>';
			$strToReturn .= '<element name="ManejoAduanal" type="xsd:float"/>';
			$strToReturn .= '<element name="GastosLocales" type="xsd:float"/>';
			$strToReturn .= '<element name="TransporteLocal" type="xsd:float"/>';
			$strToReturn .= '<element name="OtrosCargos" type="xsd:float"/>';
			$strToReturn .= '<element name="TramiteExoneracion" type="xsd:float"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('GuiaAduana', $strComplexTypeArray)) {
				$strComplexTypeArray['GuiaAduana'] = GuiaAduana::GetSoapComplexTypeXml();
				Guia::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, GuiaAduana::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new GuiaAduana();
			if ((property_exists($objSoapObject, 'Guia')) &&
				($objSoapObject->Guia))
				$objToReturn->Guia = Guia::GetObjectFromSoapObject($objSoapObject->Guia);
			if (property_exists($objSoapObject, 'Fob'))
				$objToReturn->fltFob = $objSoapObject->Fob;
			if (property_exists($objSoapObject, 'Flete'))
				$objToReturn->fltFlete = $objSoapObject->Flete;
			if (property_exists($objSoapObject, 'Seguro'))
				$objToReturn->fltSeguro = $objSoapObject->Seguro;
			if (property_exists($objSoapObject, 'ValorCif'))
				$objToReturn->fltValorCif = $objSoapObject->ValorCif;
			if (property_exists($objSoapObject, 'ImpImportacion'))
				$objToReturn->fltImpImportacion = $objSoapObject->ImpImportacion;
			if (property_exists($objSoapObject, 'FobUsd'))
				$objToReturn->fltFobUsd = $objSoapObject->FobUsd;
			if (property_exists($objSoapObject, 'FleteUsd'))
				$objToReturn->fltFleteUsd = $objSoapObject->FleteUsd;
			if (property_exists($objSoapObject, 'SeguroUsd'))
				$objToReturn->fltSeguroUsd = $objSoapObject->SeguroUsd;
			if (property_exists($objSoapObject, 'ValorCifUsd'))
				$objToReturn->fltValorCifUsd = $objSoapObject->ValorCifUsd;
			if (property_exists($objSoapObject, 'Tasa1'))
				$objToReturn->fltTasa1 = $objSoapObject->Tasa1;
			if (property_exists($objSoapObject, 'PorcentajeIva'))
				$objToReturn->fltPorcentajeIva = $objSoapObject->PorcentajeIva;
			if (property_exists($objSoapObject, 'Iva'))
				$objToReturn->fltIva = $objSoapObject->Iva;
			if (property_exists($objSoapObject, 'Tasa2'))
				$objToReturn->fltTasa2 = $objSoapObject->Tasa2;
			if (property_exists($objSoapObject, 'Agenciamiento'))
				$objToReturn->fltAgenciamiento = $objSoapObject->Agenciamiento;
			if (property_exists($objSoapObject, 'TotalAduana'))
				$objToReturn->fltTotalAduana = $objSoapObject->TotalAduana;
			if (property_exists($objSoapObject, 'Bodegaje'))
				$objToReturn->fltBodegaje = $objSoapObject->Bodegaje;
			if (property_exists($objSoapObject, 'Permisos'))
				$objToReturn->fltPermisos = $objSoapObject->Permisos;
			if (property_exists($objSoapObject, 'ManejoAduanal'))
				$objToReturn->fltManejoAduanal = $objSoapObject->ManejoAduanal;
			if (property_exists($objSoapObject, 'GastosLocales'))
				$objToReturn->fltGastosLocales = $objSoapObject->GastosLocales;
			if (property_exists($objSoapObject, 'TransporteLocal'))
				$objToReturn->fltTransporteLocal = $objSoapObject->TransporteLocal;
			if (property_exists($objSoapObject, 'OtrosCargos'))
				$objToReturn->fltOtrosCargos = $objSoapObject->OtrosCargos;
			if (property_exists($objSoapObject, 'TramiteExoneracion'))
				$objToReturn->fltTramiteExoneracion = $objSoapObject->TramiteExoneracion;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, GuiaAduana::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objGuia)
				$objObject->objGuia = Guia::GetSoapObjectFromObject($objObject->objGuia, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strGuiaId = null;
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
			$iArray['Fob'] = $this->fltFob;
			$iArray['Flete'] = $this->fltFlete;
			$iArray['Seguro'] = $this->fltSeguro;
			$iArray['ValorCif'] = $this->fltValorCif;
			$iArray['ImpImportacion'] = $this->fltImpImportacion;
			$iArray['FobUsd'] = $this->fltFobUsd;
			$iArray['FleteUsd'] = $this->fltFleteUsd;
			$iArray['SeguroUsd'] = $this->fltSeguroUsd;
			$iArray['ValorCifUsd'] = $this->fltValorCifUsd;
			$iArray['Tasa1'] = $this->fltTasa1;
			$iArray['PorcentajeIva'] = $this->fltPorcentajeIva;
			$iArray['Iva'] = $this->fltIva;
			$iArray['Tasa2'] = $this->fltTasa2;
			$iArray['Agenciamiento'] = $this->fltAgenciamiento;
			$iArray['TotalAduana'] = $this->fltTotalAduana;
			$iArray['Bodegaje'] = $this->fltBodegaje;
			$iArray['Permisos'] = $this->fltPermisos;
			$iArray['ManejoAduanal'] = $this->fltManejoAduanal;
			$iArray['GastosLocales'] = $this->fltGastosLocales;
			$iArray['TransporteLocal'] = $this->fltTransporteLocal;
			$iArray['OtrosCargos'] = $this->fltOtrosCargos;
			$iArray['TramiteExoneracion'] = $this->fltTramiteExoneracion;
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
     * @property-read QQNode $Fob
     * @property-read QQNode $Flete
     * @property-read QQNode $Seguro
     * @property-read QQNode $ValorCif
     * @property-read QQNode $ImpImportacion
     * @property-read QQNode $FobUsd
     * @property-read QQNode $FleteUsd
     * @property-read QQNode $SeguroUsd
     * @property-read QQNode $ValorCifUsd
     * @property-read QQNode $Tasa1
     * @property-read QQNode $PorcentajeIva
     * @property-read QQNode $Iva
     * @property-read QQNode $Tasa2
     * @property-read QQNode $Agenciamiento
     * @property-read QQNode $TotalAduana
     * @property-read QQNode $Bodegaje
     * @property-read QQNode $Permisos
     * @property-read QQNode $ManejoAduanal
     * @property-read QQNode $GastosLocales
     * @property-read QQNode $TransporteLocal
     * @property-read QQNode $OtrosCargos
     * @property-read QQNode $TramiteExoneracion
     *
     *

     * @property-read QQNodeGuia $_PrimaryKeyNode
     **/
	class QQNodeGuiaAduana extends QQNode {
		protected $strTableName = 'guia_aduana';
		protected $strPrimaryKey = 'guia_id';
		protected $strClassName = 'GuiaAduana';
		public function __get($strName) {
			switch ($strName) {
				case 'GuiaId':
					return new QQNode('guia_id', 'GuiaId', 'VarChar', $this);
				case 'Guia':
					return new QQNodeGuia('guia_id', 'Guia', 'VarChar', $this);
				case 'Fob':
					return new QQNode('fob', 'Fob', 'Float', $this);
				case 'Flete':
					return new QQNode('flete', 'Flete', 'Float', $this);
				case 'Seguro':
					return new QQNode('seguro', 'Seguro', 'Float', $this);
				case 'ValorCif':
					return new QQNode('valor_cif', 'ValorCif', 'Float', $this);
				case 'ImpImportacion':
					return new QQNode('imp_importacion', 'ImpImportacion', 'Float', $this);
				case 'FobUsd':
					return new QQNode('fob_usd', 'FobUsd', 'Float', $this);
				case 'FleteUsd':
					return new QQNode('flete_usd', 'FleteUsd', 'Float', $this);
				case 'SeguroUsd':
					return new QQNode('seguro_usd', 'SeguroUsd', 'Float', $this);
				case 'ValorCifUsd':
					return new QQNode('valor_cif_usd', 'ValorCifUsd', 'Float', $this);
				case 'Tasa1':
					return new QQNode('tasa1', 'Tasa1', 'Float', $this);
				case 'PorcentajeIva':
					return new QQNode('porcentaje_iva', 'PorcentajeIva', 'Float', $this);
				case 'Iva':
					return new QQNode('iva', 'Iva', 'Float', $this);
				case 'Tasa2':
					return new QQNode('tasa2', 'Tasa2', 'Float', $this);
				case 'Agenciamiento':
					return new QQNode('agenciamiento', 'Agenciamiento', 'Float', $this);
				case 'TotalAduana':
					return new QQNode('total_aduana', 'TotalAduana', 'Float', $this);
				case 'Bodegaje':
					return new QQNode('bodegaje', 'Bodegaje', 'Float', $this);
				case 'Permisos':
					return new QQNode('permisos', 'Permisos', 'Float', $this);
				case 'ManejoAduanal':
					return new QQNode('manejo_aduanal', 'ManejoAduanal', 'Float', $this);
				case 'GastosLocales':
					return new QQNode('gastos_locales', 'GastosLocales', 'Float', $this);
				case 'TransporteLocal':
					return new QQNode('transporte_local', 'TransporteLocal', 'Float', $this);
				case 'OtrosCargos':
					return new QQNode('otros_cargos', 'OtrosCargos', 'Float', $this);
				case 'TramiteExoneracion':
					return new QQNode('tramite_exoneracion', 'TramiteExoneracion', 'Float', $this);

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
     * @property-read QQNode $Fob
     * @property-read QQNode $Flete
     * @property-read QQNode $Seguro
     * @property-read QQNode $ValorCif
     * @property-read QQNode $ImpImportacion
     * @property-read QQNode $FobUsd
     * @property-read QQNode $FleteUsd
     * @property-read QQNode $SeguroUsd
     * @property-read QQNode $ValorCifUsd
     * @property-read QQNode $Tasa1
     * @property-read QQNode $PorcentajeIva
     * @property-read QQNode $Iva
     * @property-read QQNode $Tasa2
     * @property-read QQNode $Agenciamiento
     * @property-read QQNode $TotalAduana
     * @property-read QQNode $Bodegaje
     * @property-read QQNode $Permisos
     * @property-read QQNode $ManejoAduanal
     * @property-read QQNode $GastosLocales
     * @property-read QQNode $TransporteLocal
     * @property-read QQNode $OtrosCargos
     * @property-read QQNode $TramiteExoneracion
     *
     *

     * @property-read QQNodeGuia $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeGuiaAduana extends QQReverseReferenceNode {
		protected $strTableName = 'guia_aduana';
		protected $strPrimaryKey = 'guia_id';
		protected $strClassName = 'GuiaAduana';
		public function __get($strName) {
			switch ($strName) {
				case 'GuiaId':
					return new QQNode('guia_id', 'GuiaId', 'string', $this);
				case 'Guia':
					return new QQNodeGuia('guia_id', 'Guia', 'string', $this);
				case 'Fob':
					return new QQNode('fob', 'Fob', 'double', $this);
				case 'Flete':
					return new QQNode('flete', 'Flete', 'double', $this);
				case 'Seguro':
					return new QQNode('seguro', 'Seguro', 'double', $this);
				case 'ValorCif':
					return new QQNode('valor_cif', 'ValorCif', 'double', $this);
				case 'ImpImportacion':
					return new QQNode('imp_importacion', 'ImpImportacion', 'double', $this);
				case 'FobUsd':
					return new QQNode('fob_usd', 'FobUsd', 'double', $this);
				case 'FleteUsd':
					return new QQNode('flete_usd', 'FleteUsd', 'double', $this);
				case 'SeguroUsd':
					return new QQNode('seguro_usd', 'SeguroUsd', 'double', $this);
				case 'ValorCifUsd':
					return new QQNode('valor_cif_usd', 'ValorCifUsd', 'double', $this);
				case 'Tasa1':
					return new QQNode('tasa1', 'Tasa1', 'double', $this);
				case 'PorcentajeIva':
					return new QQNode('porcentaje_iva', 'PorcentajeIva', 'double', $this);
				case 'Iva':
					return new QQNode('iva', 'Iva', 'double', $this);
				case 'Tasa2':
					return new QQNode('tasa2', 'Tasa2', 'double', $this);
				case 'Agenciamiento':
					return new QQNode('agenciamiento', 'Agenciamiento', 'double', $this);
				case 'TotalAduana':
					return new QQNode('total_aduana', 'TotalAduana', 'double', $this);
				case 'Bodegaje':
					return new QQNode('bodegaje', 'Bodegaje', 'double', $this);
				case 'Permisos':
					return new QQNode('permisos', 'Permisos', 'double', $this);
				case 'ManejoAduanal':
					return new QQNode('manejo_aduanal', 'ManejoAduanal', 'double', $this);
				case 'GastosLocales':
					return new QQNode('gastos_locales', 'GastosLocales', 'double', $this);
				case 'TransporteLocal':
					return new QQNode('transporte_local', 'TransporteLocal', 'double', $this);
				case 'OtrosCargos':
					return new QQNode('otros_cargos', 'OtrosCargos', 'double', $this);
				case 'TramiteExoneracion':
					return new QQNode('tramite_exoneracion', 'TramiteExoneracion', 'double', $this);

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
