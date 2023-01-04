<?php
	/**
	 * The abstract GuiasManifiestoGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the GuiasManifiesto subclass which
	 * extends this GuiasManifiestoGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the GuiasManifiesto class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $ManifiestoId the value for intManifiestoId (PK)
	 * @property integer $GuiaId the value for intGuiaId (PK)
	 * @property string $Numero the value for strNumero (Not Null)
	 * @property string $Tracking the value for strTracking (Not Null)
	 * @property string $Remitente the value for strRemitente (Not Null)
	 * @property string $DireccionRemitente the value for strDireccionRemitente 
	 * @property string $Destinatario the value for strDestinatario (Not Null)
	 * @property string $Aliado the value for strAliado 
	 * @property string $DireccionDestinatario the value for strDireccionDestinatario 
	 * @property string $Telefono the value for strTelefono 
	 * @property string $Email the value for strEmail 
	 * @property string $Descripcion the value for strDescripcion (Not Null)
	 * @property integer $Piezas the value for intPiezas (Not Null)
	 * @property double $Peso the value for fltPeso (Not Null)
	 * @property double $Valor the value for fltValor (Not Null)
	 * @property QDateTime $CreatedAt the value for dttCreatedAt 
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property Guias $Guia the value for the Guias object referenced by intGuiaId (PK)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class GuiasManifiestoGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK column guias_manifiesto.manifiesto_id
		 * @var integer intManifiestoId
		 */
		protected $intManifiestoId;
		const ManifiestoIdDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var integer __intManifiestoId;
		 */
		protected $__intManifiestoId;

		/**
		 * Protected member variable that maps to the database PK column guias_manifiesto.guia_id
		 * @var integer intGuiaId
		 */
		protected $intGuiaId;
		const GuiaIdDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var integer __intGuiaId;
		 */
		protected $__intGuiaId;

		/**
		 * Protected member variable that maps to the database column guias_manifiesto.numero
		 * @var string strNumero
		 */
		protected $strNumero;
		const NumeroMaxLength = 20;
		const NumeroDefault = null;


		/**
		 * Protected member variable that maps to the database column guias_manifiesto.tracking
		 * @var string strTracking
		 */
		protected $strTracking;
		const TrackingMaxLength = 50;
		const TrackingDefault = null;


		/**
		 * Protected member variable that maps to the database column guias_manifiesto.remitente
		 * @var string strRemitente
		 */
		protected $strRemitente;
		const RemitenteMaxLength = 80;
		const RemitenteDefault = null;


		/**
		 * Protected member variable that maps to the database column guias_manifiesto.direccion_remitente
		 * @var string strDireccionRemitente
		 */
		protected $strDireccionRemitente;
		const DireccionRemitenteMaxLength = 500;
		const DireccionRemitenteDefault = null;


		/**
		 * Protected member variable that maps to the database column guias_manifiesto.destinatario
		 * @var string strDestinatario
		 */
		protected $strDestinatario;
		const DestinatarioMaxLength = 80;
		const DestinatarioDefault = null;


		/**
		 * Protected member variable that maps to the database column guias_manifiesto.aliado
		 * @var string strAliado
		 */
		protected $strAliado;
		const AliadoMaxLength = 100;
		const AliadoDefault = null;


		/**
		 * Protected member variable that maps to the database column guias_manifiesto.direccion_destinatario
		 * @var string strDireccionDestinatario
		 */
		protected $strDireccionDestinatario;
		const DireccionDestinatarioMaxLength = 500;
		const DireccionDestinatarioDefault = null;


		/**
		 * Protected member variable that maps to the database column guias_manifiesto.telefono
		 * @var string strTelefono
		 */
		protected $strTelefono;
		const TelefonoMaxLength = 100;
		const TelefonoDefault = null;


		/**
		 * Protected member variable that maps to the database column guias_manifiesto.email
		 * @var string strEmail
		 */
		protected $strEmail;
		const EmailMaxLength = 100;
		const EmailDefault = null;


		/**
		 * Protected member variable that maps to the database column guias_manifiesto.descripcion
		 * @var string strDescripcion
		 */
		protected $strDescripcion;
		const DescripcionMaxLength = 150;
		const DescripcionDefault = null;


		/**
		 * Protected member variable that maps to the database column guias_manifiesto.piezas
		 * @var integer intPiezas
		 */
		protected $intPiezas;
		const PiezasDefault = null;


		/**
		 * Protected member variable that maps to the database column guias_manifiesto.peso
		 * @var double fltPeso
		 */
		protected $fltPeso;
		const PesoDefault = null;


		/**
		 * Protected member variable that maps to the database column guias_manifiesto.valor
		 * @var double fltValor
		 */
		protected $fltValor;
		const ValorDefault = null;


		/**
		 * Protected member variable that maps to the database column guias_manifiesto.created_at
		 * @var QDateTime dttCreatedAt
		 */
		protected $dttCreatedAt;
		const CreatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column guias_manifiesto.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


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
		 * in the database column guias_manifiesto.guia_id.
		 *
		 * NOTE: Always use the Guia property getter to correctly retrieve this Guias object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Guias objGuia
		 */
		protected $objGuia;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intManifiestoId = GuiasManifiesto::ManifiestoIdDefault;
			$this->intGuiaId = GuiasManifiesto::GuiaIdDefault;
			$this->strNumero = GuiasManifiesto::NumeroDefault;
			$this->strTracking = GuiasManifiesto::TrackingDefault;
			$this->strRemitente = GuiasManifiesto::RemitenteDefault;
			$this->strDireccionRemitente = GuiasManifiesto::DireccionRemitenteDefault;
			$this->strDestinatario = GuiasManifiesto::DestinatarioDefault;
			$this->strAliado = GuiasManifiesto::AliadoDefault;
			$this->strDireccionDestinatario = GuiasManifiesto::DireccionDestinatarioDefault;
			$this->strTelefono = GuiasManifiesto::TelefonoDefault;
			$this->strEmail = GuiasManifiesto::EmailDefault;
			$this->strDescripcion = GuiasManifiesto::DescripcionDefault;
			$this->intPiezas = GuiasManifiesto::PiezasDefault;
			$this->fltPeso = GuiasManifiesto::PesoDefault;
			$this->fltValor = GuiasManifiesto::ValorDefault;
			$this->dttCreatedAt = (GuiasManifiesto::CreatedAtDefault === null)?null:new QDateTime(GuiasManifiesto::CreatedAtDefault);
			$this->intCreatedBy = GuiasManifiesto::CreatedByDefault;
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
		 * Load a GuiasManifiesto from PK Info
		 * @param integer $intManifiestoId		 * @param integer $intGuiaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiasManifiesto
		 */
		public static function Load($intManifiestoId, $intGuiaId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'GuiasManifiesto', $intManifiestoId, $intGuiaId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = GuiasManifiesto::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::GuiasManifiesto()->ManifiestoId, $intManifiestoId),
					QQ::Equal(QQN::GuiasManifiesto()->GuiaId, $intGuiaId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all GuiasManifiestos
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiasManifiesto[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call GuiasManifiesto::QueryArray to perform the LoadAll query
			try {
				return GuiasManifiesto::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all GuiasManifiestos
		 * @return int
		 */
		public static function CountAll() {
			// Call GuiasManifiesto::QueryCount to perform the CountAll query
			return GuiasManifiesto::QueryCount(QQ::All());
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
			$objDatabase = GuiasManifiesto::GetDatabase();

			// Create/Build out the QueryBuilder object with GuiasManifiesto-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'guias_manifiesto');

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
				GuiasManifiesto::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('guias_manifiesto');

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
		 * Static Qcubed Query method to query for a single GuiasManifiesto object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return GuiasManifiesto the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GuiasManifiesto::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new GuiasManifiesto object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = GuiasManifiesto::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intManifiestoId][] = $objItem;
		
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
				return GuiasManifiesto::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of GuiasManifiesto objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return GuiasManifiesto[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GuiasManifiesto::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return GuiasManifiesto::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = GuiasManifiesto::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of GuiasManifiesto objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GuiasManifiesto::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = GuiasManifiesto::GetDatabase();

			$strQuery = GuiasManifiesto::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/guiasmanifiesto', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = GuiasManifiesto::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this GuiasManifiesto
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'guias_manifiesto';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'manifiesto_id', $strAliasPrefix . 'manifiesto_id');
			    $objBuilder->AddSelectItem($strTableName, 'guia_id', $strAliasPrefix . 'guia_id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'manifiesto_id', $strAliasPrefix . 'manifiesto_id');
			    $objBuilder->AddSelectItem($strTableName, 'guia_id', $strAliasPrefix . 'guia_id');
			    $objBuilder->AddSelectItem($strTableName, 'numero', $strAliasPrefix . 'numero');
			    $objBuilder->AddSelectItem($strTableName, 'tracking', $strAliasPrefix . 'tracking');
			    $objBuilder->AddSelectItem($strTableName, 'remitente', $strAliasPrefix . 'remitente');
			    $objBuilder->AddSelectItem($strTableName, 'direccion_remitente', $strAliasPrefix . 'direccion_remitente');
			    $objBuilder->AddSelectItem($strTableName, 'destinatario', $strAliasPrefix . 'destinatario');
			    $objBuilder->AddSelectItem($strTableName, 'aliado', $strAliasPrefix . 'aliado');
			    $objBuilder->AddSelectItem($strTableName, 'direccion_destinatario', $strAliasPrefix . 'direccion_destinatario');
			    $objBuilder->AddSelectItem($strTableName, 'telefono', $strAliasPrefix . 'telefono');
			    $objBuilder->AddSelectItem($strTableName, 'email', $strAliasPrefix . 'email');
			    $objBuilder->AddSelectItem($strTableName, 'descripcion', $strAliasPrefix . 'descripcion');
			    $objBuilder->AddSelectItem($strTableName, 'piezas', $strAliasPrefix . 'piezas');
			    $objBuilder->AddSelectItem($strTableName, 'peso', $strAliasPrefix . 'peso');
			    $objBuilder->AddSelectItem($strTableName, 'valor', $strAliasPrefix . 'valor');
			    $objBuilder->AddSelectItem($strTableName, 'created_at', $strAliasPrefix . 'created_at');
			    $objBuilder->AddSelectItem($strTableName, 'created_by', $strAliasPrefix . 'created_by');
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
			
			$strAlias = $strAliasPrefix . 'manifiesto_id';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->intManifiestoId != $objDbRow->GetColumn($strColumnAlias, 'Integer')) {
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
		 * Instantiate a GuiasManifiesto from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this GuiasManifiesto::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a GuiasManifiesto, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['manifiesto_id']) ? $strColumnAliasArray['manifiesto_id'] : 'manifiesto_id';
				$key = $objDbRow->GetColumn($strColumnAlias, 'Integer');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (GuiasManifiesto::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the GuiasManifiesto object
			$objToReturn = new GuiasManifiesto();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'manifiesto_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intManifiestoId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intManifiestoId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'guia_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intGuiaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intGuiaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'numero';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNumero = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tracking';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTracking = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'remitente';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strRemitente = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'direccion_remitente';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireccionRemitente = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'destinatario';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDestinatario = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'aliado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strAliado = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'direccion_destinatario';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireccionDestinatario = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'telefono';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTelefono = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'email';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEmail = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'descripcion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescripcion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'piezas';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intPiezas = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'peso';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPeso = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'valor';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltValor = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'created_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttCreatedAt = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAlias = $strAliasPrefix . 'created_by';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCreatedBy = $objDbRow->GetColumn($strAliasName, 'Integer');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->ManifiestoId != $objPreviousItem->ManifiestoId) {
						continue;
					}
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
				$strAliasPrefix = 'guias_manifiesto__';

			// Check for Guia Early Binding
			$strAlias = $strAliasPrefix . 'guia_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['guia_id']) ? null : $objExpansionAliasArray['guia_id']);
				$objToReturn->objGuia = Guias::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guia_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of GuiasManifiestos from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return GuiasManifiesto[]
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
					$objItem = GuiasManifiesto::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intManifiestoId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = GuiasManifiesto::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single GuiasManifiesto object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return GuiasManifiesto next row resulting from the query
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
			return GuiasManifiesto::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single GuiasManifiesto object,
		 * by ManifiestoId, GuiaId Index(es)
		 * @param integer $intManifiestoId
		 * @param integer $intGuiaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiasManifiesto
		*/
		public static function LoadByManifiestoIdGuiaId($intManifiestoId, $intGuiaId, $objOptionalClauses = null) {
			return GuiasManifiesto::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::GuiasManifiesto()->ManifiestoId, $intManifiestoId),
					QQ::Equal(QQN::GuiasManifiesto()->GuiaId, $intGuiaId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of GuiasManifiesto objects,
		 * by GuiaId Index(es)
		 * @param integer $intGuiaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiasManifiesto[]
		*/
		public static function LoadArrayByGuiaId($intGuiaId, $objOptionalClauses = null) {
			// Call GuiasManifiesto::QueryArray to perform the LoadArrayByGuiaId query
			try {
				return GuiasManifiesto::QueryArray(
					QQ::Equal(QQN::GuiasManifiesto()->GuiaId, $intGuiaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GuiasManifiestos
		 * by GuiaId Index(es)
		 * @param integer $intGuiaId
		 * @return int
		*/
		public static function CountByGuiaId($intGuiaId) {
			// Call GuiasManifiesto::QueryCount to perform the CountByGuiaId query
			return GuiasManifiesto::QueryCount(
				QQ::Equal(QQN::GuiasManifiesto()->GuiaId, $intGuiaId)
			);
		}

		/**
		 * Load an array of GuiasManifiesto objects,
		 * by ManifiestoId Index(es)
		 * @param integer $intManifiestoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiasManifiesto[]
		*/
		public static function LoadArrayByManifiestoId($intManifiestoId, $objOptionalClauses = null) {
			// Call GuiasManifiesto::QueryArray to perform the LoadArrayByManifiestoId query
			try {
				return GuiasManifiesto::QueryArray(
					QQ::Equal(QQN::GuiasManifiesto()->ManifiestoId, $intManifiestoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GuiasManifiestos
		 * by ManifiestoId Index(es)
		 * @param integer $intManifiestoId
		 * @return int
		*/
		public static function CountByManifiestoId($intManifiestoId) {
			// Call GuiasManifiesto::QueryCount to perform the CountByManifiestoId query
			return GuiasManifiesto::QueryCount(
				QQ::Equal(QQN::GuiasManifiesto()->ManifiestoId, $intManifiestoId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this GuiasManifiesto
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = GuiasManifiesto::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `guias_manifiesto` (
							`manifiesto_id`,
							`guia_id`,
							`numero`,
							`tracking`,
							`remitente`,
							`direccion_remitente`,
							`destinatario`,
							`aliado`,
							`direccion_destinatario`,
							`telefono`,
							`email`,
							`descripcion`,
							`piezas`,
							`peso`,
							`valor`,
							`created_at`,
							`created_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intManifiestoId) . ',
							' . $objDatabase->SqlVariable($this->intGuiaId) . ',
							' . $objDatabase->SqlVariable($this->strNumero) . ',
							' . $objDatabase->SqlVariable($this->strTracking) . ',
							' . $objDatabase->SqlVariable($this->strRemitente) . ',
							' . $objDatabase->SqlVariable($this->strDireccionRemitente) . ',
							' . $objDatabase->SqlVariable($this->strDestinatario) . ',
							' . $objDatabase->SqlVariable($this->strAliado) . ',
							' . $objDatabase->SqlVariable($this->strDireccionDestinatario) . ',
							' . $objDatabase->SqlVariable($this->strTelefono) . ',
							' . $objDatabase->SqlVariable($this->strEmail) . ',
							' . $objDatabase->SqlVariable($this->strDescripcion) . ',
							' . $objDatabase->SqlVariable($this->intPiezas) . ',
							' . $objDatabase->SqlVariable($this->fltPeso) . ',
							' . $objDatabase->SqlVariable($this->fltValor) . ',
							' . $objDatabase->SqlVariable($this->dttCreatedAt) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`guias_manifiesto`
						SET
							`manifiesto_id` = ' . $objDatabase->SqlVariable($this->intManifiestoId) . ',
							`guia_id` = ' . $objDatabase->SqlVariable($this->intGuiaId) . ',
							`numero` = ' . $objDatabase->SqlVariable($this->strNumero) . ',
							`tracking` = ' . $objDatabase->SqlVariable($this->strTracking) . ',
							`remitente` = ' . $objDatabase->SqlVariable($this->strRemitente) . ',
							`direccion_remitente` = ' . $objDatabase->SqlVariable($this->strDireccionRemitente) . ',
							`destinatario` = ' . $objDatabase->SqlVariable($this->strDestinatario) . ',
							`aliado` = ' . $objDatabase->SqlVariable($this->strAliado) . ',
							`direccion_destinatario` = ' . $objDatabase->SqlVariable($this->strDireccionDestinatario) . ',
							`telefono` = ' . $objDatabase->SqlVariable($this->strTelefono) . ',
							`email` = ' . $objDatabase->SqlVariable($this->strEmail) . ',
							`descripcion` = ' . $objDatabase->SqlVariable($this->strDescripcion) . ',
							`piezas` = ' . $objDatabase->SqlVariable($this->intPiezas) . ',
							`peso` = ' . $objDatabase->SqlVariable($this->fltPeso) . ',
							`valor` = ' . $objDatabase->SqlVariable($this->fltValor) . ',
							`created_at` = ' . $objDatabase->SqlVariable($this->dttCreatedAt) . ',
							`created_by` = ' . $objDatabase->SqlVariable($this->intCreatedBy) . '
						WHERE
							`manifiesto_id` = ' . $objDatabase->SqlVariable($this->__intManifiestoId) . ' AND 
							`guia_id` = ' . $objDatabase->SqlVariable($this->__intGuiaId) . '
					');
				}
					

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__intManifiestoId = $this->intManifiestoId;
			$this->__intGuiaId = $this->intGuiaId;


			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this GuiasManifiesto
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intManifiestoId)) || (is_null($this->intGuiaId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this GuiasManifiesto with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = GuiasManifiesto::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias_manifiesto`
				WHERE
					`manifiesto_id` = ' . $objDatabase->SqlVariable($this->intManifiestoId) . ' AND
					`guia_id` = ' . $objDatabase->SqlVariable($this->intGuiaId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this GuiasManifiesto ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'GuiasManifiesto', $this->intManifiestoId, $this->intGuiaId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all GuiasManifiestos
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = GuiasManifiesto::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias_manifiesto`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate guias_manifiesto table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = GuiasManifiesto::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `guias_manifiesto`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this GuiasManifiesto from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved GuiasManifiesto object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = GuiasManifiesto::Load($this->intManifiestoId, $this->intGuiaId);

			// Update $this's local variables to match
			$this->intManifiestoId = $objReloaded->intManifiestoId;
			$this->__intManifiestoId = $this->intManifiestoId;
			$this->GuiaId = $objReloaded->GuiaId;
			$this->__intGuiaId = $this->intGuiaId;
			$this->strNumero = $objReloaded->strNumero;
			$this->strTracking = $objReloaded->strTracking;
			$this->strRemitente = $objReloaded->strRemitente;
			$this->strDireccionRemitente = $objReloaded->strDireccionRemitente;
			$this->strDestinatario = $objReloaded->strDestinatario;
			$this->strAliado = $objReloaded->strAliado;
			$this->strDireccionDestinatario = $objReloaded->strDireccionDestinatario;
			$this->strTelefono = $objReloaded->strTelefono;
			$this->strEmail = $objReloaded->strEmail;
			$this->strDescripcion = $objReloaded->strDescripcion;
			$this->intPiezas = $objReloaded->intPiezas;
			$this->fltPeso = $objReloaded->fltPeso;
			$this->fltValor = $objReloaded->fltValor;
			$this->dttCreatedAt = $objReloaded->dttCreatedAt;
			$this->intCreatedBy = $objReloaded->intCreatedBy;
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
				case 'ManifiestoId':
					/**
					 * Gets the value for intManifiestoId (PK)
					 * @return integer
					 */
					return $this->intManifiestoId;

				case 'GuiaId':
					/**
					 * Gets the value for intGuiaId (PK)
					 * @return integer
					 */
					return $this->intGuiaId;

				case 'Numero':
					/**
					 * Gets the value for strNumero (Not Null)
					 * @return string
					 */
					return $this->strNumero;

				case 'Tracking':
					/**
					 * Gets the value for strTracking (Not Null)
					 * @return string
					 */
					return $this->strTracking;

				case 'Remitente':
					/**
					 * Gets the value for strRemitente (Not Null)
					 * @return string
					 */
					return $this->strRemitente;

				case 'DireccionRemitente':
					/**
					 * Gets the value for strDireccionRemitente 
					 * @return string
					 */
					return $this->strDireccionRemitente;

				case 'Destinatario':
					/**
					 * Gets the value for strDestinatario (Not Null)
					 * @return string
					 */
					return $this->strDestinatario;

				case 'Aliado':
					/**
					 * Gets the value for strAliado 
					 * @return string
					 */
					return $this->strAliado;

				case 'DireccionDestinatario':
					/**
					 * Gets the value for strDireccionDestinatario 
					 * @return string
					 */
					return $this->strDireccionDestinatario;

				case 'Telefono':
					/**
					 * Gets the value for strTelefono 
					 * @return string
					 */
					return $this->strTelefono;

				case 'Email':
					/**
					 * Gets the value for strEmail 
					 * @return string
					 */
					return $this->strEmail;

				case 'Descripcion':
					/**
					 * Gets the value for strDescripcion (Not Null)
					 * @return string
					 */
					return $this->strDescripcion;

				case 'Piezas':
					/**
					 * Gets the value for intPiezas (Not Null)
					 * @return integer
					 */
					return $this->intPiezas;

				case 'Peso':
					/**
					 * Gets the value for fltPeso (Not Null)
					 * @return double
					 */
					return $this->fltPeso;

				case 'Valor':
					/**
					 * Gets the value for fltValor (Not Null)
					 * @return double
					 */
					return $this->fltValor;

				case 'CreatedAt':
					/**
					 * Gets the value for dttCreatedAt 
					 * @return QDateTime
					 */
					return $this->dttCreatedAt;

				case 'CreatedBy':
					/**
					 * Gets the value for intCreatedBy 
					 * @return integer
					 */
					return $this->intCreatedBy;


				///////////////////
				// Member Objects
				///////////////////
				case 'Guia':
					/**
					 * Gets the value for the Guias object referenced by intGuiaId (PK)
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
				case 'ManifiestoId':
					/**
					 * Sets the value for intManifiestoId (PK)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intManifiestoId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GuiaId':
					/**
					 * Sets the value for intGuiaId (PK)
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

				case 'Numero':
					/**
					 * Sets the value for strNumero (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNumero = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Tracking':
					/**
					 * Sets the value for strTracking (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTracking = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Remitente':
					/**
					 * Sets the value for strRemitente (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strRemitente = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DireccionRemitente':
					/**
					 * Sets the value for strDireccionRemitente 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDireccionRemitente = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Destinatario':
					/**
					 * Sets the value for strDestinatario (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDestinatario = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Aliado':
					/**
					 * Sets the value for strAliado 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strAliado = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DireccionDestinatario':
					/**
					 * Sets the value for strDireccionDestinatario 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDireccionDestinatario = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Telefono':
					/**
					 * Sets the value for strTelefono 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTelefono = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Email':
					/**
					 * Sets the value for strEmail 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEmail = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Descripcion':
					/**
					 * Sets the value for strDescripcion (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescripcion = QType::Cast($mixValue, QType::String));
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

				case 'Peso':
					/**
					 * Sets the value for fltPeso (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPeso = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Valor':
					/**
					 * Sets the value for fltValor (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltValor = QType::Cast($mixValue, QType::Float));
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


				///////////////////
				// Member Objects
				///////////////////
				case 'Guia':
					/**
					 * Sets the value for the Guias object referenced by intGuiaId (PK)
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
							throw new QCallerException('Unable to set an unsaved Guia for this GuiasManifiesto');

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
			return "guias_manifiesto";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[GuiasManifiesto::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="GuiasManifiesto"><sequence>';
			$strToReturn .= '<element name="ManifiestoId" type="xsd:int"/>';
			$strToReturn .= '<element name="Guia" type="xsd1:Guias"/>';
			$strToReturn .= '<element name="Numero" type="xsd:string"/>';
			$strToReturn .= '<element name="Tracking" type="xsd:string"/>';
			$strToReturn .= '<element name="Remitente" type="xsd:string"/>';
			$strToReturn .= '<element name="DireccionRemitente" type="xsd:string"/>';
			$strToReturn .= '<element name="Destinatario" type="xsd:string"/>';
			$strToReturn .= '<element name="Aliado" type="xsd:string"/>';
			$strToReturn .= '<element name="DireccionDestinatario" type="xsd:string"/>';
			$strToReturn .= '<element name="Telefono" type="xsd:string"/>';
			$strToReturn .= '<element name="Email" type="xsd:string"/>';
			$strToReturn .= '<element name="Descripcion" type="xsd:string"/>';
			$strToReturn .= '<element name="Piezas" type="xsd:int"/>';
			$strToReturn .= '<element name="Peso" type="xsd:float"/>';
			$strToReturn .= '<element name="Valor" type="xsd:float"/>';
			$strToReturn .= '<element name="CreatedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="CreatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('GuiasManifiesto', $strComplexTypeArray)) {
				$strComplexTypeArray['GuiasManifiesto'] = GuiasManifiesto::GetSoapComplexTypeXml();
				Guias::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, GuiasManifiesto::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new GuiasManifiesto();
			if (property_exists($objSoapObject, 'ManifiestoId'))
				$objToReturn->intManifiestoId = $objSoapObject->ManifiestoId;
			if ((property_exists($objSoapObject, 'Guia')) &&
				($objSoapObject->Guia))
				$objToReturn->Guia = Guias::GetObjectFromSoapObject($objSoapObject->Guia);
			if (property_exists($objSoapObject, 'Numero'))
				$objToReturn->strNumero = $objSoapObject->Numero;
			if (property_exists($objSoapObject, 'Tracking'))
				$objToReturn->strTracking = $objSoapObject->Tracking;
			if (property_exists($objSoapObject, 'Remitente'))
				$objToReturn->strRemitente = $objSoapObject->Remitente;
			if (property_exists($objSoapObject, 'DireccionRemitente'))
				$objToReturn->strDireccionRemitente = $objSoapObject->DireccionRemitente;
			if (property_exists($objSoapObject, 'Destinatario'))
				$objToReturn->strDestinatario = $objSoapObject->Destinatario;
			if (property_exists($objSoapObject, 'Aliado'))
				$objToReturn->strAliado = $objSoapObject->Aliado;
			if (property_exists($objSoapObject, 'DireccionDestinatario'))
				$objToReturn->strDireccionDestinatario = $objSoapObject->DireccionDestinatario;
			if (property_exists($objSoapObject, 'Telefono'))
				$objToReturn->strTelefono = $objSoapObject->Telefono;
			if (property_exists($objSoapObject, 'Email'))
				$objToReturn->strEmail = $objSoapObject->Email;
			if (property_exists($objSoapObject, 'Descripcion'))
				$objToReturn->strDescripcion = $objSoapObject->Descripcion;
			if (property_exists($objSoapObject, 'Piezas'))
				$objToReturn->intPiezas = $objSoapObject->Piezas;
			if (property_exists($objSoapObject, 'Peso'))
				$objToReturn->fltPeso = $objSoapObject->Peso;
			if (property_exists($objSoapObject, 'Valor'))
				$objToReturn->fltValor = $objSoapObject->Valor;
			if (property_exists($objSoapObject, 'CreatedAt'))
				$objToReturn->dttCreatedAt = new QDateTime($objSoapObject->CreatedAt);
			if (property_exists($objSoapObject, 'CreatedBy'))
				$objToReturn->intCreatedBy = $objSoapObject->CreatedBy;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, GuiasManifiesto::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objGuia)
				$objObject->objGuia = Guias::GetSoapObjectFromObject($objObject->objGuia, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intGuiaId = null;
			if ($objObject->dttCreatedAt)
				$objObject->dttCreatedAt = $objObject->dttCreatedAt->qFormat(QDateTime::FormatSoap);
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
			$iArray['ManifiestoId'] = $this->intManifiestoId;
			$iArray['GuiaId'] = $this->intGuiaId;
			$iArray['Numero'] = $this->strNumero;
			$iArray['Tracking'] = $this->strTracking;
			$iArray['Remitente'] = $this->strRemitente;
			$iArray['DireccionRemitente'] = $this->strDireccionRemitente;
			$iArray['Destinatario'] = $this->strDestinatario;
			$iArray['Aliado'] = $this->strAliado;
			$iArray['DireccionDestinatario'] = $this->strDireccionDestinatario;
			$iArray['Telefono'] = $this->strTelefono;
			$iArray['Email'] = $this->strEmail;
			$iArray['Descripcion'] = $this->strDescripcion;
			$iArray['Piezas'] = $this->intPiezas;
			$iArray['Peso'] = $this->fltPeso;
			$iArray['Valor'] = $this->fltValor;
			$iArray['CreatedAt'] = $this->dttCreatedAt;
			$iArray['CreatedBy'] = $this->intCreatedBy;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  array( $this->intManifiestoId,  $this->intGuiaId) ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $ManifiestoId
     * @property-read QQNode $GuiaId
     * @property-read QQNodeGuias $Guia
     * @property-read QQNode $Numero
     * @property-read QQNode $Tracking
     * @property-read QQNode $Remitente
     * @property-read QQNode $DireccionRemitente
     * @property-read QQNode $Destinatario
     * @property-read QQNode $Aliado
     * @property-read QQNode $DireccionDestinatario
     * @property-read QQNode $Telefono
     * @property-read QQNode $Email
     * @property-read QQNode $Descripcion
     * @property-read QQNode $Piezas
     * @property-read QQNode $Peso
     * @property-read QQNode $Valor
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $CreatedBy
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeGuiasManifiesto extends QQNode {
		protected $strTableName = 'guias_manifiesto';
		protected $strPrimaryKey = 'manifiesto_id';
		protected $strClassName = 'GuiasManifiesto';
		public function __get($strName) {
			switch ($strName) {
				case 'ManifiestoId':
					return new QQNode('manifiesto_id', 'ManifiestoId', 'Integer', $this);
				case 'GuiaId':
					return new QQNode('guia_id', 'GuiaId', 'Integer', $this);
				case 'Guia':
					return new QQNodeGuias('guia_id', 'Guia', 'Integer', $this);
				case 'Numero':
					return new QQNode('numero', 'Numero', 'VarChar', $this);
				case 'Tracking':
					return new QQNode('tracking', 'Tracking', 'VarChar', $this);
				case 'Remitente':
					return new QQNode('remitente', 'Remitente', 'VarChar', $this);
				case 'DireccionRemitente':
					return new QQNode('direccion_remitente', 'DireccionRemitente', 'VarChar', $this);
				case 'Destinatario':
					return new QQNode('destinatario', 'Destinatario', 'VarChar', $this);
				case 'Aliado':
					return new QQNode('aliado', 'Aliado', 'VarChar', $this);
				case 'DireccionDestinatario':
					return new QQNode('direccion_destinatario', 'DireccionDestinatario', 'VarChar', $this);
				case 'Telefono':
					return new QQNode('telefono', 'Telefono', 'VarChar', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'VarChar', $this);
				case 'Descripcion':
					return new QQNode('descripcion', 'Descripcion', 'VarChar', $this);
				case 'Piezas':
					return new QQNode('piezas', 'Piezas', 'Integer', $this);
				case 'Peso':
					return new QQNode('peso', 'Peso', 'Float', $this);
				case 'Valor':
					return new QQNode('valor', 'Valor', 'Float', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'DateTime', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'Integer', $this);

				case '_PrimaryKeyNode':
					return new QQNode('manifiesto_id', 'ManifiestoId', 'Integer', $this);
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
     * @property-read QQNode $ManifiestoId
     * @property-read QQNode $GuiaId
     * @property-read QQNodeGuias $Guia
     * @property-read QQNode $Numero
     * @property-read QQNode $Tracking
     * @property-read QQNode $Remitente
     * @property-read QQNode $DireccionRemitente
     * @property-read QQNode $Destinatario
     * @property-read QQNode $Aliado
     * @property-read QQNode $DireccionDestinatario
     * @property-read QQNode $Telefono
     * @property-read QQNode $Email
     * @property-read QQNode $Descripcion
     * @property-read QQNode $Piezas
     * @property-read QQNode $Peso
     * @property-read QQNode $Valor
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $CreatedBy
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeGuiasManifiesto extends QQReverseReferenceNode {
		protected $strTableName = 'guias_manifiesto';
		protected $strPrimaryKey = 'manifiesto_id';
		protected $strClassName = 'GuiasManifiesto';
		public function __get($strName) {
			switch ($strName) {
				case 'ManifiestoId':
					return new QQNode('manifiesto_id', 'ManifiestoId', 'integer', $this);
				case 'GuiaId':
					return new QQNode('guia_id', 'GuiaId', 'integer', $this);
				case 'Guia':
					return new QQNodeGuias('guia_id', 'Guia', 'integer', $this);
				case 'Numero':
					return new QQNode('numero', 'Numero', 'string', $this);
				case 'Tracking':
					return new QQNode('tracking', 'Tracking', 'string', $this);
				case 'Remitente':
					return new QQNode('remitente', 'Remitente', 'string', $this);
				case 'DireccionRemitente':
					return new QQNode('direccion_remitente', 'DireccionRemitente', 'string', $this);
				case 'Destinatario':
					return new QQNode('destinatario', 'Destinatario', 'string', $this);
				case 'Aliado':
					return new QQNode('aliado', 'Aliado', 'string', $this);
				case 'DireccionDestinatario':
					return new QQNode('direccion_destinatario', 'DireccionDestinatario', 'string', $this);
				case 'Telefono':
					return new QQNode('telefono', 'Telefono', 'string', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'string', $this);
				case 'Descripcion':
					return new QQNode('descripcion', 'Descripcion', 'string', $this);
				case 'Piezas':
					return new QQNode('piezas', 'Piezas', 'integer', $this);
				case 'Peso':
					return new QQNode('peso', 'Peso', 'double', $this);
				case 'Valor':
					return new QQNode('valor', 'Valor', 'double', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'QDateTime', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'integer', $this);

				case '_PrimaryKeyNode':
					return new QQNode('manifiesto_id', 'ManifiestoId', 'integer', $this);
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
