<?php
	/**
	 * The abstract GuiaPiezasHGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the GuiaPiezasH subclass which
	 * extends this GuiaPiezasHGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the GuiaPiezasH class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $GuiaId the value for intGuiaId (Not Null)
	 * @property string $IdPieza the value for strIdPieza (Unique)
	 * @property double $Kilos the value for fltKilos (Not Null)
	 * @property double $Libras the value for fltLibras 
	 * @property double $Largo the value for fltLargo 
	 * @property double $Alto the value for fltAlto 
	 * @property double $Ancho the value for fltAncho 
	 * @property double $Volumen the value for fltVolumen 
	 * @property string $Descripcion the value for strDescripcion 
	 * @property double $PiesCub the value for fltPiesCub 
	 * @property double $MetrosCub the value for fltMetrosCub 
	 * @property string $HojaEntrega the value for strHojaEntrega 
	 * @property string $Ubicacion the value for strUbicacion 
	 * @property-read string $CreatedAt the value for strCreatedAt (Read-Only Timestamp)
	 * @property-read string $UpdatedAt the value for strUpdatedAt (Read-Only Timestamp)
	 * @property GuiasH $Guia the value for the GuiasH object referenced by intGuiaId (Not Null)
	 * @property-read PiezaCheckpointsH $_PiezaCheckpointsHAsPieza the value for the private _objPiezaCheckpointsHAsPieza (Read-Only) if set due to an expansion on the pieza_checkpoints_h.pieza_id reverse relationship
	 * @property-read PiezaCheckpointsH[] $_PiezaCheckpointsHAsPiezaArray the value for the private _objPiezaCheckpointsHAsPiezaArray (Read-Only) if set due to an ExpandAsArray on the pieza_checkpoints_h.pieza_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class GuiaPiezasHGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column guia_piezas_h.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas_h.guia_id
		 * @var integer intGuiaId
		 */
		protected $intGuiaId;
		const GuiaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas_h.id_pieza
		 * @var string strIdPieza
		 */
		protected $strIdPieza;
		const IdPiezaMaxLength = 30;
		const IdPiezaDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas_h.kilos
		 * @var double fltKilos
		 */
		protected $fltKilos;
		const KilosDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas_h.libras
		 * @var double fltLibras
		 */
		protected $fltLibras;
		const LibrasDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia_piezas_h.largo
		 * @var double fltLargo
		 */
		protected $fltLargo;
		const LargoDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia_piezas_h.alto
		 * @var double fltAlto
		 */
		protected $fltAlto;
		const AltoDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia_piezas_h.ancho
		 * @var double fltAncho
		 */
		protected $fltAncho;
		const AnchoDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia_piezas_h.volumen
		 * @var double fltVolumen
		 */
		protected $fltVolumen;
		const VolumenDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia_piezas_h.descripcion
		 * @var string strDescripcion
		 */
		protected $strDescripcion;
		const DescripcionMaxLength = 50;
		const DescripcionDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas_h.pies_cub
		 * @var double fltPiesCub
		 */
		protected $fltPiesCub;
		const PiesCubDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas_h.metros_cub
		 * @var double fltMetrosCub
		 */
		protected $fltMetrosCub;
		const MetrosCubDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas_h.hoja_entrega
		 * @var string strHojaEntrega
		 */
		protected $strHojaEntrega;
		const HojaEntregaMaxLength = 20;
		const HojaEntregaDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas_h.ubicacion
		 * @var string strUbicacion
		 */
		protected $strUbicacion;
		const UbicacionMaxLength = 25;
		const UbicacionDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas_h.created_at
		 * @var string strCreatedAt
		 */
		protected $strCreatedAt;
		const CreatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas_h.updated_at
		 * @var string strUpdatedAt
		 */
		protected $strUpdatedAt;
		const UpdatedAtDefault = null;


		/**
		 * Private member variable that stores a reference to a single PiezaCheckpointsHAsPieza object
		 * (of type PiezaCheckpointsH), if this GuiaPiezasH object was restored with
		 * an expansion on the pieza_checkpoints_h association table.
		 * @var PiezaCheckpointsH _objPiezaCheckpointsHAsPieza;
		 */
		private $_objPiezaCheckpointsHAsPieza;

		/**
		 * Private member variable that stores a reference to an array of PiezaCheckpointsHAsPieza objects
		 * (of type PiezaCheckpointsH[]), if this GuiaPiezasH object was restored with
		 * an ExpandAsArray on the pieza_checkpoints_h association table.
		 * @var PiezaCheckpointsH[] _objPiezaCheckpointsHAsPiezaArray;
		 */
		private $_objPiezaCheckpointsHAsPiezaArray = null;

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
		 * in the database column guia_piezas_h.guia_id.
		 *
		 * NOTE: Always use the Guia property getter to correctly retrieve this GuiasH object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var GuiasH objGuia
		 */
		protected $objGuia;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = GuiaPiezasH::IdDefault;
			$this->intGuiaId = GuiaPiezasH::GuiaIdDefault;
			$this->strIdPieza = GuiaPiezasH::IdPiezaDefault;
			$this->fltKilos = GuiaPiezasH::KilosDefault;
			$this->fltLibras = GuiaPiezasH::LibrasDefault;
			$this->fltLargo = GuiaPiezasH::LargoDefault;
			$this->fltAlto = GuiaPiezasH::AltoDefault;
			$this->fltAncho = GuiaPiezasH::AnchoDefault;
			$this->fltVolumen = GuiaPiezasH::VolumenDefault;
			$this->strDescripcion = GuiaPiezasH::DescripcionDefault;
			$this->fltPiesCub = GuiaPiezasH::PiesCubDefault;
			$this->fltMetrosCub = GuiaPiezasH::MetrosCubDefault;
			$this->strHojaEntrega = GuiaPiezasH::HojaEntregaDefault;
			$this->strUbicacion = GuiaPiezasH::UbicacionDefault;
			$this->strCreatedAt = GuiaPiezasH::CreatedAtDefault;
			$this->strUpdatedAt = GuiaPiezasH::UpdatedAtDefault;
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
		 * Load a GuiaPiezasH from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaPiezasH
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'GuiaPiezasH', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = GuiaPiezasH::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::GuiaPiezasH()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all GuiaPiezasHs
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaPiezasH[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call GuiaPiezasH::QueryArray to perform the LoadAll query
			try {
				return GuiaPiezasH::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all GuiaPiezasHs
		 * @return int
		 */
		public static function CountAll() {
			// Call GuiaPiezasH::QueryCount to perform the CountAll query
			return GuiaPiezasH::QueryCount(QQ::All());
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
			$objDatabase = GuiaPiezasH::GetDatabase();

			// Create/Build out the QueryBuilder object with GuiaPiezasH-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'guia_piezas_h');

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
				GuiaPiezasH::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('guia_piezas_h');

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
		 * Static Qcubed Query method to query for a single GuiaPiezasH object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return GuiaPiezasH the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GuiaPiezasH::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new GuiaPiezasH object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = GuiaPiezasH::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return GuiaPiezasH::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of GuiaPiezasH objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return GuiaPiezasH[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GuiaPiezasH::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return GuiaPiezasH::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = GuiaPiezasH::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of GuiaPiezasH objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GuiaPiezasH::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = GuiaPiezasH::GetDatabase();

			$strQuery = GuiaPiezasH::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/guiapiezash', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = GuiaPiezasH::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this GuiaPiezasH
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'guia_piezas_h';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'guia_id', $strAliasPrefix . 'guia_id');
			    $objBuilder->AddSelectItem($strTableName, 'id_pieza', $strAliasPrefix . 'id_pieza');
			    $objBuilder->AddSelectItem($strTableName, 'kilos', $strAliasPrefix . 'kilos');
			    $objBuilder->AddSelectItem($strTableName, 'libras', $strAliasPrefix . 'libras');
			    $objBuilder->AddSelectItem($strTableName, 'largo', $strAliasPrefix . 'largo');
			    $objBuilder->AddSelectItem($strTableName, 'alto', $strAliasPrefix . 'alto');
			    $objBuilder->AddSelectItem($strTableName, 'ancho', $strAliasPrefix . 'ancho');
			    $objBuilder->AddSelectItem($strTableName, 'volumen', $strAliasPrefix . 'volumen');
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
		 * Instantiate a GuiaPiezasH from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this GuiaPiezasH::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a GuiaPiezasH, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (GuiaPiezasH::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the GuiaPiezasH object
			$objToReturn = new GuiaPiezasH();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'guia_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intGuiaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'id_pieza';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strIdPieza = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'kilos';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltKilos = $objDbRow->GetColumn($strAliasName, 'Float');
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
			$objToReturn->strCreatedAt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'updated_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strUpdatedAt = $objDbRow->GetColumn($strAliasName, 'VarChar');

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
				$strAliasPrefix = 'guia_piezas_h__';

			// Check for Guia Early Binding
			$strAlias = $strAliasPrefix . 'guia_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['guia_id']) ? null : $objExpansionAliasArray['guia_id']);
				$objToReturn->objGuia = GuiasH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guia_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			// Check for PiezaCheckpointsHAsPieza Virtual Binding
			$strAlias = $strAliasPrefix . 'piezacheckpointshaspieza__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['piezacheckpointshaspieza']) ? null : $objExpansionAliasArray['piezacheckpointshaspieza']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objPiezaCheckpointsHAsPiezaArray)
				$objToReturn->_objPiezaCheckpointsHAsPiezaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objPiezaCheckpointsHAsPiezaArray[] = PiezaCheckpointsH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'piezacheckpointshaspieza__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objPiezaCheckpointsHAsPieza)) {
					$objToReturn->_objPiezaCheckpointsHAsPieza = PiezaCheckpointsH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'piezacheckpointshaspieza__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of GuiaPiezasHs from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return GuiaPiezasH[]
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
					$objItem = GuiaPiezasH::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = GuiaPiezasH::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single GuiaPiezasH object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return GuiaPiezasH next row resulting from the query
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
			return GuiaPiezasH::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single GuiaPiezasH object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaPiezasH
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return GuiaPiezasH::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::GuiaPiezasH()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single GuiaPiezasH object,
		 * by IdPieza Index(es)
		 * @param string $strIdPieza
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaPiezasH
		*/
		public static function LoadByIdPieza($strIdPieza, $objOptionalClauses = null) {
			return GuiaPiezasH::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::GuiaPiezasH()->IdPieza, $strIdPieza)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of GuiaPiezasH objects,
		 * by GuiaId Index(es)
		 * @param integer $intGuiaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaPiezasH[]
		*/
		public static function LoadArrayByGuiaId($intGuiaId, $objOptionalClauses = null) {
			// Call GuiaPiezasH::QueryArray to perform the LoadArrayByGuiaId query
			try {
				return GuiaPiezasH::QueryArray(
					QQ::Equal(QQN::GuiaPiezasH()->GuiaId, $intGuiaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GuiaPiezasHs
		 * by GuiaId Index(es)
		 * @param integer $intGuiaId
		 * @return int
		*/
		public static function CountByGuiaId($intGuiaId) {
			// Call GuiaPiezasH::QueryCount to perform the CountByGuiaId query
			return GuiaPiezasH::QueryCount(
				QQ::Equal(QQN::GuiaPiezasH()->GuiaId, $intGuiaId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this GuiaPiezasH
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = GuiaPiezasH::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `guia_piezas_h` (
							`guia_id`,
							`id_pieza`,
							`kilos`,
							`libras`,
							`largo`,
							`alto`,
							`ancho`,
							`volumen`,
							`descripcion`,
							`pies_cub`,
							`metros_cub`,
							`hoja_entrega`,
							`ubicacion`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intGuiaId) . ',
							' . $objDatabase->SqlVariable($this->strIdPieza) . ',
							' . $objDatabase->SqlVariable($this->fltKilos) . ',
							' . $objDatabase->SqlVariable($this->fltLibras) . ',
							' . $objDatabase->SqlVariable($this->fltLargo) . ',
							' . $objDatabase->SqlVariable($this->fltAlto) . ',
							' . $objDatabase->SqlVariable($this->fltAncho) . ',
							' . $objDatabase->SqlVariable($this->fltVolumen) . ',
							' . $objDatabase->SqlVariable($this->strDescripcion) . ',
							' . $objDatabase->SqlVariable($this->fltPiesCub) . ',
							' . $objDatabase->SqlVariable($this->fltMetrosCub) . ',
							' . $objDatabase->SqlVariable($this->strHojaEntrega) . ',
							' . $objDatabase->SqlVariable($this->strUbicacion) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('guia_piezas_h', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`created_at`
							FROM
								`guia_piezas_h`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strCreatedAt)
							throw new QOptimisticLockingException('GuiaPiezasH');
					}
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`updated_at`
							FROM
								`guia_piezas_h`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strUpdatedAt)
							throw new QOptimisticLockingException('GuiaPiezasH');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`guia_piezas_h`
						SET
							`guia_id` = ' . $objDatabase->SqlVariable($this->intGuiaId) . ',
							`id_pieza` = ' . $objDatabase->SqlVariable($this->strIdPieza) . ',
							`kilos` = ' . $objDatabase->SqlVariable($this->fltKilos) . ',
							`libras` = ' . $objDatabase->SqlVariable($this->fltLibras) . ',
							`largo` = ' . $objDatabase->SqlVariable($this->fltLargo) . ',
							`alto` = ' . $objDatabase->SqlVariable($this->fltAlto) . ',
							`ancho` = ' . $objDatabase->SqlVariable($this->fltAncho) . ',
							`volumen` = ' . $objDatabase->SqlVariable($this->fltVolumen) . ',
							`descripcion` = ' . $objDatabase->SqlVariable($this->strDescripcion) . ',
							`pies_cub` = ' . $objDatabase->SqlVariable($this->fltPiesCub) . ',
							`metros_cub` = ' . $objDatabase->SqlVariable($this->fltMetrosCub) . ',
							`hoja_entrega` = ' . $objDatabase->SqlVariable($this->strHojaEntrega) . ',
							`ubicacion` = ' . $objDatabase->SqlVariable($this->strUbicacion) . '
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
					`created_at`
				FROM
					`guia_piezas_h`
				WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			$objRow = $objResult->FetchArray();
			$this->strCreatedAt = $objRow[0];
			// Update Local Timestamp
			$objResult = $objDatabase->Query('
				SELECT
					`updated_at`
				FROM
					`guia_piezas_h`
				WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			$objRow = $objResult->FetchArray();
			$this->strUpdatedAt = $objRow[0];

			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this GuiaPiezasH
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this GuiaPiezasH with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezasH::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_piezas_h`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this GuiaPiezasH ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'GuiaPiezasH', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all GuiaPiezasHs
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = GuiaPiezasH::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_piezas_h`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate guia_piezas_h table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = GuiaPiezasH::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `guia_piezas_h`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this GuiaPiezasH from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved GuiaPiezasH object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = GuiaPiezasH::Load($this->intId);

			// Update $this's local variables to match
			$this->GuiaId = $objReloaded->GuiaId;
			$this->strIdPieza = $objReloaded->strIdPieza;
			$this->fltKilos = $objReloaded->fltKilos;
			$this->fltLibras = $objReloaded->fltLibras;
			$this->fltLargo = $objReloaded->fltLargo;
			$this->fltAlto = $objReloaded->fltAlto;
			$this->fltAncho = $objReloaded->fltAncho;
			$this->fltVolumen = $objReloaded->fltVolumen;
			$this->strDescripcion = $objReloaded->strDescripcion;
			$this->fltPiesCub = $objReloaded->fltPiesCub;
			$this->fltMetrosCub = $objReloaded->fltMetrosCub;
			$this->strHojaEntrega = $objReloaded->strHojaEntrega;
			$this->strUbicacion = $objReloaded->strUbicacion;
			$this->strCreatedAt = $objReloaded->strCreatedAt;
			$this->strUpdatedAt = $objReloaded->strUpdatedAt;
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
					 * Gets the value for strCreatedAt (Read-Only Timestamp)
					 * @return string
					 */
					return $this->strCreatedAt;

				case 'UpdatedAt':
					/**
					 * Gets the value for strUpdatedAt (Read-Only Timestamp)
					 * @return string
					 */
					return $this->strUpdatedAt;


				///////////////////
				// Member Objects
				///////////////////
				case 'Guia':
					/**
					 * Gets the value for the GuiasH object referenced by intGuiaId (Not Null)
					 * @return GuiasH
					 */
					try {
						if ((!$this->objGuia) && (!is_null($this->intGuiaId)))
							$this->objGuia = GuiasH::Load($this->intGuiaId);
						return $this->objGuia;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_PiezaCheckpointsHAsPieza':
					/**
					 * Gets the value for the private _objPiezaCheckpointsHAsPieza (Read-Only)
					 * if set due to an expansion on the pieza_checkpoints_h.pieza_id reverse relationship
					 * @return PiezaCheckpointsH
					 */
					return $this->_objPiezaCheckpointsHAsPieza;

				case '_PiezaCheckpointsHAsPiezaArray':
					/**
					 * Gets the value for the private _objPiezaCheckpointsHAsPiezaArray (Read-Only)
					 * if set due to an ExpandAsArray on the pieza_checkpoints_h.pieza_id reverse relationship
					 * @return PiezaCheckpointsH[]
					 */
					return $this->_objPiezaCheckpointsHAsPiezaArray;


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


				///////////////////
				// Member Objects
				///////////////////
				case 'Guia':
					/**
					 * Sets the value for the GuiasH object referenced by intGuiaId (Not Null)
					 * @param GuiasH $mixValue
					 * @return GuiasH
					 */
					if (is_null($mixValue)) {
						$this->intGuiaId = null;
						$this->objGuia = null;
						return null;
					} else {
						// Make sure $mixValue actually is a GuiasH object
						try {
							$mixValue = QType::Cast($mixValue, 'GuiasH');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED GuiasH object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Guia for this GuiaPiezasH');

						// Update Local Member Variables
						$this->objGuia = $mixValue;
						$this->intGuiaId = $mixValue->Id;

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
			if ($this->CountPiezaCheckpointsHsAsPieza()) {
				$arrTablRela[] = 'pieza_checkpoints_h';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for PiezaCheckpointsHAsPieza
		//-------------------------------------------------------------------

		/**
		 * Gets all associated PiezaCheckpointsHsAsPieza as an array of PiezaCheckpointsH objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PiezaCheckpointsH[]
		*/
		public function GetPiezaCheckpointsHAsPiezaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return PiezaCheckpointsH::LoadArrayByPiezaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated PiezaCheckpointsHsAsPieza
		 * @return int
		*/
		public function CountPiezaCheckpointsHsAsPieza() {
			if ((is_null($this->intId)))
				return 0;

			return PiezaCheckpointsH::CountByPiezaId($this->intId);
		}

		/**
		 * Associates a PiezaCheckpointsHAsPieza
		 * @param PiezaCheckpointsH $objPiezaCheckpointsH
		 * @return void
		*/
		public function AssociatePiezaCheckpointsHAsPieza(PiezaCheckpointsH $objPiezaCheckpointsH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePiezaCheckpointsHAsPieza on this unsaved GuiaPiezasH.');
			if ((is_null($objPiezaCheckpointsH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePiezaCheckpointsHAsPieza on this GuiaPiezasH with an unsaved PiezaCheckpointsH.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezasH::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pieza_checkpoints_h`
				SET
					`pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPiezaCheckpointsH->Id) . '
			');
		}

		/**
		 * Unassociates a PiezaCheckpointsHAsPieza
		 * @param PiezaCheckpointsH $objPiezaCheckpointsH
		 * @return void
		*/
		public function UnassociatePiezaCheckpointsHAsPieza(PiezaCheckpointsH $objPiezaCheckpointsH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsHAsPieza on this unsaved GuiaPiezasH.');
			if ((is_null($objPiezaCheckpointsH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsHAsPieza on this GuiaPiezasH with an unsaved PiezaCheckpointsH.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezasH::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pieza_checkpoints_h`
				SET
					`pieza_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPiezaCheckpointsH->Id) . ' AND
					`pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all PiezaCheckpointsHsAsPieza
		 * @return void
		*/
		public function UnassociateAllPiezaCheckpointsHsAsPieza() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsHAsPieza on this unsaved GuiaPiezasH.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezasH::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pieza_checkpoints_h`
				SET
					`pieza_id` = null
				WHERE
					`pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated PiezaCheckpointsHAsPieza
		 * @param PiezaCheckpointsH $objPiezaCheckpointsH
		 * @return void
		*/
		public function DeleteAssociatedPiezaCheckpointsHAsPieza(PiezaCheckpointsH $objPiezaCheckpointsH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsHAsPieza on this unsaved GuiaPiezasH.');
			if ((is_null($objPiezaCheckpointsH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsHAsPieza on this GuiaPiezasH with an unsaved PiezaCheckpointsH.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezasH::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pieza_checkpoints_h`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPiezaCheckpointsH->Id) . ' AND
					`pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated PiezaCheckpointsHsAsPieza
		 * @return void
		*/
		public function DeleteAllPiezaCheckpointsHsAsPieza() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsHAsPieza on this unsaved GuiaPiezasH.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezasH::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pieza_checkpoints_h`
				WHERE
					`pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
			return "guia_piezas_h";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[GuiaPiezasH::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="GuiaPiezasH"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Guia" type="xsd1:GuiasH"/>';
			$strToReturn .= '<element name="IdPieza" type="xsd:string"/>';
			$strToReturn .= '<element name="Kilos" type="xsd:float"/>';
			$strToReturn .= '<element name="Libras" type="xsd:float"/>';
			$strToReturn .= '<element name="Largo" type="xsd:float"/>';
			$strToReturn .= '<element name="Alto" type="xsd:float"/>';
			$strToReturn .= '<element name="Ancho" type="xsd:float"/>';
			$strToReturn .= '<element name="Volumen" type="xsd:float"/>';
			$strToReturn .= '<element name="Descripcion" type="xsd:string"/>';
			$strToReturn .= '<element name="PiesCub" type="xsd:float"/>';
			$strToReturn .= '<element name="MetrosCub" type="xsd:float"/>';
			$strToReturn .= '<element name="HojaEntrega" type="xsd:string"/>';
			$strToReturn .= '<element name="Ubicacion" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedAt" type="xsd:string"/>';
			$strToReturn .= '<element name="UpdatedAt" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('GuiaPiezasH', $strComplexTypeArray)) {
				$strComplexTypeArray['GuiaPiezasH'] = GuiaPiezasH::GetSoapComplexTypeXml();
				GuiasH::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, GuiaPiezasH::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new GuiaPiezasH();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Guia')) &&
				($objSoapObject->Guia))
				$objToReturn->Guia = GuiasH::GetObjectFromSoapObject($objSoapObject->Guia);
			if (property_exists($objSoapObject, 'IdPieza'))
				$objToReturn->strIdPieza = $objSoapObject->IdPieza;
			if (property_exists($objSoapObject, 'Kilos'))
				$objToReturn->fltKilos = $objSoapObject->Kilos;
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
				$objToReturn->strCreatedAt = $objSoapObject->CreatedAt;
			if (property_exists($objSoapObject, 'UpdatedAt'))
				$objToReturn->strUpdatedAt = $objSoapObject->UpdatedAt;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, GuiaPiezasH::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objGuia)
				$objObject->objGuia = GuiasH::GetSoapObjectFromObject($objObject->objGuia, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intGuiaId = null;
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
			$iArray['IdPieza'] = $this->strIdPieza;
			$iArray['Kilos'] = $this->fltKilos;
			$iArray['Libras'] = $this->fltLibras;
			$iArray['Largo'] = $this->fltLargo;
			$iArray['Alto'] = $this->fltAlto;
			$iArray['Ancho'] = $this->fltAncho;
			$iArray['Volumen'] = $this->fltVolumen;
			$iArray['Descripcion'] = $this->strDescripcion;
			$iArray['PiesCub'] = $this->fltPiesCub;
			$iArray['MetrosCub'] = $this->fltMetrosCub;
			$iArray['HojaEntrega'] = $this->strHojaEntrega;
			$iArray['Ubicacion'] = $this->strUbicacion;
			$iArray['CreatedAt'] = $this->strCreatedAt;
			$iArray['UpdatedAt'] = $this->strUpdatedAt;
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
     * @property-read QQNode $GuiaId
     * @property-read QQNodeGuiasH $Guia
     * @property-read QQNode $IdPieza
     * @property-read QQNode $Kilos
     * @property-read QQNode $Libras
     * @property-read QQNode $Largo
     * @property-read QQNode $Alto
     * @property-read QQNode $Ancho
     * @property-read QQNode $Volumen
     * @property-read QQNode $Descripcion
     * @property-read QQNode $PiesCub
     * @property-read QQNode $MetrosCub
     * @property-read QQNode $HojaEntrega
     * @property-read QQNode $Ubicacion
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     *
     *
     * @property-read QQReverseReferenceNodePiezaCheckpointsH $PiezaCheckpointsHAsPieza

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeGuiaPiezasH extends QQNode {
		protected $strTableName = 'guia_piezas_h';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'GuiaPiezasH';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'GuiaId':
					return new QQNode('guia_id', 'GuiaId', 'Integer', $this);
				case 'Guia':
					return new QQNodeGuiasH('guia_id', 'Guia', 'Integer', $this);
				case 'IdPieza':
					return new QQNode('id_pieza', 'IdPieza', 'VarChar', $this);
				case 'Kilos':
					return new QQNode('kilos', 'Kilos', 'Float', $this);
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
					return new QQNode('created_at', 'CreatedAt', 'VarChar', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'VarChar', $this);
				case 'PiezaCheckpointsHAsPieza':
					return new QQReverseReferenceNodePiezaCheckpointsH($this, 'piezacheckpointshaspieza', 'reverse_reference', 'pieza_id', 'PiezaCheckpointsHAsPieza');

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
     * @property-read QQNodeGuiasH $Guia
     * @property-read QQNode $IdPieza
     * @property-read QQNode $Kilos
     * @property-read QQNode $Libras
     * @property-read QQNode $Largo
     * @property-read QQNode $Alto
     * @property-read QQNode $Ancho
     * @property-read QQNode $Volumen
     * @property-read QQNode $Descripcion
     * @property-read QQNode $PiesCub
     * @property-read QQNode $MetrosCub
     * @property-read QQNode $HojaEntrega
     * @property-read QQNode $Ubicacion
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     *
     *
     * @property-read QQReverseReferenceNodePiezaCheckpointsH $PiezaCheckpointsHAsPieza

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeGuiaPiezasH extends QQReverseReferenceNode {
		protected $strTableName = 'guia_piezas_h';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'GuiaPiezasH';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'GuiaId':
					return new QQNode('guia_id', 'GuiaId', 'integer', $this);
				case 'Guia':
					return new QQNodeGuiasH('guia_id', 'Guia', 'integer', $this);
				case 'IdPieza':
					return new QQNode('id_pieza', 'IdPieza', 'string', $this);
				case 'Kilos':
					return new QQNode('kilos', 'Kilos', 'double', $this);
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
					return new QQNode('created_at', 'CreatedAt', 'string', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'string', $this);
				case 'PiezaCheckpointsHAsPieza':
					return new QQReverseReferenceNodePiezaCheckpointsH($this, 'piezacheckpointshaspieza', 'reverse_reference', 'pieza_id', 'PiezaCheckpointsHAsPieza');

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
