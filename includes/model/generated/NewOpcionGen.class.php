<?php
	/**
	 * The abstract NewOpcionGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the NewOpcion subclass which
	 * extends this NewOpcionGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the NewOpcion class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Nombre the value for strNombre (Not Null)
	 * @property string $SistemaId the value for strSistemaId (Not Null)
	 * @property boolean $EsMenu Es un Menu? ::Indica si el programa es o no un menu, caso contrario es un programa. 
	 * @property boolean $Activo the value for blnActivo (Not Null)
	 * @property string $Programa the value for strPrograma (Not Null)
	 * @property string $Directorio Ubicacion del Programa 
	 * @property integer $Dependencia the value for intDependencia 
	 * @property integer $Posicion the value for intPosicion 
	 * @property string $Imagen the value for strImagen 
	 * @property integer $Nivel the value for intNivel 
	 * @property boolean $UsoGeneral the value for blnUsoGeneral 
	 * @property Sistema $Sistema the value for the Sistema object referenced by strSistemaId (Not Null)
	 * @property NewOpcion $DependenciaObject the value for the NewOpcion object referenced by intDependencia 
	 * @property-read NewOpcion $_NewOpcionAsDependencia the value for the private _objNewOpcionAsDependencia (Read-Only) if set due to an expansion on the new_opcion.dependencia reverse relationship
	 * @property-read NewOpcion[] $_NewOpcionAsDependenciaArray the value for the private _objNewOpcionAsDependenciaArray (Read-Only) if set due to an ExpandAsArray on the new_opcion.dependencia reverse relationship
	 * @property-read Permiso $_PermisoAsOpcion the value for the private _objPermisoAsOpcion (Read-Only) if set due to an expansion on the permiso.opcion_id reverse relationship
	 * @property-read Permiso[] $_PermisoAsOpcionArray the value for the private _objPermisoAsOpcionArray (Read-Only) if set due to an ExpandAsArray on the permiso.opcion_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class NewOpcionGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column new_opcion.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column new_opcion.nombre
		 * @var string strNombre
		 */
		protected $strNombre;
		const NombreMaxLength = 100;
		const NombreDefault = null;


		/**
		 * Protected member variable that maps to the database column new_opcion.sistema_id
		 * @var string strSistemaId
		 */
		protected $strSistemaId;
		const SistemaIdMaxLength = 5;
		const SistemaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column new_opcion.es_menu
		 * Es un Menu? ::Indica si el programa es o no un menu, caso contrario es un programa.		 * @var boolean blnEsMenu
		 */
		protected $blnEsMenu;
		const EsMenuDefault = null;


		/**
		 * Protected member variable that maps to the database column new_opcion.activo
		 * @var boolean blnActivo
		 */
		protected $blnActivo;
		const ActivoDefault = null;


		/**
		 * Protected member variable that maps to the database column new_opcion.programa
		 * @var string strPrograma
		 */
		protected $strPrograma;
		const ProgramaMaxLength = 100;
		const ProgramaDefault = null;


		/**
		 * Protected member variable that maps to the database column new_opcion.directorio
		 * Ubicacion del Programa		 * @var string strDirectorio
		 */
		protected $strDirectorio;
		const DirectorioMaxLength = 20;
		const DirectorioDefault = null;


		/**
		 * Protected member variable that maps to the database column new_opcion.dependencia
		 * @var integer intDependencia
		 */
		protected $intDependencia;
		const DependenciaDefault = null;


		/**
		 * Protected member variable that maps to the database column new_opcion.posicion
		 * @var integer intPosicion
		 */
		protected $intPosicion;
		const PosicionDefault = null;


		/**
		 * Protected member variable that maps to the database column new_opcion.imagen
		 * @var string strImagen
		 */
		protected $strImagen;
		const ImagenMaxLength = 50;
		const ImagenDefault = null;


		/**
		 * Protected member variable that maps to the database column new_opcion.nivel
		 * @var integer intNivel
		 */
		protected $intNivel;
		const NivelDefault = null;


		/**
		 * Protected member variable that maps to the database column new_opcion.uso_general
		 * @var boolean blnUsoGeneral
		 */
		protected $blnUsoGeneral;
		const UsoGeneralDefault = 0;


		/**
		 * Private member variable that stores a reference to a single NewOpcionAsDependencia object
		 * (of type NewOpcion), if this NewOpcion object was restored with
		 * an expansion on the new_opcion association table.
		 * @var NewOpcion _objNewOpcionAsDependencia;
		 */
		private $_objNewOpcionAsDependencia;

		/**
		 * Private member variable that stores a reference to an array of NewOpcionAsDependencia objects
		 * (of type NewOpcion[]), if this NewOpcion object was restored with
		 * an ExpandAsArray on the new_opcion association table.
		 * @var NewOpcion[] _objNewOpcionAsDependenciaArray;
		 */
		private $_objNewOpcionAsDependenciaArray = null;

		/**
		 * Private member variable that stores a reference to a single PermisoAsOpcion object
		 * (of type Permiso), if this NewOpcion object was restored with
		 * an expansion on the permiso association table.
		 * @var Permiso _objPermisoAsOpcion;
		 */
		private $_objPermisoAsOpcion;

		/**
		 * Private member variable that stores a reference to an array of PermisoAsOpcion objects
		 * (of type Permiso[]), if this NewOpcion object was restored with
		 * an ExpandAsArray on the permiso association table.
		 * @var Permiso[] _objPermisoAsOpcionArray;
		 */
		private $_objPermisoAsOpcionArray = null;

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
		 * in the database column new_opcion.sistema_id.
		 *
		 * NOTE: Always use the Sistema property getter to correctly retrieve this Sistema object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Sistema objSistema
		 */
		protected $objSistema;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column new_opcion.dependencia.
		 *
		 * NOTE: Always use the DependenciaObject property getter to correctly retrieve this NewOpcion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var NewOpcion objDependenciaObject
		 */
		protected $objDependenciaObject;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = NewOpcion::IdDefault;
			$this->strNombre = NewOpcion::NombreDefault;
			$this->strSistemaId = NewOpcion::SistemaIdDefault;
			$this->blnEsMenu = NewOpcion::EsMenuDefault;
			$this->blnActivo = NewOpcion::ActivoDefault;
			$this->strPrograma = NewOpcion::ProgramaDefault;
			$this->strDirectorio = NewOpcion::DirectorioDefault;
			$this->intDependencia = NewOpcion::DependenciaDefault;
			$this->intPosicion = NewOpcion::PosicionDefault;
			$this->strImagen = NewOpcion::ImagenDefault;
			$this->intNivel = NewOpcion::NivelDefault;
			$this->blnUsoGeneral = NewOpcion::UsoGeneralDefault;
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
		 * Load a NewOpcion from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NewOpcion
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'NewOpcion', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = NewOpcion::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::NewOpcion()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all NewOpcions
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NewOpcion[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call NewOpcion::QueryArray to perform the LoadAll query
			try {
				return NewOpcion::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all NewOpcions
		 * @return int
		 */
		public static function CountAll() {
			// Call NewOpcion::QueryCount to perform the CountAll query
			return NewOpcion::QueryCount(QQ::All());
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
			$objDatabase = NewOpcion::GetDatabase();

			// Create/Build out the QueryBuilder object with NewOpcion-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'new_opcion');

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
				NewOpcion::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('new_opcion');

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
		 * Static Qcubed Query method to query for a single NewOpcion object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return NewOpcion the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = NewOpcion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new NewOpcion object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = NewOpcion::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return NewOpcion::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of NewOpcion objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return NewOpcion[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = NewOpcion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return NewOpcion::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = NewOpcion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of NewOpcion objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = NewOpcion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = NewOpcion::GetDatabase();

			$strQuery = NewOpcion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/newopcion', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = NewOpcion::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this NewOpcion
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'new_opcion';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'nombre', $strAliasPrefix . 'nombre');
			    $objBuilder->AddSelectItem($strTableName, 'sistema_id', $strAliasPrefix . 'sistema_id');
			    $objBuilder->AddSelectItem($strTableName, 'es_menu', $strAliasPrefix . 'es_menu');
			    $objBuilder->AddSelectItem($strTableName, 'activo', $strAliasPrefix . 'activo');
			    $objBuilder->AddSelectItem($strTableName, 'programa', $strAliasPrefix . 'programa');
			    $objBuilder->AddSelectItem($strTableName, 'directorio', $strAliasPrefix . 'directorio');
			    $objBuilder->AddSelectItem($strTableName, 'dependencia', $strAliasPrefix . 'dependencia');
			    $objBuilder->AddSelectItem($strTableName, 'posicion', $strAliasPrefix . 'posicion');
			    $objBuilder->AddSelectItem($strTableName, 'imagen', $strAliasPrefix . 'imagen');
			    $objBuilder->AddSelectItem($strTableName, 'nivel', $strAliasPrefix . 'nivel');
			    $objBuilder->AddSelectItem($strTableName, 'uso_general', $strAliasPrefix . 'uso_general');
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
		 * Instantiate a NewOpcion from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this NewOpcion::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a NewOpcion, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (NewOpcion::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the NewOpcion object
			$objToReturn = new NewOpcion();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nombre';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombre = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'sistema_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strSistemaId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'es_menu';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnEsMenu = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'activo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnActivo = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'programa';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strPrograma = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'directorio';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDirectorio = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'dependencia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intDependencia = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'posicion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intPosicion = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'imagen';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strImagen = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'nivel';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intNivel = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'uso_general';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnUsoGeneral = $objDbRow->GetColumn($strAliasName, 'Bit');

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
				$strAliasPrefix = 'new_opcion__';

			// Check for Sistema Early Binding
			$strAlias = $strAliasPrefix . 'sistema_id__codi_sist';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['sistema_id']) ? null : $objExpansionAliasArray['sistema_id']);
				$objToReturn->objSistema = Sistema::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sistema_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for DependenciaObject Early Binding
			$strAlias = $strAliasPrefix . 'dependencia__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['dependencia']) ? null : $objExpansionAliasArray['dependencia']);
				$objToReturn->objDependenciaObject = NewOpcion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'dependencia__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			// Check for NewOpcionAsDependencia Virtual Binding
			$strAlias = $strAliasPrefix . 'newopcionasdependencia__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['newopcionasdependencia']) ? null : $objExpansionAliasArray['newopcionasdependencia']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objNewOpcionAsDependenciaArray)
				$objToReturn->_objNewOpcionAsDependenciaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objNewOpcionAsDependenciaArray[] = NewOpcion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'newopcionasdependencia__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objNewOpcionAsDependencia)) {
					$objToReturn->_objNewOpcionAsDependencia = NewOpcion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'newopcionasdependencia__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for PermisoAsOpcion Virtual Binding
			$strAlias = $strAliasPrefix . 'permisoasopcion__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['permisoasopcion']) ? null : $objExpansionAliasArray['permisoasopcion']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objPermisoAsOpcionArray)
				$objToReturn->_objPermisoAsOpcionArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objPermisoAsOpcionArray[] = Permiso::InstantiateDbRow($objDbRow, $strAliasPrefix . 'permisoasopcion__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objPermisoAsOpcion)) {
					$objToReturn->_objPermisoAsOpcion = Permiso::InstantiateDbRow($objDbRow, $strAliasPrefix . 'permisoasopcion__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of NewOpcions from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return NewOpcion[]
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
					$objItem = NewOpcion::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = NewOpcion::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single NewOpcion object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return NewOpcion next row resulting from the query
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
			return NewOpcion::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single NewOpcion object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NewOpcion
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return NewOpcion::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::NewOpcion()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of NewOpcion objects,
		 * by Dependencia Index(es)
		 * @param integer $intDependencia
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NewOpcion[]
		*/
		public static function LoadArrayByDependencia($intDependencia, $objOptionalClauses = null) {
			// Call NewOpcion::QueryArray to perform the LoadArrayByDependencia query
			try {
				return NewOpcion::QueryArray(
					QQ::Equal(QQN::NewOpcion()->Dependencia, $intDependencia),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count NewOpcions
		 * by Dependencia Index(es)
		 * @param integer $intDependencia
		 * @return int
		*/
		public static function CountByDependencia($intDependencia) {
			// Call NewOpcion::QueryCount to perform the CountByDependencia query
			return NewOpcion::QueryCount(
				QQ::Equal(QQN::NewOpcion()->Dependencia, $intDependencia)
			);
		}

		/**
		 * Load an array of NewOpcion objects,
		 * by SistemaId Index(es)
		 * @param string $strSistemaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NewOpcion[]
		*/
		public static function LoadArrayBySistemaId($strSistemaId, $objOptionalClauses = null) {
			// Call NewOpcion::QueryArray to perform the LoadArrayBySistemaId query
			try {
				return NewOpcion::QueryArray(
					QQ::Equal(QQN::NewOpcion()->SistemaId, $strSistemaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count NewOpcions
		 * by SistemaId Index(es)
		 * @param string $strSistemaId
		 * @return int
		*/
		public static function CountBySistemaId($strSistemaId) {
			// Call NewOpcion::QueryCount to perform the CountBySistemaId query
			return NewOpcion::QueryCount(
				QQ::Equal(QQN::NewOpcion()->SistemaId, $strSistemaId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this NewOpcion
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = NewOpcion::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `new_opcion` (
							`nombre`,
							`sistema_id`,
							`es_menu`,
							`activo`,
							`programa`,
							`directorio`,
							`dependencia`,
							`posicion`,
							`imagen`,
							`nivel`,
							`uso_general`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strNombre) . ',
							' . $objDatabase->SqlVariable($this->strSistemaId) . ',
							' . $objDatabase->SqlVariable($this->blnEsMenu) . ',
							' . $objDatabase->SqlVariable($this->blnActivo) . ',
							' . $objDatabase->SqlVariable($this->strPrograma) . ',
							' . $objDatabase->SqlVariable($this->strDirectorio) . ',
							' . $objDatabase->SqlVariable($this->intDependencia) . ',
							' . $objDatabase->SqlVariable($this->intPosicion) . ',
							' . $objDatabase->SqlVariable($this->strImagen) . ',
							' . $objDatabase->SqlVariable($this->intNivel) . ',
							' . $objDatabase->SqlVariable($this->blnUsoGeneral) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('new_opcion', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`new_opcion`
						SET
							`nombre` = ' . $objDatabase->SqlVariable($this->strNombre) . ',
							`sistema_id` = ' . $objDatabase->SqlVariable($this->strSistemaId) . ',
							`es_menu` = ' . $objDatabase->SqlVariable($this->blnEsMenu) . ',
							`activo` = ' . $objDatabase->SqlVariable($this->blnActivo) . ',
							`programa` = ' . $objDatabase->SqlVariable($this->strPrograma) . ',
							`directorio` = ' . $objDatabase->SqlVariable($this->strDirectorio) . ',
							`dependencia` = ' . $objDatabase->SqlVariable($this->intDependencia) . ',
							`posicion` = ' . $objDatabase->SqlVariable($this->intPosicion) . ',
							`imagen` = ' . $objDatabase->SqlVariable($this->strImagen) . ',
							`nivel` = ' . $objDatabase->SqlVariable($this->intNivel) . ',
							`uso_general` = ' . $objDatabase->SqlVariable($this->blnUsoGeneral) . '
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
		 * Delete this NewOpcion
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this NewOpcion with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = NewOpcion::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`new_opcion`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this NewOpcion ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'NewOpcion', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all NewOpcions
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = NewOpcion::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`new_opcion`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate new_opcion table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = NewOpcion::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `new_opcion`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this NewOpcion from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved NewOpcion object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = NewOpcion::Load($this->intId);

			// Update $this's local variables to match
			$this->strNombre = $objReloaded->strNombre;
			$this->SistemaId = $objReloaded->SistemaId;
			$this->blnEsMenu = $objReloaded->blnEsMenu;
			$this->blnActivo = $objReloaded->blnActivo;
			$this->strPrograma = $objReloaded->strPrograma;
			$this->strDirectorio = $objReloaded->strDirectorio;
			$this->Dependencia = $objReloaded->Dependencia;
			$this->intPosicion = $objReloaded->intPosicion;
			$this->strImagen = $objReloaded->strImagen;
			$this->intNivel = $objReloaded->intNivel;
			$this->blnUsoGeneral = $objReloaded->blnUsoGeneral;
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

				case 'SistemaId':
					/**
					 * Gets the value for strSistemaId (Not Null)
					 * @return string
					 */
					return $this->strSistemaId;

				case 'EsMenu':
					/**
					 * Gets the value for blnEsMenu 
					 * @return boolean
					 */
					return $this->blnEsMenu;

				case 'Activo':
					/**
					 * Gets the value for blnActivo (Not Null)
					 * @return boolean
					 */
					return $this->blnActivo;

				case 'Programa':
					/**
					 * Gets the value for strPrograma (Not Null)
					 * @return string
					 */
					return $this->strPrograma;

				case 'Directorio':
					/**
					 * Gets the value for strDirectorio 
					 * @return string
					 */
					return $this->strDirectorio;

				case 'Dependencia':
					/**
					 * Gets the value for intDependencia 
					 * @return integer
					 */
					return $this->intDependencia;

				case 'Posicion':
					/**
					 * Gets the value for intPosicion 
					 * @return integer
					 */
					return $this->intPosicion;

				case 'Imagen':
					/**
					 * Gets the value for strImagen 
					 * @return string
					 */
					return $this->strImagen;

				case 'Nivel':
					/**
					 * Gets the value for intNivel 
					 * @return integer
					 */
					return $this->intNivel;

				case 'UsoGeneral':
					/**
					 * Gets the value for blnUsoGeneral 
					 * @return boolean
					 */
					return $this->blnUsoGeneral;


				///////////////////
				// Member Objects
				///////////////////
				case 'Sistema':
					/**
					 * Gets the value for the Sistema object referenced by strSistemaId (Not Null)
					 * @return Sistema
					 */
					try {
						if ((!$this->objSistema) && (!is_null($this->strSistemaId)))
							$this->objSistema = Sistema::Load($this->strSistemaId);
						return $this->objSistema;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DependenciaObject':
					/**
					 * Gets the value for the NewOpcion object referenced by intDependencia 
					 * @return NewOpcion
					 */
					try {
						if ((!$this->objDependenciaObject) && (!is_null($this->intDependencia)))
							$this->objDependenciaObject = NewOpcion::Load($this->intDependencia);
						return $this->objDependenciaObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_NewOpcionAsDependencia':
					/**
					 * Gets the value for the private _objNewOpcionAsDependencia (Read-Only)
					 * if set due to an expansion on the new_opcion.dependencia reverse relationship
					 * @return NewOpcion
					 */
					return $this->_objNewOpcionAsDependencia;

				case '_NewOpcionAsDependenciaArray':
					/**
					 * Gets the value for the private _objNewOpcionAsDependenciaArray (Read-Only)
					 * if set due to an ExpandAsArray on the new_opcion.dependencia reverse relationship
					 * @return NewOpcion[]
					 */
					return $this->_objNewOpcionAsDependenciaArray;

				case '_PermisoAsOpcion':
					/**
					 * Gets the value for the private _objPermisoAsOpcion (Read-Only)
					 * if set due to an expansion on the permiso.opcion_id reverse relationship
					 * @return Permiso
					 */
					return $this->_objPermisoAsOpcion;

				case '_PermisoAsOpcionArray':
					/**
					 * Gets the value for the private _objPermisoAsOpcionArray (Read-Only)
					 * if set due to an ExpandAsArray on the permiso.opcion_id reverse relationship
					 * @return Permiso[]
					 */
					return $this->_objPermisoAsOpcionArray;


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

				case 'SistemaId':
					/**
					 * Sets the value for strSistemaId (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objSistema = null;
						return ($this->strSistemaId = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EsMenu':
					/**
					 * Sets the value for blnEsMenu 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnEsMenu = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Activo':
					/**
					 * Sets the value for blnActivo (Not Null)
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnActivo = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Programa':
					/**
					 * Sets the value for strPrograma (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strPrograma = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Directorio':
					/**
					 * Sets the value for strDirectorio 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDirectorio = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Dependencia':
					/**
					 * Sets the value for intDependencia 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objDependenciaObject = null;
						return ($this->intDependencia = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Posicion':
					/**
					 * Sets the value for intPosicion 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intPosicion = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Imagen':
					/**
					 * Sets the value for strImagen 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strImagen = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Nivel':
					/**
					 * Sets the value for intNivel 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intNivel = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UsoGeneral':
					/**
					 * Sets the value for blnUsoGeneral 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnUsoGeneral = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Sistema':
					/**
					 * Sets the value for the Sistema object referenced by strSistemaId (Not Null)
					 * @param Sistema $mixValue
					 * @return Sistema
					 */
					if (is_null($mixValue)) {
						$this->strSistemaId = null;
						$this->objSistema = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Sistema object
						try {
							$mixValue = QType::Cast($mixValue, 'Sistema');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Sistema object
						if (is_null($mixValue->CodiSist))
							throw new QCallerException('Unable to set an unsaved Sistema for this NewOpcion');

						// Update Local Member Variables
						$this->objSistema = $mixValue;
						$this->strSistemaId = $mixValue->CodiSist;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'DependenciaObject':
					/**
					 * Sets the value for the NewOpcion object referenced by intDependencia 
					 * @param NewOpcion $mixValue
					 * @return NewOpcion
					 */
					if (is_null($mixValue)) {
						$this->intDependencia = null;
						$this->objDependenciaObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a NewOpcion object
						try {
							$mixValue = QType::Cast($mixValue, 'NewOpcion');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED NewOpcion object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved DependenciaObject for this NewOpcion');

						// Update Local Member Variables
						$this->objDependenciaObject = $mixValue;
						$this->intDependencia = $mixValue->Id;

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
			if ($this->CountNewOpcionsAsDependencia()) {
				$arrTablRela[] = 'new_opcion';
			}
			if ($this->CountPermisosAsOpcion()) {
				$arrTablRela[] = 'permiso';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for NewOpcionAsDependencia
		//-------------------------------------------------------------------

		/**
		 * Gets all associated NewOpcionsAsDependencia as an array of NewOpcion objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NewOpcion[]
		*/
		public function GetNewOpcionAsDependenciaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return NewOpcion::LoadArrayByDependencia($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated NewOpcionsAsDependencia
		 * @return int
		*/
		public function CountNewOpcionsAsDependencia() {
			if ((is_null($this->intId)))
				return 0;

			return NewOpcion::CountByDependencia($this->intId);
		}

		/**
		 * Associates a NewOpcionAsDependencia
		 * @param NewOpcion $objNewOpcion
		 * @return void
		*/
		public function AssociateNewOpcionAsDependencia(NewOpcion $objNewOpcion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNewOpcionAsDependencia on this unsaved NewOpcion.');
			if ((is_null($objNewOpcion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNewOpcionAsDependencia on this NewOpcion with an unsaved NewOpcion.');

			// Get the Database Object for this Class
			$objDatabase = NewOpcion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`new_opcion`
				SET
					`dependencia` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNewOpcion->Id) . '
			');
		}

		/**
		 * Unassociates a NewOpcionAsDependencia
		 * @param NewOpcion $objNewOpcion
		 * @return void
		*/
		public function UnassociateNewOpcionAsDependencia(NewOpcion $objNewOpcion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNewOpcionAsDependencia on this unsaved NewOpcion.');
			if ((is_null($objNewOpcion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNewOpcionAsDependencia on this NewOpcion with an unsaved NewOpcion.');

			// Get the Database Object for this Class
			$objDatabase = NewOpcion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`new_opcion`
				SET
					`dependencia` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNewOpcion->Id) . ' AND
					`dependencia` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all NewOpcionsAsDependencia
		 * @return void
		*/
		public function UnassociateAllNewOpcionsAsDependencia() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNewOpcionAsDependencia on this unsaved NewOpcion.');

			// Get the Database Object for this Class
			$objDatabase = NewOpcion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`new_opcion`
				SET
					`dependencia` = null
				WHERE
					`dependencia` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated NewOpcionAsDependencia
		 * @param NewOpcion $objNewOpcion
		 * @return void
		*/
		public function DeleteAssociatedNewOpcionAsDependencia(NewOpcion $objNewOpcion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNewOpcionAsDependencia on this unsaved NewOpcion.');
			if ((is_null($objNewOpcion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNewOpcionAsDependencia on this NewOpcion with an unsaved NewOpcion.');

			// Get the Database Object for this Class
			$objDatabase = NewOpcion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`new_opcion`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNewOpcion->Id) . ' AND
					`dependencia` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated NewOpcionsAsDependencia
		 * @return void
		*/
		public function DeleteAllNewOpcionsAsDependencia() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNewOpcionAsDependencia on this unsaved NewOpcion.');

			// Get the Database Object for this Class
			$objDatabase = NewOpcion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`new_opcion`
				WHERE
					`dependencia` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for PermisoAsOpcion
		//-------------------------------------------------------------------

		/**
		 * Gets all associated PermisosAsOpcion as an array of Permiso objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Permiso[]
		*/
		public function GetPermisoAsOpcionArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Permiso::LoadArrayByOpcionId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated PermisosAsOpcion
		 * @return int
		*/
		public function CountPermisosAsOpcion() {
			if ((is_null($this->intId)))
				return 0;

			return Permiso::CountByOpcionId($this->intId);
		}

		/**
		 * Associates a PermisoAsOpcion
		 * @param Permiso $objPermiso
		 * @return void
		*/
		public function AssociatePermisoAsOpcion(Permiso $objPermiso) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePermisoAsOpcion on this unsaved NewOpcion.');
			if ((is_null($objPermiso->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePermisoAsOpcion on this NewOpcion with an unsaved Permiso.');

			// Get the Database Object for this Class
			$objDatabase = NewOpcion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`permiso`
				SET
					`opcion_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPermiso->Id) . '
			');
		}

		/**
		 * Unassociates a PermisoAsOpcion
		 * @param Permiso $objPermiso
		 * @return void
		*/
		public function UnassociatePermisoAsOpcion(Permiso $objPermiso) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePermisoAsOpcion on this unsaved NewOpcion.');
			if ((is_null($objPermiso->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePermisoAsOpcion on this NewOpcion with an unsaved Permiso.');

			// Get the Database Object for this Class
			$objDatabase = NewOpcion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`permiso`
				SET
					`opcion_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPermiso->Id) . ' AND
					`opcion_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all PermisosAsOpcion
		 * @return void
		*/
		public function UnassociateAllPermisosAsOpcion() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePermisoAsOpcion on this unsaved NewOpcion.');

			// Get the Database Object for this Class
			$objDatabase = NewOpcion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`permiso`
				SET
					`opcion_id` = null
				WHERE
					`opcion_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated PermisoAsOpcion
		 * @param Permiso $objPermiso
		 * @return void
		*/
		public function DeleteAssociatedPermisoAsOpcion(Permiso $objPermiso) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePermisoAsOpcion on this unsaved NewOpcion.');
			if ((is_null($objPermiso->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePermisoAsOpcion on this NewOpcion with an unsaved Permiso.');

			// Get the Database Object for this Class
			$objDatabase = NewOpcion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`permiso`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPermiso->Id) . ' AND
					`opcion_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated PermisosAsOpcion
		 * @return void
		*/
		public function DeleteAllPermisosAsOpcion() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePermisoAsOpcion on this unsaved NewOpcion.');

			// Get the Database Object for this Class
			$objDatabase = NewOpcion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`permiso`
				WHERE
					`opcion_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
			return "new_opcion";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[NewOpcion::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="NewOpcion"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Nombre" type="xsd:string"/>';
			$strToReturn .= '<element name="Sistema" type="xsd1:Sistema"/>';
			$strToReturn .= '<element name="EsMenu" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Activo" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Programa" type="xsd:string"/>';
			$strToReturn .= '<element name="Directorio" type="xsd:string"/>';
			$strToReturn .= '<element name="DependenciaObject" type="xsd1:NewOpcion"/>';
			$strToReturn .= '<element name="Posicion" type="xsd:int"/>';
			$strToReturn .= '<element name="Imagen" type="xsd:string"/>';
			$strToReturn .= '<element name="Nivel" type="xsd:int"/>';
			$strToReturn .= '<element name="UsoGeneral" type="xsd:boolean"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('NewOpcion', $strComplexTypeArray)) {
				$strComplexTypeArray['NewOpcion'] = NewOpcion::GetSoapComplexTypeXml();
				Sistema::AlterSoapComplexTypeArray($strComplexTypeArray);
				NewOpcion::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, NewOpcion::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new NewOpcion();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Nombre'))
				$objToReturn->strNombre = $objSoapObject->Nombre;
			if ((property_exists($objSoapObject, 'Sistema')) &&
				($objSoapObject->Sistema))
				$objToReturn->Sistema = Sistema::GetObjectFromSoapObject($objSoapObject->Sistema);
			if (property_exists($objSoapObject, 'EsMenu'))
				$objToReturn->blnEsMenu = $objSoapObject->EsMenu;
			if (property_exists($objSoapObject, 'Activo'))
				$objToReturn->blnActivo = $objSoapObject->Activo;
			if (property_exists($objSoapObject, 'Programa'))
				$objToReturn->strPrograma = $objSoapObject->Programa;
			if (property_exists($objSoapObject, 'Directorio'))
				$objToReturn->strDirectorio = $objSoapObject->Directorio;
			if ((property_exists($objSoapObject, 'DependenciaObject')) &&
				($objSoapObject->DependenciaObject))
				$objToReturn->DependenciaObject = NewOpcion::GetObjectFromSoapObject($objSoapObject->DependenciaObject);
			if (property_exists($objSoapObject, 'Posicion'))
				$objToReturn->intPosicion = $objSoapObject->Posicion;
			if (property_exists($objSoapObject, 'Imagen'))
				$objToReturn->strImagen = $objSoapObject->Imagen;
			if (property_exists($objSoapObject, 'Nivel'))
				$objToReturn->intNivel = $objSoapObject->Nivel;
			if (property_exists($objSoapObject, 'UsoGeneral'))
				$objToReturn->blnUsoGeneral = $objSoapObject->UsoGeneral;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, NewOpcion::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objSistema)
				$objObject->objSistema = Sistema::GetSoapObjectFromObject($objObject->objSistema, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strSistemaId = null;
			if ($objObject->objDependenciaObject)
				$objObject->objDependenciaObject = NewOpcion::GetSoapObjectFromObject($objObject->objDependenciaObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intDependencia = null;
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
			$iArray['SistemaId'] = $this->strSistemaId;
			$iArray['EsMenu'] = $this->blnEsMenu;
			$iArray['Activo'] = $this->blnActivo;
			$iArray['Programa'] = $this->strPrograma;
			$iArray['Directorio'] = $this->strDirectorio;
			$iArray['Dependencia'] = $this->intDependencia;
			$iArray['Posicion'] = $this->intPosicion;
			$iArray['Imagen'] = $this->strImagen;
			$iArray['Nivel'] = $this->intNivel;
			$iArray['UsoGeneral'] = $this->blnUsoGeneral;
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
     * @property-read QQNode $SistemaId
     * @property-read QQNodeSistema $Sistema
     * @property-read QQNode $EsMenu
     * @property-read QQNode $Activo
     * @property-read QQNode $Programa
     * @property-read QQNode $Directorio
     * @property-read QQNode $Dependencia
     * @property-read QQNodeNewOpcion $DependenciaObject
     * @property-read QQNode $Posicion
     * @property-read QQNode $Imagen
     * @property-read QQNode $Nivel
     * @property-read QQNode $UsoGeneral
     *
     *
     * @property-read QQReverseReferenceNodeNewOpcion $NewOpcionAsDependencia
     * @property-read QQReverseReferenceNodePermiso $PermisoAsOpcion

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeNewOpcion extends QQNode {
		protected $strTableName = 'new_opcion';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'NewOpcion';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'VarChar', $this);
				case 'SistemaId':
					return new QQNode('sistema_id', 'SistemaId', 'VarChar', $this);
				case 'Sistema':
					return new QQNodeSistema('sistema_id', 'Sistema', 'VarChar', $this);
				case 'EsMenu':
					return new QQNode('es_menu', 'EsMenu', 'Bit', $this);
				case 'Activo':
					return new QQNode('activo', 'Activo', 'Bit', $this);
				case 'Programa':
					return new QQNode('programa', 'Programa', 'VarChar', $this);
				case 'Directorio':
					return new QQNode('directorio', 'Directorio', 'VarChar', $this);
				case 'Dependencia':
					return new QQNode('dependencia', 'Dependencia', 'Integer', $this);
				case 'DependenciaObject':
					return new QQNodeNewOpcion('dependencia', 'DependenciaObject', 'Integer', $this);
				case 'Posicion':
					return new QQNode('posicion', 'Posicion', 'Integer', $this);
				case 'Imagen':
					return new QQNode('imagen', 'Imagen', 'VarChar', $this);
				case 'Nivel':
					return new QQNode('nivel', 'Nivel', 'Integer', $this);
				case 'UsoGeneral':
					return new QQNode('uso_general', 'UsoGeneral', 'Bit', $this);
				case 'NewOpcionAsDependencia':
					return new QQReverseReferenceNodeNewOpcion($this, 'newopcionasdependencia', 'reverse_reference', 'dependencia', 'NewOpcionAsDependencia');
				case 'PermisoAsOpcion':
					return new QQReverseReferenceNodePermiso($this, 'permisoasopcion', 'reverse_reference', 'opcion_id', 'PermisoAsOpcion');

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
     * @property-read QQNode $SistemaId
     * @property-read QQNodeSistema $Sistema
     * @property-read QQNode $EsMenu
     * @property-read QQNode $Activo
     * @property-read QQNode $Programa
     * @property-read QQNode $Directorio
     * @property-read QQNode $Dependencia
     * @property-read QQNodeNewOpcion $DependenciaObject
     * @property-read QQNode $Posicion
     * @property-read QQNode $Imagen
     * @property-read QQNode $Nivel
     * @property-read QQNode $UsoGeneral
     *
     *
     * @property-read QQReverseReferenceNodeNewOpcion $NewOpcionAsDependencia
     * @property-read QQReverseReferenceNodePermiso $PermisoAsOpcion

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeNewOpcion extends QQReverseReferenceNode {
		protected $strTableName = 'new_opcion';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'NewOpcion';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'string', $this);
				case 'SistemaId':
					return new QQNode('sistema_id', 'SistemaId', 'string', $this);
				case 'Sistema':
					return new QQNodeSistema('sistema_id', 'Sistema', 'string', $this);
				case 'EsMenu':
					return new QQNode('es_menu', 'EsMenu', 'boolean', $this);
				case 'Activo':
					return new QQNode('activo', 'Activo', 'boolean', $this);
				case 'Programa':
					return new QQNode('programa', 'Programa', 'string', $this);
				case 'Directorio':
					return new QQNode('directorio', 'Directorio', 'string', $this);
				case 'Dependencia':
					return new QQNode('dependencia', 'Dependencia', 'integer', $this);
				case 'DependenciaObject':
					return new QQNodeNewOpcion('dependencia', 'DependenciaObject', 'integer', $this);
				case 'Posicion':
					return new QQNode('posicion', 'Posicion', 'integer', $this);
				case 'Imagen':
					return new QQNode('imagen', 'Imagen', 'string', $this);
				case 'Nivel':
					return new QQNode('nivel', 'Nivel', 'integer', $this);
				case 'UsoGeneral':
					return new QQNode('uso_general', 'UsoGeneral', 'boolean', $this);
				case 'NewOpcionAsDependencia':
					return new QQReverseReferenceNodeNewOpcion($this, 'newopcionasdependencia', 'reverse_reference', 'dependencia', 'NewOpcionAsDependencia');
				case 'PermisoAsOpcion':
					return new QQReverseReferenceNodePermiso($this, 'permisoasopcion', 'reverse_reference', 'opcion_id', 'PermisoAsOpcion');

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
