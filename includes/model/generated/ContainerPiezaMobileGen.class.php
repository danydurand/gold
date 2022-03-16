<?php
	/**
	 * The abstract ContainerPiezaMobileGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the ContainerPiezaMobile subclass which
	 * extends this ContainerPiezaMobileGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ContainerPiezaMobile class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $ContainerMobileId the value for intContainerMobileId (Not Null)
	 * @property string $IdPieza the value for strIdPieza (Not Null)
	 * @property string $Checkpoint the value for strCheckpoint 
	 * @property QDateTime $Fecha the value for dttFecha 
	 * @property string $Hora the value for strHora 
	 * @property string $Comentario the value for strComentario 
	 * @property string $EntregadoA the value for strEntregadoA 
	 * @property string $Cedula the value for strCedula 
	 * @property QDateTime $FechaPod the value for dttFechaPod 
	 * @property string $HoraPod the value for strHoraPod 
	 * @property QDateTime $CreatedAt the value for dttCreatedAt (Not Null)
	 * @property QDateTime $UpdatedAt the value for dttUpdatedAt (Not Null)
	 * @property boolean $IsSync the value for blnIsSync (Not Null)
	 * @property ContainerMobile $ContainerMobile the value for the ContainerMobile object referenced by intContainerMobileId (Not Null)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ContainerPiezaMobileGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column container_pieza_mobile.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column container_pieza_mobile.container_mobile_id
		 * @var integer intContainerMobileId
		 */
		protected $intContainerMobileId;
		const ContainerMobileIdDefault = null;


		/**
		 * Protected member variable that maps to the database column container_pieza_mobile.id_pieza
		 * @var string strIdPieza
		 */
		protected $strIdPieza;
		const IdPiezaMaxLength = 30;
		const IdPiezaDefault = null;


		/**
		 * Protected member variable that maps to the database column container_pieza_mobile.checkpoint
		 * @var string strCheckpoint
		 */
		protected $strCheckpoint;
		const CheckpointMaxLength = 2;
		const CheckpointDefault = null;


		/**
		 * Protected member variable that maps to the database column container_pieza_mobile.fecha
		 * @var QDateTime dttFecha
		 */
		protected $dttFecha;
		const FechaDefault = null;


		/**
		 * Protected member variable that maps to the database column container_pieza_mobile.hora
		 * @var string strHora
		 */
		protected $strHora;
		const HoraMaxLength = 5;
		const HoraDefault = null;


		/**
		 * Protected member variable that maps to the database column container_pieza_mobile.comentario
		 * @var string strComentario
		 */
		protected $strComentario;
		const ComentarioMaxLength = 100;
		const ComentarioDefault = null;


		/**
		 * Protected member variable that maps to the database column container_pieza_mobile.entregado_a
		 * @var string strEntregadoA
		 */
		protected $strEntregadoA;
		const EntregadoAMaxLength = 100;
		const EntregadoADefault = null;


		/**
		 * Protected member variable that maps to the database column container_pieza_mobile.cedula
		 * @var string strCedula
		 */
		protected $strCedula;
		const CedulaMaxLength = 100;
		const CedulaDefault = null;


		/**
		 * Protected member variable that maps to the database column container_pieza_mobile.fecha_pod
		 * @var QDateTime dttFechaPod
		 */
		protected $dttFechaPod;
		const FechaPodDefault = null;


		/**
		 * Protected member variable that maps to the database column container_pieza_mobile.hora_pod
		 * @var string strHoraPod
		 */
		protected $strHoraPod;
		const HoraPodMaxLength = 5;
		const HoraPodDefault = null;


		/**
		 * Protected member variable that maps to the database column container_pieza_mobile.created_at
		 * @var QDateTime dttCreatedAt
		 */
		protected $dttCreatedAt;
		const CreatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column container_pieza_mobile.updated_at
		 * @var QDateTime dttUpdatedAt
		 */
		protected $dttUpdatedAt;
		const UpdatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column container_pieza_mobile.is_sync
		 * @var boolean blnIsSync
		 */
		protected $blnIsSync;
		const IsSyncDefault = 0;


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
		 * in the database column container_pieza_mobile.container_mobile_id.
		 *
		 * NOTE: Always use the ContainerMobile property getter to correctly retrieve this ContainerMobile object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ContainerMobile objContainerMobile
		 */
		protected $objContainerMobile;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = ContainerPiezaMobile::IdDefault;
			$this->intContainerMobileId = ContainerPiezaMobile::ContainerMobileIdDefault;
			$this->strIdPieza = ContainerPiezaMobile::IdPiezaDefault;
			$this->strCheckpoint = ContainerPiezaMobile::CheckpointDefault;
			$this->dttFecha = (ContainerPiezaMobile::FechaDefault === null)?null:new QDateTime(ContainerPiezaMobile::FechaDefault);
			$this->strHora = ContainerPiezaMobile::HoraDefault;
			$this->strComentario = ContainerPiezaMobile::ComentarioDefault;
			$this->strEntregadoA = ContainerPiezaMobile::EntregadoADefault;
			$this->strCedula = ContainerPiezaMobile::CedulaDefault;
			$this->dttFechaPod = (ContainerPiezaMobile::FechaPodDefault === null)?null:new QDateTime(ContainerPiezaMobile::FechaPodDefault);
			$this->strHoraPod = ContainerPiezaMobile::HoraPodDefault;
			$this->dttCreatedAt = (ContainerPiezaMobile::CreatedAtDefault === null)?null:new QDateTime(ContainerPiezaMobile::CreatedAtDefault);
			$this->dttUpdatedAt = (ContainerPiezaMobile::UpdatedAtDefault === null)?null:new QDateTime(ContainerPiezaMobile::UpdatedAtDefault);
			$this->blnIsSync = ContainerPiezaMobile::IsSyncDefault;
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
		 * Load a ContainerPiezaMobile from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ContainerPiezaMobile
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'ContainerPiezaMobile', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = ContainerPiezaMobile::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ContainerPiezaMobile()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all ContainerPiezaMobiles
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ContainerPiezaMobile[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call ContainerPiezaMobile::QueryArray to perform the LoadAll query
			try {
				return ContainerPiezaMobile::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ContainerPiezaMobiles
		 * @return int
		 */
		public static function CountAll() {
			// Call ContainerPiezaMobile::QueryCount to perform the CountAll query
			return ContainerPiezaMobile::QueryCount(QQ::All());
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
			$objDatabase = ContainerPiezaMobile::GetDatabase();

			// Create/Build out the QueryBuilder object with ContainerPiezaMobile-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'container_pieza_mobile');

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
				ContainerPiezaMobile::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('container_pieza_mobile');

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
		 * Static Qcubed Query method to query for a single ContainerPiezaMobile object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ContainerPiezaMobile the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ContainerPiezaMobile::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new ContainerPiezaMobile object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ContainerPiezaMobile::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return ContainerPiezaMobile::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of ContainerPiezaMobile objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ContainerPiezaMobile[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ContainerPiezaMobile::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ContainerPiezaMobile::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = ContainerPiezaMobile::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of ContainerPiezaMobile objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ContainerPiezaMobile::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = ContainerPiezaMobile::GetDatabase();

			$strQuery = ContainerPiezaMobile::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/containerpiezamobile', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = ContainerPiezaMobile::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ContainerPiezaMobile
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'container_pieza_mobile';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'container_mobile_id', $strAliasPrefix . 'container_mobile_id');
			    $objBuilder->AddSelectItem($strTableName, 'id_pieza', $strAliasPrefix . 'id_pieza');
			    $objBuilder->AddSelectItem($strTableName, 'checkpoint', $strAliasPrefix . 'checkpoint');
			    $objBuilder->AddSelectItem($strTableName, 'fecha', $strAliasPrefix . 'fecha');
			    $objBuilder->AddSelectItem($strTableName, 'hora', $strAliasPrefix . 'hora');
			    $objBuilder->AddSelectItem($strTableName, 'comentario', $strAliasPrefix . 'comentario');
			    $objBuilder->AddSelectItem($strTableName, 'entregado_a', $strAliasPrefix . 'entregado_a');
			    $objBuilder->AddSelectItem($strTableName, 'cedula', $strAliasPrefix . 'cedula');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_pod', $strAliasPrefix . 'fecha_pod');
			    $objBuilder->AddSelectItem($strTableName, 'hora_pod', $strAliasPrefix . 'hora_pod');
			    $objBuilder->AddSelectItem($strTableName, 'created_at', $strAliasPrefix . 'created_at');
			    $objBuilder->AddSelectItem($strTableName, 'updated_at', $strAliasPrefix . 'updated_at');
			    $objBuilder->AddSelectItem($strTableName, 'is_sync', $strAliasPrefix . 'is_sync');
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
		 * Instantiate a ContainerPiezaMobile from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ContainerPiezaMobile::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a ContainerPiezaMobile, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (ContainerPiezaMobile::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the ContainerPiezaMobile object
			$objToReturn = new ContainerPiezaMobile();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'container_mobile_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intContainerMobileId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'id_pieza';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strIdPieza = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'checkpoint';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCheckpoint = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFecha = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'hora';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHora = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'comentario';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strComentario = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'entregado_a';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEntregadoA = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'cedula';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCedula = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_pod';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaPod = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'hora_pod';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHoraPod = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'created_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttCreatedAt = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAlias = $strAliasPrefix . 'updated_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttUpdatedAt = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAlias = $strAliasPrefix . 'is_sync';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnIsSync = $objDbRow->GetColumn($strAliasName, 'Bit');

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
				$strAliasPrefix = 'container_pieza_mobile__';

			// Check for ContainerMobile Early Binding
			$strAlias = $strAliasPrefix . 'container_mobile_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['container_mobile_id']) ? null : $objExpansionAliasArray['container_mobile_id']);
				$objToReturn->objContainerMobile = ContainerMobile::InstantiateDbRow($objDbRow, $strAliasPrefix . 'container_mobile_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of ContainerPiezaMobiles from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return ContainerPiezaMobile[]
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
					$objItem = ContainerPiezaMobile::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ContainerPiezaMobile::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single ContainerPiezaMobile object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return ContainerPiezaMobile next row resulting from the query
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
			return ContainerPiezaMobile::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single ContainerPiezaMobile object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ContainerPiezaMobile
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return ContainerPiezaMobile::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ContainerPiezaMobile()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single ContainerPiezaMobile object,
		 * by ContainerMobileId, IdPieza Index(es)
		 * @param integer $intContainerMobileId
		 * @param string $strIdPieza
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ContainerPiezaMobile
		*/
		public static function LoadByContainerMobileIdIdPieza($intContainerMobileId, $strIdPieza, $objOptionalClauses = null) {
			return ContainerPiezaMobile::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ContainerPiezaMobile()->ContainerMobileId, $intContainerMobileId),
					QQ::Equal(QQN::ContainerPiezaMobile()->IdPieza, $strIdPieza)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of ContainerPiezaMobile objects,
		 * by ContainerMobileId, IsSync Index(es)
		 * @param integer $intContainerMobileId
		 * @param boolean $blnIsSync
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ContainerPiezaMobile[]
		*/
		public static function LoadArrayByContainerMobileIdIsSync($intContainerMobileId, $blnIsSync, $objOptionalClauses = null) {
			// Call ContainerPiezaMobile::QueryArray to perform the LoadArrayByContainerMobileIdIsSync query
			try {
				return ContainerPiezaMobile::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::ContainerPiezaMobile()->ContainerMobileId, $intContainerMobileId),
					QQ::Equal(QQN::ContainerPiezaMobile()->IsSync, $blnIsSync)					)
,
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ContainerPiezaMobiles
		 * by ContainerMobileId, IsSync Index(es)
		 * @param integer $intContainerMobileId
		 * @param boolean $blnIsSync
		 * @return int
		*/
		public static function CountByContainerMobileIdIsSync($intContainerMobileId, $blnIsSync) {
			// Call ContainerPiezaMobile::QueryCount to perform the CountByContainerMobileIdIsSync query
			return ContainerPiezaMobile::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::ContainerPiezaMobile()->ContainerMobileId, $intContainerMobileId),
				QQ::Equal(QQN::ContainerPiezaMobile()->IsSync, $blnIsSync)				)

			);
		}

		/**
		 * Load an array of ContainerPiezaMobile objects,
		 * by ContainerMobileId, Checkpoint Index(es)
		 * @param integer $intContainerMobileId
		 * @param string $strCheckpoint
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ContainerPiezaMobile[]
		*/
		public static function LoadArrayByContainerMobileIdCheckpoint($intContainerMobileId, $strCheckpoint, $objOptionalClauses = null) {
			// Call ContainerPiezaMobile::QueryArray to perform the LoadArrayByContainerMobileIdCheckpoint query
			try {
				return ContainerPiezaMobile::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::ContainerPiezaMobile()->ContainerMobileId, $intContainerMobileId),
					QQ::Equal(QQN::ContainerPiezaMobile()->Checkpoint, $strCheckpoint)					)
,
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ContainerPiezaMobiles
		 * by ContainerMobileId, Checkpoint Index(es)
		 * @param integer $intContainerMobileId
		 * @param string $strCheckpoint
		 * @return int
		*/
		public static function CountByContainerMobileIdCheckpoint($intContainerMobileId, $strCheckpoint) {
			// Call ContainerPiezaMobile::QueryCount to perform the CountByContainerMobileIdCheckpoint query
			return ContainerPiezaMobile::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::ContainerPiezaMobile()->ContainerMobileId, $intContainerMobileId),
				QQ::Equal(QQN::ContainerPiezaMobile()->Checkpoint, $strCheckpoint)				)

			);
		}

		/**
		 * Load an array of ContainerPiezaMobile objects,
		 * by ContainerMobileId Index(es)
		 * @param integer $intContainerMobileId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ContainerPiezaMobile[]
		*/
		public static function LoadArrayByContainerMobileId($intContainerMobileId, $objOptionalClauses = null) {
			// Call ContainerPiezaMobile::QueryArray to perform the LoadArrayByContainerMobileId query
			try {
				return ContainerPiezaMobile::QueryArray(
					QQ::Equal(QQN::ContainerPiezaMobile()->ContainerMobileId, $intContainerMobileId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ContainerPiezaMobiles
		 * by ContainerMobileId Index(es)
		 * @param integer $intContainerMobileId
		 * @return int
		*/
		public static function CountByContainerMobileId($intContainerMobileId) {
			// Call ContainerPiezaMobile::QueryCount to perform the CountByContainerMobileId query
			return ContainerPiezaMobile::QueryCount(
				QQ::Equal(QQN::ContainerPiezaMobile()->ContainerMobileId, $intContainerMobileId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this ContainerPiezaMobile
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ContainerPiezaMobile::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `container_pieza_mobile` (
							`container_mobile_id`,
							`id_pieza`,
							`checkpoint`,
							`fecha`,
							`hora`,
							`comentario`,
							`entregado_a`,
							`cedula`,
							`fecha_pod`,
							`hora_pod`,
							`created_at`,
							`updated_at`,
							`is_sync`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intContainerMobileId) . ',
							' . $objDatabase->SqlVariable($this->strIdPieza) . ',
							' . $objDatabase->SqlVariable($this->strCheckpoint) . ',
							' . $objDatabase->SqlVariable($this->dttFecha) . ',
							' . $objDatabase->SqlVariable($this->strHora) . ',
							' . $objDatabase->SqlVariable($this->strComentario) . ',
							' . $objDatabase->SqlVariable($this->strEntregadoA) . ',
							' . $objDatabase->SqlVariable($this->strCedula) . ',
							' . $objDatabase->SqlVariable($this->dttFechaPod) . ',
							' . $objDatabase->SqlVariable($this->strHoraPod) . ',
							' . $objDatabase->SqlVariable($this->dttCreatedAt) . ',
							' . $objDatabase->SqlVariable($this->dttUpdatedAt) . ',
							' . $objDatabase->SqlVariable($this->blnIsSync) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('container_pieza_mobile', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`container_pieza_mobile`
						SET
							`container_mobile_id` = ' . $objDatabase->SqlVariable($this->intContainerMobileId) . ',
							`id_pieza` = ' . $objDatabase->SqlVariable($this->strIdPieza) . ',
							`checkpoint` = ' . $objDatabase->SqlVariable($this->strCheckpoint) . ',
							`fecha` = ' . $objDatabase->SqlVariable($this->dttFecha) . ',
							`hora` = ' . $objDatabase->SqlVariable($this->strHora) . ',
							`comentario` = ' . $objDatabase->SqlVariable($this->strComentario) . ',
							`entregado_a` = ' . $objDatabase->SqlVariable($this->strEntregadoA) . ',
							`cedula` = ' . $objDatabase->SqlVariable($this->strCedula) . ',
							`fecha_pod` = ' . $objDatabase->SqlVariable($this->dttFechaPod) . ',
							`hora_pod` = ' . $objDatabase->SqlVariable($this->strHoraPod) . ',
							`created_at` = ' . $objDatabase->SqlVariable($this->dttCreatedAt) . ',
							`updated_at` = ' . $objDatabase->SqlVariable($this->dttUpdatedAt) . ',
							`is_sync` = ' . $objDatabase->SqlVariable($this->blnIsSync) . '
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
		 * Delete this ContainerPiezaMobile
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ContainerPiezaMobile with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ContainerPiezaMobile::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`container_pieza_mobile`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this ContainerPiezaMobile ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'ContainerPiezaMobile', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all ContainerPiezaMobiles
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ContainerPiezaMobile::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`container_pieza_mobile`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate container_pieza_mobile table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = ContainerPiezaMobile::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `container_pieza_mobile`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this ContainerPiezaMobile from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ContainerPiezaMobile object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = ContainerPiezaMobile::Load($this->intId);

			// Update $this's local variables to match
			$this->ContainerMobileId = $objReloaded->ContainerMobileId;
			$this->strIdPieza = $objReloaded->strIdPieza;
			$this->strCheckpoint = $objReloaded->strCheckpoint;
			$this->dttFecha = $objReloaded->dttFecha;
			$this->strHora = $objReloaded->strHora;
			$this->strComentario = $objReloaded->strComentario;
			$this->strEntregadoA = $objReloaded->strEntregadoA;
			$this->strCedula = $objReloaded->strCedula;
			$this->dttFechaPod = $objReloaded->dttFechaPod;
			$this->strHoraPod = $objReloaded->strHoraPod;
			$this->dttCreatedAt = $objReloaded->dttCreatedAt;
			$this->dttUpdatedAt = $objReloaded->dttUpdatedAt;
			$this->blnIsSync = $objReloaded->blnIsSync;
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

				case 'ContainerMobileId':
					/**
					 * Gets the value for intContainerMobileId (Not Null)
					 * @return integer
					 */
					return $this->intContainerMobileId;

				case 'IdPieza':
					/**
					 * Gets the value for strIdPieza (Not Null)
					 * @return string
					 */
					return $this->strIdPieza;

				case 'Checkpoint':
					/**
					 * Gets the value for strCheckpoint 
					 * @return string
					 */
					return $this->strCheckpoint;

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
					 * Gets the value for strComentario 
					 * @return string
					 */
					return $this->strComentario;

				case 'EntregadoA':
					/**
					 * Gets the value for strEntregadoA 
					 * @return string
					 */
					return $this->strEntregadoA;

				case 'Cedula':
					/**
					 * Gets the value for strCedula 
					 * @return string
					 */
					return $this->strCedula;

				case 'FechaPod':
					/**
					 * Gets the value for dttFechaPod 
					 * @return QDateTime
					 */
					return $this->dttFechaPod;

				case 'HoraPod':
					/**
					 * Gets the value for strHoraPod 
					 * @return string
					 */
					return $this->strHoraPod;

				case 'CreatedAt':
					/**
					 * Gets the value for dttCreatedAt (Not Null)
					 * @return QDateTime
					 */
					return $this->dttCreatedAt;

				case 'UpdatedAt':
					/**
					 * Gets the value for dttUpdatedAt (Not Null)
					 * @return QDateTime
					 */
					return $this->dttUpdatedAt;

				case 'IsSync':
					/**
					 * Gets the value for blnIsSync (Not Null)
					 * @return boolean
					 */
					return $this->blnIsSync;


				///////////////////
				// Member Objects
				///////////////////
				case 'ContainerMobile':
					/**
					 * Gets the value for the ContainerMobile object referenced by intContainerMobileId (Not Null)
					 * @return ContainerMobile
					 */
					try {
						if ((!$this->objContainerMobile) && (!is_null($this->intContainerMobileId)))
							$this->objContainerMobile = ContainerMobile::Load($this->intContainerMobileId);
						return $this->objContainerMobile;
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
				case 'ContainerMobileId':
					/**
					 * Sets the value for intContainerMobileId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objContainerMobile = null;
						return ($this->intContainerMobileId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'IdPieza':
					/**
					 * Sets the value for strIdPieza (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strIdPieza = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Checkpoint':
					/**
					 * Sets the value for strCheckpoint 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCheckpoint = QType::Cast($mixValue, QType::String));
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

				case 'EntregadoA':
					/**
					 * Sets the value for strEntregadoA 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEntregadoA = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Cedula':
					/**
					 * Sets the value for strCedula 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCedula = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaPod':
					/**
					 * Sets the value for dttFechaPod 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaPod = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HoraPod':
					/**
					 * Sets the value for strHoraPod 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHoraPod = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreatedAt':
					/**
					 * Sets the value for dttCreatedAt (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttCreatedAt = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UpdatedAt':
					/**
					 * Sets the value for dttUpdatedAt (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttUpdatedAt = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'IsSync':
					/**
					 * Sets the value for blnIsSync (Not Null)
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnIsSync = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'ContainerMobile':
					/**
					 * Sets the value for the ContainerMobile object referenced by intContainerMobileId (Not Null)
					 * @param ContainerMobile $mixValue
					 * @return ContainerMobile
					 */
					if (is_null($mixValue)) {
						$this->intContainerMobileId = null;
						$this->objContainerMobile = null;
						return null;
					} else {
						// Make sure $mixValue actually is a ContainerMobile object
						try {
							$mixValue = QType::Cast($mixValue, 'ContainerMobile');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED ContainerMobile object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved ContainerMobile for this ContainerPiezaMobile');

						// Update Local Member Variables
						$this->objContainerMobile = $mixValue;
						$this->intContainerMobileId = $mixValue->Id;

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
			return "container_pieza_mobile";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[ContainerPiezaMobile::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="ContainerPiezaMobile"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="ContainerMobile" type="xsd1:ContainerMobile"/>';
			$strToReturn .= '<element name="IdPieza" type="xsd:string"/>';
			$strToReturn .= '<element name="Checkpoint" type="xsd:string"/>';
			$strToReturn .= '<element name="Fecha" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Hora" type="xsd:string"/>';
			$strToReturn .= '<element name="Comentario" type="xsd:string"/>';
			$strToReturn .= '<element name="EntregadoA" type="xsd:string"/>';
			$strToReturn .= '<element name="Cedula" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaPod" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="HoraPod" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="UpdatedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="IsSync" type="xsd:boolean"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('ContainerPiezaMobile', $strComplexTypeArray)) {
				$strComplexTypeArray['ContainerPiezaMobile'] = ContainerPiezaMobile::GetSoapComplexTypeXml();
				ContainerMobile::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ContainerPiezaMobile::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ContainerPiezaMobile();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'ContainerMobile')) &&
				($objSoapObject->ContainerMobile))
				$objToReturn->ContainerMobile = ContainerMobile::GetObjectFromSoapObject($objSoapObject->ContainerMobile);
			if (property_exists($objSoapObject, 'IdPieza'))
				$objToReturn->strIdPieza = $objSoapObject->IdPieza;
			if (property_exists($objSoapObject, 'Checkpoint'))
				$objToReturn->strCheckpoint = $objSoapObject->Checkpoint;
			if (property_exists($objSoapObject, 'Fecha'))
				$objToReturn->dttFecha = new QDateTime($objSoapObject->Fecha);
			if (property_exists($objSoapObject, 'Hora'))
				$objToReturn->strHora = $objSoapObject->Hora;
			if (property_exists($objSoapObject, 'Comentario'))
				$objToReturn->strComentario = $objSoapObject->Comentario;
			if (property_exists($objSoapObject, 'EntregadoA'))
				$objToReturn->strEntregadoA = $objSoapObject->EntregadoA;
			if (property_exists($objSoapObject, 'Cedula'))
				$objToReturn->strCedula = $objSoapObject->Cedula;
			if (property_exists($objSoapObject, 'FechaPod'))
				$objToReturn->dttFechaPod = new QDateTime($objSoapObject->FechaPod);
			if (property_exists($objSoapObject, 'HoraPod'))
				$objToReturn->strHoraPod = $objSoapObject->HoraPod;
			if (property_exists($objSoapObject, 'CreatedAt'))
				$objToReturn->dttCreatedAt = new QDateTime($objSoapObject->CreatedAt);
			if (property_exists($objSoapObject, 'UpdatedAt'))
				$objToReturn->dttUpdatedAt = new QDateTime($objSoapObject->UpdatedAt);
			if (property_exists($objSoapObject, 'IsSync'))
				$objToReturn->blnIsSync = $objSoapObject->IsSync;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, ContainerPiezaMobile::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objContainerMobile)
				$objObject->objContainerMobile = ContainerMobile::GetSoapObjectFromObject($objObject->objContainerMobile, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intContainerMobileId = null;
			if ($objObject->dttFecha)
				$objObject->dttFecha = $objObject->dttFecha->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechaPod)
				$objObject->dttFechaPod = $objObject->dttFechaPod->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttCreatedAt)
				$objObject->dttCreatedAt = $objObject->dttCreatedAt->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttUpdatedAt)
				$objObject->dttUpdatedAt = $objObject->dttUpdatedAt->qFormat(QDateTime::FormatSoap);
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
			$iArray['ContainerMobileId'] = $this->intContainerMobileId;
			$iArray['IdPieza'] = $this->strIdPieza;
			$iArray['Checkpoint'] = $this->strCheckpoint;
			$iArray['Fecha'] = $this->dttFecha;
			$iArray['Hora'] = $this->strHora;
			$iArray['Comentario'] = $this->strComentario;
			$iArray['EntregadoA'] = $this->strEntregadoA;
			$iArray['Cedula'] = $this->strCedula;
			$iArray['FechaPod'] = $this->dttFechaPod;
			$iArray['HoraPod'] = $this->strHoraPod;
			$iArray['CreatedAt'] = $this->dttCreatedAt;
			$iArray['UpdatedAt'] = $this->dttUpdatedAt;
			$iArray['IsSync'] = $this->blnIsSync;
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
     * @property-read QQNode $ContainerMobileId
     * @property-read QQNodeContainerMobile $ContainerMobile
     * @property-read QQNode $IdPieza
     * @property-read QQNode $Checkpoint
     * @property-read QQNode $Fecha
     * @property-read QQNode $Hora
     * @property-read QQNode $Comentario
     * @property-read QQNode $EntregadoA
     * @property-read QQNode $Cedula
     * @property-read QQNode $FechaPod
     * @property-read QQNode $HoraPod
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $IsSync
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeContainerPiezaMobile extends QQNode {
		protected $strTableName = 'container_pieza_mobile';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ContainerPiezaMobile';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'ContainerMobileId':
					return new QQNode('container_mobile_id', 'ContainerMobileId', 'Integer', $this);
				case 'ContainerMobile':
					return new QQNodeContainerMobile('container_mobile_id', 'ContainerMobile', 'Integer', $this);
				case 'IdPieza':
					return new QQNode('id_pieza', 'IdPieza', 'VarChar', $this);
				case 'Checkpoint':
					return new QQNode('checkpoint', 'Checkpoint', 'VarChar', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'Date', $this);
				case 'Hora':
					return new QQNode('hora', 'Hora', 'VarChar', $this);
				case 'Comentario':
					return new QQNode('comentario', 'Comentario', 'VarChar', $this);
				case 'EntregadoA':
					return new QQNode('entregado_a', 'EntregadoA', 'VarChar', $this);
				case 'Cedula':
					return new QQNode('cedula', 'Cedula', 'VarChar', $this);
				case 'FechaPod':
					return new QQNode('fecha_pod', 'FechaPod', 'Date', $this);
				case 'HoraPod':
					return new QQNode('hora_pod', 'HoraPod', 'VarChar', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'DateTime', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'DateTime', $this);
				case 'IsSync':
					return new QQNode('is_sync', 'IsSync', 'Bit', $this);

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
     * @property-read QQNode $ContainerMobileId
     * @property-read QQNodeContainerMobile $ContainerMobile
     * @property-read QQNode $IdPieza
     * @property-read QQNode $Checkpoint
     * @property-read QQNode $Fecha
     * @property-read QQNode $Hora
     * @property-read QQNode $Comentario
     * @property-read QQNode $EntregadoA
     * @property-read QQNode $Cedula
     * @property-read QQNode $FechaPod
     * @property-read QQNode $HoraPod
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $IsSync
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeContainerPiezaMobile extends QQReverseReferenceNode {
		protected $strTableName = 'container_pieza_mobile';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ContainerPiezaMobile';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ContainerMobileId':
					return new QQNode('container_mobile_id', 'ContainerMobileId', 'integer', $this);
				case 'ContainerMobile':
					return new QQNodeContainerMobile('container_mobile_id', 'ContainerMobile', 'integer', $this);
				case 'IdPieza':
					return new QQNode('id_pieza', 'IdPieza', 'string', $this);
				case 'Checkpoint':
					return new QQNode('checkpoint', 'Checkpoint', 'string', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'QDateTime', $this);
				case 'Hora':
					return new QQNode('hora', 'Hora', 'string', $this);
				case 'Comentario':
					return new QQNode('comentario', 'Comentario', 'string', $this);
				case 'EntregadoA':
					return new QQNode('entregado_a', 'EntregadoA', 'string', $this);
				case 'Cedula':
					return new QQNode('cedula', 'Cedula', 'string', $this);
				case 'FechaPod':
					return new QQNode('fecha_pod', 'FechaPod', 'QDateTime', $this);
				case 'HoraPod':
					return new QQNode('hora_pod', 'HoraPod', 'string', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'QDateTime', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'QDateTime', $this);
				case 'IsSync':
					return new QQNode('is_sync', 'IsSync', 'boolean', $this);

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
