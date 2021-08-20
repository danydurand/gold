<?php
	/**
	 * The abstract PiezaCheckpointsHGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the PiezaCheckpointsH subclass which
	 * extends this PiezaCheckpointsHGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the PiezaCheckpointsH class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $PiezaId the value for intPiezaId (Not Null)
	 * @property integer $CheckpointId the value for intCheckpointId (Not Null)
	 * @property integer $SucursalId the value for intSucursalId (Not Null)
	 * @property QDateTime $Fecha the value for dttFecha 
	 * @property string $Hora the value for strHora 
	 * @property string $Comentario the value for strComentario (Not Null)
	 * @property integer $RutaId the value for intRutaId 
	 * @property-read string $CreatedAt the value for strCreatedAt (Read-Only Timestamp)
	 * @property-read string $UpdatedAt the value for strUpdatedAt (Read-Only Timestamp)
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property integer $UpdatedBy the value for intUpdatedBy 
	 * @property GuiaPiezasH $Pieza the value for the GuiaPiezasH object referenced by intPiezaId (Not Null)
	 * @property Checkpoints $Checkpoint the value for the Checkpoints object referenced by intCheckpointId (Not Null)
	 * @property Sucursales $Sucursal the value for the Sucursales object referenced by intSucursalId (Not Null)
	 * @property Rutas $Ruta the value for the Rutas object referenced by intRutaId 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class PiezaCheckpointsHGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column pieza_checkpoints_h.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column pieza_checkpoints_h.pieza_id
		 * @var integer intPiezaId
		 */
		protected $intPiezaId;
		const PiezaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column pieza_checkpoints_h.checkpoint_id
		 * @var integer intCheckpointId
		 */
		protected $intCheckpointId;
		const CheckpointIdDefault = null;


		/**
		 * Protected member variable that maps to the database column pieza_checkpoints_h.sucursal_id
		 * @var integer intSucursalId
		 */
		protected $intSucursalId;
		const SucursalIdDefault = null;


		/**
		 * Protected member variable that maps to the database column pieza_checkpoints_h.fecha
		 * @var QDateTime dttFecha
		 */
		protected $dttFecha;
		const FechaDefault = null;


		/**
		 * Protected member variable that maps to the database column pieza_checkpoints_h.hora
		 * @var string strHora
		 */
		protected $strHora;
		const HoraMaxLength = 5;
		const HoraDefault = null;


		/**
		 * Protected member variable that maps to the database column pieza_checkpoints_h.comentario
		 * @var string strComentario
		 */
		protected $strComentario;
		const ComentarioMaxLength = 100;
		const ComentarioDefault = null;


		/**
		 * Protected member variable that maps to the database column pieza_checkpoints_h.ruta_id
		 * @var integer intRutaId
		 */
		protected $intRutaId;
		const RutaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column pieza_checkpoints_h.created_at
		 * @var string strCreatedAt
		 */
		protected $strCreatedAt;
		const CreatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column pieza_checkpoints_h.updated_at
		 * @var string strUpdatedAt
		 */
		protected $strUpdatedAt;
		const UpdatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column pieza_checkpoints_h.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column pieza_checkpoints_h.updated_by
		 * @var integer intUpdatedBy
		 */
		protected $intUpdatedBy;
		const UpdatedByDefault = null;


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
		 * in the database column pieza_checkpoints_h.pieza_id.
		 *
		 * NOTE: Always use the Pieza property getter to correctly retrieve this GuiaPiezasH object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var GuiaPiezasH objPieza
		 */
		protected $objPieza;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column pieza_checkpoints_h.checkpoint_id.
		 *
		 * NOTE: Always use the Checkpoint property getter to correctly retrieve this Checkpoints object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Checkpoints objCheckpoint
		 */
		protected $objCheckpoint;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column pieza_checkpoints_h.sucursal_id.
		 *
		 * NOTE: Always use the Sucursal property getter to correctly retrieve this Sucursales object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Sucursales objSucursal
		 */
		protected $objSucursal;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column pieza_checkpoints_h.ruta_id.
		 *
		 * NOTE: Always use the Ruta property getter to correctly retrieve this Rutas object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Rutas objRuta
		 */
		protected $objRuta;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = PiezaCheckpointsH::IdDefault;
			$this->intPiezaId = PiezaCheckpointsH::PiezaIdDefault;
			$this->intCheckpointId = PiezaCheckpointsH::CheckpointIdDefault;
			$this->intSucursalId = PiezaCheckpointsH::SucursalIdDefault;
			$this->dttFecha = (PiezaCheckpointsH::FechaDefault === null)?null:new QDateTime(PiezaCheckpointsH::FechaDefault);
			$this->strHora = PiezaCheckpointsH::HoraDefault;
			$this->strComentario = PiezaCheckpointsH::ComentarioDefault;
			$this->intRutaId = PiezaCheckpointsH::RutaIdDefault;
			$this->strCreatedAt = PiezaCheckpointsH::CreatedAtDefault;
			$this->strUpdatedAt = PiezaCheckpointsH::UpdatedAtDefault;
			$this->intCreatedBy = PiezaCheckpointsH::CreatedByDefault;
			$this->intUpdatedBy = PiezaCheckpointsH::UpdatedByDefault;
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
		 * Load a PiezaCheckpointsH from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PiezaCheckpointsH
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'PiezaCheckpointsH', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = PiezaCheckpointsH::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::PiezaCheckpointsH()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all PiezaCheckpointsHs
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PiezaCheckpointsH[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call PiezaCheckpointsH::QueryArray to perform the LoadAll query
			try {
				return PiezaCheckpointsH::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all PiezaCheckpointsHs
		 * @return int
		 */
		public static function CountAll() {
			// Call PiezaCheckpointsH::QueryCount to perform the CountAll query
			return PiezaCheckpointsH::QueryCount(QQ::All());
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
			$objDatabase = PiezaCheckpointsH::GetDatabase();

			// Create/Build out the QueryBuilder object with PiezaCheckpointsH-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'pieza_checkpoints_h');

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
				PiezaCheckpointsH::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('pieza_checkpoints_h');

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
		 * Static Qcubed Query method to query for a single PiezaCheckpointsH object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return PiezaCheckpointsH the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PiezaCheckpointsH::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new PiezaCheckpointsH object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = PiezaCheckpointsH::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return PiezaCheckpointsH::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of PiezaCheckpointsH objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return PiezaCheckpointsH[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PiezaCheckpointsH::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return PiezaCheckpointsH::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = PiezaCheckpointsH::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of PiezaCheckpointsH objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PiezaCheckpointsH::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = PiezaCheckpointsH::GetDatabase();

			$strQuery = PiezaCheckpointsH::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/piezacheckpointsh', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = PiezaCheckpointsH::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this PiezaCheckpointsH
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'pieza_checkpoints_h';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'pieza_id', $strAliasPrefix . 'pieza_id');
			    $objBuilder->AddSelectItem($strTableName, 'checkpoint_id', $strAliasPrefix . 'checkpoint_id');
			    $objBuilder->AddSelectItem($strTableName, 'sucursal_id', $strAliasPrefix . 'sucursal_id');
			    $objBuilder->AddSelectItem($strTableName, 'fecha', $strAliasPrefix . 'fecha');
			    $objBuilder->AddSelectItem($strTableName, 'hora', $strAliasPrefix . 'hora');
			    $objBuilder->AddSelectItem($strTableName, 'comentario', $strAliasPrefix . 'comentario');
			    $objBuilder->AddSelectItem($strTableName, 'ruta_id', $strAliasPrefix . 'ruta_id');
			    $objBuilder->AddSelectItem($strTableName, 'created_at', $strAliasPrefix . 'created_at');
			    $objBuilder->AddSelectItem($strTableName, 'updated_at', $strAliasPrefix . 'updated_at');
			    $objBuilder->AddSelectItem($strTableName, 'created_by', $strAliasPrefix . 'created_by');
			    $objBuilder->AddSelectItem($strTableName, 'updated_by', $strAliasPrefix . 'updated_by');
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
		 * Instantiate a PiezaCheckpointsH from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this PiezaCheckpointsH::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a PiezaCheckpointsH, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (PiezaCheckpointsH::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the PiezaCheckpointsH object
			$objToReturn = new PiezaCheckpointsH();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'pieza_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intPiezaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'checkpoint_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCheckpointId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'sucursal_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intSucursalId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fecha';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFecha = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'hora';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHora = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'comentario';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strComentario = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'ruta_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intRutaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'created_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCreatedAt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'updated_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strUpdatedAt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'created_by';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCreatedBy = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'updated_by';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intUpdatedBy = $objDbRow->GetColumn($strAliasName, 'Integer');

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
				$strAliasPrefix = 'pieza_checkpoints_h__';

			// Check for Pieza Early Binding
			$strAlias = $strAliasPrefix . 'pieza_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['pieza_id']) ? null : $objExpansionAliasArray['pieza_id']);
				$objToReturn->objPieza = GuiaPiezasH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'pieza_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Checkpoint Early Binding
			$strAlias = $strAliasPrefix . 'checkpoint_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['checkpoint_id']) ? null : $objExpansionAliasArray['checkpoint_id']);
				$objToReturn->objCheckpoint = Checkpoints::InstantiateDbRow($objDbRow, $strAliasPrefix . 'checkpoint_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Sucursal Early Binding
			$strAlias = $strAliasPrefix . 'sucursal_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['sucursal_id']) ? null : $objExpansionAliasArray['sucursal_id']);
				$objToReturn->objSucursal = Sucursales::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sucursal_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Ruta Early Binding
			$strAlias = $strAliasPrefix . 'ruta_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['ruta_id']) ? null : $objExpansionAliasArray['ruta_id']);
				$objToReturn->objRuta = Rutas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'ruta_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of PiezaCheckpointsHs from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return PiezaCheckpointsH[]
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
					$objItem = PiezaCheckpointsH::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = PiezaCheckpointsH::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single PiezaCheckpointsH object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return PiezaCheckpointsH next row resulting from the query
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
			return PiezaCheckpointsH::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single PiezaCheckpointsH object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PiezaCheckpointsH
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return PiezaCheckpointsH::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::PiezaCheckpointsH()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of PiezaCheckpointsH objects,
		 * by CheckpointId Index(es)
		 * @param integer $intCheckpointId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PiezaCheckpointsH[]
		*/
		public static function LoadArrayByCheckpointId($intCheckpointId, $objOptionalClauses = null) {
			// Call PiezaCheckpointsH::QueryArray to perform the LoadArrayByCheckpointId query
			try {
				return PiezaCheckpointsH::QueryArray(
					QQ::Equal(QQN::PiezaCheckpointsH()->CheckpointId, $intCheckpointId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count PiezaCheckpointsHs
		 * by CheckpointId Index(es)
		 * @param integer $intCheckpointId
		 * @return int
		*/
		public static function CountByCheckpointId($intCheckpointId) {
			// Call PiezaCheckpointsH::QueryCount to perform the CountByCheckpointId query
			return PiezaCheckpointsH::QueryCount(
				QQ::Equal(QQN::PiezaCheckpointsH()->CheckpointId, $intCheckpointId)
			);
		}

		/**
		 * Load an array of PiezaCheckpointsH objects,
		 * by PiezaId Index(es)
		 * @param integer $intPiezaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PiezaCheckpointsH[]
		*/
		public static function LoadArrayByPiezaId($intPiezaId, $objOptionalClauses = null) {
			// Call PiezaCheckpointsH::QueryArray to perform the LoadArrayByPiezaId query
			try {
				return PiezaCheckpointsH::QueryArray(
					QQ::Equal(QQN::PiezaCheckpointsH()->PiezaId, $intPiezaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count PiezaCheckpointsHs
		 * by PiezaId Index(es)
		 * @param integer $intPiezaId
		 * @return int
		*/
		public static function CountByPiezaId($intPiezaId) {
			// Call PiezaCheckpointsH::QueryCount to perform the CountByPiezaId query
			return PiezaCheckpointsH::QueryCount(
				QQ::Equal(QQN::PiezaCheckpointsH()->PiezaId, $intPiezaId)
			);
		}

		/**
		 * Load an array of PiezaCheckpointsH objects,
		 * by RutaId Index(es)
		 * @param integer $intRutaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PiezaCheckpointsH[]
		*/
		public static function LoadArrayByRutaId($intRutaId, $objOptionalClauses = null) {
			// Call PiezaCheckpointsH::QueryArray to perform the LoadArrayByRutaId query
			try {
				return PiezaCheckpointsH::QueryArray(
					QQ::Equal(QQN::PiezaCheckpointsH()->RutaId, $intRutaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count PiezaCheckpointsHs
		 * by RutaId Index(es)
		 * @param integer $intRutaId
		 * @return int
		*/
		public static function CountByRutaId($intRutaId) {
			// Call PiezaCheckpointsH::QueryCount to perform the CountByRutaId query
			return PiezaCheckpointsH::QueryCount(
				QQ::Equal(QQN::PiezaCheckpointsH()->RutaId, $intRutaId)
			);
		}

		/**
		 * Load an array of PiezaCheckpointsH objects,
		 * by SucursalId Index(es)
		 * @param integer $intSucursalId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PiezaCheckpointsH[]
		*/
		public static function LoadArrayBySucursalId($intSucursalId, $objOptionalClauses = null) {
			// Call PiezaCheckpointsH::QueryArray to perform the LoadArrayBySucursalId query
			try {
				return PiezaCheckpointsH::QueryArray(
					QQ::Equal(QQN::PiezaCheckpointsH()->SucursalId, $intSucursalId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count PiezaCheckpointsHs
		 * by SucursalId Index(es)
		 * @param integer $intSucursalId
		 * @return int
		*/
		public static function CountBySucursalId($intSucursalId) {
			// Call PiezaCheckpointsH::QueryCount to perform the CountBySucursalId query
			return PiezaCheckpointsH::QueryCount(
				QQ::Equal(QQN::PiezaCheckpointsH()->SucursalId, $intSucursalId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this PiezaCheckpointsH
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = PiezaCheckpointsH::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `pieza_checkpoints_h` (
							`pieza_id`,
							`checkpoint_id`,
							`sucursal_id`,
							`fecha`,
							`hora`,
							`comentario`,
							`ruta_id`,
							`created_by`,
							`updated_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intPiezaId) . ',
							' . $objDatabase->SqlVariable($this->intCheckpointId) . ',
							' . $objDatabase->SqlVariable($this->intSucursalId) . ',
							' . $objDatabase->SqlVariable($this->dttFecha) . ',
							' . $objDatabase->SqlVariable($this->strHora) . ',
							' . $objDatabase->SqlVariable($this->strComentario) . ',
							' . $objDatabase->SqlVariable($this->intRutaId) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->intUpdatedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('pieza_checkpoints_h', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`created_at`
							FROM
								`pieza_checkpoints_h`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strCreatedAt)
							throw new QOptimisticLockingException('PiezaCheckpointsH');
					}
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`updated_at`
							FROM
								`pieza_checkpoints_h`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strUpdatedAt)
							throw new QOptimisticLockingException('PiezaCheckpointsH');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`pieza_checkpoints_h`
						SET
							`pieza_id` = ' . $objDatabase->SqlVariable($this->intPiezaId) . ',
							`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intCheckpointId) . ',
							`sucursal_id` = ' . $objDatabase->SqlVariable($this->intSucursalId) . ',
							`fecha` = ' . $objDatabase->SqlVariable($this->dttFecha) . ',
							`hora` = ' . $objDatabase->SqlVariable($this->strHora) . ',
							`comentario` = ' . $objDatabase->SqlVariable($this->strComentario) . ',
							`ruta_id` = ' . $objDatabase->SqlVariable($this->intRutaId) . ',
							`created_by` = ' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							`updated_by` = ' . $objDatabase->SqlVariable($this->intUpdatedBy) . '
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
					`pieza_checkpoints_h`
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
					`pieza_checkpoints_h`
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
		 * Delete this PiezaCheckpointsH
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this PiezaCheckpointsH with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = PiezaCheckpointsH::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pieza_checkpoints_h`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this PiezaCheckpointsH ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'PiezaCheckpointsH', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all PiezaCheckpointsHs
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = PiezaCheckpointsH::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pieza_checkpoints_h`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate pieza_checkpoints_h table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = PiezaCheckpointsH::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `pieza_checkpoints_h`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this PiezaCheckpointsH from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved PiezaCheckpointsH object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = PiezaCheckpointsH::Load($this->intId);

			// Update $this's local variables to match
			$this->PiezaId = $objReloaded->PiezaId;
			$this->CheckpointId = $objReloaded->CheckpointId;
			$this->SucursalId = $objReloaded->SucursalId;
			$this->dttFecha = $objReloaded->dttFecha;
			$this->strHora = $objReloaded->strHora;
			$this->strComentario = $objReloaded->strComentario;
			$this->RutaId = $objReloaded->RutaId;
			$this->strCreatedAt = $objReloaded->strCreatedAt;
			$this->strUpdatedAt = $objReloaded->strUpdatedAt;
			$this->intCreatedBy = $objReloaded->intCreatedBy;
			$this->intUpdatedBy = $objReloaded->intUpdatedBy;
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

				case 'PiezaId':
					/**
					 * Gets the value for intPiezaId (Not Null)
					 * @return integer
					 */
					return $this->intPiezaId;

				case 'CheckpointId':
					/**
					 * Gets the value for intCheckpointId (Not Null)
					 * @return integer
					 */
					return $this->intCheckpointId;

				case 'SucursalId':
					/**
					 * Gets the value for intSucursalId (Not Null)
					 * @return integer
					 */
					return $this->intSucursalId;

				case 'Fecha':
					/**
					 * Gets the value for dttFecha 
					 * @return QDateTime
					 */
					return $this->dttFecha;

				case 'Hora':
					/**
					 * Gets the value for strHora 
					 * @return string
					 */
					return $this->strHora;

				case 'Comentario':
					/**
					 * Gets the value for strComentario (Not Null)
					 * @return string
					 */
					return $this->strComentario;

				case 'RutaId':
					/**
					 * Gets the value for intRutaId 
					 * @return integer
					 */
					return $this->intRutaId;

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

				case 'CreatedBy':
					/**
					 * Gets the value for intCreatedBy 
					 * @return integer
					 */
					return $this->intCreatedBy;

				case 'UpdatedBy':
					/**
					 * Gets the value for intUpdatedBy 
					 * @return integer
					 */
					return $this->intUpdatedBy;


				///////////////////
				// Member Objects
				///////////////////
				case 'Pieza':
					/**
					 * Gets the value for the GuiaPiezasH object referenced by intPiezaId (Not Null)
					 * @return GuiaPiezasH
					 */
					try {
						if ((!$this->objPieza) && (!is_null($this->intPiezaId)))
							$this->objPieza = GuiaPiezasH::Load($this->intPiezaId);
						return $this->objPieza;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Checkpoint':
					/**
					 * Gets the value for the Checkpoints object referenced by intCheckpointId (Not Null)
					 * @return Checkpoints
					 */
					try {
						if ((!$this->objCheckpoint) && (!is_null($this->intCheckpointId)))
							$this->objCheckpoint = Checkpoints::Load($this->intCheckpointId);
						return $this->objCheckpoint;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Sucursal':
					/**
					 * Gets the value for the Sucursales object referenced by intSucursalId (Not Null)
					 * @return Sucursales
					 */
					try {
						if ((!$this->objSucursal) && (!is_null($this->intSucursalId)))
							$this->objSucursal = Sucursales::Load($this->intSucursalId);
						return $this->objSucursal;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Ruta':
					/**
					 * Gets the value for the Rutas object referenced by intRutaId 
					 * @return Rutas
					 */
					try {
						if ((!$this->objRuta) && (!is_null($this->intRutaId)))
							$this->objRuta = Rutas::Load($this->intRutaId);
						return $this->objRuta;
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
				case 'PiezaId':
					/**
					 * Sets the value for intPiezaId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objPieza = null;
						return ($this->intPiezaId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CheckpointId':
					/**
					 * Sets the value for intCheckpointId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCheckpoint = null;
						return ($this->intCheckpointId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SucursalId':
					/**
					 * Sets the value for intSucursalId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objSucursal = null;
						return ($this->intSucursalId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Fecha':
					/**
					 * Sets the value for dttFecha 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFecha = QType::Cast($mixValue, QType::DateTime));
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

				case 'Comentario':
					/**
					 * Sets the value for strComentario (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strComentario = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RutaId':
					/**
					 * Sets the value for intRutaId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objRuta = null;
						return ($this->intRutaId = QType::Cast($mixValue, QType::Integer));
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

				case 'UpdatedBy':
					/**
					 * Sets the value for intUpdatedBy 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intUpdatedBy = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Pieza':
					/**
					 * Sets the value for the GuiaPiezasH object referenced by intPiezaId (Not Null)
					 * @param GuiaPiezasH $mixValue
					 * @return GuiaPiezasH
					 */
					if (is_null($mixValue)) {
						$this->intPiezaId = null;
						$this->objPieza = null;
						return null;
					} else {
						// Make sure $mixValue actually is a GuiaPiezasH object
						try {
							$mixValue = QType::Cast($mixValue, 'GuiaPiezasH');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED GuiaPiezasH object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Pieza for this PiezaCheckpointsH');

						// Update Local Member Variables
						$this->objPieza = $mixValue;
						$this->intPiezaId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Checkpoint':
					/**
					 * Sets the value for the Checkpoints object referenced by intCheckpointId (Not Null)
					 * @param Checkpoints $mixValue
					 * @return Checkpoints
					 */
					if (is_null($mixValue)) {
						$this->intCheckpointId = null;
						$this->objCheckpoint = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Checkpoints object
						try {
							$mixValue = QType::Cast($mixValue, 'Checkpoints');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Checkpoints object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Checkpoint for this PiezaCheckpointsH');

						// Update Local Member Variables
						$this->objCheckpoint = $mixValue;
						$this->intCheckpointId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Sucursal':
					/**
					 * Sets the value for the Sucursales object referenced by intSucursalId (Not Null)
					 * @param Sucursales $mixValue
					 * @return Sucursales
					 */
					if (is_null($mixValue)) {
						$this->intSucursalId = null;
						$this->objSucursal = null;
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
							throw new QCallerException('Unable to set an unsaved Sucursal for this PiezaCheckpointsH');

						// Update Local Member Variables
						$this->objSucursal = $mixValue;
						$this->intSucursalId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Ruta':
					/**
					 * Sets the value for the Rutas object referenced by intRutaId 
					 * @param Rutas $mixValue
					 * @return Rutas
					 */
					if (is_null($mixValue)) {
						$this->intRutaId = null;
						$this->objRuta = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Rutas object
						try {
							$mixValue = QType::Cast($mixValue, 'Rutas');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Rutas object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Ruta for this PiezaCheckpointsH');

						// Update Local Member Variables
						$this->objRuta = $mixValue;
						$this->intRutaId = $mixValue->Id;

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
			return "pieza_checkpoints_h";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[PiezaCheckpointsH::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="PiezaCheckpointsH"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Pieza" type="xsd1:GuiaPiezasH"/>';
			$strToReturn .= '<element name="Checkpoint" type="xsd1:Checkpoints"/>';
			$strToReturn .= '<element name="Sucursal" type="xsd1:Sucursales"/>';
			$strToReturn .= '<element name="Fecha" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Hora" type="xsd:string"/>';
			$strToReturn .= '<element name="Comentario" type="xsd:string"/>';
			$strToReturn .= '<element name="Ruta" type="xsd1:Rutas"/>';
			$strToReturn .= '<element name="CreatedAt" type="xsd:string"/>';
			$strToReturn .= '<element name="UpdatedAt" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="UpdatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('PiezaCheckpointsH', $strComplexTypeArray)) {
				$strComplexTypeArray['PiezaCheckpointsH'] = PiezaCheckpointsH::GetSoapComplexTypeXml();
				GuiaPiezasH::AlterSoapComplexTypeArray($strComplexTypeArray);
				Checkpoints::AlterSoapComplexTypeArray($strComplexTypeArray);
				Sucursales::AlterSoapComplexTypeArray($strComplexTypeArray);
				Rutas::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, PiezaCheckpointsH::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new PiezaCheckpointsH();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Pieza')) &&
				($objSoapObject->Pieza))
				$objToReturn->Pieza = GuiaPiezasH::GetObjectFromSoapObject($objSoapObject->Pieza);
			if ((property_exists($objSoapObject, 'Checkpoint')) &&
				($objSoapObject->Checkpoint))
				$objToReturn->Checkpoint = Checkpoints::GetObjectFromSoapObject($objSoapObject->Checkpoint);
			if ((property_exists($objSoapObject, 'Sucursal')) &&
				($objSoapObject->Sucursal))
				$objToReturn->Sucursal = Sucursales::GetObjectFromSoapObject($objSoapObject->Sucursal);
			if (property_exists($objSoapObject, 'Fecha'))
				$objToReturn->dttFecha = new QDateTime($objSoapObject->Fecha);
			if (property_exists($objSoapObject, 'Hora'))
				$objToReturn->strHora = $objSoapObject->Hora;
			if (property_exists($objSoapObject, 'Comentario'))
				$objToReturn->strComentario = $objSoapObject->Comentario;
			if ((property_exists($objSoapObject, 'Ruta')) &&
				($objSoapObject->Ruta))
				$objToReturn->Ruta = Rutas::GetObjectFromSoapObject($objSoapObject->Ruta);
			if (property_exists($objSoapObject, 'CreatedAt'))
				$objToReturn->strCreatedAt = $objSoapObject->CreatedAt;
			if (property_exists($objSoapObject, 'UpdatedAt'))
				$objToReturn->strUpdatedAt = $objSoapObject->UpdatedAt;
			if (property_exists($objSoapObject, 'CreatedBy'))
				$objToReturn->intCreatedBy = $objSoapObject->CreatedBy;
			if (property_exists($objSoapObject, 'UpdatedBy'))
				$objToReturn->intUpdatedBy = $objSoapObject->UpdatedBy;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, PiezaCheckpointsH::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objPieza)
				$objObject->objPieza = GuiaPiezasH::GetSoapObjectFromObject($objObject->objPieza, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPiezaId = null;
			if ($objObject->objCheckpoint)
				$objObject->objCheckpoint = Checkpoints::GetSoapObjectFromObject($objObject->objCheckpoint, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCheckpointId = null;
			if ($objObject->objSucursal)
				$objObject->objSucursal = Sucursales::GetSoapObjectFromObject($objObject->objSucursal, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intSucursalId = null;
			if ($objObject->dttFecha)
				$objObject->dttFecha = $objObject->dttFecha->qFormat(QDateTime::FormatSoap);
			if ($objObject->objRuta)
				$objObject->objRuta = Rutas::GetSoapObjectFromObject($objObject->objRuta, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intRutaId = null;
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
			$iArray['PiezaId'] = $this->intPiezaId;
			$iArray['CheckpointId'] = $this->intCheckpointId;
			$iArray['SucursalId'] = $this->intSucursalId;
			$iArray['Fecha'] = $this->dttFecha;
			$iArray['Hora'] = $this->strHora;
			$iArray['Comentario'] = $this->strComentario;
			$iArray['RutaId'] = $this->intRutaId;
			$iArray['CreatedAt'] = $this->strCreatedAt;
			$iArray['UpdatedAt'] = $this->strUpdatedAt;
			$iArray['CreatedBy'] = $this->intCreatedBy;
			$iArray['UpdatedBy'] = $this->intUpdatedBy;
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
     * @property-read QQNode $PiezaId
     * @property-read QQNodeGuiaPiezasH $Pieza
     * @property-read QQNode $CheckpointId
     * @property-read QQNodeCheckpoints $Checkpoint
     * @property-read QQNode $SucursalId
     * @property-read QQNodeSucursales $Sucursal
     * @property-read QQNode $Fecha
     * @property-read QQNode $Hora
     * @property-read QQNode $Comentario
     * @property-read QQNode $RutaId
     * @property-read QQNodeRutas $Ruta
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodePiezaCheckpointsH extends QQNode {
		protected $strTableName = 'pieza_checkpoints_h';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'PiezaCheckpointsH';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'PiezaId':
					return new QQNode('pieza_id', 'PiezaId', 'Integer', $this);
				case 'Pieza':
					return new QQNodeGuiaPiezasH('pieza_id', 'Pieza', 'Integer', $this);
				case 'CheckpointId':
					return new QQNode('checkpoint_id', 'CheckpointId', 'Integer', $this);
				case 'Checkpoint':
					return new QQNodeCheckpoints('checkpoint_id', 'Checkpoint', 'Integer', $this);
				case 'SucursalId':
					return new QQNode('sucursal_id', 'SucursalId', 'Integer', $this);
				case 'Sucursal':
					return new QQNodeSucursales('sucursal_id', 'Sucursal', 'Integer', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'Date', $this);
				case 'Hora':
					return new QQNode('hora', 'Hora', 'VarChar', $this);
				case 'Comentario':
					return new QQNode('comentario', 'Comentario', 'VarChar', $this);
				case 'RutaId':
					return new QQNode('ruta_id', 'RutaId', 'Integer', $this);
				case 'Ruta':
					return new QQNodeRutas('ruta_id', 'Ruta', 'Integer', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'VarChar', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'VarChar', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'Integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'Integer', $this);

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
     * @property-read QQNode $PiezaId
     * @property-read QQNodeGuiaPiezasH $Pieza
     * @property-read QQNode $CheckpointId
     * @property-read QQNodeCheckpoints $Checkpoint
     * @property-read QQNode $SucursalId
     * @property-read QQNodeSucursales $Sucursal
     * @property-read QQNode $Fecha
     * @property-read QQNode $Hora
     * @property-read QQNode $Comentario
     * @property-read QQNode $RutaId
     * @property-read QQNodeRutas $Ruta
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodePiezaCheckpointsH extends QQReverseReferenceNode {
		protected $strTableName = 'pieza_checkpoints_h';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'PiezaCheckpointsH';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'PiezaId':
					return new QQNode('pieza_id', 'PiezaId', 'integer', $this);
				case 'Pieza':
					return new QQNodeGuiaPiezasH('pieza_id', 'Pieza', 'integer', $this);
				case 'CheckpointId':
					return new QQNode('checkpoint_id', 'CheckpointId', 'integer', $this);
				case 'Checkpoint':
					return new QQNodeCheckpoints('checkpoint_id', 'Checkpoint', 'integer', $this);
				case 'SucursalId':
					return new QQNode('sucursal_id', 'SucursalId', 'integer', $this);
				case 'Sucursal':
					return new QQNodeSucursales('sucursal_id', 'Sucursal', 'integer', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'QDateTime', $this);
				case 'Hora':
					return new QQNode('hora', 'Hora', 'string', $this);
				case 'Comentario':
					return new QQNode('comentario', 'Comentario', 'string', $this);
				case 'RutaId':
					return new QQNode('ruta_id', 'RutaId', 'integer', $this);
				case 'Ruta':
					return new QQNodeRutas('ruta_id', 'Ruta', 'integer', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'string', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'string', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'integer', $this);

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
