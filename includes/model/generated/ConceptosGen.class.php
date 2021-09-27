<?php
	/**
	 * The abstract ConceptosGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Conceptos subclass which
	 * extends this ConceptosGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Conceptos class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Nombre the value for strNombre (Unique)
	 * @property integer $Orden the value for intOrden (Not Null)
	 * @property string $Productos the value for strProductos (Not Null)
	 * @property string $MostrarComo the value for strMostrarComo (Not Null)
	 * @property boolean $Activo the value for blnActivo (Not Null)
	 * @property QDateTime $FechaInicial the value for dttFechaInicial (Not Null)
	 * @property QDateTime $FechaFinal the value for dttFechaFinal 
	 * @property string $Operacion the value for strOperacion (Not Null)
	 * @property string $AplicaComo the value for strAplicaComo (Not Null)
	 * @property string $Tipo the value for strTipo (Not Null)
	 * @property string $ActuaSobre the value for strActuaSobre (Not Null)
	 * @property string $Valor the value for strValor (Not Null)
	 * @property string $Dbquery the value for strDbquery 
	 * @property integer $BaseImponible the value for intBaseImponible 
	 * @property string $Metodo the value for strMetodo 
	 * @property boolean $AplicarTasa the value for blnAplicarTasa 
	 * @property string $Condicion the value for strCondicion 
	 * @property QDateTime $CreatedAt the value for dttCreatedAt 
	 * @property QDateTime $UpdatedAt the value for dttUpdatedAt 
	 * @property-read string $DeletedAt the value for strDeletedAt (Read-Only Timestamp)
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property integer $UpdatedBy the value for intUpdatedBy 
	 * @property integer $DeletedBy the value for intDeletedBy 
	 * @property-read ConceptoRangos $_ConceptoRangosAsConcepto the value for the private _objConceptoRangosAsConcepto (Read-Only) if set due to an expansion on the concepto_rangos.concepto_id reverse relationship
	 * @property-read ConceptoRangos[] $_ConceptoRangosAsConceptoArray the value for the private _objConceptoRangosAsConceptoArray (Read-Only) if set due to an ExpandAsArray on the concepto_rangos.concepto_id reverse relationship
	 * @property-read FacturaItems $_FacturaItemsAsConcepto the value for the private _objFacturaItemsAsConcepto (Read-Only) if set due to an expansion on the factura_items.concepto_id reverse relationship
	 * @property-read FacturaItems[] $_FacturaItemsAsConceptoArray the value for the private _objFacturaItemsAsConceptoArray (Read-Only) if set due to an ExpandAsArray on the factura_items.concepto_id reverse relationship
	 * @property-read GuiaConceptos $_GuiaConceptosAsConcepto the value for the private _objGuiaConceptosAsConcepto (Read-Only) if set due to an expansion on the guia_conceptos.concepto_id reverse relationship
	 * @property-read GuiaConceptos[] $_GuiaConceptosAsConceptoArray the value for the private _objGuiaConceptosAsConceptoArray (Read-Only) if set due to an ExpandAsArray on the guia_conceptos.concepto_id reverse relationship
	 * @property-read NotaConceptos $_NotaConceptosAsConcepto the value for the private _objNotaConceptosAsConcepto (Read-Only) if set due to an expansion on the nota_conceptos.concepto_id reverse relationship
	 * @property-read NotaConceptos[] $_NotaConceptosAsConceptoArray the value for the private _objNotaConceptosAsConceptoArray (Read-Only) if set due to an ExpandAsArray on the nota_conceptos.concepto_id reverse relationship
	 * @property-read NotaCreditoItems $_NotaCreditoItemsAsConcepto the value for the private _objNotaCreditoItemsAsConcepto (Read-Only) if set due to an expansion on the nota_credito_items.concepto_id reverse relationship
	 * @property-read NotaCreditoItems[] $_NotaCreditoItemsAsConceptoArray the value for the private _objNotaCreditoItemsAsConceptoArray (Read-Only) if set due to an ExpandAsArray on the nota_credito_items.concepto_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ConceptosGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column conceptos.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column conceptos.nombre
		 * @var string strNombre
		 */
		protected $strNombre;
		const NombreMaxLength = 50;
		const NombreDefault = null;


		/**
		 * Protected member variable that maps to the database column conceptos.orden
		 * @var integer intOrden
		 */
		protected $intOrden;
		const OrdenDefault = null;


		/**
		 * Protected member variable that maps to the database column conceptos.productos
		 * @var string strProductos
		 */
		protected $strProductos;
		const ProductosMaxLength = 50;
		const ProductosDefault = null;


		/**
		 * Protected member variable that maps to the database column conceptos.mostrar_como
		 * @var string strMostrarComo
		 */
		protected $strMostrarComo;
		const MostrarComoMaxLength = 50;
		const MostrarComoDefault = null;


		/**
		 * Protected member variable that maps to the database column conceptos.activo
		 * @var boolean blnActivo
		 */
		protected $blnActivo;
		const ActivoDefault = null;


		/**
		 * Protected member variable that maps to the database column conceptos.fecha_inicial
		 * @var QDateTime dttFechaInicial
		 */
		protected $dttFechaInicial;
		const FechaInicialDefault = null;


		/**
		 * Protected member variable that maps to the database column conceptos.fecha_final
		 * @var QDateTime dttFechaFinal
		 */
		protected $dttFechaFinal;
		const FechaFinalDefault = null;


		/**
		 * Protected member variable that maps to the database column conceptos.operacion
		 * @var string strOperacion
		 */
		protected $strOperacion;
		const OperacionDefault = null;


		/**
		 * Protected member variable that maps to the database column conceptos.aplica_como
		 * @var string strAplicaComo
		 */
		protected $strAplicaComo;
		const AplicaComoDefault = null;


		/**
		 * Protected member variable that maps to the database column conceptos.tipo
		 * @var string strTipo
		 */
		protected $strTipo;
		const TipoDefault = null;


		/**
		 * Protected member variable that maps to the database column conceptos.actua_sobre
		 * @var string strActuaSobre
		 */
		protected $strActuaSobre;
		const ActuaSobreMaxLength = 30;
		const ActuaSobreDefault = null;


		/**
		 * Protected member variable that maps to the database column conceptos.valor
		 * @var string strValor
		 */
		protected $strValor;
		const ValorMaxLength = 50;
		const ValorDefault = null;


		/**
		 * Protected member variable that maps to the database column conceptos.dbquery
		 * @var string strDbquery
		 */
		protected $strDbquery;
		const DbqueryDefault = null;


		/**
		 * Protected member variable that maps to the database column conceptos.base_imponible
		 * @var integer intBaseImponible
		 */
		protected $intBaseImponible;
		const BaseImponibleDefault = null;


		/**
		 * Protected member variable that maps to the database column conceptos.metodo
		 * @var string strMetodo
		 */
		protected $strMetodo;
		const MetodoMaxLength = 50;
		const MetodoDefault = null;


		/**
		 * Protected member variable that maps to the database column conceptos.aplicar_tasa
		 * @var boolean blnAplicarTasa
		 */
		protected $blnAplicarTasa;
		const AplicarTasaDefault = null;


		/**
		 * Protected member variable that maps to the database column conceptos.condicion
		 * @var string strCondicion
		 */
		protected $strCondicion;
		const CondicionMaxLength = 50;
		const CondicionDefault = null;


		/**
		 * Protected member variable that maps to the database column conceptos.created_at
		 * @var QDateTime dttCreatedAt
		 */
		protected $dttCreatedAt;
		const CreatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column conceptos.updated_at
		 * @var QDateTime dttUpdatedAt
		 */
		protected $dttUpdatedAt;
		const UpdatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column conceptos.deleted_at
		 * @var string strDeletedAt
		 */
		protected $strDeletedAt;
		const DeletedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column conceptos.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column conceptos.updated_by
		 * @var integer intUpdatedBy
		 */
		protected $intUpdatedBy;
		const UpdatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column conceptos.deleted_by
		 * @var integer intDeletedBy
		 */
		protected $intDeletedBy;
		const DeletedByDefault = null;


		/**
		 * Private member variable that stores a reference to a single ConceptoRangosAsConcepto object
		 * (of type ConceptoRangos), if this Conceptos object was restored with
		 * an expansion on the concepto_rangos association table.
		 * @var ConceptoRangos _objConceptoRangosAsConcepto;
		 */
		private $_objConceptoRangosAsConcepto;

		/**
		 * Private member variable that stores a reference to an array of ConceptoRangosAsConcepto objects
		 * (of type ConceptoRangos[]), if this Conceptos object was restored with
		 * an ExpandAsArray on the concepto_rangos association table.
		 * @var ConceptoRangos[] _objConceptoRangosAsConceptoArray;
		 */
		private $_objConceptoRangosAsConceptoArray = null;

		/**
		 * Private member variable that stores a reference to a single FacturaItemsAsConcepto object
		 * (of type FacturaItems), if this Conceptos object was restored with
		 * an expansion on the factura_items association table.
		 * @var FacturaItems _objFacturaItemsAsConcepto;
		 */
		private $_objFacturaItemsAsConcepto;

		/**
		 * Private member variable that stores a reference to an array of FacturaItemsAsConcepto objects
		 * (of type FacturaItems[]), if this Conceptos object was restored with
		 * an ExpandAsArray on the factura_items association table.
		 * @var FacturaItems[] _objFacturaItemsAsConceptoArray;
		 */
		private $_objFacturaItemsAsConceptoArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiaConceptosAsConcepto object
		 * (of type GuiaConceptos), if this Conceptos object was restored with
		 * an expansion on the guia_conceptos association table.
		 * @var GuiaConceptos _objGuiaConceptosAsConcepto;
		 */
		private $_objGuiaConceptosAsConcepto;

		/**
		 * Private member variable that stores a reference to an array of GuiaConceptosAsConcepto objects
		 * (of type GuiaConceptos[]), if this Conceptos object was restored with
		 * an ExpandAsArray on the guia_conceptos association table.
		 * @var GuiaConceptos[] _objGuiaConceptosAsConceptoArray;
		 */
		private $_objGuiaConceptosAsConceptoArray = null;

		/**
		 * Private member variable that stores a reference to a single NotaConceptosAsConcepto object
		 * (of type NotaConceptos), if this Conceptos object was restored with
		 * an expansion on the nota_conceptos association table.
		 * @var NotaConceptos _objNotaConceptosAsConcepto;
		 */
		private $_objNotaConceptosAsConcepto;

		/**
		 * Private member variable that stores a reference to an array of NotaConceptosAsConcepto objects
		 * (of type NotaConceptos[]), if this Conceptos object was restored with
		 * an ExpandAsArray on the nota_conceptos association table.
		 * @var NotaConceptos[] _objNotaConceptosAsConceptoArray;
		 */
		private $_objNotaConceptosAsConceptoArray = null;

		/**
		 * Private member variable that stores a reference to a single NotaCreditoItemsAsConcepto object
		 * (of type NotaCreditoItems), if this Conceptos object was restored with
		 * an expansion on the nota_credito_items association table.
		 * @var NotaCreditoItems _objNotaCreditoItemsAsConcepto;
		 */
		private $_objNotaCreditoItemsAsConcepto;

		/**
		 * Private member variable that stores a reference to an array of NotaCreditoItemsAsConcepto objects
		 * (of type NotaCreditoItems[]), if this Conceptos object was restored with
		 * an ExpandAsArray on the nota_credito_items association table.
		 * @var NotaCreditoItems[] _objNotaCreditoItemsAsConceptoArray;
		 */
		private $_objNotaCreditoItemsAsConceptoArray = null;

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
			$this->intId = Conceptos::IdDefault;
			$this->strNombre = Conceptos::NombreDefault;
			$this->intOrden = Conceptos::OrdenDefault;
			$this->strProductos = Conceptos::ProductosDefault;
			$this->strMostrarComo = Conceptos::MostrarComoDefault;
			$this->blnActivo = Conceptos::ActivoDefault;
			$this->dttFechaInicial = (Conceptos::FechaInicialDefault === null)?null:new QDateTime(Conceptos::FechaInicialDefault);
			$this->dttFechaFinal = (Conceptos::FechaFinalDefault === null)?null:new QDateTime(Conceptos::FechaFinalDefault);
			$this->strOperacion = Conceptos::OperacionDefault;
			$this->strAplicaComo = Conceptos::AplicaComoDefault;
			$this->strTipo = Conceptos::TipoDefault;
			$this->strActuaSobre = Conceptos::ActuaSobreDefault;
			$this->strValor = Conceptos::ValorDefault;
			$this->strDbquery = Conceptos::DbqueryDefault;
			$this->intBaseImponible = Conceptos::BaseImponibleDefault;
			$this->strMetodo = Conceptos::MetodoDefault;
			$this->blnAplicarTasa = Conceptos::AplicarTasaDefault;
			$this->strCondicion = Conceptos::CondicionDefault;
			$this->dttCreatedAt = (Conceptos::CreatedAtDefault === null)?null:new QDateTime(Conceptos::CreatedAtDefault);
			$this->dttUpdatedAt = (Conceptos::UpdatedAtDefault === null)?null:new QDateTime(Conceptos::UpdatedAtDefault);
			$this->strDeletedAt = Conceptos::DeletedAtDefault;
			$this->intCreatedBy = Conceptos::CreatedByDefault;
			$this->intUpdatedBy = Conceptos::UpdatedByDefault;
			$this->intDeletedBy = Conceptos::DeletedByDefault;
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
		 * Load a Conceptos from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Conceptos
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Conceptos', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Conceptos::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Conceptos()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Conceptoses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Conceptos[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Conceptos::QueryArray to perform the LoadAll query
			try {
				return Conceptos::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Conceptoses
		 * @return int
		 */
		public static function CountAll() {
			// Call Conceptos::QueryCount to perform the CountAll query
			return Conceptos::QueryCount(QQ::All());
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
			$objDatabase = Conceptos::GetDatabase();

			// Create/Build out the QueryBuilder object with Conceptos-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'conceptos');

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
				Conceptos::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('conceptos');

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
		 * Static Qcubed Query method to query for a single Conceptos object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Conceptos the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Conceptos::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Conceptos object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Conceptos::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return Conceptos::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Conceptos objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Conceptos[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Conceptos::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Conceptos::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Conceptos::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Conceptos objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Conceptos::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Conceptos::GetDatabase();

			$strQuery = Conceptos::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/conceptos', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Conceptos::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Conceptos
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'conceptos';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'nombre', $strAliasPrefix . 'nombre');
			    $objBuilder->AddSelectItem($strTableName, 'orden', $strAliasPrefix . 'orden');
			    $objBuilder->AddSelectItem($strTableName, 'productos', $strAliasPrefix . 'productos');
			    $objBuilder->AddSelectItem($strTableName, 'mostrar_como', $strAliasPrefix . 'mostrar_como');
			    $objBuilder->AddSelectItem($strTableName, 'activo', $strAliasPrefix . 'activo');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_inicial', $strAliasPrefix . 'fecha_inicial');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_final', $strAliasPrefix . 'fecha_final');
			    $objBuilder->AddSelectItem($strTableName, 'operacion', $strAliasPrefix . 'operacion');
			    $objBuilder->AddSelectItem($strTableName, 'aplica_como', $strAliasPrefix . 'aplica_como');
			    $objBuilder->AddSelectItem($strTableName, 'tipo', $strAliasPrefix . 'tipo');
			    $objBuilder->AddSelectItem($strTableName, 'actua_sobre', $strAliasPrefix . 'actua_sobre');
			    $objBuilder->AddSelectItem($strTableName, 'valor', $strAliasPrefix . 'valor');
			    $objBuilder->AddSelectItem($strTableName, 'dbquery', $strAliasPrefix . 'dbquery');
			    $objBuilder->AddSelectItem($strTableName, 'base_imponible', $strAliasPrefix . 'base_imponible');
			    $objBuilder->AddSelectItem($strTableName, 'metodo', $strAliasPrefix . 'metodo');
			    $objBuilder->AddSelectItem($strTableName, 'aplicar_tasa', $strAliasPrefix . 'aplicar_tasa');
			    $objBuilder->AddSelectItem($strTableName, 'condicion', $strAliasPrefix . 'condicion');
			    $objBuilder->AddSelectItem($strTableName, 'created_at', $strAliasPrefix . 'created_at');
			    $objBuilder->AddSelectItem($strTableName, 'updated_at', $strAliasPrefix . 'updated_at');
			    $objBuilder->AddSelectItem($strTableName, 'deleted_at', $strAliasPrefix . 'deleted_at');
			    $objBuilder->AddSelectItem($strTableName, 'created_by', $strAliasPrefix . 'created_by');
			    $objBuilder->AddSelectItem($strTableName, 'updated_by', $strAliasPrefix . 'updated_by');
			    $objBuilder->AddSelectItem($strTableName, 'deleted_by', $strAliasPrefix . 'deleted_by');
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
		 * Instantiate a Conceptos from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Conceptos::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Conceptos, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (Conceptos::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the Conceptos object
			$objToReturn = new Conceptos();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nombre';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombre = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'orden';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intOrden = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'productos';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strProductos = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'mostrar_como';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strMostrarComo = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'activo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnActivo = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'fecha_inicial';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaInicial = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'fecha_final';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaFinal = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'operacion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strOperacion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'aplica_como';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strAplicaComo = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tipo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTipo = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'actua_sobre';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strActuaSobre = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'valor';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strValor = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'dbquery';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDbquery = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAlias = $strAliasPrefix . 'base_imponible';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intBaseImponible = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'metodo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strMetodo = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'aplicar_tasa';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnAplicarTasa = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'condicion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCondicion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'created_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttCreatedAt = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAlias = $strAliasPrefix . 'updated_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttUpdatedAt = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAlias = $strAliasPrefix . 'deleted_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDeletedAt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'created_by';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCreatedBy = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'updated_by';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intUpdatedBy = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'deleted_by';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intDeletedBy = $objDbRow->GetColumn($strAliasName, 'Integer');

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
				$strAliasPrefix = 'conceptos__';


				

			// Check for ConceptoRangosAsConcepto Virtual Binding
			$strAlias = $strAliasPrefix . 'conceptorangosasconcepto__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['conceptorangosasconcepto']) ? null : $objExpansionAliasArray['conceptorangosasconcepto']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objConceptoRangosAsConceptoArray)
				$objToReturn->_objConceptoRangosAsConceptoArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objConceptoRangosAsConceptoArray[] = ConceptoRangos::InstantiateDbRow($objDbRow, $strAliasPrefix . 'conceptorangosasconcepto__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objConceptoRangosAsConcepto)) {
					$objToReturn->_objConceptoRangosAsConcepto = ConceptoRangos::InstantiateDbRow($objDbRow, $strAliasPrefix . 'conceptorangosasconcepto__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for FacturaItemsAsConcepto Virtual Binding
			$strAlias = $strAliasPrefix . 'facturaitemsasconcepto__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['facturaitemsasconcepto']) ? null : $objExpansionAliasArray['facturaitemsasconcepto']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacturaItemsAsConceptoArray)
				$objToReturn->_objFacturaItemsAsConceptoArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacturaItemsAsConceptoArray[] = FacturaItems::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturaitemsasconcepto__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacturaItemsAsConcepto)) {
					$objToReturn->_objFacturaItemsAsConcepto = FacturaItems::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturaitemsasconcepto__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiaConceptosAsConcepto Virtual Binding
			$strAlias = $strAliasPrefix . 'guiaconceptosasconcepto__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiaconceptosasconcepto']) ? null : $objExpansionAliasArray['guiaconceptosasconcepto']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiaConceptosAsConceptoArray)
				$objToReturn->_objGuiaConceptosAsConceptoArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiaConceptosAsConceptoArray[] = GuiaConceptos::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiaconceptosasconcepto__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiaConceptosAsConcepto)) {
					$objToReturn->_objGuiaConceptosAsConcepto = GuiaConceptos::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiaconceptosasconcepto__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for NotaConceptosAsConcepto Virtual Binding
			$strAlias = $strAliasPrefix . 'notaconceptosasconcepto__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['notaconceptosasconcepto']) ? null : $objExpansionAliasArray['notaconceptosasconcepto']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objNotaConceptosAsConceptoArray)
				$objToReturn->_objNotaConceptosAsConceptoArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objNotaConceptosAsConceptoArray[] = NotaConceptos::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notaconceptosasconcepto__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objNotaConceptosAsConcepto)) {
					$objToReturn->_objNotaConceptosAsConcepto = NotaConceptos::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notaconceptosasconcepto__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for NotaCreditoItemsAsConcepto Virtual Binding
			$strAlias = $strAliasPrefix . 'notacreditoitemsasconcepto__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['notacreditoitemsasconcepto']) ? null : $objExpansionAliasArray['notacreditoitemsasconcepto']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objNotaCreditoItemsAsConceptoArray)
				$objToReturn->_objNotaCreditoItemsAsConceptoArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objNotaCreditoItemsAsConceptoArray[] = NotaCreditoItems::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notacreditoitemsasconcepto__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objNotaCreditoItemsAsConcepto)) {
					$objToReturn->_objNotaCreditoItemsAsConcepto = NotaCreditoItems::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notacreditoitemsasconcepto__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Conceptoses from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Conceptos[]
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
					$objItem = Conceptos::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Conceptos::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Conceptos object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Conceptos next row resulting from the query
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
			return Conceptos::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Conceptos object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Conceptos
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Conceptos::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Conceptos()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single Conceptos object,
		 * by Nombre, Activo, Productos Index(es)
		 * @param string $strNombre
		 * @param boolean $blnActivo
		 * @param string $strProductos
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Conceptos
		*/
		public static function LoadByNombreActivoProductos($strNombre, $blnActivo, $strProductos, $objOptionalClauses = null) {
			return Conceptos::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Conceptos()->Nombre, $strNombre),
					QQ::Equal(QQN::Conceptos()->Activo, $blnActivo),
					QQ::Equal(QQN::Conceptos()->Productos, $strProductos)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single Conceptos object,
		 * by Nombre Index(es)
		 * @param string $strNombre
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Conceptos
		*/
		public static function LoadByNombre($strNombre, $objOptionalClauses = null) {
			return Conceptos::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Conceptos()->Nombre, $strNombre)
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
		 * Save this Conceptos
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Conceptos::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `conceptos` (
							`nombre`,
							`orden`,
							`productos`,
							`mostrar_como`,
							`activo`,
							`fecha_inicial`,
							`fecha_final`,
							`operacion`,
							`aplica_como`,
							`tipo`,
							`actua_sobre`,
							`valor`,
							`dbquery`,
							`base_imponible`,
							`metodo`,
							`aplicar_tasa`,
							`condicion`,
							`created_at`,
							`updated_at`,
							`created_by`,
							`updated_by`,
							`deleted_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strNombre) . ',
							' . $objDatabase->SqlVariable($this->intOrden) . ',
							' . $objDatabase->SqlVariable($this->strProductos) . ',
							' . $objDatabase->SqlVariable($this->strMostrarComo) . ',
							' . $objDatabase->SqlVariable($this->blnActivo) . ',
							' . $objDatabase->SqlVariable($this->dttFechaInicial) . ',
							' . $objDatabase->SqlVariable($this->dttFechaFinal) . ',
							' . $objDatabase->SqlVariable($this->strOperacion) . ',
							' . $objDatabase->SqlVariable($this->strAplicaComo) . ',
							' . $objDatabase->SqlVariable($this->strTipo) . ',
							' . $objDatabase->SqlVariable($this->strActuaSobre) . ',
							' . $objDatabase->SqlVariable($this->strValor) . ',
							' . $objDatabase->SqlVariable($this->strDbquery) . ',
							' . $objDatabase->SqlVariable($this->intBaseImponible) . ',
							' . $objDatabase->SqlVariable($this->strMetodo) . ',
							' . $objDatabase->SqlVariable($this->blnAplicarTasa) . ',
							' . $objDatabase->SqlVariable($this->strCondicion) . ',
							' . $objDatabase->SqlVariable($this->dttCreatedAt) . ',
							' . $objDatabase->SqlVariable($this->dttUpdatedAt) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->intUpdatedBy) . ',
							' . $objDatabase->SqlVariable($this->intDeletedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('conceptos', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`deleted_at`
							FROM
								`conceptos`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strDeletedAt)
							throw new QOptimisticLockingException('Conceptos');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`conceptos`
						SET
							`nombre` = ' . $objDatabase->SqlVariable($this->strNombre) . ',
							`orden` = ' . $objDatabase->SqlVariable($this->intOrden) . ',
							`productos` = ' . $objDatabase->SqlVariable($this->strProductos) . ',
							`mostrar_como` = ' . $objDatabase->SqlVariable($this->strMostrarComo) . ',
							`activo` = ' . $objDatabase->SqlVariable($this->blnActivo) . ',
							`fecha_inicial` = ' . $objDatabase->SqlVariable($this->dttFechaInicial) . ',
							`fecha_final` = ' . $objDatabase->SqlVariable($this->dttFechaFinal) . ',
							`operacion` = ' . $objDatabase->SqlVariable($this->strOperacion) . ',
							`aplica_como` = ' . $objDatabase->SqlVariable($this->strAplicaComo) . ',
							`tipo` = ' . $objDatabase->SqlVariable($this->strTipo) . ',
							`actua_sobre` = ' . $objDatabase->SqlVariable($this->strActuaSobre) . ',
							`valor` = ' . $objDatabase->SqlVariable($this->strValor) . ',
							`dbquery` = ' . $objDatabase->SqlVariable($this->strDbquery) . ',
							`base_imponible` = ' . $objDatabase->SqlVariable($this->intBaseImponible) . ',
							`metodo` = ' . $objDatabase->SqlVariable($this->strMetodo) . ',
							`aplicar_tasa` = ' . $objDatabase->SqlVariable($this->blnAplicarTasa) . ',
							`condicion` = ' . $objDatabase->SqlVariable($this->strCondicion) . ',
							`created_at` = ' . $objDatabase->SqlVariable($this->dttCreatedAt) . ',
							`updated_at` = ' . $objDatabase->SqlVariable($this->dttUpdatedAt) . ',
							`created_by` = ' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							`updated_by` = ' . $objDatabase->SqlVariable($this->intUpdatedBy) . ',
							`deleted_by` = ' . $objDatabase->SqlVariable($this->intDeletedBy) . '
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
					`deleted_at`
				FROM
					`conceptos`
				WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			$objRow = $objResult->FetchArray();
			$this->strDeletedAt = $objRow[0];

			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this Conceptos
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Conceptos with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Conceptos::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`conceptos`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Conceptos ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Conceptos', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Conceptoses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Conceptos::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`conceptos`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate conceptos table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Conceptos::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `conceptos`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Conceptos from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Conceptos object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Conceptos::Load($this->intId);

			// Update $this's local variables to match
			$this->strNombre = $objReloaded->strNombre;
			$this->intOrden = $objReloaded->intOrden;
			$this->strProductos = $objReloaded->strProductos;
			$this->strMostrarComo = $objReloaded->strMostrarComo;
			$this->blnActivo = $objReloaded->blnActivo;
			$this->dttFechaInicial = $objReloaded->dttFechaInicial;
			$this->dttFechaFinal = $objReloaded->dttFechaFinal;
			$this->strOperacion = $objReloaded->strOperacion;
			$this->strAplicaComo = $objReloaded->strAplicaComo;
			$this->strTipo = $objReloaded->strTipo;
			$this->strActuaSobre = $objReloaded->strActuaSobre;
			$this->strValor = $objReloaded->strValor;
			$this->strDbquery = $objReloaded->strDbquery;
			$this->intBaseImponible = $objReloaded->intBaseImponible;
			$this->strMetodo = $objReloaded->strMetodo;
			$this->blnAplicarTasa = $objReloaded->blnAplicarTasa;
			$this->strCondicion = $objReloaded->strCondicion;
			$this->dttCreatedAt = $objReloaded->dttCreatedAt;
			$this->dttUpdatedAt = $objReloaded->dttUpdatedAt;
			$this->strDeletedAt = $objReloaded->strDeletedAt;
			$this->intCreatedBy = $objReloaded->intCreatedBy;
			$this->intUpdatedBy = $objReloaded->intUpdatedBy;
			$this->intDeletedBy = $objReloaded->intDeletedBy;
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
					 * Gets the value for strNombre (Unique)
					 * @return string
					 */
					return $this->strNombre;

				case 'Orden':
					/**
					 * Gets the value for intOrden (Not Null)
					 * @return integer
					 */
					return $this->intOrden;

				case 'Productos':
					/**
					 * Gets the value for strProductos (Not Null)
					 * @return string
					 */
					return $this->strProductos;

				case 'MostrarComo':
					/**
					 * Gets the value for strMostrarComo (Not Null)
					 * @return string
					 */
					return $this->strMostrarComo;

				case 'Activo':
					/**
					 * Gets the value for blnActivo (Not Null)
					 * @return boolean
					 */
					return $this->blnActivo;

				case 'FechaInicial':
					/**
					 * Gets the value for dttFechaInicial (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFechaInicial;

				case 'FechaFinal':
					/**
					 * Gets the value for dttFechaFinal 
					 * @return QDateTime
					 */
					return $this->dttFechaFinal;

				case 'Operacion':
					/**
					 * Gets the value for strOperacion (Not Null)
					 * @return string
					 */
					return $this->strOperacion;

				case 'AplicaComo':
					/**
					 * Gets the value for strAplicaComo (Not Null)
					 * @return string
					 */
					return $this->strAplicaComo;

				case 'Tipo':
					/**
					 * Gets the value for strTipo (Not Null)
					 * @return string
					 */
					return $this->strTipo;

				case 'ActuaSobre':
					/**
					 * Gets the value for strActuaSobre (Not Null)
					 * @return string
					 */
					return $this->strActuaSobre;

				case 'Valor':
					/**
					 * Gets the value for strValor (Not Null)
					 * @return string
					 */
					return $this->strValor;

				case 'Dbquery':
					/**
					 * Gets the value for strDbquery 
					 * @return string
					 */
					return $this->strDbquery;

				case 'BaseImponible':
					/**
					 * Gets the value for intBaseImponible 
					 * @return integer
					 */
					return $this->intBaseImponible;

				case 'Metodo':
					/**
					 * Gets the value for strMetodo 
					 * @return string
					 */
					return $this->strMetodo;

				case 'AplicarTasa':
					/**
					 * Gets the value for blnAplicarTasa 
					 * @return boolean
					 */
					return $this->blnAplicarTasa;

				case 'Condicion':
					/**
					 * Gets the value for strCondicion 
					 * @return string
					 */
					return $this->strCondicion;

				case 'CreatedAt':
					/**
					 * Gets the value for dttCreatedAt 
					 * @return QDateTime
					 */
					return $this->dttCreatedAt;

				case 'UpdatedAt':
					/**
					 * Gets the value for dttUpdatedAt 
					 * @return QDateTime
					 */
					return $this->dttUpdatedAt;

				case 'DeletedAt':
					/**
					 * Gets the value for strDeletedAt (Read-Only Timestamp)
					 * @return string
					 */
					return $this->strDeletedAt;

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

				case 'DeletedBy':
					/**
					 * Gets the value for intDeletedBy 
					 * @return integer
					 */
					return $this->intDeletedBy;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_ConceptoRangosAsConcepto':
					/**
					 * Gets the value for the private _objConceptoRangosAsConcepto (Read-Only)
					 * if set due to an expansion on the concepto_rangos.concepto_id reverse relationship
					 * @return ConceptoRangos
					 */
					return $this->_objConceptoRangosAsConcepto;

				case '_ConceptoRangosAsConceptoArray':
					/**
					 * Gets the value for the private _objConceptoRangosAsConceptoArray (Read-Only)
					 * if set due to an ExpandAsArray on the concepto_rangos.concepto_id reverse relationship
					 * @return ConceptoRangos[]
					 */
					return $this->_objConceptoRangosAsConceptoArray;

				case '_FacturaItemsAsConcepto':
					/**
					 * Gets the value for the private _objFacturaItemsAsConcepto (Read-Only)
					 * if set due to an expansion on the factura_items.concepto_id reverse relationship
					 * @return FacturaItems
					 */
					return $this->_objFacturaItemsAsConcepto;

				case '_FacturaItemsAsConceptoArray':
					/**
					 * Gets the value for the private _objFacturaItemsAsConceptoArray (Read-Only)
					 * if set due to an ExpandAsArray on the factura_items.concepto_id reverse relationship
					 * @return FacturaItems[]
					 */
					return $this->_objFacturaItemsAsConceptoArray;

				case '_GuiaConceptosAsConcepto':
					/**
					 * Gets the value for the private _objGuiaConceptosAsConcepto (Read-Only)
					 * if set due to an expansion on the guia_conceptos.concepto_id reverse relationship
					 * @return GuiaConceptos
					 */
					return $this->_objGuiaConceptosAsConcepto;

				case '_GuiaConceptosAsConceptoArray':
					/**
					 * Gets the value for the private _objGuiaConceptosAsConceptoArray (Read-Only)
					 * if set due to an ExpandAsArray on the guia_conceptos.concepto_id reverse relationship
					 * @return GuiaConceptos[]
					 */
					return $this->_objGuiaConceptosAsConceptoArray;

				case '_NotaConceptosAsConcepto':
					/**
					 * Gets the value for the private _objNotaConceptosAsConcepto (Read-Only)
					 * if set due to an expansion on the nota_conceptos.concepto_id reverse relationship
					 * @return NotaConceptos
					 */
					return $this->_objNotaConceptosAsConcepto;

				case '_NotaConceptosAsConceptoArray':
					/**
					 * Gets the value for the private _objNotaConceptosAsConceptoArray (Read-Only)
					 * if set due to an ExpandAsArray on the nota_conceptos.concepto_id reverse relationship
					 * @return NotaConceptos[]
					 */
					return $this->_objNotaConceptosAsConceptoArray;

				case '_NotaCreditoItemsAsConcepto':
					/**
					 * Gets the value for the private _objNotaCreditoItemsAsConcepto (Read-Only)
					 * if set due to an expansion on the nota_credito_items.concepto_id reverse relationship
					 * @return NotaCreditoItems
					 */
					return $this->_objNotaCreditoItemsAsConcepto;

				case '_NotaCreditoItemsAsConceptoArray':
					/**
					 * Gets the value for the private _objNotaCreditoItemsAsConceptoArray (Read-Only)
					 * if set due to an ExpandAsArray on the nota_credito_items.concepto_id reverse relationship
					 * @return NotaCreditoItems[]
					 */
					return $this->_objNotaCreditoItemsAsConceptoArray;


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
					 * Sets the value for strNombre (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNombre = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Orden':
					/**
					 * Sets the value for intOrden (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intOrden = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Productos':
					/**
					 * Sets the value for strProductos (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strProductos = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MostrarComo':
					/**
					 * Sets the value for strMostrarComo (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strMostrarComo = QType::Cast($mixValue, QType::String));
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

				case 'FechaInicial':
					/**
					 * Sets the value for dttFechaInicial (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaInicial = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaFinal':
					/**
					 * Sets the value for dttFechaFinal 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaFinal = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Operacion':
					/**
					 * Sets the value for strOperacion (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strOperacion = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AplicaComo':
					/**
					 * Sets the value for strAplicaComo (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strAplicaComo = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Tipo':
					/**
					 * Sets the value for strTipo (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTipo = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ActuaSobre':
					/**
					 * Sets the value for strActuaSobre (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strActuaSobre = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Valor':
					/**
					 * Sets the value for strValor (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strValor = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Dbquery':
					/**
					 * Sets the value for strDbquery 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDbquery = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'BaseImponible':
					/**
					 * Sets the value for intBaseImponible 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intBaseImponible = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Metodo':
					/**
					 * Sets the value for strMetodo 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strMetodo = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AplicarTasa':
					/**
					 * Sets the value for blnAplicarTasa 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnAplicarTasa = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Condicion':
					/**
					 * Sets the value for strCondicion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCondicion = QType::Cast($mixValue, QType::String));
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

				case 'UpdatedAt':
					/**
					 * Sets the value for dttUpdatedAt 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttUpdatedAt = QType::Cast($mixValue, QType::DateTime));
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

				case 'DeletedBy':
					/**
					 * Sets the value for intDeletedBy 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intDeletedBy = QType::Cast($mixValue, QType::Integer));
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
			if ($this->CountConceptoRangosesAsConcepto()) {
				$arrTablRela[] = 'concepto_rangos';
			}
			if ($this->CountFacturaItemsesAsConcepto()) {
				$arrTablRela[] = 'factura_items';
			}
			if ($this->CountGuiaConceptosesAsConcepto()) {
				$arrTablRela[] = 'guia_conceptos';
			}
			if ($this->CountNotaConceptosesAsConcepto()) {
				$arrTablRela[] = 'nota_conceptos';
			}
			if ($this->CountNotaCreditoItemsesAsConcepto()) {
				$arrTablRela[] = 'nota_credito_items';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for ConceptoRangosAsConcepto
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ConceptoRangosesAsConcepto as an array of ConceptoRangos objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ConceptoRangos[]
		*/
		public function GetConceptoRangosAsConceptoArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ConceptoRangos::LoadArrayByConceptoId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ConceptoRangosesAsConcepto
		 * @return int
		*/
		public function CountConceptoRangosesAsConcepto() {
			if ((is_null($this->intId)))
				return 0;

			return ConceptoRangos::CountByConceptoId($this->intId);
		}

		/**
		 * Associates a ConceptoRangosAsConcepto
		 * @param ConceptoRangos $objConceptoRangos
		 * @return void
		*/
		public function AssociateConceptoRangosAsConcepto(ConceptoRangos $objConceptoRangos) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateConceptoRangosAsConcepto on this unsaved Conceptos.');
			if ((is_null($objConceptoRangos->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateConceptoRangosAsConcepto on this Conceptos with an unsaved ConceptoRangos.');

			// Get the Database Object for this Class
			$objDatabase = Conceptos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`concepto_rangos`
				SET
					`concepto_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objConceptoRangos->Id) . '
			');
		}

		/**
		 * Unassociates a ConceptoRangosAsConcepto
		 * @param ConceptoRangos $objConceptoRangos
		 * @return void
		*/
		public function UnassociateConceptoRangosAsConcepto(ConceptoRangos $objConceptoRangos) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateConceptoRangosAsConcepto on this unsaved Conceptos.');
			if ((is_null($objConceptoRangos->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateConceptoRangosAsConcepto on this Conceptos with an unsaved ConceptoRangos.');

			// Get the Database Object for this Class
			$objDatabase = Conceptos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`concepto_rangos`
				SET
					`concepto_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objConceptoRangos->Id) . ' AND
					`concepto_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all ConceptoRangosesAsConcepto
		 * @return void
		*/
		public function UnassociateAllConceptoRangosesAsConcepto() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateConceptoRangosAsConcepto on this unsaved Conceptos.');

			// Get the Database Object for this Class
			$objDatabase = Conceptos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`concepto_rangos`
				SET
					`concepto_id` = null
				WHERE
					`concepto_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ConceptoRangosAsConcepto
		 * @param ConceptoRangos $objConceptoRangos
		 * @return void
		*/
		public function DeleteAssociatedConceptoRangosAsConcepto(ConceptoRangos $objConceptoRangos) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateConceptoRangosAsConcepto on this unsaved Conceptos.');
			if ((is_null($objConceptoRangos->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateConceptoRangosAsConcepto on this Conceptos with an unsaved ConceptoRangos.');

			// Get the Database Object for this Class
			$objDatabase = Conceptos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`concepto_rangos`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objConceptoRangos->Id) . ' AND
					`concepto_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated ConceptoRangosesAsConcepto
		 * @return void
		*/
		public function DeleteAllConceptoRangosesAsConcepto() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateConceptoRangosAsConcepto on this unsaved Conceptos.');

			// Get the Database Object for this Class
			$objDatabase = Conceptos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`concepto_rangos`
				WHERE
					`concepto_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for FacturaItemsAsConcepto
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacturaItemsesAsConcepto as an array of FacturaItems objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaItems[]
		*/
		public function GetFacturaItemsAsConceptoArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return FacturaItems::LoadArrayByConceptoId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacturaItemsesAsConcepto
		 * @return int
		*/
		public function CountFacturaItemsesAsConcepto() {
			if ((is_null($this->intId)))
				return 0;

			return FacturaItems::CountByConceptoId($this->intId);
		}

		/**
		 * Associates a FacturaItemsAsConcepto
		 * @param FacturaItems $objFacturaItems
		 * @return void
		*/
		public function AssociateFacturaItemsAsConcepto(FacturaItems $objFacturaItems) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaItemsAsConcepto on this unsaved Conceptos.');
			if ((is_null($objFacturaItems->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaItemsAsConcepto on this Conceptos with an unsaved FacturaItems.');

			// Get the Database Object for this Class
			$objDatabase = Conceptos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_items`
				SET
					`concepto_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaItems->Id) . '
			');
		}

		/**
		 * Unassociates a FacturaItemsAsConcepto
		 * @param FacturaItems $objFacturaItems
		 * @return void
		*/
		public function UnassociateFacturaItemsAsConcepto(FacturaItems $objFacturaItems) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaItemsAsConcepto on this unsaved Conceptos.');
			if ((is_null($objFacturaItems->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaItemsAsConcepto on this Conceptos with an unsaved FacturaItems.');

			// Get the Database Object for this Class
			$objDatabase = Conceptos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_items`
				SET
					`concepto_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaItems->Id) . ' AND
					`concepto_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all FacturaItemsesAsConcepto
		 * @return void
		*/
		public function UnassociateAllFacturaItemsesAsConcepto() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaItemsAsConcepto on this unsaved Conceptos.');

			// Get the Database Object for this Class
			$objDatabase = Conceptos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_items`
				SET
					`concepto_id` = null
				WHERE
					`concepto_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated FacturaItemsAsConcepto
		 * @param FacturaItems $objFacturaItems
		 * @return void
		*/
		public function DeleteAssociatedFacturaItemsAsConcepto(FacturaItems $objFacturaItems) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaItemsAsConcepto on this unsaved Conceptos.');
			if ((is_null($objFacturaItems->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaItemsAsConcepto on this Conceptos with an unsaved FacturaItems.');

			// Get the Database Object for this Class
			$objDatabase = Conceptos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_items`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaItems->Id) . ' AND
					`concepto_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated FacturaItemsesAsConcepto
		 * @return void
		*/
		public function DeleteAllFacturaItemsesAsConcepto() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaItemsAsConcepto on this unsaved Conceptos.');

			// Get the Database Object for this Class
			$objDatabase = Conceptos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_items`
				WHERE
					`concepto_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for GuiaConceptosAsConcepto
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiaConceptosesAsConcepto as an array of GuiaConceptos objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaConceptos[]
		*/
		public function GetGuiaConceptosAsConceptoArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return GuiaConceptos::LoadArrayByConceptoId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiaConceptosesAsConcepto
		 * @return int
		*/
		public function CountGuiaConceptosesAsConcepto() {
			if ((is_null($this->intId)))
				return 0;

			return GuiaConceptos::CountByConceptoId($this->intId);
		}

		/**
		 * Associates a GuiaConceptosAsConcepto
		 * @param GuiaConceptos $objGuiaConceptos
		 * @return void
		*/
		public function AssociateGuiaConceptosAsConcepto(GuiaConceptos $objGuiaConceptos) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaConceptosAsConcepto on this unsaved Conceptos.');
			if ((is_null($objGuiaConceptos->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaConceptosAsConcepto on this Conceptos with an unsaved GuiaConceptos.');

			// Get the Database Object for this Class
			$objDatabase = Conceptos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_conceptos`
				SET
					`concepto_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiaConceptos->Id) . '
			');
		}

		/**
		 * Unassociates a GuiaConceptosAsConcepto
		 * @param GuiaConceptos $objGuiaConceptos
		 * @return void
		*/
		public function UnassociateGuiaConceptosAsConcepto(GuiaConceptos $objGuiaConceptos) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaConceptosAsConcepto on this unsaved Conceptos.');
			if ((is_null($objGuiaConceptos->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaConceptosAsConcepto on this Conceptos with an unsaved GuiaConceptos.');

			// Get the Database Object for this Class
			$objDatabase = Conceptos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_conceptos`
				SET
					`concepto_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiaConceptos->Id) . ' AND
					`concepto_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all GuiaConceptosesAsConcepto
		 * @return void
		*/
		public function UnassociateAllGuiaConceptosesAsConcepto() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaConceptosAsConcepto on this unsaved Conceptos.');

			// Get the Database Object for this Class
			$objDatabase = Conceptos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_conceptos`
				SET
					`concepto_id` = null
				WHERE
					`concepto_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated GuiaConceptosAsConcepto
		 * @param GuiaConceptos $objGuiaConceptos
		 * @return void
		*/
		public function DeleteAssociatedGuiaConceptosAsConcepto(GuiaConceptos $objGuiaConceptos) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaConceptosAsConcepto on this unsaved Conceptos.');
			if ((is_null($objGuiaConceptos->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaConceptosAsConcepto on this Conceptos with an unsaved GuiaConceptos.');

			// Get the Database Object for this Class
			$objDatabase = Conceptos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_conceptos`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiaConceptos->Id) . ' AND
					`concepto_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated GuiaConceptosesAsConcepto
		 * @return void
		*/
		public function DeleteAllGuiaConceptosesAsConcepto() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaConceptosAsConcepto on this unsaved Conceptos.');

			// Get the Database Object for this Class
			$objDatabase = Conceptos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_conceptos`
				WHERE
					`concepto_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for NotaConceptosAsConcepto
		//-------------------------------------------------------------------

		/**
		 * Gets all associated NotaConceptosesAsConcepto as an array of NotaConceptos objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaConceptos[]
		*/
		public function GetNotaConceptosAsConceptoArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return NotaConceptos::LoadArrayByConceptoId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated NotaConceptosesAsConcepto
		 * @return int
		*/
		public function CountNotaConceptosesAsConcepto() {
			if ((is_null($this->intId)))
				return 0;

			return NotaConceptos::CountByConceptoId($this->intId);
		}

		/**
		 * Associates a NotaConceptosAsConcepto
		 * @param NotaConceptos $objNotaConceptos
		 * @return void
		*/
		public function AssociateNotaConceptosAsConcepto(NotaConceptos $objNotaConceptos) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaConceptosAsConcepto on this unsaved Conceptos.');
			if ((is_null($objNotaConceptos->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaConceptosAsConcepto on this Conceptos with an unsaved NotaConceptos.');

			// Get the Database Object for this Class
			$objDatabase = Conceptos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_conceptos`
				SET
					`concepto_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaConceptos->Id) . '
			');
		}

		/**
		 * Unassociates a NotaConceptosAsConcepto
		 * @param NotaConceptos $objNotaConceptos
		 * @return void
		*/
		public function UnassociateNotaConceptosAsConcepto(NotaConceptos $objNotaConceptos) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaConceptosAsConcepto on this unsaved Conceptos.');
			if ((is_null($objNotaConceptos->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaConceptosAsConcepto on this Conceptos with an unsaved NotaConceptos.');

			// Get the Database Object for this Class
			$objDatabase = Conceptos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_conceptos`
				SET
					`concepto_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaConceptos->Id) . ' AND
					`concepto_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all NotaConceptosesAsConcepto
		 * @return void
		*/
		public function UnassociateAllNotaConceptosesAsConcepto() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaConceptosAsConcepto on this unsaved Conceptos.');

			// Get the Database Object for this Class
			$objDatabase = Conceptos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_conceptos`
				SET
					`concepto_id` = null
				WHERE
					`concepto_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated NotaConceptosAsConcepto
		 * @param NotaConceptos $objNotaConceptos
		 * @return void
		*/
		public function DeleteAssociatedNotaConceptosAsConcepto(NotaConceptos $objNotaConceptos) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaConceptosAsConcepto on this unsaved Conceptos.');
			if ((is_null($objNotaConceptos->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaConceptosAsConcepto on this Conceptos with an unsaved NotaConceptos.');

			// Get the Database Object for this Class
			$objDatabase = Conceptos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_conceptos`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaConceptos->Id) . ' AND
					`concepto_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated NotaConceptosesAsConcepto
		 * @return void
		*/
		public function DeleteAllNotaConceptosesAsConcepto() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaConceptosAsConcepto on this unsaved Conceptos.');

			// Get the Database Object for this Class
			$objDatabase = Conceptos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_conceptos`
				WHERE
					`concepto_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for NotaCreditoItemsAsConcepto
		//-------------------------------------------------------------------

		/**
		 * Gets all associated NotaCreditoItemsesAsConcepto as an array of NotaCreditoItems objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaCreditoItems[]
		*/
		public function GetNotaCreditoItemsAsConceptoArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return NotaCreditoItems::LoadArrayByConceptoId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated NotaCreditoItemsesAsConcepto
		 * @return int
		*/
		public function CountNotaCreditoItemsesAsConcepto() {
			if ((is_null($this->intId)))
				return 0;

			return NotaCreditoItems::CountByConceptoId($this->intId);
		}

		/**
		 * Associates a NotaCreditoItemsAsConcepto
		 * @param NotaCreditoItems $objNotaCreditoItems
		 * @return void
		*/
		public function AssociateNotaCreditoItemsAsConcepto(NotaCreditoItems $objNotaCreditoItems) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaCreditoItemsAsConcepto on this unsaved Conceptos.');
			if ((is_null($objNotaCreditoItems->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaCreditoItemsAsConcepto on this Conceptos with an unsaved NotaCreditoItems.');

			// Get the Database Object for this Class
			$objDatabase = Conceptos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_credito_items`
				SET
					`concepto_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaCreditoItems->Id) . '
			');
		}

		/**
		 * Unassociates a NotaCreditoItemsAsConcepto
		 * @param NotaCreditoItems $objNotaCreditoItems
		 * @return void
		*/
		public function UnassociateNotaCreditoItemsAsConcepto(NotaCreditoItems $objNotaCreditoItems) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoItemsAsConcepto on this unsaved Conceptos.');
			if ((is_null($objNotaCreditoItems->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoItemsAsConcepto on this Conceptos with an unsaved NotaCreditoItems.');

			// Get the Database Object for this Class
			$objDatabase = Conceptos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_credito_items`
				SET
					`concepto_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaCreditoItems->Id) . ' AND
					`concepto_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all NotaCreditoItemsesAsConcepto
		 * @return void
		*/
		public function UnassociateAllNotaCreditoItemsesAsConcepto() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoItemsAsConcepto on this unsaved Conceptos.');

			// Get the Database Object for this Class
			$objDatabase = Conceptos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_credito_items`
				SET
					`concepto_id` = null
				WHERE
					`concepto_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated NotaCreditoItemsAsConcepto
		 * @param NotaCreditoItems $objNotaCreditoItems
		 * @return void
		*/
		public function DeleteAssociatedNotaCreditoItemsAsConcepto(NotaCreditoItems $objNotaCreditoItems) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoItemsAsConcepto on this unsaved Conceptos.');
			if ((is_null($objNotaCreditoItems->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoItemsAsConcepto on this Conceptos with an unsaved NotaCreditoItems.');

			// Get the Database Object for this Class
			$objDatabase = Conceptos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_credito_items`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaCreditoItems->Id) . ' AND
					`concepto_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated NotaCreditoItemsesAsConcepto
		 * @return void
		*/
		public function DeleteAllNotaCreditoItemsesAsConcepto() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoItemsAsConcepto on this unsaved Conceptos.');

			// Get the Database Object for this Class
			$objDatabase = Conceptos::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_credito_items`
				WHERE
					`concepto_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
			return "conceptos";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Conceptos::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Conceptos"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Nombre" type="xsd:string"/>';
			$strToReturn .= '<element name="Orden" type="xsd:int"/>';
			$strToReturn .= '<element name="Productos" type="xsd:string"/>';
			$strToReturn .= '<element name="MostrarComo" type="xsd:string"/>';
			$strToReturn .= '<element name="Activo" type="xsd:boolean"/>';
			$strToReturn .= '<element name="FechaInicial" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="FechaFinal" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Operacion" type="xsd:string"/>';
			$strToReturn .= '<element name="AplicaComo" type="xsd:string"/>';
			$strToReturn .= '<element name="Tipo" type="xsd:string"/>';
			$strToReturn .= '<element name="ActuaSobre" type="xsd:string"/>';
			$strToReturn .= '<element name="Valor" type="xsd:string"/>';
			$strToReturn .= '<element name="Dbquery" type="xsd:string"/>';
			$strToReturn .= '<element name="BaseImponible" type="xsd:int"/>';
			$strToReturn .= '<element name="Metodo" type="xsd:string"/>';
			$strToReturn .= '<element name="AplicarTasa" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Condicion" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="UpdatedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="DeletedAt" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="UpdatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="DeletedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Conceptos', $strComplexTypeArray)) {
				$strComplexTypeArray['Conceptos'] = Conceptos::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Conceptos::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Conceptos();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Nombre'))
				$objToReturn->strNombre = $objSoapObject->Nombre;
			if (property_exists($objSoapObject, 'Orden'))
				$objToReturn->intOrden = $objSoapObject->Orden;
			if (property_exists($objSoapObject, 'Productos'))
				$objToReturn->strProductos = $objSoapObject->Productos;
			if (property_exists($objSoapObject, 'MostrarComo'))
				$objToReturn->strMostrarComo = $objSoapObject->MostrarComo;
			if (property_exists($objSoapObject, 'Activo'))
				$objToReturn->blnActivo = $objSoapObject->Activo;
			if (property_exists($objSoapObject, 'FechaInicial'))
				$objToReturn->dttFechaInicial = new QDateTime($objSoapObject->FechaInicial);
			if (property_exists($objSoapObject, 'FechaFinal'))
				$objToReturn->dttFechaFinal = new QDateTime($objSoapObject->FechaFinal);
			if (property_exists($objSoapObject, 'Operacion'))
				$objToReturn->strOperacion = $objSoapObject->Operacion;
			if (property_exists($objSoapObject, 'AplicaComo'))
				$objToReturn->strAplicaComo = $objSoapObject->AplicaComo;
			if (property_exists($objSoapObject, 'Tipo'))
				$objToReturn->strTipo = $objSoapObject->Tipo;
			if (property_exists($objSoapObject, 'ActuaSobre'))
				$objToReturn->strActuaSobre = $objSoapObject->ActuaSobre;
			if (property_exists($objSoapObject, 'Valor'))
				$objToReturn->strValor = $objSoapObject->Valor;
			if (property_exists($objSoapObject, 'Dbquery'))
				$objToReturn->strDbquery = $objSoapObject->Dbquery;
			if (property_exists($objSoapObject, 'BaseImponible'))
				$objToReturn->intBaseImponible = $objSoapObject->BaseImponible;
			if (property_exists($objSoapObject, 'Metodo'))
				$objToReturn->strMetodo = $objSoapObject->Metodo;
			if (property_exists($objSoapObject, 'AplicarTasa'))
				$objToReturn->blnAplicarTasa = $objSoapObject->AplicarTasa;
			if (property_exists($objSoapObject, 'Condicion'))
				$objToReturn->strCondicion = $objSoapObject->Condicion;
			if (property_exists($objSoapObject, 'CreatedAt'))
				$objToReturn->dttCreatedAt = new QDateTime($objSoapObject->CreatedAt);
			if (property_exists($objSoapObject, 'UpdatedAt'))
				$objToReturn->dttUpdatedAt = new QDateTime($objSoapObject->UpdatedAt);
			if (property_exists($objSoapObject, 'DeletedAt'))
				$objToReturn->strDeletedAt = $objSoapObject->DeletedAt;
			if (property_exists($objSoapObject, 'CreatedBy'))
				$objToReturn->intCreatedBy = $objSoapObject->CreatedBy;
			if (property_exists($objSoapObject, 'UpdatedBy'))
				$objToReturn->intUpdatedBy = $objSoapObject->UpdatedBy;
			if (property_exists($objSoapObject, 'DeletedBy'))
				$objToReturn->intDeletedBy = $objSoapObject->DeletedBy;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Conceptos::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttFechaInicial)
				$objObject->dttFechaInicial = $objObject->dttFechaInicial->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechaFinal)
				$objObject->dttFechaFinal = $objObject->dttFechaFinal->qFormat(QDateTime::FormatSoap);
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
			$iArray['Nombre'] = $this->strNombre;
			$iArray['Orden'] = $this->intOrden;
			$iArray['Productos'] = $this->strProductos;
			$iArray['MostrarComo'] = $this->strMostrarComo;
			$iArray['Activo'] = $this->blnActivo;
			$iArray['FechaInicial'] = $this->dttFechaInicial;
			$iArray['FechaFinal'] = $this->dttFechaFinal;
			$iArray['Operacion'] = $this->strOperacion;
			$iArray['AplicaComo'] = $this->strAplicaComo;
			$iArray['Tipo'] = $this->strTipo;
			$iArray['ActuaSobre'] = $this->strActuaSobre;
			$iArray['Valor'] = $this->strValor;
			$iArray['Dbquery'] = $this->strDbquery;
			$iArray['BaseImponible'] = $this->intBaseImponible;
			$iArray['Metodo'] = $this->strMetodo;
			$iArray['AplicarTasa'] = $this->blnAplicarTasa;
			$iArray['Condicion'] = $this->strCondicion;
			$iArray['CreatedAt'] = $this->dttCreatedAt;
			$iArray['UpdatedAt'] = $this->dttUpdatedAt;
			$iArray['DeletedAt'] = $this->strDeletedAt;
			$iArray['CreatedBy'] = $this->intCreatedBy;
			$iArray['UpdatedBy'] = $this->intUpdatedBy;
			$iArray['DeletedBy'] = $this->intDeletedBy;
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
     * @property-read QQNode $Orden
     * @property-read QQNode $Productos
     * @property-read QQNode $MostrarComo
     * @property-read QQNode $Activo
     * @property-read QQNode $FechaInicial
     * @property-read QQNode $FechaFinal
     * @property-read QQNode $Operacion
     * @property-read QQNode $AplicaComo
     * @property-read QQNode $Tipo
     * @property-read QQNode $ActuaSobre
     * @property-read QQNode $Valor
     * @property-read QQNode $Dbquery
     * @property-read QQNode $BaseImponible
     * @property-read QQNode $Metodo
     * @property-read QQNode $AplicarTasa
     * @property-read QQNode $Condicion
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $DeletedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     * @property-read QQNode $DeletedBy
     *
     *
     * @property-read QQReverseReferenceNodeConceptoRangos $ConceptoRangosAsConcepto
     * @property-read QQReverseReferenceNodeFacturaItems $FacturaItemsAsConcepto
     * @property-read QQReverseReferenceNodeGuiaConceptos $GuiaConceptosAsConcepto
     * @property-read QQReverseReferenceNodeNotaConceptos $NotaConceptosAsConcepto
     * @property-read QQReverseReferenceNodeNotaCreditoItems $NotaCreditoItemsAsConcepto

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeConceptos extends QQNode {
		protected $strTableName = 'conceptos';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Conceptos';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'VarChar', $this);
				case 'Orden':
					return new QQNode('orden', 'Orden', 'Integer', $this);
				case 'Productos':
					return new QQNode('productos', 'Productos', 'VarChar', $this);
				case 'MostrarComo':
					return new QQNode('mostrar_como', 'MostrarComo', 'VarChar', $this);
				case 'Activo':
					return new QQNode('activo', 'Activo', 'Bit', $this);
				case 'FechaInicial':
					return new QQNode('fecha_inicial', 'FechaInicial', 'Date', $this);
				case 'FechaFinal':
					return new QQNode('fecha_final', 'FechaFinal', 'Date', $this);
				case 'Operacion':
					return new QQNode('operacion', 'Operacion', 'VarChar', $this);
				case 'AplicaComo':
					return new QQNode('aplica_como', 'AplicaComo', 'VarChar', $this);
				case 'Tipo':
					return new QQNode('tipo', 'Tipo', 'VarChar', $this);
				case 'ActuaSobre':
					return new QQNode('actua_sobre', 'ActuaSobre', 'VarChar', $this);
				case 'Valor':
					return new QQNode('valor', 'Valor', 'VarChar', $this);
				case 'Dbquery':
					return new QQNode('dbquery', 'Dbquery', 'Blob', $this);
				case 'BaseImponible':
					return new QQNode('base_imponible', 'BaseImponible', 'Integer', $this);
				case 'Metodo':
					return new QQNode('metodo', 'Metodo', 'VarChar', $this);
				case 'AplicarTasa':
					return new QQNode('aplicar_tasa', 'AplicarTasa', 'Bit', $this);
				case 'Condicion':
					return new QQNode('condicion', 'Condicion', 'VarChar', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'DateTime', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'DateTime', $this);
				case 'DeletedAt':
					return new QQNode('deleted_at', 'DeletedAt', 'VarChar', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'Integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'Integer', $this);
				case 'DeletedBy':
					return new QQNode('deleted_by', 'DeletedBy', 'Integer', $this);
				case 'ConceptoRangosAsConcepto':
					return new QQReverseReferenceNodeConceptoRangos($this, 'conceptorangosasconcepto', 'reverse_reference', 'concepto_id', 'ConceptoRangosAsConcepto');
				case 'FacturaItemsAsConcepto':
					return new QQReverseReferenceNodeFacturaItems($this, 'facturaitemsasconcepto', 'reverse_reference', 'concepto_id', 'FacturaItemsAsConcepto');
				case 'GuiaConceptosAsConcepto':
					return new QQReverseReferenceNodeGuiaConceptos($this, 'guiaconceptosasconcepto', 'reverse_reference', 'concepto_id', 'GuiaConceptosAsConcepto');
				case 'NotaConceptosAsConcepto':
					return new QQReverseReferenceNodeNotaConceptos($this, 'notaconceptosasconcepto', 'reverse_reference', 'concepto_id', 'NotaConceptosAsConcepto');
				case 'NotaCreditoItemsAsConcepto':
					return new QQReverseReferenceNodeNotaCreditoItems($this, 'notacreditoitemsasconcepto', 'reverse_reference', 'concepto_id', 'NotaCreditoItemsAsConcepto');

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
     * @property-read QQNode $Orden
     * @property-read QQNode $Productos
     * @property-read QQNode $MostrarComo
     * @property-read QQNode $Activo
     * @property-read QQNode $FechaInicial
     * @property-read QQNode $FechaFinal
     * @property-read QQNode $Operacion
     * @property-read QQNode $AplicaComo
     * @property-read QQNode $Tipo
     * @property-read QQNode $ActuaSobre
     * @property-read QQNode $Valor
     * @property-read QQNode $Dbquery
     * @property-read QQNode $BaseImponible
     * @property-read QQNode $Metodo
     * @property-read QQNode $AplicarTasa
     * @property-read QQNode $Condicion
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $DeletedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     * @property-read QQNode $DeletedBy
     *
     *
     * @property-read QQReverseReferenceNodeConceptoRangos $ConceptoRangosAsConcepto
     * @property-read QQReverseReferenceNodeFacturaItems $FacturaItemsAsConcepto
     * @property-read QQReverseReferenceNodeGuiaConceptos $GuiaConceptosAsConcepto
     * @property-read QQReverseReferenceNodeNotaConceptos $NotaConceptosAsConcepto
     * @property-read QQReverseReferenceNodeNotaCreditoItems $NotaCreditoItemsAsConcepto

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeConceptos extends QQReverseReferenceNode {
		protected $strTableName = 'conceptos';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Conceptos';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'string', $this);
				case 'Orden':
					return new QQNode('orden', 'Orden', 'integer', $this);
				case 'Productos':
					return new QQNode('productos', 'Productos', 'string', $this);
				case 'MostrarComo':
					return new QQNode('mostrar_como', 'MostrarComo', 'string', $this);
				case 'Activo':
					return new QQNode('activo', 'Activo', 'boolean', $this);
				case 'FechaInicial':
					return new QQNode('fecha_inicial', 'FechaInicial', 'QDateTime', $this);
				case 'FechaFinal':
					return new QQNode('fecha_final', 'FechaFinal', 'QDateTime', $this);
				case 'Operacion':
					return new QQNode('operacion', 'Operacion', 'string', $this);
				case 'AplicaComo':
					return new QQNode('aplica_como', 'AplicaComo', 'string', $this);
				case 'Tipo':
					return new QQNode('tipo', 'Tipo', 'string', $this);
				case 'ActuaSobre':
					return new QQNode('actua_sobre', 'ActuaSobre', 'string', $this);
				case 'Valor':
					return new QQNode('valor', 'Valor', 'string', $this);
				case 'Dbquery':
					return new QQNode('dbquery', 'Dbquery', 'string', $this);
				case 'BaseImponible':
					return new QQNode('base_imponible', 'BaseImponible', 'integer', $this);
				case 'Metodo':
					return new QQNode('metodo', 'Metodo', 'string', $this);
				case 'AplicarTasa':
					return new QQNode('aplicar_tasa', 'AplicarTasa', 'boolean', $this);
				case 'Condicion':
					return new QQNode('condicion', 'Condicion', 'string', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'QDateTime', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'QDateTime', $this);
				case 'DeletedAt':
					return new QQNode('deleted_at', 'DeletedAt', 'string', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'integer', $this);
				case 'DeletedBy':
					return new QQNode('deleted_by', 'DeletedBy', 'integer', $this);
				case 'ConceptoRangosAsConcepto':
					return new QQReverseReferenceNodeConceptoRangos($this, 'conceptorangosasconcepto', 'reverse_reference', 'concepto_id', 'ConceptoRangosAsConcepto');
				case 'FacturaItemsAsConcepto':
					return new QQReverseReferenceNodeFacturaItems($this, 'facturaitemsasconcepto', 'reverse_reference', 'concepto_id', 'FacturaItemsAsConcepto');
				case 'GuiaConceptosAsConcepto':
					return new QQReverseReferenceNodeGuiaConceptos($this, 'guiaconceptosasconcepto', 'reverse_reference', 'concepto_id', 'GuiaConceptosAsConcepto');
				case 'NotaConceptosAsConcepto':
					return new QQReverseReferenceNodeNotaConceptos($this, 'notaconceptosasconcepto', 'reverse_reference', 'concepto_id', 'NotaConceptosAsConcepto');
				case 'NotaCreditoItemsAsConcepto':
					return new QQReverseReferenceNodeNotaCreditoItems($this, 'notacreditoitemsasconcepto', 'reverse_reference', 'concepto_id', 'NotaCreditoItemsAsConcepto');

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
