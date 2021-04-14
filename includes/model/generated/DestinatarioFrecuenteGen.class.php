<?php
	/**
	 * The abstract DestinatarioFrecuenteGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the DestinatarioFrecuente subclass which
	 * extends this DestinatarioFrecuenteGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the DestinatarioFrecuente class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $ClienteId the value for intClienteId (Not Null)
	 * @property string $Nombre the value for strNombre (Not Null)
	 * @property string $Direccion the value for strDireccion (Not Null)
	 * @property string $Telefono the value for strTelefono (Not Null)
	 * @property string $Email the value for strEmail 
	 * @property string $CedulaRif the value for strCedulaRif 
	 * @property string $PersonaContacto the value for strPersonaContacto 
	 * @property string $CodigoPostal the value for strCodigoPostal 
	 * @property string $DestinoId the value for strDestinoId (Not Null)
	 * @property integer $EstadoId the value for intEstadoId 
	 * @property integer $MunicipioId the value for intMunicipioId 
	 * @property integer $ParroquiaId the value for intParroquiaId 
	 * @property integer $SecurbarId the value for intSecurbarId 
	 * @property MasterCliente $Cliente the value for the MasterCliente object referenced by intClienteId (Not Null)
	 * @property Estacion $Destino the value for the Estacion object referenced by strDestinoId (Not Null)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class DestinatarioFrecuenteGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column destinatario_frecuente.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column destinatario_frecuente.cliente_id
		 * @var integer intClienteId
		 */
		protected $intClienteId;
		const ClienteIdDefault = null;


		/**
		 * Protected member variable that maps to the database column destinatario_frecuente.nombre
		 * @var string strNombre
		 */
		protected $strNombre;
		const NombreMaxLength = 100;
		const NombreDefault = null;


		/**
		 * Protected member variable that maps to the database column destinatario_frecuente.direccion
		 * @var string strDireccion
		 */
		protected $strDireccion;
		const DireccionMaxLength = 200;
		const DireccionDefault = null;


		/**
		 * Protected member variable that maps to the database column destinatario_frecuente.telefono
		 * @var string strTelefono
		 */
		protected $strTelefono;
		const TelefonoMaxLength = 50;
		const TelefonoDefault = null;


		/**
		 * Protected member variable that maps to the database column destinatario_frecuente.email
		 * @var string strEmail
		 */
		protected $strEmail;
		const EmailMaxLength = 50;
		const EmailDefault = null;


		/**
		 * Protected member variable that maps to the database column destinatario_frecuente.cedula_rif
		 * @var string strCedulaRif
		 */
		protected $strCedulaRif;
		const CedulaRifMaxLength = 20;
		const CedulaRifDefault = null;


		/**
		 * Protected member variable that maps to the database column destinatario_frecuente.persona_contacto
		 * @var string strPersonaContacto
		 */
		protected $strPersonaContacto;
		const PersonaContactoMaxLength = 50;
		const PersonaContactoDefault = null;


		/**
		 * Protected member variable that maps to the database column destinatario_frecuente.codigo_postal
		 * @var string strCodigoPostal
		 */
		protected $strCodigoPostal;
		const CodigoPostalMaxLength = 20;
		const CodigoPostalDefault = null;


		/**
		 * Protected member variable that maps to the database column destinatario_frecuente.destino_id
		 * @var string strDestinoId
		 */
		protected $strDestinoId;
		const DestinoIdMaxLength = 20;
		const DestinoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column destinatario_frecuente.estado_id
		 * @var integer intEstadoId
		 */
		protected $intEstadoId;
		const EstadoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column destinatario_frecuente.municipio_id
		 * @var integer intMunicipioId
		 */
		protected $intMunicipioId;
		const MunicipioIdDefault = null;


		/**
		 * Protected member variable that maps to the database column destinatario_frecuente.parroquia_id
		 * @var integer intParroquiaId
		 */
		protected $intParroquiaId;
		const ParroquiaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column destinatario_frecuente.securbar_id
		 * @var integer intSecurbarId
		 */
		protected $intSecurbarId;
		const SecurbarIdDefault = null;


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
		 * in the database column destinatario_frecuente.cliente_id.
		 *
		 * NOTE: Always use the Cliente property getter to correctly retrieve this MasterCliente object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var MasterCliente objCliente
		 */
		protected $objCliente;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column destinatario_frecuente.destino_id.
		 *
		 * NOTE: Always use the Destino property getter to correctly retrieve this Estacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Estacion objDestino
		 */
		protected $objDestino;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = DestinatarioFrecuente::IdDefault;
			$this->intClienteId = DestinatarioFrecuente::ClienteIdDefault;
			$this->strNombre = DestinatarioFrecuente::NombreDefault;
			$this->strDireccion = DestinatarioFrecuente::DireccionDefault;
			$this->strTelefono = DestinatarioFrecuente::TelefonoDefault;
			$this->strEmail = DestinatarioFrecuente::EmailDefault;
			$this->strCedulaRif = DestinatarioFrecuente::CedulaRifDefault;
			$this->strPersonaContacto = DestinatarioFrecuente::PersonaContactoDefault;
			$this->strCodigoPostal = DestinatarioFrecuente::CodigoPostalDefault;
			$this->strDestinoId = DestinatarioFrecuente::DestinoIdDefault;
			$this->intEstadoId = DestinatarioFrecuente::EstadoIdDefault;
			$this->intMunicipioId = DestinatarioFrecuente::MunicipioIdDefault;
			$this->intParroquiaId = DestinatarioFrecuente::ParroquiaIdDefault;
			$this->intSecurbarId = DestinatarioFrecuente::SecurbarIdDefault;
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
		 * Load a DestinatarioFrecuente from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DestinatarioFrecuente
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'DestinatarioFrecuente', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = DestinatarioFrecuente::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::DestinatarioFrecuente()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all DestinatarioFrecuentes
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DestinatarioFrecuente[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call DestinatarioFrecuente::QueryArray to perform the LoadAll query
			try {
				return DestinatarioFrecuente::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all DestinatarioFrecuentes
		 * @return int
		 */
		public static function CountAll() {
			// Call DestinatarioFrecuente::QueryCount to perform the CountAll query
			return DestinatarioFrecuente::QueryCount(QQ::All());
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
			$objDatabase = DestinatarioFrecuente::GetDatabase();

			// Create/Build out the QueryBuilder object with DestinatarioFrecuente-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'destinatario_frecuente');

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
				DestinatarioFrecuente::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('destinatario_frecuente');

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
		 * Static Qcubed Query method to query for a single DestinatarioFrecuente object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return DestinatarioFrecuente the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = DestinatarioFrecuente::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new DestinatarioFrecuente object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = DestinatarioFrecuente::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return DestinatarioFrecuente::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of DestinatarioFrecuente objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return DestinatarioFrecuente[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = DestinatarioFrecuente::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return DestinatarioFrecuente::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = DestinatarioFrecuente::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of DestinatarioFrecuente objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = DestinatarioFrecuente::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = DestinatarioFrecuente::GetDatabase();

			$strQuery = DestinatarioFrecuente::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/destinatariofrecuente', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = DestinatarioFrecuente::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this DestinatarioFrecuente
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'destinatario_frecuente';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'cliente_id', $strAliasPrefix . 'cliente_id');
			    $objBuilder->AddSelectItem($strTableName, 'nombre', $strAliasPrefix . 'nombre');
			    $objBuilder->AddSelectItem($strTableName, 'direccion', $strAliasPrefix . 'direccion');
			    $objBuilder->AddSelectItem($strTableName, 'telefono', $strAliasPrefix . 'telefono');
			    $objBuilder->AddSelectItem($strTableName, 'email', $strAliasPrefix . 'email');
			    $objBuilder->AddSelectItem($strTableName, 'cedula_rif', $strAliasPrefix . 'cedula_rif');
			    $objBuilder->AddSelectItem($strTableName, 'persona_contacto', $strAliasPrefix . 'persona_contacto');
			    $objBuilder->AddSelectItem($strTableName, 'codigo_postal', $strAliasPrefix . 'codigo_postal');
			    $objBuilder->AddSelectItem($strTableName, 'destino_id', $strAliasPrefix . 'destino_id');
			    $objBuilder->AddSelectItem($strTableName, 'estado_id', $strAliasPrefix . 'estado_id');
			    $objBuilder->AddSelectItem($strTableName, 'municipio_id', $strAliasPrefix . 'municipio_id');
			    $objBuilder->AddSelectItem($strTableName, 'parroquia_id', $strAliasPrefix . 'parroquia_id');
			    $objBuilder->AddSelectItem($strTableName, 'securbar_id', $strAliasPrefix . 'securbar_id');
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
		 * Instantiate a DestinatarioFrecuente from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this DestinatarioFrecuente::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a DestinatarioFrecuente, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (DestinatarioFrecuente::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the DestinatarioFrecuente object
			$objToReturn = new DestinatarioFrecuente();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'cliente_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intClienteId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nombre';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombre = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'direccion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireccion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'telefono';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTelefono = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'email';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEmail = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'cedula_rif';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCedulaRif = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'persona_contacto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strPersonaContacto = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codigo_postal';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodigoPostal = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'destino_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDestinoId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'estado_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intEstadoId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'municipio_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intMunicipioId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'parroquia_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intParroquiaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'securbar_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intSecurbarId = $objDbRow->GetColumn($strAliasName, 'Integer');

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
				$strAliasPrefix = 'destinatario_frecuente__';

			// Check for Cliente Early Binding
			$strAlias = $strAliasPrefix . 'cliente_id__codi_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['cliente_id']) ? null : $objExpansionAliasArray['cliente_id']);
				$objToReturn->objCliente = MasterCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cliente_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Destino Early Binding
			$strAlias = $strAliasPrefix . 'destino_id__codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['destino_id']) ? null : $objExpansionAliasArray['destino_id']);
				$objToReturn->objDestino = Estacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'destino_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of DestinatarioFrecuentes from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return DestinatarioFrecuente[]
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
					$objItem = DestinatarioFrecuente::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = DestinatarioFrecuente::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single DestinatarioFrecuente object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return DestinatarioFrecuente next row resulting from the query
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
			return DestinatarioFrecuente::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single DestinatarioFrecuente object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DestinatarioFrecuente
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return DestinatarioFrecuente::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::DestinatarioFrecuente()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of DestinatarioFrecuente objects,
		 * by ClienteId Index(es)
		 * @param integer $intClienteId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DestinatarioFrecuente[]
		*/
		public static function LoadArrayByClienteId($intClienteId, $objOptionalClauses = null) {
			// Call DestinatarioFrecuente::QueryArray to perform the LoadArrayByClienteId query
			try {
				return DestinatarioFrecuente::QueryArray(
					QQ::Equal(QQN::DestinatarioFrecuente()->ClienteId, $intClienteId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count DestinatarioFrecuentes
		 * by ClienteId Index(es)
		 * @param integer $intClienteId
		 * @return int
		*/
		public static function CountByClienteId($intClienteId) {
			// Call DestinatarioFrecuente::QueryCount to perform the CountByClienteId query
			return DestinatarioFrecuente::QueryCount(
				QQ::Equal(QQN::DestinatarioFrecuente()->ClienteId, $intClienteId)
			);
		}

		/**
		 * Load an array of DestinatarioFrecuente objects,
		 * by DestinoId Index(es)
		 * @param string $strDestinoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DestinatarioFrecuente[]
		*/
		public static function LoadArrayByDestinoId($strDestinoId, $objOptionalClauses = null) {
			// Call DestinatarioFrecuente::QueryArray to perform the LoadArrayByDestinoId query
			try {
				return DestinatarioFrecuente::QueryArray(
					QQ::Equal(QQN::DestinatarioFrecuente()->DestinoId, $strDestinoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count DestinatarioFrecuentes
		 * by DestinoId Index(es)
		 * @param string $strDestinoId
		 * @return int
		*/
		public static function CountByDestinoId($strDestinoId) {
			// Call DestinatarioFrecuente::QueryCount to perform the CountByDestinoId query
			return DestinatarioFrecuente::QueryCount(
				QQ::Equal(QQN::DestinatarioFrecuente()->DestinoId, $strDestinoId)
			);
		}

		/**
		 * Load an array of DestinatarioFrecuente objects,
		 * by ClienteId, DestinoId Index(es)
		 * @param integer $intClienteId
		 * @param string $strDestinoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DestinatarioFrecuente[]
		*/
		public static function LoadArrayByClienteIdDestinoId($intClienteId, $strDestinoId, $objOptionalClauses = null) {
			// Call DestinatarioFrecuente::QueryArray to perform the LoadArrayByClienteIdDestinoId query
			try {
				return DestinatarioFrecuente::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::DestinatarioFrecuente()->ClienteId, $intClienteId),
					QQ::Equal(QQN::DestinatarioFrecuente()->DestinoId, $strDestinoId)					)
,
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count DestinatarioFrecuentes
		 * by ClienteId, DestinoId Index(es)
		 * @param integer $intClienteId
		 * @param string $strDestinoId
		 * @return int
		*/
		public static function CountByClienteIdDestinoId($intClienteId, $strDestinoId) {
			// Call DestinatarioFrecuente::QueryCount to perform the CountByClienteIdDestinoId query
			return DestinatarioFrecuente::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::DestinatarioFrecuente()->ClienteId, $intClienteId),
				QQ::Equal(QQN::DestinatarioFrecuente()->DestinoId, $strDestinoId)				)

			);
		}

		/**
		 * Load an array of DestinatarioFrecuente objects,
		 * by Nombre Index(es)
		 * @param string $strNombre
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DestinatarioFrecuente[]
		*/
		public static function LoadArrayByNombre($strNombre, $objOptionalClauses = null) {
			// Call DestinatarioFrecuente::QueryArray to perform the LoadArrayByNombre query
			try {
				return DestinatarioFrecuente::QueryArray(
					QQ::Equal(QQN::DestinatarioFrecuente()->Nombre, $strNombre),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count DestinatarioFrecuentes
		 * by Nombre Index(es)
		 * @param string $strNombre
		 * @return int
		*/
		public static function CountByNombre($strNombre) {
			// Call DestinatarioFrecuente::QueryCount to perform the CountByNombre query
			return DestinatarioFrecuente::QueryCount(
				QQ::Equal(QQN::DestinatarioFrecuente()->Nombre, $strNombre)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this DestinatarioFrecuente
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = DestinatarioFrecuente::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `destinatario_frecuente` (
							`cliente_id`,
							`nombre`,
							`direccion`,
							`telefono`,
							`email`,
							`cedula_rif`,
							`persona_contacto`,
							`codigo_postal`,
							`destino_id`,
							`estado_id`,
							`municipio_id`,
							`parroquia_id`,
							`securbar_id`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intClienteId) . ',
							' . $objDatabase->SqlVariable($this->strNombre) . ',
							' . $objDatabase->SqlVariable($this->strDireccion) . ',
							' . $objDatabase->SqlVariable($this->strTelefono) . ',
							' . $objDatabase->SqlVariable($this->strEmail) . ',
							' . $objDatabase->SqlVariable($this->strCedulaRif) . ',
							' . $objDatabase->SqlVariable($this->strPersonaContacto) . ',
							' . $objDatabase->SqlVariable($this->strCodigoPostal) . ',
							' . $objDatabase->SqlVariable($this->strDestinoId) . ',
							' . $objDatabase->SqlVariable($this->intEstadoId) . ',
							' . $objDatabase->SqlVariable($this->intMunicipioId) . ',
							' . $objDatabase->SqlVariable($this->intParroquiaId) . ',
							' . $objDatabase->SqlVariable($this->intSecurbarId) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('destinatario_frecuente', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`destinatario_frecuente`
						SET
							`cliente_id` = ' . $objDatabase->SqlVariable($this->intClienteId) . ',
							`nombre` = ' . $objDatabase->SqlVariable($this->strNombre) . ',
							`direccion` = ' . $objDatabase->SqlVariable($this->strDireccion) . ',
							`telefono` = ' . $objDatabase->SqlVariable($this->strTelefono) . ',
							`email` = ' . $objDatabase->SqlVariable($this->strEmail) . ',
							`cedula_rif` = ' . $objDatabase->SqlVariable($this->strCedulaRif) . ',
							`persona_contacto` = ' . $objDatabase->SqlVariable($this->strPersonaContacto) . ',
							`codigo_postal` = ' . $objDatabase->SqlVariable($this->strCodigoPostal) . ',
							`destino_id` = ' . $objDatabase->SqlVariable($this->strDestinoId) . ',
							`estado_id` = ' . $objDatabase->SqlVariable($this->intEstadoId) . ',
							`municipio_id` = ' . $objDatabase->SqlVariable($this->intMunicipioId) . ',
							`parroquia_id` = ' . $objDatabase->SqlVariable($this->intParroquiaId) . ',
							`securbar_id` = ' . $objDatabase->SqlVariable($this->intSecurbarId) . '
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
		 * Delete this DestinatarioFrecuente
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this DestinatarioFrecuente with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = DestinatarioFrecuente::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`destinatario_frecuente`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this DestinatarioFrecuente ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'DestinatarioFrecuente', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all DestinatarioFrecuentes
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = DestinatarioFrecuente::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`destinatario_frecuente`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate destinatario_frecuente table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = DestinatarioFrecuente::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `destinatario_frecuente`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this DestinatarioFrecuente from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved DestinatarioFrecuente object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = DestinatarioFrecuente::Load($this->intId);

			// Update $this's local variables to match
			$this->ClienteId = $objReloaded->ClienteId;
			$this->strNombre = $objReloaded->strNombre;
			$this->strDireccion = $objReloaded->strDireccion;
			$this->strTelefono = $objReloaded->strTelefono;
			$this->strEmail = $objReloaded->strEmail;
			$this->strCedulaRif = $objReloaded->strCedulaRif;
			$this->strPersonaContacto = $objReloaded->strPersonaContacto;
			$this->strCodigoPostal = $objReloaded->strCodigoPostal;
			$this->DestinoId = $objReloaded->DestinoId;
			$this->intEstadoId = $objReloaded->intEstadoId;
			$this->intMunicipioId = $objReloaded->intMunicipioId;
			$this->intParroquiaId = $objReloaded->intParroquiaId;
			$this->intSecurbarId = $objReloaded->intSecurbarId;
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

				case 'ClienteId':
					/**
					 * Gets the value for intClienteId (Not Null)
					 * @return integer
					 */
					return $this->intClienteId;

				case 'Nombre':
					/**
					 * Gets the value for strNombre (Not Null)
					 * @return string
					 */
					return $this->strNombre;

				case 'Direccion':
					/**
					 * Gets the value for strDireccion (Not Null)
					 * @return string
					 */
					return $this->strDireccion;

				case 'Telefono':
					/**
					 * Gets the value for strTelefono (Not Null)
					 * @return string
					 */
					return $this->strTelefono;

				case 'Email':
					/**
					 * Gets the value for strEmail 
					 * @return string
					 */
					return $this->strEmail;

				case 'CedulaRif':
					/**
					 * Gets the value for strCedulaRif 
					 * @return string
					 */
					return $this->strCedulaRif;

				case 'PersonaContacto':
					/**
					 * Gets the value for strPersonaContacto 
					 * @return string
					 */
					return $this->strPersonaContacto;

				case 'CodigoPostal':
					/**
					 * Gets the value for strCodigoPostal 
					 * @return string
					 */
					return $this->strCodigoPostal;

				case 'DestinoId':
					/**
					 * Gets the value for strDestinoId (Not Null)
					 * @return string
					 */
					return $this->strDestinoId;

				case 'EstadoId':
					/**
					 * Gets the value for intEstadoId 
					 * @return integer
					 */
					return $this->intEstadoId;

				case 'MunicipioId':
					/**
					 * Gets the value for intMunicipioId 
					 * @return integer
					 */
					return $this->intMunicipioId;

				case 'ParroquiaId':
					/**
					 * Gets the value for intParroquiaId 
					 * @return integer
					 */
					return $this->intParroquiaId;

				case 'SecurbarId':
					/**
					 * Gets the value for intSecurbarId 
					 * @return integer
					 */
					return $this->intSecurbarId;


				///////////////////
				// Member Objects
				///////////////////
				case 'Cliente':
					/**
					 * Gets the value for the MasterCliente object referenced by intClienteId (Not Null)
					 * @return MasterCliente
					 */
					try {
						if ((!$this->objCliente) && (!is_null($this->intClienteId)))
							$this->objCliente = MasterCliente::Load($this->intClienteId);
						return $this->objCliente;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Destino':
					/**
					 * Gets the value for the Estacion object referenced by strDestinoId (Not Null)
					 * @return Estacion
					 */
					try {
						if ((!$this->objDestino) && (!is_null($this->strDestinoId)))
							$this->objDestino = Estacion::Load($this->strDestinoId);
						return $this->objDestino;
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
				case 'ClienteId':
					/**
					 * Sets the value for intClienteId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCliente = null;
						return ($this->intClienteId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

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

				case 'Direccion':
					/**
					 * Sets the value for strDireccion (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDireccion = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Telefono':
					/**
					 * Sets the value for strTelefono (Not Null)
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

				case 'CedulaRif':
					/**
					 * Sets the value for strCedulaRif 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCedulaRif = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PersonaContacto':
					/**
					 * Sets the value for strPersonaContacto 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strPersonaContacto = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodigoPostal':
					/**
					 * Sets the value for strCodigoPostal 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCodigoPostal = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DestinoId':
					/**
					 * Sets the value for strDestinoId (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objDestino = null;
						return ($this->strDestinoId = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EstadoId':
					/**
					 * Sets the value for intEstadoId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intEstadoId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MunicipioId':
					/**
					 * Sets the value for intMunicipioId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intMunicipioId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ParroquiaId':
					/**
					 * Sets the value for intParroquiaId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intParroquiaId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SecurbarId':
					/**
					 * Sets the value for intSecurbarId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intSecurbarId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Cliente':
					/**
					 * Sets the value for the MasterCliente object referenced by intClienteId (Not Null)
					 * @param MasterCliente $mixValue
					 * @return MasterCliente
					 */
					if (is_null($mixValue)) {
						$this->intClienteId = null;
						$this->objCliente = null;
						return null;
					} else {
						// Make sure $mixValue actually is a MasterCliente object
						try {
							$mixValue = QType::Cast($mixValue, 'MasterCliente');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED MasterCliente object
						if (is_null($mixValue->CodiClie))
							throw new QCallerException('Unable to set an unsaved Cliente for this DestinatarioFrecuente');

						// Update Local Member Variables
						$this->objCliente = $mixValue;
						$this->intClienteId = $mixValue->CodiClie;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Destino':
					/**
					 * Sets the value for the Estacion object referenced by strDestinoId (Not Null)
					 * @param Estacion $mixValue
					 * @return Estacion
					 */
					if (is_null($mixValue)) {
						$this->strDestinoId = null;
						$this->objDestino = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Estacion object
						try {
							$mixValue = QType::Cast($mixValue, 'Estacion');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Estacion object
						if (is_null($mixValue->CodiEsta))
							throw new QCallerException('Unable to set an unsaved Destino for this DestinatarioFrecuente');

						// Update Local Member Variables
						$this->objDestino = $mixValue;
						$this->strDestinoId = $mixValue->CodiEsta;

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
			return "destinatario_frecuente";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[DestinatarioFrecuente::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="DestinatarioFrecuente"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Cliente" type="xsd1:MasterCliente"/>';
			$strToReturn .= '<element name="Nombre" type="xsd:string"/>';
			$strToReturn .= '<element name="Direccion" type="xsd:string"/>';
			$strToReturn .= '<element name="Telefono" type="xsd:string"/>';
			$strToReturn .= '<element name="Email" type="xsd:string"/>';
			$strToReturn .= '<element name="CedulaRif" type="xsd:string"/>';
			$strToReturn .= '<element name="PersonaContacto" type="xsd:string"/>';
			$strToReturn .= '<element name="CodigoPostal" type="xsd:string"/>';
			$strToReturn .= '<element name="Destino" type="xsd1:Estacion"/>';
			$strToReturn .= '<element name="EstadoId" type="xsd:int"/>';
			$strToReturn .= '<element name="MunicipioId" type="xsd:int"/>';
			$strToReturn .= '<element name="ParroquiaId" type="xsd:int"/>';
			$strToReturn .= '<element name="SecurbarId" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('DestinatarioFrecuente', $strComplexTypeArray)) {
				$strComplexTypeArray['DestinatarioFrecuente'] = DestinatarioFrecuente::GetSoapComplexTypeXml();
				MasterCliente::AlterSoapComplexTypeArray($strComplexTypeArray);
				Estacion::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, DestinatarioFrecuente::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new DestinatarioFrecuente();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Cliente')) &&
				($objSoapObject->Cliente))
				$objToReturn->Cliente = MasterCliente::GetObjectFromSoapObject($objSoapObject->Cliente);
			if (property_exists($objSoapObject, 'Nombre'))
				$objToReturn->strNombre = $objSoapObject->Nombre;
			if (property_exists($objSoapObject, 'Direccion'))
				$objToReturn->strDireccion = $objSoapObject->Direccion;
			if (property_exists($objSoapObject, 'Telefono'))
				$objToReturn->strTelefono = $objSoapObject->Telefono;
			if (property_exists($objSoapObject, 'Email'))
				$objToReturn->strEmail = $objSoapObject->Email;
			if (property_exists($objSoapObject, 'CedulaRif'))
				$objToReturn->strCedulaRif = $objSoapObject->CedulaRif;
			if (property_exists($objSoapObject, 'PersonaContacto'))
				$objToReturn->strPersonaContacto = $objSoapObject->PersonaContacto;
			if (property_exists($objSoapObject, 'CodigoPostal'))
				$objToReturn->strCodigoPostal = $objSoapObject->CodigoPostal;
			if ((property_exists($objSoapObject, 'Destino')) &&
				($objSoapObject->Destino))
				$objToReturn->Destino = Estacion::GetObjectFromSoapObject($objSoapObject->Destino);
			if (property_exists($objSoapObject, 'EstadoId'))
				$objToReturn->intEstadoId = $objSoapObject->EstadoId;
			if (property_exists($objSoapObject, 'MunicipioId'))
				$objToReturn->intMunicipioId = $objSoapObject->MunicipioId;
			if (property_exists($objSoapObject, 'ParroquiaId'))
				$objToReturn->intParroquiaId = $objSoapObject->ParroquiaId;
			if (property_exists($objSoapObject, 'SecurbarId'))
				$objToReturn->intSecurbarId = $objSoapObject->SecurbarId;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, DestinatarioFrecuente::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objCliente)
				$objObject->objCliente = MasterCliente::GetSoapObjectFromObject($objObject->objCliente, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intClienteId = null;
			if ($objObject->objDestino)
				$objObject->objDestino = Estacion::GetSoapObjectFromObject($objObject->objDestino, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strDestinoId = null;
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
			$iArray['ClienteId'] = $this->intClienteId;
			$iArray['Nombre'] = $this->strNombre;
			$iArray['Direccion'] = $this->strDireccion;
			$iArray['Telefono'] = $this->strTelefono;
			$iArray['Email'] = $this->strEmail;
			$iArray['CedulaRif'] = $this->strCedulaRif;
			$iArray['PersonaContacto'] = $this->strPersonaContacto;
			$iArray['CodigoPostal'] = $this->strCodigoPostal;
			$iArray['DestinoId'] = $this->strDestinoId;
			$iArray['EstadoId'] = $this->intEstadoId;
			$iArray['MunicipioId'] = $this->intMunicipioId;
			$iArray['ParroquiaId'] = $this->intParroquiaId;
			$iArray['SecurbarId'] = $this->intSecurbarId;
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
     * @property-read QQNode $ClienteId
     * @property-read QQNodeMasterCliente $Cliente
     * @property-read QQNode $Nombre
     * @property-read QQNode $Direccion
     * @property-read QQNode $Telefono
     * @property-read QQNode $Email
     * @property-read QQNode $CedulaRif
     * @property-read QQNode $PersonaContacto
     * @property-read QQNode $CodigoPostal
     * @property-read QQNode $DestinoId
     * @property-read QQNodeEstacion $Destino
     * @property-read QQNode $EstadoId
     * @property-read QQNode $MunicipioId
     * @property-read QQNode $ParroquiaId
     * @property-read QQNode $SecurbarId
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeDestinatarioFrecuente extends QQNode {
		protected $strTableName = 'destinatario_frecuente';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'DestinatarioFrecuente';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'ClienteId':
					return new QQNode('cliente_id', 'ClienteId', 'Integer', $this);
				case 'Cliente':
					return new QQNodeMasterCliente('cliente_id', 'Cliente', 'Integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'VarChar', $this);
				case 'Direccion':
					return new QQNode('direccion', 'Direccion', 'VarChar', $this);
				case 'Telefono':
					return new QQNode('telefono', 'Telefono', 'VarChar', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'VarChar', $this);
				case 'CedulaRif':
					return new QQNode('cedula_rif', 'CedulaRif', 'VarChar', $this);
				case 'PersonaContacto':
					return new QQNode('persona_contacto', 'PersonaContacto', 'VarChar', $this);
				case 'CodigoPostal':
					return new QQNode('codigo_postal', 'CodigoPostal', 'VarChar', $this);
				case 'DestinoId':
					return new QQNode('destino_id', 'DestinoId', 'VarChar', $this);
				case 'Destino':
					return new QQNodeEstacion('destino_id', 'Destino', 'VarChar', $this);
				case 'EstadoId':
					return new QQNode('estado_id', 'EstadoId', 'Integer', $this);
				case 'MunicipioId':
					return new QQNode('municipio_id', 'MunicipioId', 'Integer', $this);
				case 'ParroquiaId':
					return new QQNode('parroquia_id', 'ParroquiaId', 'Integer', $this);
				case 'SecurbarId':
					return new QQNode('securbar_id', 'SecurbarId', 'Integer', $this);

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
     * @property-read QQNode $ClienteId
     * @property-read QQNodeMasterCliente $Cliente
     * @property-read QQNode $Nombre
     * @property-read QQNode $Direccion
     * @property-read QQNode $Telefono
     * @property-read QQNode $Email
     * @property-read QQNode $CedulaRif
     * @property-read QQNode $PersonaContacto
     * @property-read QQNode $CodigoPostal
     * @property-read QQNode $DestinoId
     * @property-read QQNodeEstacion $Destino
     * @property-read QQNode $EstadoId
     * @property-read QQNode $MunicipioId
     * @property-read QQNode $ParroquiaId
     * @property-read QQNode $SecurbarId
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeDestinatarioFrecuente extends QQReverseReferenceNode {
		protected $strTableName = 'destinatario_frecuente';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'DestinatarioFrecuente';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ClienteId':
					return new QQNode('cliente_id', 'ClienteId', 'integer', $this);
				case 'Cliente':
					return new QQNodeMasterCliente('cliente_id', 'Cliente', 'integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'string', $this);
				case 'Direccion':
					return new QQNode('direccion', 'Direccion', 'string', $this);
				case 'Telefono':
					return new QQNode('telefono', 'Telefono', 'string', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'string', $this);
				case 'CedulaRif':
					return new QQNode('cedula_rif', 'CedulaRif', 'string', $this);
				case 'PersonaContacto':
					return new QQNode('persona_contacto', 'PersonaContacto', 'string', $this);
				case 'CodigoPostal':
					return new QQNode('codigo_postal', 'CodigoPostal', 'string', $this);
				case 'DestinoId':
					return new QQNode('destino_id', 'DestinoId', 'string', $this);
				case 'Destino':
					return new QQNodeEstacion('destino_id', 'Destino', 'string', $this);
				case 'EstadoId':
					return new QQNode('estado_id', 'EstadoId', 'integer', $this);
				case 'MunicipioId':
					return new QQNode('municipio_id', 'MunicipioId', 'integer', $this);
				case 'ParroquiaId':
					return new QQNode('parroquia_id', 'ParroquiaId', 'integer', $this);
				case 'SecurbarId':
					return new QQNode('securbar_id', 'SecurbarId', 'integer', $this);

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
