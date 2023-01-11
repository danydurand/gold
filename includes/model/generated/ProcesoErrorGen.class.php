<?php
	/**
	 * The abstract ProcesoErrorGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the ProcesoError subclass which
	 * extends this ProcesoErrorGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ProcesoError class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Nombre Nombre del proceso. (Not Null)
	 * @property string $Usuario Usuario quien creó el proceso. (Not Null)
	 * @property QDateTime $Fecha Fecha en que ocurrió el proceso. (Not Null)
	 * @property QDateTime $HoraInicial Hora inicial del proceso. (Not Null)
	 * @property QDateTime $HoraFinal Hora final del proceso. 
	 * @property string $Comentario Comentarios y/u observaciones relacionados al proceso. 
	 * @property boolean $NotificarAdmin Confirmación de notificación al administrador del sistema (Not Null)
	 * @property boolean $NotificarUsuario Confirmacion de notificacion al usuario del sistema. (Not Null)
	 * @property-read Cola $_Cola the value for the private _objCola (Read-Only) if set due to an expansion on the cola.proceso_error_id reverse relationship
	 * @property-read Cola[] $_ColaArray the value for the private _objColaArray (Read-Only) if set due to an ExpandAsArray on the cola.proceso_error_id reverse relationship
	 * @property-read GcoTemp $_GcoTemp the value for the private _objGcoTemp (Read-Only) if set due to an expansion on the gco_temp.proceso_error_id reverse relationship
	 * @property-read GcoTemp[] $_GcoTempArray the value for the private _objGcoTempArray (Read-Only) if set due to an ExpandAsArray on the gco_temp.proceso_error_id reverse relationship
	 * @property-read MatchPieces $_MatchPieces the value for the private _objMatchPieces (Read-Only) if set due to an expansion on the match_pieces.proceso_error_id reverse relationship
	 * @property-read MatchPieces[] $_MatchPiecesArray the value for the private _objMatchPiecesArray (Read-Only) if set due to an ExpandAsArray on the match_pieces.proceso_error_id reverse relationship
	 * @property-read PiezaRecibida $_PiezaRecibida the value for the private _objPiezaRecibida (Read-Only) if set due to an expansion on the pieza_recibida.proceso_error_id reverse relationship
	 * @property-read PiezaRecibida[] $_PiezaRecibidaArray the value for the private _objPiezaRecibidaArray (Read-Only) if set due to an ExpandAsArray on the pieza_recibida.proceso_error_id reverse relationship
	 * @property-read PiezasTemp $_PiezasTemp the value for the private _objPiezasTemp (Read-Only) if set due to an expansion on the piezas_temp.proceso_error_id reverse relationship
	 * @property-read PiezasTemp[] $_PiezasTempArray the value for the private _objPiezasTempArray (Read-Only) if set due to an ExpandAsArray on the piezas_temp.proceso_error_id reverse relationship
	 * @property-read ProcessAwbs $_ProcessAwbs the value for the private _objProcessAwbs (Read-Only) if set due to an expansion on the process_awbs.proceso_error_id reverse relationship
	 * @property-read ProcessAwbs[] $_ProcessAwbsArray the value for the private _objProcessAwbsArray (Read-Only) if set due to an ExpandAsArray on the process_awbs.proceso_error_id reverse relationship
	 * @property-read ProcessPieces $_ProcessPieces the value for the private _objProcessPieces (Read-Only) if set due to an expansion on the process_pieces.proceso_error_id reverse relationship
	 * @property-read ProcessPieces[] $_ProcessPiecesArray the value for the private _objProcessPiecesArray (Read-Only) if set due to an ExpandAsArray on the process_pieces.proceso_error_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ProcesoErrorGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column proceso_error.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column proceso_error.nombre
		 * Nombre del proceso.		 * @var string strNombre
		 */
		protected $strNombre;
		const NombreMaxLength = 300;
		const NombreDefault = null;


		/**
		 * Protected member variable that maps to the database column proceso_error.usuario
		 * Usuario quien creó el proceso.		 * @var string strUsuario
		 */
		protected $strUsuario;
		const UsuarioMaxLength = 8;
		const UsuarioDefault = null;


		/**
		 * Protected member variable that maps to the database column proceso_error.fecha
		 * Fecha en que ocurrió el proceso.		 * @var QDateTime dttFecha
		 */
		protected $dttFecha;
		const FechaDefault = null;


		/**
		 * Protected member variable that maps to the database column proceso_error.hora_inicial
		 * Hora inicial del proceso.		 * @var QDateTime dttHoraInicial
		 */
		protected $dttHoraInicial;
		const HoraInicialDefault = null;


		/**
		 * Protected member variable that maps to the database column proceso_error.hora_final
		 * Hora final del proceso.		 * @var QDateTime dttHoraFinal
		 */
		protected $dttHoraFinal;
		const HoraFinalDefault = null;


		/**
		 * Protected member variable that maps to the database column proceso_error.comentario
		 * Comentarios y/u observaciones relacionados al proceso.		 * @var string strComentario
		 */
		protected $strComentario;
		const ComentarioDefault = null;


		/**
		 * Protected member variable that maps to the database column proceso_error.notificar_admin
		 * Confirmación de notificación al administrador del sistema		 * @var boolean blnNotificarAdmin
		 */
		protected $blnNotificarAdmin;
		const NotificarAdminDefault = null;


		/**
		 * Protected member variable that maps to the database column proceso_error.notificar_usuario
		 * Confirmacion de notificacion al usuario del sistema.		 * @var boolean blnNotificarUsuario
		 */
		protected $blnNotificarUsuario;
		const NotificarUsuarioDefault = null;


		/**
		 * Private member variable that stores a reference to a single Cola object
		 * (of type Cola), if this ProcesoError object was restored with
		 * an expansion on the cola association table.
		 * @var Cola _objCola;
		 */
		private $_objCola;

		/**
		 * Private member variable that stores a reference to an array of Cola objects
		 * (of type Cola[]), if this ProcesoError object was restored with
		 * an ExpandAsArray on the cola association table.
		 * @var Cola[] _objColaArray;
		 */
		private $_objColaArray = null;

		/**
		 * Private member variable that stores a reference to a single GcoTemp object
		 * (of type GcoTemp), if this ProcesoError object was restored with
		 * an expansion on the gco_temp association table.
		 * @var GcoTemp _objGcoTemp;
		 */
		private $_objGcoTemp;

		/**
		 * Private member variable that stores a reference to an array of GcoTemp objects
		 * (of type GcoTemp[]), if this ProcesoError object was restored with
		 * an ExpandAsArray on the gco_temp association table.
		 * @var GcoTemp[] _objGcoTempArray;
		 */
		private $_objGcoTempArray = null;

		/**
		 * Private member variable that stores a reference to a single MatchPieces object
		 * (of type MatchPieces), if this ProcesoError object was restored with
		 * an expansion on the match_pieces association table.
		 * @var MatchPieces _objMatchPieces;
		 */
		private $_objMatchPieces;

		/**
		 * Private member variable that stores a reference to an array of MatchPieces objects
		 * (of type MatchPieces[]), if this ProcesoError object was restored with
		 * an ExpandAsArray on the match_pieces association table.
		 * @var MatchPieces[] _objMatchPiecesArray;
		 */
		private $_objMatchPiecesArray = null;

		/**
		 * Private member variable that stores a reference to a single PiezaRecibida object
		 * (of type PiezaRecibida), if this ProcesoError object was restored with
		 * an expansion on the pieza_recibida association table.
		 * @var PiezaRecibida _objPiezaRecibida;
		 */
		private $_objPiezaRecibida;

		/**
		 * Private member variable that stores a reference to an array of PiezaRecibida objects
		 * (of type PiezaRecibida[]), if this ProcesoError object was restored with
		 * an ExpandAsArray on the pieza_recibida association table.
		 * @var PiezaRecibida[] _objPiezaRecibidaArray;
		 */
		private $_objPiezaRecibidaArray = null;

		/**
		 * Private member variable that stores a reference to a single PiezasTemp object
		 * (of type PiezasTemp), if this ProcesoError object was restored with
		 * an expansion on the piezas_temp association table.
		 * @var PiezasTemp _objPiezasTemp;
		 */
		private $_objPiezasTemp;

		/**
		 * Private member variable that stores a reference to an array of PiezasTemp objects
		 * (of type PiezasTemp[]), if this ProcesoError object was restored with
		 * an ExpandAsArray on the piezas_temp association table.
		 * @var PiezasTemp[] _objPiezasTempArray;
		 */
		private $_objPiezasTempArray = null;

		/**
		 * Private member variable that stores a reference to a single ProcessAwbs object
		 * (of type ProcessAwbs), if this ProcesoError object was restored with
		 * an expansion on the process_awbs association table.
		 * @var ProcessAwbs _objProcessAwbs;
		 */
		private $_objProcessAwbs;

		/**
		 * Private member variable that stores a reference to an array of ProcessAwbs objects
		 * (of type ProcessAwbs[]), if this ProcesoError object was restored with
		 * an ExpandAsArray on the process_awbs association table.
		 * @var ProcessAwbs[] _objProcessAwbsArray;
		 */
		private $_objProcessAwbsArray = null;

		/**
		 * Private member variable that stores a reference to a single ProcessPieces object
		 * (of type ProcessPieces), if this ProcesoError object was restored with
		 * an expansion on the process_pieces association table.
		 * @var ProcessPieces _objProcessPieces;
		 */
		private $_objProcessPieces;

		/**
		 * Private member variable that stores a reference to an array of ProcessPieces objects
		 * (of type ProcessPieces[]), if this ProcesoError object was restored with
		 * an ExpandAsArray on the process_pieces association table.
		 * @var ProcessPieces[] _objProcessPiecesArray;
		 */
		private $_objProcessPiecesArray = null;

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
			$this->intId = ProcesoError::IdDefault;
			$this->strNombre = ProcesoError::NombreDefault;
			$this->strUsuario = ProcesoError::UsuarioDefault;
			$this->dttFecha = (ProcesoError::FechaDefault === null)?null:new QDateTime(ProcesoError::FechaDefault);
			$this->dttHoraInicial = (ProcesoError::HoraInicialDefault === null)?null:new QDateTime(ProcesoError::HoraInicialDefault);
			$this->dttHoraFinal = (ProcesoError::HoraFinalDefault === null)?null:new QDateTime(ProcesoError::HoraFinalDefault);
			$this->strComentario = ProcesoError::ComentarioDefault;
			$this->blnNotificarAdmin = ProcesoError::NotificarAdminDefault;
			$this->blnNotificarUsuario = ProcesoError::NotificarUsuarioDefault;
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
		 * Load a ProcesoError from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ProcesoError
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'ProcesoError', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = ProcesoError::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ProcesoError()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all ProcesoErrors
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ProcesoError[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call ProcesoError::QueryArray to perform the LoadAll query
			try {
				return ProcesoError::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ProcesoErrors
		 * @return int
		 */
		public static function CountAll() {
			// Call ProcesoError::QueryCount to perform the CountAll query
			return ProcesoError::QueryCount(QQ::All());
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
			$objDatabase = ProcesoError::GetDatabase();

			// Create/Build out the QueryBuilder object with ProcesoError-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'proceso_error');

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
				ProcesoError::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('proceso_error');

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
		 * Static Qcubed Query method to query for a single ProcesoError object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ProcesoError the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ProcesoError::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new ProcesoError object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ProcesoError::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return ProcesoError::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of ProcesoError objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ProcesoError[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ProcesoError::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ProcesoError::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = ProcesoError::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of ProcesoError objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ProcesoError::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = ProcesoError::GetDatabase();

			$strQuery = ProcesoError::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/procesoerror', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = ProcesoError::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ProcesoError
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'proceso_error';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'nombre', $strAliasPrefix . 'nombre');
			    $objBuilder->AddSelectItem($strTableName, 'usuario', $strAliasPrefix . 'usuario');
			    $objBuilder->AddSelectItem($strTableName, 'fecha', $strAliasPrefix . 'fecha');
			    $objBuilder->AddSelectItem($strTableName, 'hora_inicial', $strAliasPrefix . 'hora_inicial');
			    $objBuilder->AddSelectItem($strTableName, 'hora_final', $strAliasPrefix . 'hora_final');
			    $objBuilder->AddSelectItem($strTableName, 'comentario', $strAliasPrefix . 'comentario');
			    $objBuilder->AddSelectItem($strTableName, 'notificar_admin', $strAliasPrefix . 'notificar_admin');
			    $objBuilder->AddSelectItem($strTableName, 'notificar_usuario', $strAliasPrefix . 'notificar_usuario');
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
		 * Instantiate a ProcesoError from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ProcesoError::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a ProcesoError, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (ProcesoError::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the ProcesoError object
			$objToReturn = new ProcesoError();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nombre';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombre = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'usuario';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strUsuario = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFecha = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'hora_inicial';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttHoraInicial = $objDbRow->GetColumn($strAliasName, 'Time');
			$strAlias = $strAliasPrefix . 'hora_final';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttHoraFinal = $objDbRow->GetColumn($strAliasName, 'Time');
			$strAlias = $strAliasPrefix . 'comentario';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strComentario = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAlias = $strAliasPrefix . 'notificar_admin';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnNotificarAdmin = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'notificar_usuario';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnNotificarUsuario = $objDbRow->GetColumn($strAliasName, 'Bit');

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
				$strAliasPrefix = 'proceso_error__';


				

			// Check for Cola Virtual Binding
			$strAlias = $strAliasPrefix . 'cola__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['cola']) ? null : $objExpansionAliasArray['cola']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objColaArray)
				$objToReturn->_objColaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objColaArray[] = Cola::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cola__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objCola)) {
					$objToReturn->_objCola = Cola::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cola__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GcoTemp Virtual Binding
			$strAlias = $strAliasPrefix . 'gcotemp__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['gcotemp']) ? null : $objExpansionAliasArray['gcotemp']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGcoTempArray)
				$objToReturn->_objGcoTempArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGcoTempArray[] = GcoTemp::InstantiateDbRow($objDbRow, $strAliasPrefix . 'gcotemp__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGcoTemp)) {
					$objToReturn->_objGcoTemp = GcoTemp::InstantiateDbRow($objDbRow, $strAliasPrefix . 'gcotemp__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for MatchPieces Virtual Binding
			$strAlias = $strAliasPrefix . 'matchpieces__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['matchpieces']) ? null : $objExpansionAliasArray['matchpieces']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objMatchPiecesArray)
				$objToReturn->_objMatchPiecesArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objMatchPiecesArray[] = MatchPieces::InstantiateDbRow($objDbRow, $strAliasPrefix . 'matchpieces__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objMatchPieces)) {
					$objToReturn->_objMatchPieces = MatchPieces::InstantiateDbRow($objDbRow, $strAliasPrefix . 'matchpieces__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for PiezaRecibida Virtual Binding
			$strAlias = $strAliasPrefix . 'piezarecibida__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['piezarecibida']) ? null : $objExpansionAliasArray['piezarecibida']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objPiezaRecibidaArray)
				$objToReturn->_objPiezaRecibidaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objPiezaRecibidaArray[] = PiezaRecibida::InstantiateDbRow($objDbRow, $strAliasPrefix . 'piezarecibida__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objPiezaRecibida)) {
					$objToReturn->_objPiezaRecibida = PiezaRecibida::InstantiateDbRow($objDbRow, $strAliasPrefix . 'piezarecibida__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for PiezasTemp Virtual Binding
			$strAlias = $strAliasPrefix . 'piezastemp__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['piezastemp']) ? null : $objExpansionAliasArray['piezastemp']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objPiezasTempArray)
				$objToReturn->_objPiezasTempArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objPiezasTempArray[] = PiezasTemp::InstantiateDbRow($objDbRow, $strAliasPrefix . 'piezastemp__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objPiezasTemp)) {
					$objToReturn->_objPiezasTemp = PiezasTemp::InstantiateDbRow($objDbRow, $strAliasPrefix . 'piezastemp__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for ProcessAwbs Virtual Binding
			$strAlias = $strAliasPrefix . 'processawbs__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['processawbs']) ? null : $objExpansionAliasArray['processawbs']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objProcessAwbsArray)
				$objToReturn->_objProcessAwbsArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objProcessAwbsArray[] = ProcessAwbs::InstantiateDbRow($objDbRow, $strAliasPrefix . 'processawbs__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objProcessAwbs)) {
					$objToReturn->_objProcessAwbs = ProcessAwbs::InstantiateDbRow($objDbRow, $strAliasPrefix . 'processawbs__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for ProcessPieces Virtual Binding
			$strAlias = $strAliasPrefix . 'processpieces__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['processpieces']) ? null : $objExpansionAliasArray['processpieces']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objProcessPiecesArray)
				$objToReturn->_objProcessPiecesArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objProcessPiecesArray[] = ProcessPieces::InstantiateDbRow($objDbRow, $strAliasPrefix . 'processpieces__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objProcessPieces)) {
					$objToReturn->_objProcessPieces = ProcessPieces::InstantiateDbRow($objDbRow, $strAliasPrefix . 'processpieces__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of ProcesoErrors from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return ProcesoError[]
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
					$objItem = ProcesoError::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ProcesoError::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single ProcesoError object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return ProcesoError next row resulting from the query
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
			return ProcesoError::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single ProcesoError object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ProcesoError
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return ProcesoError::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ProcesoError()->Id, $intId)
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
		 * Save this ProcesoError
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `proceso_error` (
							`nombre`,
							`usuario`,
							`fecha`,
							`hora_inicial`,
							`hora_final`,
							`comentario`,
							`notificar_admin`,
							`notificar_usuario`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strNombre) . ',
							' . $objDatabase->SqlVariable($this->strUsuario) . ',
							' . $objDatabase->SqlVariable($this->dttFecha) . ',
							' . $objDatabase->SqlVariable($this->dttHoraInicial) . ',
							' . $objDatabase->SqlVariable($this->dttHoraFinal) . ',
							' . $objDatabase->SqlVariable($this->strComentario) . ',
							' . $objDatabase->SqlVariable($this->blnNotificarAdmin) . ',
							' . $objDatabase->SqlVariable($this->blnNotificarUsuario) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('proceso_error', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`proceso_error`
						SET
							`nombre` = ' . $objDatabase->SqlVariable($this->strNombre) . ',
							`usuario` = ' . $objDatabase->SqlVariable($this->strUsuario) . ',
							`fecha` = ' . $objDatabase->SqlVariable($this->dttFecha) . ',
							`hora_inicial` = ' . $objDatabase->SqlVariable($this->dttHoraInicial) . ',
							`hora_final` = ' . $objDatabase->SqlVariable($this->dttHoraFinal) . ',
							`comentario` = ' . $objDatabase->SqlVariable($this->strComentario) . ',
							`notificar_admin` = ' . $objDatabase->SqlVariable($this->blnNotificarAdmin) . ',
							`notificar_usuario` = ' . $objDatabase->SqlVariable($this->blnNotificarUsuario) . '
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
		 * Delete this ProcesoError
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ProcesoError with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`proceso_error`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this ProcesoError ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'ProcesoError', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all ProcesoErrors
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`proceso_error`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate proceso_error table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `proceso_error`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this ProcesoError from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ProcesoError object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = ProcesoError::Load($this->intId);

			// Update $this's local variables to match
			$this->strNombre = $objReloaded->strNombre;
			$this->strUsuario = $objReloaded->strUsuario;
			$this->dttFecha = $objReloaded->dttFecha;
			$this->dttHoraInicial = $objReloaded->dttHoraInicial;
			$this->dttHoraFinal = $objReloaded->dttHoraFinal;
			$this->strComentario = $objReloaded->strComentario;
			$this->blnNotificarAdmin = $objReloaded->blnNotificarAdmin;
			$this->blnNotificarUsuario = $objReloaded->blnNotificarUsuario;
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

				case 'Nombre':
					/**
					 * Gets the value for strNombre (Not Null)
					 * @return string
					 */
					return $this->strNombre;

				case 'Usuario':
					/**
					 * Gets the value for strUsuario (Not Null)
					 * @return string
					 */
					return $this->strUsuario;

				case 'Fecha':
					/**
					 * Gets the value for dttFecha (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFecha;

				case 'HoraInicial':
					/**
					 * Gets the value for dttHoraInicial (Not Null)
					 * @return QDateTime
					 */
					return $this->dttHoraInicial;

				case 'HoraFinal':
					/**
					 * Gets the value for dttHoraFinal 
					 * @return QDateTime
					 */
					return $this->dttHoraFinal;

				case 'Comentario':
					/**
					 * Gets the value for strComentario 
					 * @return string
					 */
					return $this->strComentario;

				case 'NotificarAdmin':
					/**
					 * Gets the value for blnNotificarAdmin (Not Null)
					 * @return boolean
					 */
					return $this->blnNotificarAdmin;

				case 'NotificarUsuario':
					/**
					 * Gets the value for blnNotificarUsuario (Not Null)
					 * @return boolean
					 */
					return $this->blnNotificarUsuario;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_Cola':
					/**
					 * Gets the value for the private _objCola (Read-Only)
					 * if set due to an expansion on the cola.proceso_error_id reverse relationship
					 * @return Cola
					 */
					return $this->_objCola;

				case '_ColaArray':
					/**
					 * Gets the value for the private _objColaArray (Read-Only)
					 * if set due to an ExpandAsArray on the cola.proceso_error_id reverse relationship
					 * @return Cola[]
					 */
					return $this->_objColaArray;

				case '_GcoTemp':
					/**
					 * Gets the value for the private _objGcoTemp (Read-Only)
					 * if set due to an expansion on the gco_temp.proceso_error_id reverse relationship
					 * @return GcoTemp
					 */
					return $this->_objGcoTemp;

				case '_GcoTempArray':
					/**
					 * Gets the value for the private _objGcoTempArray (Read-Only)
					 * if set due to an ExpandAsArray on the gco_temp.proceso_error_id reverse relationship
					 * @return GcoTemp[]
					 */
					return $this->_objGcoTempArray;

				case '_MatchPieces':
					/**
					 * Gets the value for the private _objMatchPieces (Read-Only)
					 * if set due to an expansion on the match_pieces.proceso_error_id reverse relationship
					 * @return MatchPieces
					 */
					return $this->_objMatchPieces;

				case '_MatchPiecesArray':
					/**
					 * Gets the value for the private _objMatchPiecesArray (Read-Only)
					 * if set due to an ExpandAsArray on the match_pieces.proceso_error_id reverse relationship
					 * @return MatchPieces[]
					 */
					return $this->_objMatchPiecesArray;

				case '_PiezaRecibida':
					/**
					 * Gets the value for the private _objPiezaRecibida (Read-Only)
					 * if set due to an expansion on the pieza_recibida.proceso_error_id reverse relationship
					 * @return PiezaRecibida
					 */
					return $this->_objPiezaRecibida;

				case '_PiezaRecibidaArray':
					/**
					 * Gets the value for the private _objPiezaRecibidaArray (Read-Only)
					 * if set due to an ExpandAsArray on the pieza_recibida.proceso_error_id reverse relationship
					 * @return PiezaRecibida[]
					 */
					return $this->_objPiezaRecibidaArray;

				case '_PiezasTemp':
					/**
					 * Gets the value for the private _objPiezasTemp (Read-Only)
					 * if set due to an expansion on the piezas_temp.proceso_error_id reverse relationship
					 * @return PiezasTemp
					 */
					return $this->_objPiezasTemp;

				case '_PiezasTempArray':
					/**
					 * Gets the value for the private _objPiezasTempArray (Read-Only)
					 * if set due to an ExpandAsArray on the piezas_temp.proceso_error_id reverse relationship
					 * @return PiezasTemp[]
					 */
					return $this->_objPiezasTempArray;

				case '_ProcessAwbs':
					/**
					 * Gets the value for the private _objProcessAwbs (Read-Only)
					 * if set due to an expansion on the process_awbs.proceso_error_id reverse relationship
					 * @return ProcessAwbs
					 */
					return $this->_objProcessAwbs;

				case '_ProcessAwbsArray':
					/**
					 * Gets the value for the private _objProcessAwbsArray (Read-Only)
					 * if set due to an ExpandAsArray on the process_awbs.proceso_error_id reverse relationship
					 * @return ProcessAwbs[]
					 */
					return $this->_objProcessAwbsArray;

				case '_ProcessPieces':
					/**
					 * Gets the value for the private _objProcessPieces (Read-Only)
					 * if set due to an expansion on the process_pieces.proceso_error_id reverse relationship
					 * @return ProcessPieces
					 */
					return $this->_objProcessPieces;

				case '_ProcessPiecesArray':
					/**
					 * Gets the value for the private _objProcessPiecesArray (Read-Only)
					 * if set due to an ExpandAsArray on the process_pieces.proceso_error_id reverse relationship
					 * @return ProcessPieces[]
					 */
					return $this->_objProcessPiecesArray;


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
				case 'Nombre':
					/**
					 * Sets the value for strNombre (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNombre = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Usuario':
					/**
					 * Sets the value for strUsuario (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strUsuario = QType::Cast($mixValue, QType::String));
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

				case 'HoraInicial':
					/**
					 * Sets the value for dttHoraInicial (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttHoraInicial = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HoraFinal':
					/**
					 * Sets the value for dttHoraFinal 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttHoraFinal = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Comentario':
					/**
					 * Sets the value for strComentario 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strComentario = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NotificarAdmin':
					/**
					 * Sets the value for blnNotificarAdmin (Not Null)
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnNotificarAdmin = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NotificarUsuario':
					/**
					 * Sets the value for blnNotificarUsuario (Not Null)
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnNotificarUsuario = QType::Cast($mixValue, QType::Boolean));
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
			if ($this->CountColas()) {
				$arrTablRela[] = 'cola';
			}
			if ($this->CountGcoTemps()) {
				$arrTablRela[] = 'gco_temp';
			}
			if ($this->CountMatchPieceses()) {
				$arrTablRela[] = 'match_pieces';
			}
			if ($this->CountPiezaRecibidas()) {
				$arrTablRela[] = 'pieza_recibida';
			}
			if ($this->CountPiezasTemps()) {
				$arrTablRela[] = 'piezas_temp';
			}
			if ($this->CountProcessAwbses()) {
				$arrTablRela[] = 'process_awbs';
			}
			if ($this->CountProcessPieceses()) {
				$arrTablRela[] = 'process_pieces';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for Cola
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Colas as an array of Cola objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Cola[]
		*/
		public function GetColaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Cola::LoadArrayByProcesoErrorId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Colas
		 * @return int
		*/
		public function CountColas() {
			if ((is_null($this->intId)))
				return 0;

			return Cola::CountByProcesoErrorId($this->intId);
		}

		/**
		 * Associates a Cola
		 * @param Cola $objCola
		 * @return void
		*/
		public function AssociateCola(Cola $objCola) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCola on this unsaved ProcesoError.');
			if ((is_null($objCola->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCola on this ProcesoError with an unsaved Cola.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cola`
				SET
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCola->Id) . '
			');
		}

		/**
		 * Unassociates a Cola
		 * @param Cola $objCola
		 * @return void
		*/
		public function UnassociateCola(Cola $objCola) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCola on this unsaved ProcesoError.');
			if ((is_null($objCola->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCola on this ProcesoError with an unsaved Cola.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cola`
				SET
					`proceso_error_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCola->Id) . ' AND
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all Colas
		 * @return void
		*/
		public function UnassociateAllColas() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCola on this unsaved ProcesoError.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cola`
				SET
					`proceso_error_id` = null
				WHERE
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Cola
		 * @param Cola $objCola
		 * @return void
		*/
		public function DeleteAssociatedCola(Cola $objCola) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCola on this unsaved ProcesoError.');
			if ((is_null($objCola->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCola on this ProcesoError with an unsaved Cola.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cola`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCola->Id) . ' AND
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated Colas
		 * @return void
		*/
		public function DeleteAllColas() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCola on this unsaved ProcesoError.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cola`
				WHERE
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for GcoTemp
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GcoTemps as an array of GcoTemp objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GcoTemp[]
		*/
		public function GetGcoTempArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return GcoTemp::LoadArrayByProcesoErrorId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GcoTemps
		 * @return int
		*/
		public function CountGcoTemps() {
			if ((is_null($this->intId)))
				return 0;

			return GcoTemp::CountByProcesoErrorId($this->intId);
		}

		/**
		 * Associates a GcoTemp
		 * @param GcoTemp $objGcoTemp
		 * @return void
		*/
		public function AssociateGcoTemp(GcoTemp $objGcoTemp) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGcoTemp on this unsaved ProcesoError.');
			if ((is_null($objGcoTemp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGcoTemp on this ProcesoError with an unsaved GcoTemp.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`gco_temp`
				SET
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGcoTemp->Id) . '
			');
		}

		/**
		 * Unassociates a GcoTemp
		 * @param GcoTemp $objGcoTemp
		 * @return void
		*/
		public function UnassociateGcoTemp(GcoTemp $objGcoTemp) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGcoTemp on this unsaved ProcesoError.');
			if ((is_null($objGcoTemp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGcoTemp on this ProcesoError with an unsaved GcoTemp.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`gco_temp`
				SET
					`proceso_error_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGcoTemp->Id) . ' AND
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all GcoTemps
		 * @return void
		*/
		public function UnassociateAllGcoTemps() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGcoTemp on this unsaved ProcesoError.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`gco_temp`
				SET
					`proceso_error_id` = null
				WHERE
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated GcoTemp
		 * @param GcoTemp $objGcoTemp
		 * @return void
		*/
		public function DeleteAssociatedGcoTemp(GcoTemp $objGcoTemp) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGcoTemp on this unsaved ProcesoError.');
			if ((is_null($objGcoTemp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGcoTemp on this ProcesoError with an unsaved GcoTemp.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`gco_temp`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGcoTemp->Id) . ' AND
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated GcoTemps
		 * @return void
		*/
		public function DeleteAllGcoTemps() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGcoTemp on this unsaved ProcesoError.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`gco_temp`
				WHERE
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for MatchPieces
		//-------------------------------------------------------------------

		/**
		 * Gets all associated MatchPieceses as an array of MatchPieces objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MatchPieces[]
		*/
		public function GetMatchPiecesArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return MatchPieces::LoadArrayByProcesoErrorId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated MatchPieceses
		 * @return int
		*/
		public function CountMatchPieceses() {
			if ((is_null($this->intId)))
				return 0;

			return MatchPieces::CountByProcesoErrorId($this->intId);
		}

		/**
		 * Associates a MatchPieces
		 * @param MatchPieces $objMatchPieces
		 * @return void
		*/
		public function AssociateMatchPieces(MatchPieces $objMatchPieces) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMatchPieces on this unsaved ProcesoError.');
			if ((is_null($objMatchPieces->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMatchPieces on this ProcesoError with an unsaved MatchPieces.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`match_pieces`
				SET
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMatchPieces->Id) . '
			');
		}

		/**
		 * Unassociates a MatchPieces
		 * @param MatchPieces $objMatchPieces
		 * @return void
		*/
		public function UnassociateMatchPieces(MatchPieces $objMatchPieces) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMatchPieces on this unsaved ProcesoError.');
			if ((is_null($objMatchPieces->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMatchPieces on this ProcesoError with an unsaved MatchPieces.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`match_pieces`
				SET
					`proceso_error_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMatchPieces->Id) . ' AND
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all MatchPieceses
		 * @return void
		*/
		public function UnassociateAllMatchPieceses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMatchPieces on this unsaved ProcesoError.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`match_pieces`
				SET
					`proceso_error_id` = null
				WHERE
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated MatchPieces
		 * @param MatchPieces $objMatchPieces
		 * @return void
		*/
		public function DeleteAssociatedMatchPieces(MatchPieces $objMatchPieces) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMatchPieces on this unsaved ProcesoError.');
			if ((is_null($objMatchPieces->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMatchPieces on this ProcesoError with an unsaved MatchPieces.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`match_pieces`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMatchPieces->Id) . ' AND
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated MatchPieceses
		 * @return void
		*/
		public function DeleteAllMatchPieceses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMatchPieces on this unsaved ProcesoError.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`match_pieces`
				WHERE
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for PiezaRecibida
		//-------------------------------------------------------------------

		/**
		 * Gets all associated PiezaRecibidas as an array of PiezaRecibida objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PiezaRecibida[]
		*/
		public function GetPiezaRecibidaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return PiezaRecibida::LoadArrayByProcesoErrorId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated PiezaRecibidas
		 * @return int
		*/
		public function CountPiezaRecibidas() {
			if ((is_null($this->intId)))
				return 0;

			return PiezaRecibida::CountByProcesoErrorId($this->intId);
		}

		/**
		 * Associates a PiezaRecibida
		 * @param PiezaRecibida $objPiezaRecibida
		 * @return void
		*/
		public function AssociatePiezaRecibida(PiezaRecibida $objPiezaRecibida) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePiezaRecibida on this unsaved ProcesoError.');
			if ((is_null($objPiezaRecibida->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePiezaRecibida on this ProcesoError with an unsaved PiezaRecibida.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pieza_recibida`
				SET
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPiezaRecibida->Id) . '
			');
		}

		/**
		 * Unassociates a PiezaRecibida
		 * @param PiezaRecibida $objPiezaRecibida
		 * @return void
		*/
		public function UnassociatePiezaRecibida(PiezaRecibida $objPiezaRecibida) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaRecibida on this unsaved ProcesoError.');
			if ((is_null($objPiezaRecibida->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaRecibida on this ProcesoError with an unsaved PiezaRecibida.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pieza_recibida`
				SET
					`proceso_error_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPiezaRecibida->Id) . ' AND
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all PiezaRecibidas
		 * @return void
		*/
		public function UnassociateAllPiezaRecibidas() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaRecibida on this unsaved ProcesoError.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pieza_recibida`
				SET
					`proceso_error_id` = null
				WHERE
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated PiezaRecibida
		 * @param PiezaRecibida $objPiezaRecibida
		 * @return void
		*/
		public function DeleteAssociatedPiezaRecibida(PiezaRecibida $objPiezaRecibida) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaRecibida on this unsaved ProcesoError.');
			if ((is_null($objPiezaRecibida->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaRecibida on this ProcesoError with an unsaved PiezaRecibida.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pieza_recibida`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPiezaRecibida->Id) . ' AND
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated PiezaRecibidas
		 * @return void
		*/
		public function DeleteAllPiezaRecibidas() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaRecibida on this unsaved ProcesoError.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pieza_recibida`
				WHERE
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for PiezasTemp
		//-------------------------------------------------------------------

		/**
		 * Gets all associated PiezasTemps as an array of PiezasTemp objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PiezasTemp[]
		*/
		public function GetPiezasTempArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return PiezasTemp::LoadArrayByProcesoErrorId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated PiezasTemps
		 * @return int
		*/
		public function CountPiezasTemps() {
			if ((is_null($this->intId)))
				return 0;

			return PiezasTemp::CountByProcesoErrorId($this->intId);
		}

		/**
		 * Associates a PiezasTemp
		 * @param PiezasTemp $objPiezasTemp
		 * @return void
		*/
		public function AssociatePiezasTemp(PiezasTemp $objPiezasTemp) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePiezasTemp on this unsaved ProcesoError.');
			if ((is_null($objPiezasTemp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePiezasTemp on this ProcesoError with an unsaved PiezasTemp.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`piezas_temp`
				SET
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPiezasTemp->Id) . '
			');
		}

		/**
		 * Unassociates a PiezasTemp
		 * @param PiezasTemp $objPiezasTemp
		 * @return void
		*/
		public function UnassociatePiezasTemp(PiezasTemp $objPiezasTemp) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezasTemp on this unsaved ProcesoError.');
			if ((is_null($objPiezasTemp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezasTemp on this ProcesoError with an unsaved PiezasTemp.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`piezas_temp`
				SET
					`proceso_error_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPiezasTemp->Id) . ' AND
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all PiezasTemps
		 * @return void
		*/
		public function UnassociateAllPiezasTemps() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezasTemp on this unsaved ProcesoError.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`piezas_temp`
				SET
					`proceso_error_id` = null
				WHERE
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated PiezasTemp
		 * @param PiezasTemp $objPiezasTemp
		 * @return void
		*/
		public function DeleteAssociatedPiezasTemp(PiezasTemp $objPiezasTemp) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezasTemp on this unsaved ProcesoError.');
			if ((is_null($objPiezasTemp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezasTemp on this ProcesoError with an unsaved PiezasTemp.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`piezas_temp`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPiezasTemp->Id) . ' AND
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated PiezasTemps
		 * @return void
		*/
		public function DeleteAllPiezasTemps() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezasTemp on this unsaved ProcesoError.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`piezas_temp`
				WHERE
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for ProcessAwbs
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ProcessAwbses as an array of ProcessAwbs objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ProcessAwbs[]
		*/
		public function GetProcessAwbsArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ProcessAwbs::LoadArrayByProcesoErrorId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ProcessAwbses
		 * @return int
		*/
		public function CountProcessAwbses() {
			if ((is_null($this->intId)))
				return 0;

			return ProcessAwbs::CountByProcesoErrorId($this->intId);
		}

		/**
		 * Associates a ProcessAwbs
		 * @param ProcessAwbs $objProcessAwbs
		 * @return void
		*/
		public function AssociateProcessAwbs(ProcessAwbs $objProcessAwbs) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateProcessAwbs on this unsaved ProcesoError.');
			if ((is_null($objProcessAwbs->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateProcessAwbs on this ProcesoError with an unsaved ProcessAwbs.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`process_awbs`
				SET
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objProcessAwbs->Id) . '
			');
		}

		/**
		 * Unassociates a ProcessAwbs
		 * @param ProcessAwbs $objProcessAwbs
		 * @return void
		*/
		public function UnassociateProcessAwbs(ProcessAwbs $objProcessAwbs) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateProcessAwbs on this unsaved ProcesoError.');
			if ((is_null($objProcessAwbs->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateProcessAwbs on this ProcesoError with an unsaved ProcessAwbs.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`process_awbs`
				SET
					`proceso_error_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objProcessAwbs->Id) . ' AND
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all ProcessAwbses
		 * @return void
		*/
		public function UnassociateAllProcessAwbses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateProcessAwbs on this unsaved ProcesoError.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`process_awbs`
				SET
					`proceso_error_id` = null
				WHERE
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ProcessAwbs
		 * @param ProcessAwbs $objProcessAwbs
		 * @return void
		*/
		public function DeleteAssociatedProcessAwbs(ProcessAwbs $objProcessAwbs) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateProcessAwbs on this unsaved ProcesoError.');
			if ((is_null($objProcessAwbs->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateProcessAwbs on this ProcesoError with an unsaved ProcessAwbs.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`process_awbs`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objProcessAwbs->Id) . ' AND
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated ProcessAwbses
		 * @return void
		*/
		public function DeleteAllProcessAwbses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateProcessAwbs on this unsaved ProcesoError.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`process_awbs`
				WHERE
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for ProcessPieces
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ProcessPieceses as an array of ProcessPieces objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ProcessPieces[]
		*/
		public function GetProcessPiecesArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ProcessPieces::LoadArrayByProcesoErrorId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ProcessPieceses
		 * @return int
		*/
		public function CountProcessPieceses() {
			if ((is_null($this->intId)))
				return 0;

			return ProcessPieces::CountByProcesoErrorId($this->intId);
		}

		/**
		 * Associates a ProcessPieces
		 * @param ProcessPieces $objProcessPieces
		 * @return void
		*/
		public function AssociateProcessPieces(ProcessPieces $objProcessPieces) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateProcessPieces on this unsaved ProcesoError.');
			if ((is_null($objProcessPieces->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateProcessPieces on this ProcesoError with an unsaved ProcessPieces.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`process_pieces`
				SET
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objProcessPieces->Id) . '
			');
		}

		/**
		 * Unassociates a ProcessPieces
		 * @param ProcessPieces $objProcessPieces
		 * @return void
		*/
		public function UnassociateProcessPieces(ProcessPieces $objProcessPieces) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateProcessPieces on this unsaved ProcesoError.');
			if ((is_null($objProcessPieces->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateProcessPieces on this ProcesoError with an unsaved ProcessPieces.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`process_pieces`
				SET
					`proceso_error_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objProcessPieces->Id) . ' AND
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all ProcessPieceses
		 * @return void
		*/
		public function UnassociateAllProcessPieceses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateProcessPieces on this unsaved ProcesoError.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`process_pieces`
				SET
					`proceso_error_id` = null
				WHERE
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ProcessPieces
		 * @param ProcessPieces $objProcessPieces
		 * @return void
		*/
		public function DeleteAssociatedProcessPieces(ProcessPieces $objProcessPieces) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateProcessPieces on this unsaved ProcesoError.');
			if ((is_null($objProcessPieces->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateProcessPieces on this ProcesoError with an unsaved ProcessPieces.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`process_pieces`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objProcessPieces->Id) . ' AND
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated ProcessPieceses
		 * @return void
		*/
		public function DeleteAllProcessPieceses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateProcessPieces on this unsaved ProcesoError.');

			// Get the Database Object for this Class
			$objDatabase = ProcesoError::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`process_pieces`
				WHERE
					`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
			return "proceso_error";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[ProcesoError::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="ProcesoError"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Nombre" type="xsd:string"/>';
			$strToReturn .= '<element name="Usuario" type="xsd:string"/>';
			$strToReturn .= '<element name="Fecha" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="HoraInicial" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="HoraFinal" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Comentario" type="xsd:string"/>';
			$strToReturn .= '<element name="NotificarAdmin" type="xsd:boolean"/>';
			$strToReturn .= '<element name="NotificarUsuario" type="xsd:boolean"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('ProcesoError', $strComplexTypeArray)) {
				$strComplexTypeArray['ProcesoError'] = ProcesoError::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ProcesoError::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ProcesoError();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Nombre'))
				$objToReturn->strNombre = $objSoapObject->Nombre;
			if (property_exists($objSoapObject, 'Usuario'))
				$objToReturn->strUsuario = $objSoapObject->Usuario;
			if (property_exists($objSoapObject, 'Fecha'))
				$objToReturn->dttFecha = new QDateTime($objSoapObject->Fecha);
			if (property_exists($objSoapObject, 'HoraInicial'))
				$objToReturn->dttHoraInicial = new QDateTime($objSoapObject->HoraInicial);
			if (property_exists($objSoapObject, 'HoraFinal'))
				$objToReturn->dttHoraFinal = new QDateTime($objSoapObject->HoraFinal);
			if (property_exists($objSoapObject, 'Comentario'))
				$objToReturn->strComentario = $objSoapObject->Comentario;
			if (property_exists($objSoapObject, 'NotificarAdmin'))
				$objToReturn->blnNotificarAdmin = $objSoapObject->NotificarAdmin;
			if (property_exists($objSoapObject, 'NotificarUsuario'))
				$objToReturn->blnNotificarUsuario = $objSoapObject->NotificarUsuario;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, ProcesoError::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttFecha)
				$objObject->dttFecha = $objObject->dttFecha->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttHoraInicial)
				$objObject->dttHoraInicial = $objObject->dttHoraInicial->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttHoraFinal)
				$objObject->dttHoraFinal = $objObject->dttHoraFinal->qFormat(QDateTime::FormatSoap);
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
			$iArray['Nombre'] = $this->strNombre;
			$iArray['Usuario'] = $this->strUsuario;
			$iArray['Fecha'] = $this->dttFecha;
			$iArray['HoraInicial'] = $this->dttHoraInicial;
			$iArray['HoraFinal'] = $this->dttHoraFinal;
			$iArray['Comentario'] = $this->strComentario;
			$iArray['NotificarAdmin'] = $this->blnNotificarAdmin;
			$iArray['NotificarUsuario'] = $this->blnNotificarUsuario;
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
     * @property-read QQNode $Nombre
     * @property-read QQNode $Usuario
     * @property-read QQNode $Fecha
     * @property-read QQNode $HoraInicial
     * @property-read QQNode $HoraFinal
     * @property-read QQNode $Comentario
     * @property-read QQNode $NotificarAdmin
     * @property-read QQNode $NotificarUsuario
     *
     *
     * @property-read QQReverseReferenceNodeCola $Cola
     * @property-read QQReverseReferenceNodeGcoTemp $GcoTemp
     * @property-read QQReverseReferenceNodeMatchPieces $MatchPieces
     * @property-read QQReverseReferenceNodePiezaRecibida $PiezaRecibida
     * @property-read QQReverseReferenceNodePiezasTemp $PiezasTemp
     * @property-read QQReverseReferenceNodeProcessAwbs $ProcessAwbs
     * @property-read QQReverseReferenceNodeProcessPieces $ProcessPieces

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeProcesoError extends QQNode {
		protected $strTableName = 'proceso_error';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ProcesoError';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'VarChar', $this);
				case 'Usuario':
					return new QQNode('usuario', 'Usuario', 'VarChar', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'Date', $this);
				case 'HoraInicial':
					return new QQNode('hora_inicial', 'HoraInicial', 'Time', $this);
				case 'HoraFinal':
					return new QQNode('hora_final', 'HoraFinal', 'Time', $this);
				case 'Comentario':
					return new QQNode('comentario', 'Comentario', 'Blob', $this);
				case 'NotificarAdmin':
					return new QQNode('notificar_admin', 'NotificarAdmin', 'Bit', $this);
				case 'NotificarUsuario':
					return new QQNode('notificar_usuario', 'NotificarUsuario', 'Bit', $this);
				case 'Cola':
					return new QQReverseReferenceNodeCola($this, 'cola', 'reverse_reference', 'proceso_error_id', 'Cola');
				case 'GcoTemp':
					return new QQReverseReferenceNodeGcoTemp($this, 'gcotemp', 'reverse_reference', 'proceso_error_id', 'GcoTemp');
				case 'MatchPieces':
					return new QQReverseReferenceNodeMatchPieces($this, 'matchpieces', 'reverse_reference', 'proceso_error_id', 'MatchPieces');
				case 'PiezaRecibida':
					return new QQReverseReferenceNodePiezaRecibida($this, 'piezarecibida', 'reverse_reference', 'proceso_error_id', 'PiezaRecibida');
				case 'PiezasTemp':
					return new QQReverseReferenceNodePiezasTemp($this, 'piezastemp', 'reverse_reference', 'proceso_error_id', 'PiezasTemp');
				case 'ProcessAwbs':
					return new QQReverseReferenceNodeProcessAwbs($this, 'processawbs', 'reverse_reference', 'proceso_error_id', 'ProcessAwbs');
				case 'ProcessPieces':
					return new QQReverseReferenceNodeProcessPieces($this, 'processpieces', 'reverse_reference', 'proceso_error_id', 'ProcessPieces');

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
     * @property-read QQNode $Nombre
     * @property-read QQNode $Usuario
     * @property-read QQNode $Fecha
     * @property-read QQNode $HoraInicial
     * @property-read QQNode $HoraFinal
     * @property-read QQNode $Comentario
     * @property-read QQNode $NotificarAdmin
     * @property-read QQNode $NotificarUsuario
     *
     *
     * @property-read QQReverseReferenceNodeCola $Cola
     * @property-read QQReverseReferenceNodeGcoTemp $GcoTemp
     * @property-read QQReverseReferenceNodeMatchPieces $MatchPieces
     * @property-read QQReverseReferenceNodePiezaRecibida $PiezaRecibida
     * @property-read QQReverseReferenceNodePiezasTemp $PiezasTemp
     * @property-read QQReverseReferenceNodeProcessAwbs $ProcessAwbs
     * @property-read QQReverseReferenceNodeProcessPieces $ProcessPieces

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeProcesoError extends QQReverseReferenceNode {
		protected $strTableName = 'proceso_error';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ProcesoError';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'string', $this);
				case 'Usuario':
					return new QQNode('usuario', 'Usuario', 'string', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'QDateTime', $this);
				case 'HoraInicial':
					return new QQNode('hora_inicial', 'HoraInicial', 'QDateTime', $this);
				case 'HoraFinal':
					return new QQNode('hora_final', 'HoraFinal', 'QDateTime', $this);
				case 'Comentario':
					return new QQNode('comentario', 'Comentario', 'string', $this);
				case 'NotificarAdmin':
					return new QQNode('notificar_admin', 'NotificarAdmin', 'boolean', $this);
				case 'NotificarUsuario':
					return new QQNode('notificar_usuario', 'NotificarUsuario', 'boolean', $this);
				case 'Cola':
					return new QQReverseReferenceNodeCola($this, 'cola', 'reverse_reference', 'proceso_error_id', 'Cola');
				case 'GcoTemp':
					return new QQReverseReferenceNodeGcoTemp($this, 'gcotemp', 'reverse_reference', 'proceso_error_id', 'GcoTemp');
				case 'MatchPieces':
					return new QQReverseReferenceNodeMatchPieces($this, 'matchpieces', 'reverse_reference', 'proceso_error_id', 'MatchPieces');
				case 'PiezaRecibida':
					return new QQReverseReferenceNodePiezaRecibida($this, 'piezarecibida', 'reverse_reference', 'proceso_error_id', 'PiezaRecibida');
				case 'PiezasTemp':
					return new QQReverseReferenceNodePiezasTemp($this, 'piezastemp', 'reverse_reference', 'proceso_error_id', 'PiezasTemp');
				case 'ProcessAwbs':
					return new QQReverseReferenceNodeProcessAwbs($this, 'processawbs', 'reverse_reference', 'proceso_error_id', 'ProcessAwbs');
				case 'ProcessPieces':
					return new QQReverseReferenceNodeProcessPieces($this, 'processpieces', 'reverse_reference', 'proceso_error_id', 'ProcessPieces');

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
