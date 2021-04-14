<?php
	/**
	 * The abstract OpcionGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Opcion subclass which
	 * extends this OpcionGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Opcion class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $CodiOpci the value for intCodiOpci (Read-Only PK)
	 * @property string $CodiSist the value for strCodiSist (Not Null)
	 * @property string $DescOpci the value for strDescOpci (Not Null)
	 * @property integer $CodiTipo the value for intCodiTipo (Not Null)
	 * @property string $NombProg the value for strNombProg (Not Null)
	 * @property integer $NumeDepe the value for intNumeDepe 
	 * @property string $ImagOpci the value for strImagOpci 
	 * @property integer $AnchImag the value for intAnchImag 
	 * @property integer $AltoImag the value for intAltoImag 
	 * @property integer $CodiStat the value for intCodiStat (Not Null)
	 * @property string $TextObse the value for strTextObse 
	 * @property integer $PosiOpci the value for intPosiOpci 
	 * @property string $PathOpci Ubicacion del Programa 
	 * @property string $NombreClase the value for strNombreClase 
	 * @property integer $Nivel the value for intNivel 
	 * @property Sistema $CodiSistObject the value for the Sistema object referenced by strCodiSist (Not Null)
	 * @property-read OpciGrup $_OpciGrupAsCodiOpci the value for the private _objOpciGrupAsCodiOpci (Read-Only) if set due to an expansion on the opci_grup.codi_opci reverse relationship
	 * @property-read OpciGrup[] $_OpciGrupAsCodiOpciArray the value for the private _objOpciGrupAsCodiOpciArray (Read-Only) if set due to an ExpandAsArray on the opci_grup.codi_opci reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class OpcionGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column opcion.codi_opci
		 * @var integer intCodiOpci
		 */
		protected $intCodiOpci;
		const CodiOpciDefault = null;


		/**
		 * Protected member variable that maps to the database column opcion.codi_sist
		 * @var string strCodiSist
		 */
		protected $strCodiSist;
		const CodiSistMaxLength = 5;
		const CodiSistDefault = null;


		/**
		 * Protected member variable that maps to the database column opcion.desc_opci
		 * @var string strDescOpci
		 */
		protected $strDescOpci;
		const DescOpciMaxLength = 50;
		const DescOpciDefault = null;


		/**
		 * Protected member variable that maps to the database column opcion.codi_tipo
		 * @var integer intCodiTipo
		 */
		protected $intCodiTipo;
		const CodiTipoDefault = null;


		/**
		 * Protected member variable that maps to the database column opcion.nomb_prog
		 * @var string strNombProg
		 */
		protected $strNombProg;
		const NombProgMaxLength = 50;
		const NombProgDefault = null;


		/**
		 * Protected member variable that maps to the database column opcion.nume_depe
		 * @var integer intNumeDepe
		 */
		protected $intNumeDepe;
		const NumeDepeDefault = null;


		/**
		 * Protected member variable that maps to the database column opcion.imag_opci
		 * @var string strImagOpci
		 */
		protected $strImagOpci;
		const ImagOpciMaxLength = 50;
		const ImagOpciDefault = null;


		/**
		 * Protected member variable that maps to the database column opcion.anch_imag
		 * @var integer intAnchImag
		 */
		protected $intAnchImag;
		const AnchImagDefault = null;


		/**
		 * Protected member variable that maps to the database column opcion.alto_imag
		 * @var integer intAltoImag
		 */
		protected $intAltoImag;
		const AltoImagDefault = null;


		/**
		 * Protected member variable that maps to the database column opcion.codi_stat
		 * @var integer intCodiStat
		 */
		protected $intCodiStat;
		const CodiStatDefault = null;


		/**
		 * Protected member variable that maps to the database column opcion.text_obse
		 * @var string strTextObse
		 */
		protected $strTextObse;
		const TextObseMaxLength = 200;
		const TextObseDefault = null;


		/**
		 * Protected member variable that maps to the database column opcion.posi_opci
		 * @var integer intPosiOpci
		 */
		protected $intPosiOpci;
		const PosiOpciDefault = null;


		/**
		 * Protected member variable that maps to the database column opcion.path_opci
		 * Ubicacion del Programa		 * @var string strPathOpci
		 */
		protected $strPathOpci;
		const PathOpciMaxLength = 20;
		const PathOpciDefault = null;


		/**
		 * Protected member variable that maps to the database column opcion.nombre_clase
		 * @var string strNombreClase
		 */
		protected $strNombreClase;
		const NombreClaseMaxLength = 100;
		const NombreClaseDefault = null;


		/**
		 * Protected member variable that maps to the database column opcion.nivel
		 * @var integer intNivel
		 */
		protected $intNivel;
		const NivelDefault = null;


		/**
		 * Private member variable that stores a reference to a single OpciGrupAsCodiOpci object
		 * (of type OpciGrup), if this Opcion object was restored with
		 * an expansion on the opci_grup association table.
		 * @var OpciGrup _objOpciGrupAsCodiOpci;
		 */
		private $_objOpciGrupAsCodiOpci;

		/**
		 * Private member variable that stores a reference to an array of OpciGrupAsCodiOpci objects
		 * (of type OpciGrup[]), if this Opcion object was restored with
		 * an ExpandAsArray on the opci_grup association table.
		 * @var OpciGrup[] _objOpciGrupAsCodiOpciArray;
		 */
		private $_objOpciGrupAsCodiOpciArray = null;

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
		 * in the database column opcion.codi_sist.
		 *
		 * NOTE: Always use the CodiSistObject property getter to correctly retrieve this Sistema object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Sistema objCodiSistObject
		 */
		protected $objCodiSistObject;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intCodiOpci = Opcion::CodiOpciDefault;
			$this->strCodiSist = Opcion::CodiSistDefault;
			$this->strDescOpci = Opcion::DescOpciDefault;
			$this->intCodiTipo = Opcion::CodiTipoDefault;
			$this->strNombProg = Opcion::NombProgDefault;
			$this->intNumeDepe = Opcion::NumeDepeDefault;
			$this->strImagOpci = Opcion::ImagOpciDefault;
			$this->intAnchImag = Opcion::AnchImagDefault;
			$this->intAltoImag = Opcion::AltoImagDefault;
			$this->intCodiStat = Opcion::CodiStatDefault;
			$this->strTextObse = Opcion::TextObseDefault;
			$this->intPosiOpci = Opcion::PosiOpciDefault;
			$this->strPathOpci = Opcion::PathOpciDefault;
			$this->strNombreClase = Opcion::NombreClaseDefault;
			$this->intNivel = Opcion::NivelDefault;
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
		 * Load a Opcion from PK Info
		 * @param integer $intCodiOpci
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Opcion
		 */
		public static function Load($intCodiOpci, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Opcion', $intCodiOpci);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Opcion::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Opcion()->CodiOpci, $intCodiOpci)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Opcions
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Opcion[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Opcion::QueryArray to perform the LoadAll query
			try {
				return Opcion::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Opcions
		 * @return int
		 */
		public static function CountAll() {
			// Call Opcion::QueryCount to perform the CountAll query
			return Opcion::QueryCount(QQ::All());
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
			$objDatabase = Opcion::GetDatabase();

			// Create/Build out the QueryBuilder object with Opcion-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'opcion');

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
				Opcion::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('opcion');

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
		 * Static Qcubed Query method to query for a single Opcion object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Opcion the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Opcion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Opcion object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Opcion::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodiOpci][] = $objItem;
		
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
				return Opcion::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Opcion objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Opcion[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Opcion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Opcion::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Opcion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Opcion objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Opcion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Opcion::GetDatabase();

			$strQuery = Opcion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/opcion', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Opcion::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Opcion
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'opcion';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'codi_opci', $strAliasPrefix . 'codi_opci');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'codi_opci', $strAliasPrefix . 'codi_opci');
			    $objBuilder->AddSelectItem($strTableName, 'codi_sist', $strAliasPrefix . 'codi_sist');
			    $objBuilder->AddSelectItem($strTableName, 'desc_opci', $strAliasPrefix . 'desc_opci');
			    $objBuilder->AddSelectItem($strTableName, 'codi_tipo', $strAliasPrefix . 'codi_tipo');
			    $objBuilder->AddSelectItem($strTableName, 'nomb_prog', $strAliasPrefix . 'nomb_prog');
			    $objBuilder->AddSelectItem($strTableName, 'nume_depe', $strAliasPrefix . 'nume_depe');
			    $objBuilder->AddSelectItem($strTableName, 'imag_opci', $strAliasPrefix . 'imag_opci');
			    $objBuilder->AddSelectItem($strTableName, 'anch_imag', $strAliasPrefix . 'anch_imag');
			    $objBuilder->AddSelectItem($strTableName, 'alto_imag', $strAliasPrefix . 'alto_imag');
			    $objBuilder->AddSelectItem($strTableName, 'codi_stat', $strAliasPrefix . 'codi_stat');
			    $objBuilder->AddSelectItem($strTableName, 'text_obse', $strAliasPrefix . 'text_obse');
			    $objBuilder->AddSelectItem($strTableName, 'posi_opci', $strAliasPrefix . 'posi_opci');
			    $objBuilder->AddSelectItem($strTableName, 'path_opci', $strAliasPrefix . 'path_opci');
			    $objBuilder->AddSelectItem($strTableName, 'nombre_clase', $strAliasPrefix . 'nombre_clase');
			    $objBuilder->AddSelectItem($strTableName, 'nivel', $strAliasPrefix . 'nivel');
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
			
			$strAlias = $strAliasPrefix . 'codi_opci';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->intCodiOpci != $objDbRow->GetColumn($strColumnAlias, 'Integer')) {
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
		 * Instantiate a Opcion from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Opcion::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Opcion, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['codi_opci']) ? $strColumnAliasArray['codi_opci'] : 'codi_opci';
				$key = $objDbRow->GetColumn($strColumnAlias, 'Integer');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (Opcion::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the Opcion object
			$objToReturn = new Opcion();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'codi_opci';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiOpci = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codi_sist';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodiSist = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'desc_opci';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescOpci = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codi_tipo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiTipo = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nomb_prog';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombProg = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'nume_depe';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intNumeDepe = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'imag_opci';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strImagOpci = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'anch_imag';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intAnchImag = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'alto_imag';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intAltoImag = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codi_stat';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiStat = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'text_obse';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTextObse = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'posi_opci';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intPosiOpci = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'path_opci';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strPathOpci = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'nombre_clase';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombreClase = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'nivel';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intNivel = $objDbRow->GetColumn($strAliasName, 'Integer');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->CodiOpci != $objPreviousItem->CodiOpci) {
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
				$strAliasPrefix = 'opcion__';

			// Check for CodiSistObject Early Binding
			$strAlias = $strAliasPrefix . 'codi_sist__codi_sist';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['codi_sist']) ? null : $objExpansionAliasArray['codi_sist']);
				$objToReturn->objCodiSistObject = Sistema::InstantiateDbRow($objDbRow, $strAliasPrefix . 'codi_sist__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			// Check for OpciGrupAsCodiOpci Virtual Binding
			$strAlias = $strAliasPrefix . 'opcigrupascodiopci__codi_regi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['opcigrupascodiopci']) ? null : $objExpansionAliasArray['opcigrupascodiopci']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objOpciGrupAsCodiOpciArray)
				$objToReturn->_objOpciGrupAsCodiOpciArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objOpciGrupAsCodiOpciArray[] = OpciGrup::InstantiateDbRow($objDbRow, $strAliasPrefix . 'opcigrupascodiopci__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objOpciGrupAsCodiOpci)) {
					$objToReturn->_objOpciGrupAsCodiOpci = OpciGrup::InstantiateDbRow($objDbRow, $strAliasPrefix . 'opcigrupascodiopci__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Opcions from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Opcion[]
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
					$objItem = Opcion::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodiOpci][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Opcion::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Opcion object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Opcion next row resulting from the query
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
			return Opcion::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Opcion object,
		 * by CodiOpci Index(es)
		 * @param integer $intCodiOpci
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Opcion
		*/
		public static function LoadByCodiOpci($intCodiOpci, $objOptionalClauses = null) {
			return Opcion::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Opcion()->CodiOpci, $intCodiOpci)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of Opcion objects,
		 * by CodiTipo Index(es)
		 * @param integer $intCodiTipo
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Opcion[]
		*/
		public static function LoadArrayByCodiTipo($intCodiTipo, $objOptionalClauses = null) {
			// Call Opcion::QueryArray to perform the LoadArrayByCodiTipo query
			try {
				return Opcion::QueryArray(
					QQ::Equal(QQN::Opcion()->CodiTipo, $intCodiTipo),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Opcions
		 * by CodiTipo Index(es)
		 * @param integer $intCodiTipo
		 * @return int
		*/
		public static function CountByCodiTipo($intCodiTipo) {
			// Call Opcion::QueryCount to perform the CountByCodiTipo query
			return Opcion::QueryCount(
				QQ::Equal(QQN::Opcion()->CodiTipo, $intCodiTipo)
			);
		}

		/**
		 * Load an array of Opcion objects,
		 * by CodiStat Index(es)
		 * @param integer $intCodiStat
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Opcion[]
		*/
		public static function LoadArrayByCodiStat($intCodiStat, $objOptionalClauses = null) {
			// Call Opcion::QueryArray to perform the LoadArrayByCodiStat query
			try {
				return Opcion::QueryArray(
					QQ::Equal(QQN::Opcion()->CodiStat, $intCodiStat),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Opcions
		 * by CodiStat Index(es)
		 * @param integer $intCodiStat
		 * @return int
		*/
		public static function CountByCodiStat($intCodiStat) {
			// Call Opcion::QueryCount to perform the CountByCodiStat query
			return Opcion::QueryCount(
				QQ::Equal(QQN::Opcion()->CodiStat, $intCodiStat)
			);
		}

		/**
		 * Load an array of Opcion objects,
		 * by NumeDepe Index(es)
		 * @param integer $intNumeDepe
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Opcion[]
		*/
		public static function LoadArrayByNumeDepe($intNumeDepe, $objOptionalClauses = null) {
			// Call Opcion::QueryArray to perform the LoadArrayByNumeDepe query
			try {
				return Opcion::QueryArray(
					QQ::Equal(QQN::Opcion()->NumeDepe, $intNumeDepe),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Opcions
		 * by NumeDepe Index(es)
		 * @param integer $intNumeDepe
		 * @return int
		*/
		public static function CountByNumeDepe($intNumeDepe) {
			// Call Opcion::QueryCount to perform the CountByNumeDepe query
			return Opcion::QueryCount(
				QQ::Equal(QQN::Opcion()->NumeDepe, $intNumeDepe)
			);
		}

		/**
		 * Load an array of Opcion objects,
		 * by CodiSist Index(es)
		 * @param string $strCodiSist
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Opcion[]
		*/
		public static function LoadArrayByCodiSist($strCodiSist, $objOptionalClauses = null) {
			// Call Opcion::QueryArray to perform the LoadArrayByCodiSist query
			try {
				return Opcion::QueryArray(
					QQ::Equal(QQN::Opcion()->CodiSist, $strCodiSist),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Opcions
		 * by CodiSist Index(es)
		 * @param string $strCodiSist
		 * @return int
		*/
		public static function CountByCodiSist($strCodiSist) {
			// Call Opcion::QueryCount to perform the CountByCodiSist query
			return Opcion::QueryCount(
				QQ::Equal(QQN::Opcion()->CodiSist, $strCodiSist)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Opcion
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Opcion::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `opcion` (
							`codi_sist`,
							`desc_opci`,
							`codi_tipo`,
							`nomb_prog`,
							`nume_depe`,
							`imag_opci`,
							`anch_imag`,
							`alto_imag`,
							`codi_stat`,
							`text_obse`,
							`posi_opci`,
							`path_opci`,
							`nombre_clase`,
							`nivel`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strCodiSist) . ',
							' . $objDatabase->SqlVariable($this->strDescOpci) . ',
							' . $objDatabase->SqlVariable($this->intCodiTipo) . ',
							' . $objDatabase->SqlVariable($this->strNombProg) . ',
							' . $objDatabase->SqlVariable($this->intNumeDepe) . ',
							' . $objDatabase->SqlVariable($this->strImagOpci) . ',
							' . $objDatabase->SqlVariable($this->intAnchImag) . ',
							' . $objDatabase->SqlVariable($this->intAltoImag) . ',
							' . $objDatabase->SqlVariable($this->intCodiStat) . ',
							' . $objDatabase->SqlVariable($this->strTextObse) . ',
							' . $objDatabase->SqlVariable($this->intPosiOpci) . ',
							' . $objDatabase->SqlVariable($this->strPathOpci) . ',
							' . $objDatabase->SqlVariable($this->strNombreClase) . ',
							' . $objDatabase->SqlVariable($this->intNivel) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intCodiOpci = $objDatabase->InsertId('opcion', 'codi_opci');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`opcion`
						SET
							`codi_sist` = ' . $objDatabase->SqlVariable($this->strCodiSist) . ',
							`desc_opci` = ' . $objDatabase->SqlVariable($this->strDescOpci) . ',
							`codi_tipo` = ' . $objDatabase->SqlVariable($this->intCodiTipo) . ',
							`nomb_prog` = ' . $objDatabase->SqlVariable($this->strNombProg) . ',
							`nume_depe` = ' . $objDatabase->SqlVariable($this->intNumeDepe) . ',
							`imag_opci` = ' . $objDatabase->SqlVariable($this->strImagOpci) . ',
							`anch_imag` = ' . $objDatabase->SqlVariable($this->intAnchImag) . ',
							`alto_imag` = ' . $objDatabase->SqlVariable($this->intAltoImag) . ',
							`codi_stat` = ' . $objDatabase->SqlVariable($this->intCodiStat) . ',
							`text_obse` = ' . $objDatabase->SqlVariable($this->strTextObse) . ',
							`posi_opci` = ' . $objDatabase->SqlVariable($this->intPosiOpci) . ',
							`path_opci` = ' . $objDatabase->SqlVariable($this->strPathOpci) . ',
							`nombre_clase` = ' . $objDatabase->SqlVariable($this->strNombreClase) . ',
							`nivel` = ' . $objDatabase->SqlVariable($this->intNivel) . '
						WHERE
							`codi_opci` = ' . $objDatabase->SqlVariable($this->intCodiOpci) . '
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
		 * Delete this Opcion
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intCodiOpci)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Opcion with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Opcion::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`opcion`
				WHERE
					`codi_opci` = ' . $objDatabase->SqlVariable($this->intCodiOpci) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Opcion ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Opcion', $this->intCodiOpci);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Opcions
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Opcion::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`opcion`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate opcion table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Opcion::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `opcion`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Opcion from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Opcion object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Opcion::Load($this->intCodiOpci);

			// Update $this's local variables to match
			$this->CodiSist = $objReloaded->CodiSist;
			$this->strDescOpci = $objReloaded->strDescOpci;
			$this->CodiTipo = $objReloaded->CodiTipo;
			$this->strNombProg = $objReloaded->strNombProg;
			$this->intNumeDepe = $objReloaded->intNumeDepe;
			$this->strImagOpci = $objReloaded->strImagOpci;
			$this->intAnchImag = $objReloaded->intAnchImag;
			$this->intAltoImag = $objReloaded->intAltoImag;
			$this->CodiStat = $objReloaded->CodiStat;
			$this->strTextObse = $objReloaded->strTextObse;
			$this->intPosiOpci = $objReloaded->intPosiOpci;
			$this->strPathOpci = $objReloaded->strPathOpci;
			$this->strNombreClase = $objReloaded->strNombreClase;
			$this->intNivel = $objReloaded->intNivel;
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
				case 'CodiOpci':
					/**
					 * Gets the value for intCodiOpci (Read-Only PK)
					 * @return integer
					 */
					return $this->intCodiOpci;

				case 'CodiSist':
					/**
					 * Gets the value for strCodiSist (Not Null)
					 * @return string
					 */
					return $this->strCodiSist;

				case 'DescOpci':
					/**
					 * Gets the value for strDescOpci (Not Null)
					 * @return string
					 */
					return $this->strDescOpci;

				case 'CodiTipo':
					/**
					 * Gets the value for intCodiTipo (Not Null)
					 * @return integer
					 */
					return $this->intCodiTipo;

				case 'NombProg':
					/**
					 * Gets the value for strNombProg (Not Null)
					 * @return string
					 */
					return $this->strNombProg;

				case 'NumeDepe':
					/**
					 * Gets the value for intNumeDepe 
					 * @return integer
					 */
					return $this->intNumeDepe;

				case 'ImagOpci':
					/**
					 * Gets the value for strImagOpci 
					 * @return string
					 */
					return $this->strImagOpci;

				case 'AnchImag':
					/**
					 * Gets the value for intAnchImag 
					 * @return integer
					 */
					return $this->intAnchImag;

				case 'AltoImag':
					/**
					 * Gets the value for intAltoImag 
					 * @return integer
					 */
					return $this->intAltoImag;

				case 'CodiStat':
					/**
					 * Gets the value for intCodiStat (Not Null)
					 * @return integer
					 */
					return $this->intCodiStat;

				case 'TextObse':
					/**
					 * Gets the value for strTextObse 
					 * @return string
					 */
					return $this->strTextObse;

				case 'PosiOpci':
					/**
					 * Gets the value for intPosiOpci 
					 * @return integer
					 */
					return $this->intPosiOpci;

				case 'PathOpci':
					/**
					 * Gets the value for strPathOpci 
					 * @return string
					 */
					return $this->strPathOpci;

				case 'NombreClase':
					/**
					 * Gets the value for strNombreClase 
					 * @return string
					 */
					return $this->strNombreClase;

				case 'Nivel':
					/**
					 * Gets the value for intNivel 
					 * @return integer
					 */
					return $this->intNivel;


				///////////////////
				// Member Objects
				///////////////////
				case 'CodiSistObject':
					/**
					 * Gets the value for the Sistema object referenced by strCodiSist (Not Null)
					 * @return Sistema
					 */
					try {
						if ((!$this->objCodiSistObject) && (!is_null($this->strCodiSist)))
							$this->objCodiSistObject = Sistema::Load($this->strCodiSist);
						return $this->objCodiSistObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_OpciGrupAsCodiOpci':
					/**
					 * Gets the value for the private _objOpciGrupAsCodiOpci (Read-Only)
					 * if set due to an expansion on the opci_grup.codi_opci reverse relationship
					 * @return OpciGrup
					 */
					return $this->_objOpciGrupAsCodiOpci;

				case '_OpciGrupAsCodiOpciArray':
					/**
					 * Gets the value for the private _objOpciGrupAsCodiOpciArray (Read-Only)
					 * if set due to an ExpandAsArray on the opci_grup.codi_opci reverse relationship
					 * @return OpciGrup[]
					 */
					return $this->_objOpciGrupAsCodiOpciArray;


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
				case 'CodiSist':
					/**
					 * Sets the value for strCodiSist (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objCodiSistObject = null;
						return ($this->strCodiSist = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DescOpci':
					/**
					 * Sets the value for strDescOpci (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescOpci = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiTipo':
					/**
					 * Sets the value for intCodiTipo (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCodiTipo = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NombProg':
					/**
					 * Sets the value for strNombProg (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNombProg = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NumeDepe':
					/**
					 * Sets the value for intNumeDepe 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intNumeDepe = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ImagOpci':
					/**
					 * Sets the value for strImagOpci 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strImagOpci = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AnchImag':
					/**
					 * Sets the value for intAnchImag 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intAnchImag = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AltoImag':
					/**
					 * Sets the value for intAltoImag 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intAltoImag = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiStat':
					/**
					 * Sets the value for intCodiStat (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCodiStat = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TextObse':
					/**
					 * Sets the value for strTextObse 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTextObse = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PosiOpci':
					/**
					 * Sets the value for intPosiOpci 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intPosiOpci = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PathOpci':
					/**
					 * Sets the value for strPathOpci 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strPathOpci = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NombreClase':
					/**
					 * Sets the value for strNombreClase 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNombreClase = QType::Cast($mixValue, QType::String));
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


				///////////////////
				// Member Objects
				///////////////////
				case 'CodiSistObject':
					/**
					 * Sets the value for the Sistema object referenced by strCodiSist (Not Null)
					 * @param Sistema $mixValue
					 * @return Sistema
					 */
					if (is_null($mixValue)) {
						$this->strCodiSist = null;
						$this->objCodiSistObject = null;
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
							throw new QCallerException('Unable to set an unsaved CodiSistObject for this Opcion');

						// Update Local Member Variables
						$this->objCodiSistObject = $mixValue;
						$this->strCodiSist = $mixValue->CodiSist;

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
			if ($this->CountOpciGrupsAsCodiOpci()) {
				$arrTablRela[] = 'opci_grup';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for OpciGrupAsCodiOpci
		//-------------------------------------------------------------------

		/**
		 * Gets all associated OpciGrupsAsCodiOpci as an array of OpciGrup objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OpciGrup[]
		*/
		public function GetOpciGrupAsCodiOpciArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiOpci)))
				return array();

			try {
				return OpciGrup::LoadArrayByCodiOpci($this->intCodiOpci, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated OpciGrupsAsCodiOpci
		 * @return int
		*/
		public function CountOpciGrupsAsCodiOpci() {
			if ((is_null($this->intCodiOpci)))
				return 0;

			return OpciGrup::CountByCodiOpci($this->intCodiOpci);
		}

		/**
		 * Associates a OpciGrupAsCodiOpci
		 * @param OpciGrup $objOpciGrup
		 * @return void
		*/
		public function AssociateOpciGrupAsCodiOpci(OpciGrup $objOpciGrup) {
			if ((is_null($this->intCodiOpci)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateOpciGrupAsCodiOpci on this unsaved Opcion.');
			if ((is_null($objOpciGrup->CodiRegi)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateOpciGrupAsCodiOpci on this Opcion with an unsaved OpciGrup.');

			// Get the Database Object for this Class
			$objDatabase = Opcion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`opci_grup`
				SET
					`codi_opci` = ' . $objDatabase->SqlVariable($this->intCodiOpci) . '
				WHERE
					`codi_regi` = ' . $objDatabase->SqlVariable($objOpciGrup->CodiRegi) . '
			');
		}

		/**
		 * Unassociates a OpciGrupAsCodiOpci
		 * @param OpciGrup $objOpciGrup
		 * @return void
		*/
		public function UnassociateOpciGrupAsCodiOpci(OpciGrup $objOpciGrup) {
			if ((is_null($this->intCodiOpci)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOpciGrupAsCodiOpci on this unsaved Opcion.');
			if ((is_null($objOpciGrup->CodiRegi)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOpciGrupAsCodiOpci on this Opcion with an unsaved OpciGrup.');

			// Get the Database Object for this Class
			$objDatabase = Opcion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`opci_grup`
				SET
					`codi_opci` = null
				WHERE
					`codi_regi` = ' . $objDatabase->SqlVariable($objOpciGrup->CodiRegi) . ' AND
					`codi_opci` = ' . $objDatabase->SqlVariable($this->intCodiOpci) . '
			');
		}

		/**
		 * Unassociates all OpciGrupsAsCodiOpci
		 * @return void
		*/
		public function UnassociateAllOpciGrupsAsCodiOpci() {
			if ((is_null($this->intCodiOpci)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOpciGrupAsCodiOpci on this unsaved Opcion.');

			// Get the Database Object for this Class
			$objDatabase = Opcion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`opci_grup`
				SET
					`codi_opci` = null
				WHERE
					`codi_opci` = ' . $objDatabase->SqlVariable($this->intCodiOpci) . '
			');
		}

		/**
		 * Deletes an associated OpciGrupAsCodiOpci
		 * @param OpciGrup $objOpciGrup
		 * @return void
		*/
		public function DeleteAssociatedOpciGrupAsCodiOpci(OpciGrup $objOpciGrup) {
			if ((is_null($this->intCodiOpci)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOpciGrupAsCodiOpci on this unsaved Opcion.');
			if ((is_null($objOpciGrup->CodiRegi)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOpciGrupAsCodiOpci on this Opcion with an unsaved OpciGrup.');

			// Get the Database Object for this Class
			$objDatabase = Opcion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`opci_grup`
				WHERE
					`codi_regi` = ' . $objDatabase->SqlVariable($objOpciGrup->CodiRegi) . ' AND
					`codi_opci` = ' . $objDatabase->SqlVariable($this->intCodiOpci) . '
			');
		}

		/**
		 * Deletes all associated OpciGrupsAsCodiOpci
		 * @return void
		*/
		public function DeleteAllOpciGrupsAsCodiOpci() {
			if ((is_null($this->intCodiOpci)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOpciGrupAsCodiOpci on this unsaved Opcion.');

			// Get the Database Object for this Class
			$objDatabase = Opcion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`opci_grup`
				WHERE
					`codi_opci` = ' . $objDatabase->SqlVariable($this->intCodiOpci) . '
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
			return "opcion";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Opcion::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Opcion"><sequence>';
			$strToReturn .= '<element name="CodiOpci" type="xsd:int"/>';
			$strToReturn .= '<element name="CodiSistObject" type="xsd1:Sistema"/>';
			$strToReturn .= '<element name="DescOpci" type="xsd:string"/>';
			$strToReturn .= '<element name="CodiTipo" type="xsd:int"/>';
			$strToReturn .= '<element name="NombProg" type="xsd:string"/>';
			$strToReturn .= '<element name="NumeDepe" type="xsd:int"/>';
			$strToReturn .= '<element name="ImagOpci" type="xsd:string"/>';
			$strToReturn .= '<element name="AnchImag" type="xsd:int"/>';
			$strToReturn .= '<element name="AltoImag" type="xsd:int"/>';
			$strToReturn .= '<element name="CodiStat" type="xsd:int"/>';
			$strToReturn .= '<element name="TextObse" type="xsd:string"/>';
			$strToReturn .= '<element name="PosiOpci" type="xsd:int"/>';
			$strToReturn .= '<element name="PathOpci" type="xsd:string"/>';
			$strToReturn .= '<element name="NombreClase" type="xsd:string"/>';
			$strToReturn .= '<element name="Nivel" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Opcion', $strComplexTypeArray)) {
				$strComplexTypeArray['Opcion'] = Opcion::GetSoapComplexTypeXml();
				Sistema::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Opcion::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Opcion();
			if (property_exists($objSoapObject, 'CodiOpci'))
				$objToReturn->intCodiOpci = $objSoapObject->CodiOpci;
			if ((property_exists($objSoapObject, 'CodiSistObject')) &&
				($objSoapObject->CodiSistObject))
				$objToReturn->CodiSistObject = Sistema::GetObjectFromSoapObject($objSoapObject->CodiSistObject);
			if (property_exists($objSoapObject, 'DescOpci'))
				$objToReturn->strDescOpci = $objSoapObject->DescOpci;
			if (property_exists($objSoapObject, 'CodiTipo'))
				$objToReturn->intCodiTipo = $objSoapObject->CodiTipo;
			if (property_exists($objSoapObject, 'NombProg'))
				$objToReturn->strNombProg = $objSoapObject->NombProg;
			if (property_exists($objSoapObject, 'NumeDepe'))
				$objToReturn->intNumeDepe = $objSoapObject->NumeDepe;
			if (property_exists($objSoapObject, 'ImagOpci'))
				$objToReturn->strImagOpci = $objSoapObject->ImagOpci;
			if (property_exists($objSoapObject, 'AnchImag'))
				$objToReturn->intAnchImag = $objSoapObject->AnchImag;
			if (property_exists($objSoapObject, 'AltoImag'))
				$objToReturn->intAltoImag = $objSoapObject->AltoImag;
			if (property_exists($objSoapObject, 'CodiStat'))
				$objToReturn->intCodiStat = $objSoapObject->CodiStat;
			if (property_exists($objSoapObject, 'TextObse'))
				$objToReturn->strTextObse = $objSoapObject->TextObse;
			if (property_exists($objSoapObject, 'PosiOpci'))
				$objToReturn->intPosiOpci = $objSoapObject->PosiOpci;
			if (property_exists($objSoapObject, 'PathOpci'))
				$objToReturn->strPathOpci = $objSoapObject->PathOpci;
			if (property_exists($objSoapObject, 'NombreClase'))
				$objToReturn->strNombreClase = $objSoapObject->NombreClase;
			if (property_exists($objSoapObject, 'Nivel'))
				$objToReturn->intNivel = $objSoapObject->Nivel;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Opcion::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objCodiSistObject)
				$objObject->objCodiSistObject = Sistema::GetSoapObjectFromObject($objObject->objCodiSistObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strCodiSist = null;
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
			$iArray['CodiOpci'] = $this->intCodiOpci;
			$iArray['CodiSist'] = $this->strCodiSist;
			$iArray['DescOpci'] = $this->strDescOpci;
			$iArray['CodiTipo'] = $this->intCodiTipo;
			$iArray['NombProg'] = $this->strNombProg;
			$iArray['NumeDepe'] = $this->intNumeDepe;
			$iArray['ImagOpci'] = $this->strImagOpci;
			$iArray['AnchImag'] = $this->intAnchImag;
			$iArray['AltoImag'] = $this->intAltoImag;
			$iArray['CodiStat'] = $this->intCodiStat;
			$iArray['TextObse'] = $this->strTextObse;
			$iArray['PosiOpci'] = $this->intPosiOpci;
			$iArray['PathOpci'] = $this->strPathOpci;
			$iArray['NombreClase'] = $this->strNombreClase;
			$iArray['Nivel'] = $this->intNivel;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->intCodiOpci ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $CodiOpci
     * @property-read QQNode $CodiSist
     * @property-read QQNodeSistema $CodiSistObject
     * @property-read QQNode $DescOpci
     * @property-read QQNode $CodiTipo
     * @property-read QQNode $NombProg
     * @property-read QQNode $NumeDepe
     * @property-read QQNode $ImagOpci
     * @property-read QQNode $AnchImag
     * @property-read QQNode $AltoImag
     * @property-read QQNode $CodiStat
     * @property-read QQNode $TextObse
     * @property-read QQNode $PosiOpci
     * @property-read QQNode $PathOpci
     * @property-read QQNode $NombreClase
     * @property-read QQNode $Nivel
     *
     *
     * @property-read QQReverseReferenceNodeOpciGrup $OpciGrupAsCodiOpci

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeOpcion extends QQNode {
		protected $strTableName = 'opcion';
		protected $strPrimaryKey = 'codi_opci';
		protected $strClassName = 'Opcion';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiOpci':
					return new QQNode('codi_opci', 'CodiOpci', 'Integer', $this);
				case 'CodiSist':
					return new QQNode('codi_sist', 'CodiSist', 'VarChar', $this);
				case 'CodiSistObject':
					return new QQNodeSistema('codi_sist', 'CodiSistObject', 'VarChar', $this);
				case 'DescOpci':
					return new QQNode('desc_opci', 'DescOpci', 'VarChar', $this);
				case 'CodiTipo':
					return new QQNode('codi_tipo', 'CodiTipo', 'Integer', $this);
				case 'NombProg':
					return new QQNode('nomb_prog', 'NombProg', 'VarChar', $this);
				case 'NumeDepe':
					return new QQNode('nume_depe', 'NumeDepe', 'Integer', $this);
				case 'ImagOpci':
					return new QQNode('imag_opci', 'ImagOpci', 'VarChar', $this);
				case 'AnchImag':
					return new QQNode('anch_imag', 'AnchImag', 'Integer', $this);
				case 'AltoImag':
					return new QQNode('alto_imag', 'AltoImag', 'Integer', $this);
				case 'CodiStat':
					return new QQNode('codi_stat', 'CodiStat', 'Integer', $this);
				case 'TextObse':
					return new QQNode('text_obse', 'TextObse', 'VarChar', $this);
				case 'PosiOpci':
					return new QQNode('posi_opci', 'PosiOpci', 'Integer', $this);
				case 'PathOpci':
					return new QQNode('path_opci', 'PathOpci', 'VarChar', $this);
				case 'NombreClase':
					return new QQNode('nombre_clase', 'NombreClase', 'VarChar', $this);
				case 'Nivel':
					return new QQNode('nivel', 'Nivel', 'Integer', $this);
				case 'OpciGrupAsCodiOpci':
					return new QQReverseReferenceNodeOpciGrup($this, 'opcigrupascodiopci', 'reverse_reference', 'codi_opci', 'OpciGrupAsCodiOpci');

				case '_PrimaryKeyNode':
					return new QQNode('codi_opci', 'CodiOpci', 'Integer', $this);
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
     * @property-read QQNode $CodiOpci
     * @property-read QQNode $CodiSist
     * @property-read QQNodeSistema $CodiSistObject
     * @property-read QQNode $DescOpci
     * @property-read QQNode $CodiTipo
     * @property-read QQNode $NombProg
     * @property-read QQNode $NumeDepe
     * @property-read QQNode $ImagOpci
     * @property-read QQNode $AnchImag
     * @property-read QQNode $AltoImag
     * @property-read QQNode $CodiStat
     * @property-read QQNode $TextObse
     * @property-read QQNode $PosiOpci
     * @property-read QQNode $PathOpci
     * @property-read QQNode $NombreClase
     * @property-read QQNode $Nivel
     *
     *
     * @property-read QQReverseReferenceNodeOpciGrup $OpciGrupAsCodiOpci

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeOpcion extends QQReverseReferenceNode {
		protected $strTableName = 'opcion';
		protected $strPrimaryKey = 'codi_opci';
		protected $strClassName = 'Opcion';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiOpci':
					return new QQNode('codi_opci', 'CodiOpci', 'integer', $this);
				case 'CodiSist':
					return new QQNode('codi_sist', 'CodiSist', 'string', $this);
				case 'CodiSistObject':
					return new QQNodeSistema('codi_sist', 'CodiSistObject', 'string', $this);
				case 'DescOpci':
					return new QQNode('desc_opci', 'DescOpci', 'string', $this);
				case 'CodiTipo':
					return new QQNode('codi_tipo', 'CodiTipo', 'integer', $this);
				case 'NombProg':
					return new QQNode('nomb_prog', 'NombProg', 'string', $this);
				case 'NumeDepe':
					return new QQNode('nume_depe', 'NumeDepe', 'integer', $this);
				case 'ImagOpci':
					return new QQNode('imag_opci', 'ImagOpci', 'string', $this);
				case 'AnchImag':
					return new QQNode('anch_imag', 'AnchImag', 'integer', $this);
				case 'AltoImag':
					return new QQNode('alto_imag', 'AltoImag', 'integer', $this);
				case 'CodiStat':
					return new QQNode('codi_stat', 'CodiStat', 'integer', $this);
				case 'TextObse':
					return new QQNode('text_obse', 'TextObse', 'string', $this);
				case 'PosiOpci':
					return new QQNode('posi_opci', 'PosiOpci', 'integer', $this);
				case 'PathOpci':
					return new QQNode('path_opci', 'PathOpci', 'string', $this);
				case 'NombreClase':
					return new QQNode('nombre_clase', 'NombreClase', 'string', $this);
				case 'Nivel':
					return new QQNode('nivel', 'Nivel', 'integer', $this);
				case 'OpciGrupAsCodiOpci':
					return new QQReverseReferenceNodeOpciGrup($this, 'opcigrupascodiopci', 'reverse_reference', 'codi_opci', 'OpciGrupAsCodiOpci');

				case '_PrimaryKeyNode':
					return new QQNode('codi_opci', 'CodiOpci', 'integer', $this);
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
