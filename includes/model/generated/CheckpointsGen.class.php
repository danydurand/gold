<?php
	/**
	 * The abstract CheckpointsGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Checkpoints subclass which
	 * extends this CheckpointsGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Checkpoints class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Codigo the value for strCodigo (Unique)
	 * @property string $Descripcion the value for strDescripcion (Not Null)
	 * @property string $DescripcionRastreo the value for strDescripcionRastreo (Not Null)
	 * @property boolean $Terminal the value for blnTerminal (Not Null)
	 * @property string $Visibilidad the value for strVisibilidad (Not Null)
	 * @property string $Tipo the value for strTipo (Not Null)
	 * @property boolean $Notificar the value for blnNotificar (Not Null)
	 * @property string $Imagen the value for strImagen 
	 * @property string $Color the value for strColor 
	 * @property string $Observacion the value for strObservacion 
	 * @property-read string $CreatedAt the value for strCreatedAt (Read-Only Timestamp)
	 * @property-read string $UpdatedAt the value for strUpdatedAt (Read-Only Timestamp)
	 * @property-read string $DeletedAt the value for strDeletedAt (Read-Only Timestamp)
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property integer $UpdatedBy the value for intUpdatedBy 
	 * @property integer $DeletedBy the value for intDeletedBy 
	 * @property-read ContainerCkpt $_ContainerCkptAsCheckpoint the value for the private _objContainerCkptAsCheckpoint (Read-Only) if set due to an expansion on the container_ckpt.checkpoint_id reverse relationship
	 * @property-read ContainerCkpt[] $_ContainerCkptAsCheckpointArray the value for the private _objContainerCkptAsCheckpointArray (Read-Only) if set due to an ExpandAsArray on the container_ckpt.checkpoint_id reverse relationship
	 * @property-read ContenedorCkpt $_ContenedorCkptAsCheckpoint the value for the private _objContenedorCkptAsCheckpoint (Read-Only) if set due to an expansion on the contenedor_ckpt.checkpoint_id reverse relationship
	 * @property-read ContenedorCkpt[] $_ContenedorCkptAsCheckpointArray the value for the private _objContenedorCkptAsCheckpointArray (Read-Only) if set due to an ExpandAsArray on the contenedor_ckpt.checkpoint_id reverse relationship
	 * @property-read HistoriaCliente $_HistoriaClienteAsCheckpoint the value for the private _objHistoriaClienteAsCheckpoint (Read-Only) if set due to an expansion on the historia_cliente.checkpoint_id reverse relationship
	 * @property-read HistoriaCliente[] $_HistoriaClienteAsCheckpointArray the value for the private _objHistoriaClienteAsCheckpointArray (Read-Only) if set due to an ExpandAsArray on the historia_cliente.checkpoint_id reverse relationship
	 * @property-read NotaEntregaCkpt $_NotaEntregaCkptAsCheckpoint the value for the private _objNotaEntregaCkptAsCheckpoint (Read-Only) if set due to an expansion on the nota_entrega_ckpt.checkpoint_id reverse relationship
	 * @property-read NotaEntregaCkpt[] $_NotaEntregaCkptAsCheckpointArray the value for the private _objNotaEntregaCkptAsCheckpointArray (Read-Only) if set due to an ExpandAsArray on the nota_entrega_ckpt.checkpoint_id reverse relationship
	 * @property-read NotaEntregaCkptH $_NotaEntregaCkptHAsCheckpoint the value for the private _objNotaEntregaCkptHAsCheckpoint (Read-Only) if set due to an expansion on the nota_entrega_ckpt_h.checkpoint_id reverse relationship
	 * @property-read NotaEntregaCkptH[] $_NotaEntregaCkptHAsCheckpointArray the value for the private _objNotaEntregaCkptHAsCheckpointArray (Read-Only) if set due to an ExpandAsArray on the nota_entrega_ckpt_h.checkpoint_id reverse relationship
	 * @property-read Notificacion $_NotificacionAsCheckpoint the value for the private _objNotificacionAsCheckpoint (Read-Only) if set due to an expansion on the notificacion.checkpoint_id reverse relationship
	 * @property-read Notificacion[] $_NotificacionAsCheckpointArray the value for the private _objNotificacionAsCheckpointArray (Read-Only) if set due to an ExpandAsArray on the notificacion.checkpoint_id reverse relationship
	 * @property-read PiezaCheckpoints $_PiezaCheckpointsAsCheckpoint the value for the private _objPiezaCheckpointsAsCheckpoint (Read-Only) if set due to an expansion on the pieza_checkpoints.checkpoint_id reverse relationship
	 * @property-read PiezaCheckpoints[] $_PiezaCheckpointsAsCheckpointArray the value for the private _objPiezaCheckpointsAsCheckpointArray (Read-Only) if set due to an ExpandAsArray on the pieza_checkpoints.checkpoint_id reverse relationship
	 * @property-read PiezaCheckpointsH $_PiezaCheckpointsHAsCheckpoint the value for the private _objPiezaCheckpointsHAsCheckpoint (Read-Only) if set due to an expansion on the pieza_checkpoints_h.checkpoint_id reverse relationship
	 * @property-read PiezaCheckpointsH[] $_PiezaCheckpointsHAsCheckpointArray the value for the private _objPiezaCheckpointsHAsCheckpointArray (Read-Only) if set due to an ExpandAsArray on the pieza_checkpoints_h.checkpoint_id reverse relationship
	 * @property-read RegistroTrabajo $_RegistroTrabajoAsCheckpoint the value for the private _objRegistroTrabajoAsCheckpoint (Read-Only) if set due to an expansion on the registro_trabajo.checkpoint_id reverse relationship
	 * @property-read RegistroTrabajo[] $_RegistroTrabajoAsCheckpointArray the value for the private _objRegistroTrabajoAsCheckpointArray (Read-Only) if set due to an ExpandAsArray on the registro_trabajo.checkpoint_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class CheckpointsGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column checkpoints.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column checkpoints.codigo
		 * @var string strCodigo
		 */
		protected $strCodigo;
		const CodigoMaxLength = 2;
		const CodigoDefault = null;


		/**
		 * Protected member variable that maps to the database column checkpoints.descripcion
		 * @var string strDescripcion
		 */
		protected $strDescripcion;
		const DescripcionMaxLength = 50;
		const DescripcionDefault = null;


		/**
		 * Protected member variable that maps to the database column checkpoints.descripcion_rastreo
		 * @var string strDescripcionRastreo
		 */
		protected $strDescripcionRastreo;
		const DescripcionRastreoMaxLength = 50;
		const DescripcionRastreoDefault = null;


		/**
		 * Protected member variable that maps to the database column checkpoints.terminal
		 * @var boolean blnTerminal
		 */
		protected $blnTerminal;
		const TerminalDefault = null;


		/**
		 * Protected member variable that maps to the database column checkpoints.visibilidad
		 * @var string strVisibilidad
		 */
		protected $strVisibilidad;
		const VisibilidadDefault = null;


		/**
		 * Protected member variable that maps to the database column checkpoints.tipo
		 * @var string strTipo
		 */
		protected $strTipo;
		const TipoDefault = null;


		/**
		 * Protected member variable that maps to the database column checkpoints.notificar
		 * @var boolean blnNotificar
		 */
		protected $blnNotificar;
		const NotificarDefault = null;


		/**
		 * Protected member variable that maps to the database column checkpoints.imagen
		 * @var string strImagen
		 */
		protected $strImagen;
		const ImagenMaxLength = 50;
		const ImagenDefault = null;


		/**
		 * Protected member variable that maps to the database column checkpoints.color
		 * @var string strColor
		 */
		protected $strColor;
		const ColorMaxLength = 20;
		const ColorDefault = null;


		/**
		 * Protected member variable that maps to the database column checkpoints.observacion
		 * @var string strObservacion
		 */
		protected $strObservacion;
		const ObservacionMaxLength = 200;
		const ObservacionDefault = null;


		/**
		 * Protected member variable that maps to the database column checkpoints.created_at
		 * @var string strCreatedAt
		 */
		protected $strCreatedAt;
		const CreatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column checkpoints.updated_at
		 * @var string strUpdatedAt
		 */
		protected $strUpdatedAt;
		const UpdatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column checkpoints.deleted_at
		 * @var string strDeletedAt
		 */
		protected $strDeletedAt;
		const DeletedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column checkpoints.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column checkpoints.updated_by
		 * @var integer intUpdatedBy
		 */
		protected $intUpdatedBy;
		const UpdatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column checkpoints.deleted_by
		 * @var integer intDeletedBy
		 */
		protected $intDeletedBy;
		const DeletedByDefault = null;


		/**
		 * Private member variable that stores a reference to a single ContainerCkptAsCheckpoint object
		 * (of type ContainerCkpt), if this Checkpoints object was restored with
		 * an expansion on the container_ckpt association table.
		 * @var ContainerCkpt _objContainerCkptAsCheckpoint;
		 */
		private $_objContainerCkptAsCheckpoint;

		/**
		 * Private member variable that stores a reference to an array of ContainerCkptAsCheckpoint objects
		 * (of type ContainerCkpt[]), if this Checkpoints object was restored with
		 * an ExpandAsArray on the container_ckpt association table.
		 * @var ContainerCkpt[] _objContainerCkptAsCheckpointArray;
		 */
		private $_objContainerCkptAsCheckpointArray = null;

		/**
		 * Private member variable that stores a reference to a single ContenedorCkptAsCheckpoint object
		 * (of type ContenedorCkpt), if this Checkpoints object was restored with
		 * an expansion on the contenedor_ckpt association table.
		 * @var ContenedorCkpt _objContenedorCkptAsCheckpoint;
		 */
		private $_objContenedorCkptAsCheckpoint;

		/**
		 * Private member variable that stores a reference to an array of ContenedorCkptAsCheckpoint objects
		 * (of type ContenedorCkpt[]), if this Checkpoints object was restored with
		 * an ExpandAsArray on the contenedor_ckpt association table.
		 * @var ContenedorCkpt[] _objContenedorCkptAsCheckpointArray;
		 */
		private $_objContenedorCkptAsCheckpointArray = null;

		/**
		 * Private member variable that stores a reference to a single HistoriaClienteAsCheckpoint object
		 * (of type HistoriaCliente), if this Checkpoints object was restored with
		 * an expansion on the historia_cliente association table.
		 * @var HistoriaCliente _objHistoriaClienteAsCheckpoint;
		 */
		private $_objHistoriaClienteAsCheckpoint;

		/**
		 * Private member variable that stores a reference to an array of HistoriaClienteAsCheckpoint objects
		 * (of type HistoriaCliente[]), if this Checkpoints object was restored with
		 * an ExpandAsArray on the historia_cliente association table.
		 * @var HistoriaCliente[] _objHistoriaClienteAsCheckpointArray;
		 */
		private $_objHistoriaClienteAsCheckpointArray = null;

		/**
		 * Private member variable that stores a reference to a single NotaEntregaCkptAsCheckpoint object
		 * (of type NotaEntregaCkpt), if this Checkpoints object was restored with
		 * an expansion on the nota_entrega_ckpt association table.
		 * @var NotaEntregaCkpt _objNotaEntregaCkptAsCheckpoint;
		 */
		private $_objNotaEntregaCkptAsCheckpoint;

		/**
		 * Private member variable that stores a reference to an array of NotaEntregaCkptAsCheckpoint objects
		 * (of type NotaEntregaCkpt[]), if this Checkpoints object was restored with
		 * an ExpandAsArray on the nota_entrega_ckpt association table.
		 * @var NotaEntregaCkpt[] _objNotaEntregaCkptAsCheckpointArray;
		 */
		private $_objNotaEntregaCkptAsCheckpointArray = null;

		/**
		 * Private member variable that stores a reference to a single NotaEntregaCkptHAsCheckpoint object
		 * (of type NotaEntregaCkptH), if this Checkpoints object was restored with
		 * an expansion on the nota_entrega_ckpt_h association table.
		 * @var NotaEntregaCkptH _objNotaEntregaCkptHAsCheckpoint;
		 */
		private $_objNotaEntregaCkptHAsCheckpoint;

		/**
		 * Private member variable that stores a reference to an array of NotaEntregaCkptHAsCheckpoint objects
		 * (of type NotaEntregaCkptH[]), if this Checkpoints object was restored with
		 * an ExpandAsArray on the nota_entrega_ckpt_h association table.
		 * @var NotaEntregaCkptH[] _objNotaEntregaCkptHAsCheckpointArray;
		 */
		private $_objNotaEntregaCkptHAsCheckpointArray = null;

		/**
		 * Private member variable that stores a reference to a single NotificacionAsCheckpoint object
		 * (of type Notificacion), if this Checkpoints object was restored with
		 * an expansion on the notificacion association table.
		 * @var Notificacion _objNotificacionAsCheckpoint;
		 */
		private $_objNotificacionAsCheckpoint;

		/**
		 * Private member variable that stores a reference to an array of NotificacionAsCheckpoint objects
		 * (of type Notificacion[]), if this Checkpoints object was restored with
		 * an ExpandAsArray on the notificacion association table.
		 * @var Notificacion[] _objNotificacionAsCheckpointArray;
		 */
		private $_objNotificacionAsCheckpointArray = null;

		/**
		 * Private member variable that stores a reference to a single PiezaCheckpointsAsCheckpoint object
		 * (of type PiezaCheckpoints), if this Checkpoints object was restored with
		 * an expansion on the pieza_checkpoints association table.
		 * @var PiezaCheckpoints _objPiezaCheckpointsAsCheckpoint;
		 */
		private $_objPiezaCheckpointsAsCheckpoint;

		/**
		 * Private member variable that stores a reference to an array of PiezaCheckpointsAsCheckpoint objects
		 * (of type PiezaCheckpoints[]), if this Checkpoints object was restored with
		 * an ExpandAsArray on the pieza_checkpoints association table.
		 * @var PiezaCheckpoints[] _objPiezaCheckpointsAsCheckpointArray;
		 */
		private $_objPiezaCheckpointsAsCheckpointArray = null;

		/**
		 * Private member variable that stores a reference to a single PiezaCheckpointsHAsCheckpoint object
		 * (of type PiezaCheckpointsH), if this Checkpoints object was restored with
		 * an expansion on the pieza_checkpoints_h association table.
		 * @var PiezaCheckpointsH _objPiezaCheckpointsHAsCheckpoint;
		 */
		private $_objPiezaCheckpointsHAsCheckpoint;

		/**
		 * Private member variable that stores a reference to an array of PiezaCheckpointsHAsCheckpoint objects
		 * (of type PiezaCheckpointsH[]), if this Checkpoints object was restored with
		 * an ExpandAsArray on the pieza_checkpoints_h association table.
		 * @var PiezaCheckpointsH[] _objPiezaCheckpointsHAsCheckpointArray;
		 */
		private $_objPiezaCheckpointsHAsCheckpointArray = null;

		/**
		 * Private member variable that stores a reference to a single RegistroTrabajoAsCheckpoint object
		 * (of type RegistroTrabajo), if this Checkpoints object was restored with
		 * an expansion on the registro_trabajo association table.
		 * @var RegistroTrabajo _objRegistroTrabajoAsCheckpoint;
		 */
		private $_objRegistroTrabajoAsCheckpoint;

		/**
		 * Private member variable that stores a reference to an array of RegistroTrabajoAsCheckpoint objects
		 * (of type RegistroTrabajo[]), if this Checkpoints object was restored with
		 * an ExpandAsArray on the registro_trabajo association table.
		 * @var RegistroTrabajo[] _objRegistroTrabajoAsCheckpointArray;
		 */
		private $_objRegistroTrabajoAsCheckpointArray = null;

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
			$this->intId = Checkpoints::IdDefault;
			$this->strCodigo = Checkpoints::CodigoDefault;
			$this->strDescripcion = Checkpoints::DescripcionDefault;
			$this->strDescripcionRastreo = Checkpoints::DescripcionRastreoDefault;
			$this->blnTerminal = Checkpoints::TerminalDefault;
			$this->strVisibilidad = Checkpoints::VisibilidadDefault;
			$this->strTipo = Checkpoints::TipoDefault;
			$this->blnNotificar = Checkpoints::NotificarDefault;
			$this->strImagen = Checkpoints::ImagenDefault;
			$this->strColor = Checkpoints::ColorDefault;
			$this->strObservacion = Checkpoints::ObservacionDefault;
			$this->strCreatedAt = Checkpoints::CreatedAtDefault;
			$this->strUpdatedAt = Checkpoints::UpdatedAtDefault;
			$this->strDeletedAt = Checkpoints::DeletedAtDefault;
			$this->intCreatedBy = Checkpoints::CreatedByDefault;
			$this->intUpdatedBy = Checkpoints::UpdatedByDefault;
			$this->intDeletedBy = Checkpoints::DeletedByDefault;
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
		 * Load a Checkpoints from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Checkpoints
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Checkpoints', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Checkpoints::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Checkpoints()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Checkpointses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Checkpoints[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Checkpoints::QueryArray to perform the LoadAll query
			try {
				return Checkpoints::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Checkpointses
		 * @return int
		 */
		public static function CountAll() {
			// Call Checkpoints::QueryCount to perform the CountAll query
			return Checkpoints::QueryCount(QQ::All());
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
			$objDatabase = Checkpoints::GetDatabase();

			// Create/Build out the QueryBuilder object with Checkpoints-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'checkpoints');

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
				Checkpoints::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('checkpoints');

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
		 * Static Qcubed Query method to query for a single Checkpoints object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Checkpoints the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Checkpoints::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Checkpoints object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Checkpoints::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return Checkpoints::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Checkpoints objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Checkpoints[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Checkpoints::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Checkpoints::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Checkpoints::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Checkpoints objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Checkpoints::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Checkpoints::GetDatabase();

			$strQuery = Checkpoints::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/checkpoints', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Checkpoints::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Checkpoints
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'checkpoints';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'codigo', $strAliasPrefix . 'codigo');
			    $objBuilder->AddSelectItem($strTableName, 'descripcion', $strAliasPrefix . 'descripcion');
			    $objBuilder->AddSelectItem($strTableName, 'descripcion_rastreo', $strAliasPrefix . 'descripcion_rastreo');
			    $objBuilder->AddSelectItem($strTableName, 'terminal', $strAliasPrefix . 'terminal');
			    $objBuilder->AddSelectItem($strTableName, 'visibilidad', $strAliasPrefix . 'visibilidad');
			    $objBuilder->AddSelectItem($strTableName, 'tipo', $strAliasPrefix . 'tipo');
			    $objBuilder->AddSelectItem($strTableName, 'notificar', $strAliasPrefix . 'notificar');
			    $objBuilder->AddSelectItem($strTableName, 'imagen', $strAliasPrefix . 'imagen');
			    $objBuilder->AddSelectItem($strTableName, 'color', $strAliasPrefix . 'color');
			    $objBuilder->AddSelectItem($strTableName, 'observacion', $strAliasPrefix . 'observacion');
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
		 * Instantiate a Checkpoints from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Checkpoints::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Checkpoints, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (Checkpoints::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the Checkpoints object
			$objToReturn = new Checkpoints();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codigo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodigo = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'descripcion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescripcion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'descripcion_rastreo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescripcionRastreo = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'terminal';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnTerminal = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'visibilidad';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strVisibilidad = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tipo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTipo = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'notificar';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnNotificar = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'imagen';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strImagen = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'color';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strColor = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'observacion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strObservacion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'created_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCreatedAt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'updated_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strUpdatedAt = $objDbRow->GetColumn($strAliasName, 'VarChar');
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
				$strAliasPrefix = 'checkpoints__';


				

			// Check for ContainerCkptAsCheckpoint Virtual Binding
			$strAlias = $strAliasPrefix . 'containerckptascheckpoint__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['containerckptascheckpoint']) ? null : $objExpansionAliasArray['containerckptascheckpoint']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objContainerCkptAsCheckpointArray)
				$objToReturn->_objContainerCkptAsCheckpointArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objContainerCkptAsCheckpointArray[] = ContainerCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'containerckptascheckpoint__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objContainerCkptAsCheckpoint)) {
					$objToReturn->_objContainerCkptAsCheckpoint = ContainerCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'containerckptascheckpoint__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for ContenedorCkptAsCheckpoint Virtual Binding
			$strAlias = $strAliasPrefix . 'contenedorckptascheckpoint__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['contenedorckptascheckpoint']) ? null : $objExpansionAliasArray['contenedorckptascheckpoint']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objContenedorCkptAsCheckpointArray)
				$objToReturn->_objContenedorCkptAsCheckpointArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objContenedorCkptAsCheckpointArray[] = ContenedorCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'contenedorckptascheckpoint__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objContenedorCkptAsCheckpoint)) {
					$objToReturn->_objContenedorCkptAsCheckpoint = ContenedorCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'contenedorckptascheckpoint__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for HistoriaClienteAsCheckpoint Virtual Binding
			$strAlias = $strAliasPrefix . 'historiaclienteascheckpoint__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['historiaclienteascheckpoint']) ? null : $objExpansionAliasArray['historiaclienteascheckpoint']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objHistoriaClienteAsCheckpointArray)
				$objToReturn->_objHistoriaClienteAsCheckpointArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objHistoriaClienteAsCheckpointArray[] = HistoriaCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'historiaclienteascheckpoint__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objHistoriaClienteAsCheckpoint)) {
					$objToReturn->_objHistoriaClienteAsCheckpoint = HistoriaCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'historiaclienteascheckpoint__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for NotaEntregaCkptAsCheckpoint Virtual Binding
			$strAlias = $strAliasPrefix . 'notaentregackptascheckpoint__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['notaentregackptascheckpoint']) ? null : $objExpansionAliasArray['notaentregackptascheckpoint']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objNotaEntregaCkptAsCheckpointArray)
				$objToReturn->_objNotaEntregaCkptAsCheckpointArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objNotaEntregaCkptAsCheckpointArray[] = NotaEntregaCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notaentregackptascheckpoint__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objNotaEntregaCkptAsCheckpoint)) {
					$objToReturn->_objNotaEntregaCkptAsCheckpoint = NotaEntregaCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notaentregackptascheckpoint__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for NotaEntregaCkptHAsCheckpoint Virtual Binding
			$strAlias = $strAliasPrefix . 'notaentregackpthascheckpoint__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['notaentregackpthascheckpoint']) ? null : $objExpansionAliasArray['notaentregackpthascheckpoint']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objNotaEntregaCkptHAsCheckpointArray)
				$objToReturn->_objNotaEntregaCkptHAsCheckpointArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objNotaEntregaCkptHAsCheckpointArray[] = NotaEntregaCkptH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notaentregackpthascheckpoint__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objNotaEntregaCkptHAsCheckpoint)) {
					$objToReturn->_objNotaEntregaCkptHAsCheckpoint = NotaEntregaCkptH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notaentregackpthascheckpoint__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for NotificacionAsCheckpoint Virtual Binding
			$strAlias = $strAliasPrefix . 'notificacionascheckpoint__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['notificacionascheckpoint']) ? null : $objExpansionAliasArray['notificacionascheckpoint']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objNotificacionAsCheckpointArray)
				$objToReturn->_objNotificacionAsCheckpointArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objNotificacionAsCheckpointArray[] = Notificacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notificacionascheckpoint__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objNotificacionAsCheckpoint)) {
					$objToReturn->_objNotificacionAsCheckpoint = Notificacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notificacionascheckpoint__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for PiezaCheckpointsAsCheckpoint Virtual Binding
			$strAlias = $strAliasPrefix . 'piezacheckpointsascheckpoint__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['piezacheckpointsascheckpoint']) ? null : $objExpansionAliasArray['piezacheckpointsascheckpoint']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objPiezaCheckpointsAsCheckpointArray)
				$objToReturn->_objPiezaCheckpointsAsCheckpointArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objPiezaCheckpointsAsCheckpointArray[] = PiezaCheckpoints::InstantiateDbRow($objDbRow, $strAliasPrefix . 'piezacheckpointsascheckpoint__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objPiezaCheckpointsAsCheckpoint)) {
					$objToReturn->_objPiezaCheckpointsAsCheckpoint = PiezaCheckpoints::InstantiateDbRow($objDbRow, $strAliasPrefix . 'piezacheckpointsascheckpoint__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for PiezaCheckpointsHAsCheckpoint Virtual Binding
			$strAlias = $strAliasPrefix . 'piezacheckpointshascheckpoint__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['piezacheckpointshascheckpoint']) ? null : $objExpansionAliasArray['piezacheckpointshascheckpoint']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objPiezaCheckpointsHAsCheckpointArray)
				$objToReturn->_objPiezaCheckpointsHAsCheckpointArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objPiezaCheckpointsHAsCheckpointArray[] = PiezaCheckpointsH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'piezacheckpointshascheckpoint__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objPiezaCheckpointsHAsCheckpoint)) {
					$objToReturn->_objPiezaCheckpointsHAsCheckpoint = PiezaCheckpointsH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'piezacheckpointshascheckpoint__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for RegistroTrabajoAsCheckpoint Virtual Binding
			$strAlias = $strAliasPrefix . 'registrotrabajoascheckpoint__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['registrotrabajoascheckpoint']) ? null : $objExpansionAliasArray['registrotrabajoascheckpoint']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objRegistroTrabajoAsCheckpointArray)
				$objToReturn->_objRegistroTrabajoAsCheckpointArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objRegistroTrabajoAsCheckpointArray[] = RegistroTrabajo::InstantiateDbRow($objDbRow, $strAliasPrefix . 'registrotrabajoascheckpoint__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objRegistroTrabajoAsCheckpoint)) {
					$objToReturn->_objRegistroTrabajoAsCheckpoint = RegistroTrabajo::InstantiateDbRow($objDbRow, $strAliasPrefix . 'registrotrabajoascheckpoint__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Checkpointses from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Checkpoints[]
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
					$objItem = Checkpoints::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Checkpoints::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Checkpoints object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Checkpoints next row resulting from the query
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
			return Checkpoints::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Checkpoints object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Checkpoints
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Checkpoints::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Checkpoints()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single Checkpoints object,
		 * by Codigo Index(es)
		 * @param string $strCodigo
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Checkpoints
		*/
		public static function LoadByCodigo($strCodigo, $objOptionalClauses = null) {
			return Checkpoints::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Checkpoints()->Codigo, $strCodigo)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of Checkpoints objects,
		 * by Tipo Index(es)
		 * @param string $strTipo
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Checkpoints[]
		*/
		public static function LoadArrayByTipo($strTipo, $objOptionalClauses = null) {
			// Call Checkpoints::QueryArray to perform the LoadArrayByTipo query
			try {
				return Checkpoints::QueryArray(
					QQ::Equal(QQN::Checkpoints()->Tipo, $strTipo),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Checkpointses
		 * by Tipo Index(es)
		 * @param string $strTipo
		 * @return int
		*/
		public static function CountByTipo($strTipo) {
			// Call Checkpoints::QueryCount to perform the CountByTipo query
			return Checkpoints::QueryCount(
				QQ::Equal(QQN::Checkpoints()->Tipo, $strTipo)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Checkpoints
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `checkpoints` (
							`codigo`,
							`descripcion`,
							`descripcion_rastreo`,
							`terminal`,
							`visibilidad`,
							`tipo`,
							`notificar`,
							`imagen`,
							`color`,
							`observacion`,
							`created_by`,
							`updated_by`,
							`deleted_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strCodigo) . ',
							' . $objDatabase->SqlVariable($this->strDescripcion) . ',
							' . $objDatabase->SqlVariable($this->strDescripcionRastreo) . ',
							' . $objDatabase->SqlVariable($this->blnTerminal) . ',
							' . $objDatabase->SqlVariable($this->strVisibilidad) . ',
							' . $objDatabase->SqlVariable($this->strTipo) . ',
							' . $objDatabase->SqlVariable($this->blnNotificar) . ',
							' . $objDatabase->SqlVariable($this->strImagen) . ',
							' . $objDatabase->SqlVariable($this->strColor) . ',
							' . $objDatabase->SqlVariable($this->strObservacion) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->intUpdatedBy) . ',
							' . $objDatabase->SqlVariable($this->intDeletedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('checkpoints', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`created_at`
							FROM
								`checkpoints`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strCreatedAt)
							throw new QOptimisticLockingException('Checkpoints');
					}
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`updated_at`
							FROM
								`checkpoints`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strUpdatedAt)
							throw new QOptimisticLockingException('Checkpoints');
					}
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`deleted_at`
							FROM
								`checkpoints`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strDeletedAt)
							throw new QOptimisticLockingException('Checkpoints');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`checkpoints`
						SET
							`codigo` = ' . $objDatabase->SqlVariable($this->strCodigo) . ',
							`descripcion` = ' . $objDatabase->SqlVariable($this->strDescripcion) . ',
							`descripcion_rastreo` = ' . $objDatabase->SqlVariable($this->strDescripcionRastreo) . ',
							`terminal` = ' . $objDatabase->SqlVariable($this->blnTerminal) . ',
							`visibilidad` = ' . $objDatabase->SqlVariable($this->strVisibilidad) . ',
							`tipo` = ' . $objDatabase->SqlVariable($this->strTipo) . ',
							`notificar` = ' . $objDatabase->SqlVariable($this->blnNotificar) . ',
							`imagen` = ' . $objDatabase->SqlVariable($this->strImagen) . ',
							`color` = ' . $objDatabase->SqlVariable($this->strColor) . ',
							`observacion` = ' . $objDatabase->SqlVariable($this->strObservacion) . ',
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
					`created_at`
				FROM
					`checkpoints`
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
					`checkpoints`
				WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			$objRow = $objResult->FetchArray();
			$this->strUpdatedAt = $objRow[0];
			// Update Local Timestamp
			$objResult = $objDatabase->Query('
				SELECT
					`deleted_at`
				FROM
					`checkpoints`
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
		 * Delete this Checkpoints
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Checkpoints with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`checkpoints`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Checkpoints ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Checkpoints', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Checkpointses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`checkpoints`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate checkpoints table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `checkpoints`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Checkpoints from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Checkpoints object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Checkpoints::Load($this->intId);

			// Update $this's local variables to match
			$this->strCodigo = $objReloaded->strCodigo;
			$this->strDescripcion = $objReloaded->strDescripcion;
			$this->strDescripcionRastreo = $objReloaded->strDescripcionRastreo;
			$this->blnTerminal = $objReloaded->blnTerminal;
			$this->strVisibilidad = $objReloaded->strVisibilidad;
			$this->strTipo = $objReloaded->strTipo;
			$this->blnNotificar = $objReloaded->blnNotificar;
			$this->strImagen = $objReloaded->strImagen;
			$this->strColor = $objReloaded->strColor;
			$this->strObservacion = $objReloaded->strObservacion;
			$this->strCreatedAt = $objReloaded->strCreatedAt;
			$this->strUpdatedAt = $objReloaded->strUpdatedAt;
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

				case 'Codigo':
					/**
					 * Gets the value for strCodigo (Unique)
					 * @return string
					 */
					return $this->strCodigo;

				case 'Descripcion':
					/**
					 * Gets the value for strDescripcion (Not Null)
					 * @return string
					 */
					return $this->strDescripcion;

				case 'DescripcionRastreo':
					/**
					 * Gets the value for strDescripcionRastreo (Not Null)
					 * @return string
					 */
					return $this->strDescripcionRastreo;

				case 'Terminal':
					/**
					 * Gets the value for blnTerminal (Not Null)
					 * @return boolean
					 */
					return $this->blnTerminal;

				case 'Visibilidad':
					/**
					 * Gets the value for strVisibilidad (Not Null)
					 * @return string
					 */
					return $this->strVisibilidad;

				case 'Tipo':
					/**
					 * Gets the value for strTipo (Not Null)
					 * @return string
					 */
					return $this->strTipo;

				case 'Notificar':
					/**
					 * Gets the value for blnNotificar (Not Null)
					 * @return boolean
					 */
					return $this->blnNotificar;

				case 'Imagen':
					/**
					 * Gets the value for strImagen 
					 * @return string
					 */
					return $this->strImagen;

				case 'Color':
					/**
					 * Gets the value for strColor 
					 * @return string
					 */
					return $this->strColor;

				case 'Observacion':
					/**
					 * Gets the value for strObservacion 
					 * @return string
					 */
					return $this->strObservacion;

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

				case '_ContainerCkptAsCheckpoint':
					/**
					 * Gets the value for the private _objContainerCkptAsCheckpoint (Read-Only)
					 * if set due to an expansion on the container_ckpt.checkpoint_id reverse relationship
					 * @return ContainerCkpt
					 */
					return $this->_objContainerCkptAsCheckpoint;

				case '_ContainerCkptAsCheckpointArray':
					/**
					 * Gets the value for the private _objContainerCkptAsCheckpointArray (Read-Only)
					 * if set due to an ExpandAsArray on the container_ckpt.checkpoint_id reverse relationship
					 * @return ContainerCkpt[]
					 */
					return $this->_objContainerCkptAsCheckpointArray;

				case '_ContenedorCkptAsCheckpoint':
					/**
					 * Gets the value for the private _objContenedorCkptAsCheckpoint (Read-Only)
					 * if set due to an expansion on the contenedor_ckpt.checkpoint_id reverse relationship
					 * @return ContenedorCkpt
					 */
					return $this->_objContenedorCkptAsCheckpoint;

				case '_ContenedorCkptAsCheckpointArray':
					/**
					 * Gets the value for the private _objContenedorCkptAsCheckpointArray (Read-Only)
					 * if set due to an ExpandAsArray on the contenedor_ckpt.checkpoint_id reverse relationship
					 * @return ContenedorCkpt[]
					 */
					return $this->_objContenedorCkptAsCheckpointArray;

				case '_HistoriaClienteAsCheckpoint':
					/**
					 * Gets the value for the private _objHistoriaClienteAsCheckpoint (Read-Only)
					 * if set due to an expansion on the historia_cliente.checkpoint_id reverse relationship
					 * @return HistoriaCliente
					 */
					return $this->_objHistoriaClienteAsCheckpoint;

				case '_HistoriaClienteAsCheckpointArray':
					/**
					 * Gets the value for the private _objHistoriaClienteAsCheckpointArray (Read-Only)
					 * if set due to an ExpandAsArray on the historia_cliente.checkpoint_id reverse relationship
					 * @return HistoriaCliente[]
					 */
					return $this->_objHistoriaClienteAsCheckpointArray;

				case '_NotaEntregaCkptAsCheckpoint':
					/**
					 * Gets the value for the private _objNotaEntregaCkptAsCheckpoint (Read-Only)
					 * if set due to an expansion on the nota_entrega_ckpt.checkpoint_id reverse relationship
					 * @return NotaEntregaCkpt
					 */
					return $this->_objNotaEntregaCkptAsCheckpoint;

				case '_NotaEntregaCkptAsCheckpointArray':
					/**
					 * Gets the value for the private _objNotaEntregaCkptAsCheckpointArray (Read-Only)
					 * if set due to an ExpandAsArray on the nota_entrega_ckpt.checkpoint_id reverse relationship
					 * @return NotaEntregaCkpt[]
					 */
					return $this->_objNotaEntregaCkptAsCheckpointArray;

				case '_NotaEntregaCkptHAsCheckpoint':
					/**
					 * Gets the value for the private _objNotaEntregaCkptHAsCheckpoint (Read-Only)
					 * if set due to an expansion on the nota_entrega_ckpt_h.checkpoint_id reverse relationship
					 * @return NotaEntregaCkptH
					 */
					return $this->_objNotaEntregaCkptHAsCheckpoint;

				case '_NotaEntregaCkptHAsCheckpointArray':
					/**
					 * Gets the value for the private _objNotaEntregaCkptHAsCheckpointArray (Read-Only)
					 * if set due to an ExpandAsArray on the nota_entrega_ckpt_h.checkpoint_id reverse relationship
					 * @return NotaEntregaCkptH[]
					 */
					return $this->_objNotaEntregaCkptHAsCheckpointArray;

				case '_NotificacionAsCheckpoint':
					/**
					 * Gets the value for the private _objNotificacionAsCheckpoint (Read-Only)
					 * if set due to an expansion on the notificacion.checkpoint_id reverse relationship
					 * @return Notificacion
					 */
					return $this->_objNotificacionAsCheckpoint;

				case '_NotificacionAsCheckpointArray':
					/**
					 * Gets the value for the private _objNotificacionAsCheckpointArray (Read-Only)
					 * if set due to an ExpandAsArray on the notificacion.checkpoint_id reverse relationship
					 * @return Notificacion[]
					 */
					return $this->_objNotificacionAsCheckpointArray;

				case '_PiezaCheckpointsAsCheckpoint':
					/**
					 * Gets the value for the private _objPiezaCheckpointsAsCheckpoint (Read-Only)
					 * if set due to an expansion on the pieza_checkpoints.checkpoint_id reverse relationship
					 * @return PiezaCheckpoints
					 */
					return $this->_objPiezaCheckpointsAsCheckpoint;

				case '_PiezaCheckpointsAsCheckpointArray':
					/**
					 * Gets the value for the private _objPiezaCheckpointsAsCheckpointArray (Read-Only)
					 * if set due to an ExpandAsArray on the pieza_checkpoints.checkpoint_id reverse relationship
					 * @return PiezaCheckpoints[]
					 */
					return $this->_objPiezaCheckpointsAsCheckpointArray;

				case '_PiezaCheckpointsHAsCheckpoint':
					/**
					 * Gets the value for the private _objPiezaCheckpointsHAsCheckpoint (Read-Only)
					 * if set due to an expansion on the pieza_checkpoints_h.checkpoint_id reverse relationship
					 * @return PiezaCheckpointsH
					 */
					return $this->_objPiezaCheckpointsHAsCheckpoint;

				case '_PiezaCheckpointsHAsCheckpointArray':
					/**
					 * Gets the value for the private _objPiezaCheckpointsHAsCheckpointArray (Read-Only)
					 * if set due to an ExpandAsArray on the pieza_checkpoints_h.checkpoint_id reverse relationship
					 * @return PiezaCheckpointsH[]
					 */
					return $this->_objPiezaCheckpointsHAsCheckpointArray;

				case '_RegistroTrabajoAsCheckpoint':
					/**
					 * Gets the value for the private _objRegistroTrabajoAsCheckpoint (Read-Only)
					 * if set due to an expansion on the registro_trabajo.checkpoint_id reverse relationship
					 * @return RegistroTrabajo
					 */
					return $this->_objRegistroTrabajoAsCheckpoint;

				case '_RegistroTrabajoAsCheckpointArray':
					/**
					 * Gets the value for the private _objRegistroTrabajoAsCheckpointArray (Read-Only)
					 * if set due to an ExpandAsArray on the registro_trabajo.checkpoint_id reverse relationship
					 * @return RegistroTrabajo[]
					 */
					return $this->_objRegistroTrabajoAsCheckpointArray;


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
				case 'Codigo':
					/**
					 * Sets the value for strCodigo (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCodigo = QType::Cast($mixValue, QType::String));
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

				case 'DescripcionRastreo':
					/**
					 * Sets the value for strDescripcionRastreo (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescripcionRastreo = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Terminal':
					/**
					 * Sets the value for blnTerminal (Not Null)
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnTerminal = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Visibilidad':
					/**
					 * Sets the value for strVisibilidad (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strVisibilidad = QType::Cast($mixValue, QType::String));
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

				case 'Notificar':
					/**
					 * Sets the value for blnNotificar (Not Null)
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnNotificar = QType::Cast($mixValue, QType::Boolean));
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

				case 'Color':
					/**
					 * Sets the value for strColor 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strColor = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Observacion':
					/**
					 * Sets the value for strObservacion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strObservacion = QType::Cast($mixValue, QType::String));
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
			if ($this->CountContainerCkptsAsCheckpoint()) {
				$arrTablRela[] = 'container_ckpt';
			}
			if ($this->CountContenedorCkptsAsCheckpoint()) {
				$arrTablRela[] = 'contenedor_ckpt';
			}
			if ($this->CountHistoriaClientesAsCheckpoint()) {
				$arrTablRela[] = 'historia_cliente';
			}
			if ($this->CountNotaEntregaCkptsAsCheckpoint()) {
				$arrTablRela[] = 'nota_entrega_ckpt';
			}
			if ($this->CountNotaEntregaCkptHsAsCheckpoint()) {
				$arrTablRela[] = 'nota_entrega_ckpt_h';
			}
			if ($this->CountNotificacionsAsCheckpoint()) {
				$arrTablRela[] = 'notificacion';
			}
			if ($this->CountPiezaCheckpointsesAsCheckpoint()) {
				$arrTablRela[] = 'pieza_checkpoints';
			}
			if ($this->CountPiezaCheckpointsHsAsCheckpoint()) {
				$arrTablRela[] = 'pieza_checkpoints_h';
			}
			if ($this->CountRegistroTrabajosAsCheckpoint()) {
				$arrTablRela[] = 'registro_trabajo';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for ContainerCkptAsCheckpoint
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ContainerCkptsAsCheckpoint as an array of ContainerCkpt objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ContainerCkpt[]
		*/
		public function GetContainerCkptAsCheckpointArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ContainerCkpt::LoadArrayByCheckpointId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ContainerCkptsAsCheckpoint
		 * @return int
		*/
		public function CountContainerCkptsAsCheckpoint() {
			if ((is_null($this->intId)))
				return 0;

			return ContainerCkpt::CountByCheckpointId($this->intId);
		}

		/**
		 * Associates a ContainerCkptAsCheckpoint
		 * @param ContainerCkpt $objContainerCkpt
		 * @return void
		*/
		public function AssociateContainerCkptAsCheckpoint(ContainerCkpt $objContainerCkpt) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateContainerCkptAsCheckpoint on this unsaved Checkpoints.');
			if ((is_null($objContainerCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateContainerCkptAsCheckpoint on this Checkpoints with an unsaved ContainerCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`container_ckpt`
				SET
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContainerCkpt->Id) . '
			');
		}

		/**
		 * Unassociates a ContainerCkptAsCheckpoint
		 * @param ContainerCkpt $objContainerCkpt
		 * @return void
		*/
		public function UnassociateContainerCkptAsCheckpoint(ContainerCkpt $objContainerCkpt) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainerCkptAsCheckpoint on this unsaved Checkpoints.');
			if ((is_null($objContainerCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainerCkptAsCheckpoint on this Checkpoints with an unsaved ContainerCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`container_ckpt`
				SET
					`checkpoint_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContainerCkpt->Id) . ' AND
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all ContainerCkptsAsCheckpoint
		 * @return void
		*/
		public function UnassociateAllContainerCkptsAsCheckpoint() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainerCkptAsCheckpoint on this unsaved Checkpoints.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`container_ckpt`
				SET
					`checkpoint_id` = null
				WHERE
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ContainerCkptAsCheckpoint
		 * @param ContainerCkpt $objContainerCkpt
		 * @return void
		*/
		public function DeleteAssociatedContainerCkptAsCheckpoint(ContainerCkpt $objContainerCkpt) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainerCkptAsCheckpoint on this unsaved Checkpoints.');
			if ((is_null($objContainerCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainerCkptAsCheckpoint on this Checkpoints with an unsaved ContainerCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`container_ckpt`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContainerCkpt->Id) . ' AND
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated ContainerCkptsAsCheckpoint
		 * @return void
		*/
		public function DeleteAllContainerCkptsAsCheckpoint() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainerCkptAsCheckpoint on this unsaved Checkpoints.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`container_ckpt`
				WHERE
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for ContenedorCkptAsCheckpoint
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ContenedorCkptsAsCheckpoint as an array of ContenedorCkpt objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ContenedorCkpt[]
		*/
		public function GetContenedorCkptAsCheckpointArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ContenedorCkpt::LoadArrayByCheckpointId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ContenedorCkptsAsCheckpoint
		 * @return int
		*/
		public function CountContenedorCkptsAsCheckpoint() {
			if ((is_null($this->intId)))
				return 0;

			return ContenedorCkpt::CountByCheckpointId($this->intId);
		}

		/**
		 * Associates a ContenedorCkptAsCheckpoint
		 * @param ContenedorCkpt $objContenedorCkpt
		 * @return void
		*/
		public function AssociateContenedorCkptAsCheckpoint(ContenedorCkpt $objContenedorCkpt) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateContenedorCkptAsCheckpoint on this unsaved Checkpoints.');
			if ((is_null($objContenedorCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateContenedorCkptAsCheckpoint on this Checkpoints with an unsaved ContenedorCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`contenedor_ckpt`
				SET
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContenedorCkpt->Id) . '
			');
		}

		/**
		 * Unassociates a ContenedorCkptAsCheckpoint
		 * @param ContenedorCkpt $objContenedorCkpt
		 * @return void
		*/
		public function UnassociateContenedorCkptAsCheckpoint(ContenedorCkpt $objContenedorCkpt) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContenedorCkptAsCheckpoint on this unsaved Checkpoints.');
			if ((is_null($objContenedorCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContenedorCkptAsCheckpoint on this Checkpoints with an unsaved ContenedorCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`contenedor_ckpt`
				SET
					`checkpoint_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContenedorCkpt->Id) . ' AND
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all ContenedorCkptsAsCheckpoint
		 * @return void
		*/
		public function UnassociateAllContenedorCkptsAsCheckpoint() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContenedorCkptAsCheckpoint on this unsaved Checkpoints.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`contenedor_ckpt`
				SET
					`checkpoint_id` = null
				WHERE
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ContenedorCkptAsCheckpoint
		 * @param ContenedorCkpt $objContenedorCkpt
		 * @return void
		*/
		public function DeleteAssociatedContenedorCkptAsCheckpoint(ContenedorCkpt $objContenedorCkpt) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContenedorCkptAsCheckpoint on this unsaved Checkpoints.');
			if ((is_null($objContenedorCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContenedorCkptAsCheckpoint on this Checkpoints with an unsaved ContenedorCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`contenedor_ckpt`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContenedorCkpt->Id) . ' AND
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated ContenedorCkptsAsCheckpoint
		 * @return void
		*/
		public function DeleteAllContenedorCkptsAsCheckpoint() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContenedorCkptAsCheckpoint on this unsaved Checkpoints.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`contenedor_ckpt`
				WHERE
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for HistoriaClienteAsCheckpoint
		//-------------------------------------------------------------------

		/**
		 * Gets all associated HistoriaClientesAsCheckpoint as an array of HistoriaCliente objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return HistoriaCliente[]
		*/
		public function GetHistoriaClienteAsCheckpointArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return HistoriaCliente::LoadArrayByCheckpointId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated HistoriaClientesAsCheckpoint
		 * @return int
		*/
		public function CountHistoriaClientesAsCheckpoint() {
			if ((is_null($this->intId)))
				return 0;

			return HistoriaCliente::CountByCheckpointId($this->intId);
		}

		/**
		 * Associates a HistoriaClienteAsCheckpoint
		 * @param HistoriaCliente $objHistoriaCliente
		 * @return void
		*/
		public function AssociateHistoriaClienteAsCheckpoint(HistoriaCliente $objHistoriaCliente) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateHistoriaClienteAsCheckpoint on this unsaved Checkpoints.');
			if ((is_null($objHistoriaCliente->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateHistoriaClienteAsCheckpoint on this Checkpoints with an unsaved HistoriaCliente.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`historia_cliente`
				SET
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objHistoriaCliente->Id) . '
			');
		}

		/**
		 * Unassociates a HistoriaClienteAsCheckpoint
		 * @param HistoriaCliente $objHistoriaCliente
		 * @return void
		*/
		public function UnassociateHistoriaClienteAsCheckpoint(HistoriaCliente $objHistoriaCliente) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHistoriaClienteAsCheckpoint on this unsaved Checkpoints.');
			if ((is_null($objHistoriaCliente->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHistoriaClienteAsCheckpoint on this Checkpoints with an unsaved HistoriaCliente.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`historia_cliente`
				SET
					`checkpoint_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objHistoriaCliente->Id) . ' AND
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all HistoriaClientesAsCheckpoint
		 * @return void
		*/
		public function UnassociateAllHistoriaClientesAsCheckpoint() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHistoriaClienteAsCheckpoint on this unsaved Checkpoints.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`historia_cliente`
				SET
					`checkpoint_id` = null
				WHERE
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated HistoriaClienteAsCheckpoint
		 * @param HistoriaCliente $objHistoriaCliente
		 * @return void
		*/
		public function DeleteAssociatedHistoriaClienteAsCheckpoint(HistoriaCliente $objHistoriaCliente) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHistoriaClienteAsCheckpoint on this unsaved Checkpoints.');
			if ((is_null($objHistoriaCliente->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHistoriaClienteAsCheckpoint on this Checkpoints with an unsaved HistoriaCliente.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`historia_cliente`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objHistoriaCliente->Id) . ' AND
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated HistoriaClientesAsCheckpoint
		 * @return void
		*/
		public function DeleteAllHistoriaClientesAsCheckpoint() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHistoriaClienteAsCheckpoint on this unsaved Checkpoints.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`historia_cliente`
				WHERE
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for NotaEntregaCkptAsCheckpoint
		//-------------------------------------------------------------------

		/**
		 * Gets all associated NotaEntregaCkptsAsCheckpoint as an array of NotaEntregaCkpt objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaEntregaCkpt[]
		*/
		public function GetNotaEntregaCkptAsCheckpointArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return NotaEntregaCkpt::LoadArrayByCheckpointId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated NotaEntregaCkptsAsCheckpoint
		 * @return int
		*/
		public function CountNotaEntregaCkptsAsCheckpoint() {
			if ((is_null($this->intId)))
				return 0;

			return NotaEntregaCkpt::CountByCheckpointId($this->intId);
		}

		/**
		 * Associates a NotaEntregaCkptAsCheckpoint
		 * @param NotaEntregaCkpt $objNotaEntregaCkpt
		 * @return void
		*/
		public function AssociateNotaEntregaCkptAsCheckpoint(NotaEntregaCkpt $objNotaEntregaCkpt) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaEntregaCkptAsCheckpoint on this unsaved Checkpoints.');
			if ((is_null($objNotaEntregaCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaEntregaCkptAsCheckpoint on this Checkpoints with an unsaved NotaEntregaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega_ckpt`
				SET
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntregaCkpt->Id) . '
			');
		}

		/**
		 * Unassociates a NotaEntregaCkptAsCheckpoint
		 * @param NotaEntregaCkpt $objNotaEntregaCkpt
		 * @return void
		*/
		public function UnassociateNotaEntregaCkptAsCheckpoint(NotaEntregaCkpt $objNotaEntregaCkpt) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaCkptAsCheckpoint on this unsaved Checkpoints.');
			if ((is_null($objNotaEntregaCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaCkptAsCheckpoint on this Checkpoints with an unsaved NotaEntregaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega_ckpt`
				SET
					`checkpoint_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntregaCkpt->Id) . ' AND
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all NotaEntregaCkptsAsCheckpoint
		 * @return void
		*/
		public function UnassociateAllNotaEntregaCkptsAsCheckpoint() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaCkptAsCheckpoint on this unsaved Checkpoints.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega_ckpt`
				SET
					`checkpoint_id` = null
				WHERE
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated NotaEntregaCkptAsCheckpoint
		 * @param NotaEntregaCkpt $objNotaEntregaCkpt
		 * @return void
		*/
		public function DeleteAssociatedNotaEntregaCkptAsCheckpoint(NotaEntregaCkpt $objNotaEntregaCkpt) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaCkptAsCheckpoint on this unsaved Checkpoints.');
			if ((is_null($objNotaEntregaCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaCkptAsCheckpoint on this Checkpoints with an unsaved NotaEntregaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_entrega_ckpt`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntregaCkpt->Id) . ' AND
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated NotaEntregaCkptsAsCheckpoint
		 * @return void
		*/
		public function DeleteAllNotaEntregaCkptsAsCheckpoint() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaCkptAsCheckpoint on this unsaved Checkpoints.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_entrega_ckpt`
				WHERE
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for NotaEntregaCkptHAsCheckpoint
		//-------------------------------------------------------------------

		/**
		 * Gets all associated NotaEntregaCkptHsAsCheckpoint as an array of NotaEntregaCkptH objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaEntregaCkptH[]
		*/
		public function GetNotaEntregaCkptHAsCheckpointArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return NotaEntregaCkptH::LoadArrayByCheckpointId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated NotaEntregaCkptHsAsCheckpoint
		 * @return int
		*/
		public function CountNotaEntregaCkptHsAsCheckpoint() {
			if ((is_null($this->intId)))
				return 0;

			return NotaEntregaCkptH::CountByCheckpointId($this->intId);
		}

		/**
		 * Associates a NotaEntregaCkptHAsCheckpoint
		 * @param NotaEntregaCkptH $objNotaEntregaCkptH
		 * @return void
		*/
		public function AssociateNotaEntregaCkptHAsCheckpoint(NotaEntregaCkptH $objNotaEntregaCkptH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaEntregaCkptHAsCheckpoint on this unsaved Checkpoints.');
			if ((is_null($objNotaEntregaCkptH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaEntregaCkptHAsCheckpoint on this Checkpoints with an unsaved NotaEntregaCkptH.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega_ckpt_h`
				SET
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntregaCkptH->Id) . '
			');
		}

		/**
		 * Unassociates a NotaEntregaCkptHAsCheckpoint
		 * @param NotaEntregaCkptH $objNotaEntregaCkptH
		 * @return void
		*/
		public function UnassociateNotaEntregaCkptHAsCheckpoint(NotaEntregaCkptH $objNotaEntregaCkptH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaCkptHAsCheckpoint on this unsaved Checkpoints.');
			if ((is_null($objNotaEntregaCkptH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaCkptHAsCheckpoint on this Checkpoints with an unsaved NotaEntregaCkptH.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega_ckpt_h`
				SET
					`checkpoint_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntregaCkptH->Id) . ' AND
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all NotaEntregaCkptHsAsCheckpoint
		 * @return void
		*/
		public function UnassociateAllNotaEntregaCkptHsAsCheckpoint() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaCkptHAsCheckpoint on this unsaved Checkpoints.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega_ckpt_h`
				SET
					`checkpoint_id` = null
				WHERE
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated NotaEntregaCkptHAsCheckpoint
		 * @param NotaEntregaCkptH $objNotaEntregaCkptH
		 * @return void
		*/
		public function DeleteAssociatedNotaEntregaCkptHAsCheckpoint(NotaEntregaCkptH $objNotaEntregaCkptH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaCkptHAsCheckpoint on this unsaved Checkpoints.');
			if ((is_null($objNotaEntregaCkptH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaCkptHAsCheckpoint on this Checkpoints with an unsaved NotaEntregaCkptH.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_entrega_ckpt_h`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntregaCkptH->Id) . ' AND
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated NotaEntregaCkptHsAsCheckpoint
		 * @return void
		*/
		public function DeleteAllNotaEntregaCkptHsAsCheckpoint() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaCkptHAsCheckpoint on this unsaved Checkpoints.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_entrega_ckpt_h`
				WHERE
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for NotificacionAsCheckpoint
		//-------------------------------------------------------------------

		/**
		 * Gets all associated NotificacionsAsCheckpoint as an array of Notificacion objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Notificacion[]
		*/
		public function GetNotificacionAsCheckpointArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Notificacion::LoadArrayByCheckpointId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated NotificacionsAsCheckpoint
		 * @return int
		*/
		public function CountNotificacionsAsCheckpoint() {
			if ((is_null($this->intId)))
				return 0;

			return Notificacion::CountByCheckpointId($this->intId);
		}

		/**
		 * Associates a NotificacionAsCheckpoint
		 * @param Notificacion $objNotificacion
		 * @return void
		*/
		public function AssociateNotificacionAsCheckpoint(Notificacion $objNotificacion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotificacionAsCheckpoint on this unsaved Checkpoints.');
			if ((is_null($objNotificacion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotificacionAsCheckpoint on this Checkpoints with an unsaved Notificacion.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`notificacion`
				SET
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotificacion->Id) . '
			');
		}

		/**
		 * Unassociates a NotificacionAsCheckpoint
		 * @param Notificacion $objNotificacion
		 * @return void
		*/
		public function UnassociateNotificacionAsCheckpoint(Notificacion $objNotificacion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotificacionAsCheckpoint on this unsaved Checkpoints.');
			if ((is_null($objNotificacion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotificacionAsCheckpoint on this Checkpoints with an unsaved Notificacion.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`notificacion`
				SET
					`checkpoint_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotificacion->Id) . ' AND
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all NotificacionsAsCheckpoint
		 * @return void
		*/
		public function UnassociateAllNotificacionsAsCheckpoint() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotificacionAsCheckpoint on this unsaved Checkpoints.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`notificacion`
				SET
					`checkpoint_id` = null
				WHERE
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated NotificacionAsCheckpoint
		 * @param Notificacion $objNotificacion
		 * @return void
		*/
		public function DeleteAssociatedNotificacionAsCheckpoint(Notificacion $objNotificacion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotificacionAsCheckpoint on this unsaved Checkpoints.');
			if ((is_null($objNotificacion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotificacionAsCheckpoint on this Checkpoints with an unsaved Notificacion.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`notificacion`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotificacion->Id) . ' AND
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated NotificacionsAsCheckpoint
		 * @return void
		*/
		public function DeleteAllNotificacionsAsCheckpoint() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotificacionAsCheckpoint on this unsaved Checkpoints.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`notificacion`
				WHERE
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for PiezaCheckpointsAsCheckpoint
		//-------------------------------------------------------------------

		/**
		 * Gets all associated PiezaCheckpointsesAsCheckpoint as an array of PiezaCheckpoints objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PiezaCheckpoints[]
		*/
		public function GetPiezaCheckpointsAsCheckpointArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return PiezaCheckpoints::LoadArrayByCheckpointId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated PiezaCheckpointsesAsCheckpoint
		 * @return int
		*/
		public function CountPiezaCheckpointsesAsCheckpoint() {
			if ((is_null($this->intId)))
				return 0;

			return PiezaCheckpoints::CountByCheckpointId($this->intId);
		}

		/**
		 * Associates a PiezaCheckpointsAsCheckpoint
		 * @param PiezaCheckpoints $objPiezaCheckpoints
		 * @return void
		*/
		public function AssociatePiezaCheckpointsAsCheckpoint(PiezaCheckpoints $objPiezaCheckpoints) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePiezaCheckpointsAsCheckpoint on this unsaved Checkpoints.');
			if ((is_null($objPiezaCheckpoints->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePiezaCheckpointsAsCheckpoint on this Checkpoints with an unsaved PiezaCheckpoints.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pieza_checkpoints`
				SET
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPiezaCheckpoints->Id) . '
			');
		}

		/**
		 * Unassociates a PiezaCheckpointsAsCheckpoint
		 * @param PiezaCheckpoints $objPiezaCheckpoints
		 * @return void
		*/
		public function UnassociatePiezaCheckpointsAsCheckpoint(PiezaCheckpoints $objPiezaCheckpoints) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsAsCheckpoint on this unsaved Checkpoints.');
			if ((is_null($objPiezaCheckpoints->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsAsCheckpoint on this Checkpoints with an unsaved PiezaCheckpoints.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pieza_checkpoints`
				SET
					`checkpoint_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPiezaCheckpoints->Id) . ' AND
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all PiezaCheckpointsesAsCheckpoint
		 * @return void
		*/
		public function UnassociateAllPiezaCheckpointsesAsCheckpoint() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsAsCheckpoint on this unsaved Checkpoints.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pieza_checkpoints`
				SET
					`checkpoint_id` = null
				WHERE
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated PiezaCheckpointsAsCheckpoint
		 * @param PiezaCheckpoints $objPiezaCheckpoints
		 * @return void
		*/
		public function DeleteAssociatedPiezaCheckpointsAsCheckpoint(PiezaCheckpoints $objPiezaCheckpoints) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsAsCheckpoint on this unsaved Checkpoints.');
			if ((is_null($objPiezaCheckpoints->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsAsCheckpoint on this Checkpoints with an unsaved PiezaCheckpoints.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pieza_checkpoints`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPiezaCheckpoints->Id) . ' AND
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated PiezaCheckpointsesAsCheckpoint
		 * @return void
		*/
		public function DeleteAllPiezaCheckpointsesAsCheckpoint() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsAsCheckpoint on this unsaved Checkpoints.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pieza_checkpoints`
				WHERE
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for PiezaCheckpointsHAsCheckpoint
		//-------------------------------------------------------------------

		/**
		 * Gets all associated PiezaCheckpointsHsAsCheckpoint as an array of PiezaCheckpointsH objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PiezaCheckpointsH[]
		*/
		public function GetPiezaCheckpointsHAsCheckpointArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return PiezaCheckpointsH::LoadArrayByCheckpointId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated PiezaCheckpointsHsAsCheckpoint
		 * @return int
		*/
		public function CountPiezaCheckpointsHsAsCheckpoint() {
			if ((is_null($this->intId)))
				return 0;

			return PiezaCheckpointsH::CountByCheckpointId($this->intId);
		}

		/**
		 * Associates a PiezaCheckpointsHAsCheckpoint
		 * @param PiezaCheckpointsH $objPiezaCheckpointsH
		 * @return void
		*/
		public function AssociatePiezaCheckpointsHAsCheckpoint(PiezaCheckpointsH $objPiezaCheckpointsH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePiezaCheckpointsHAsCheckpoint on this unsaved Checkpoints.');
			if ((is_null($objPiezaCheckpointsH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePiezaCheckpointsHAsCheckpoint on this Checkpoints with an unsaved PiezaCheckpointsH.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pieza_checkpoints_h`
				SET
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPiezaCheckpointsH->Id) . '
			');
		}

		/**
		 * Unassociates a PiezaCheckpointsHAsCheckpoint
		 * @param PiezaCheckpointsH $objPiezaCheckpointsH
		 * @return void
		*/
		public function UnassociatePiezaCheckpointsHAsCheckpoint(PiezaCheckpointsH $objPiezaCheckpointsH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsHAsCheckpoint on this unsaved Checkpoints.');
			if ((is_null($objPiezaCheckpointsH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsHAsCheckpoint on this Checkpoints with an unsaved PiezaCheckpointsH.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pieza_checkpoints_h`
				SET
					`checkpoint_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPiezaCheckpointsH->Id) . ' AND
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all PiezaCheckpointsHsAsCheckpoint
		 * @return void
		*/
		public function UnassociateAllPiezaCheckpointsHsAsCheckpoint() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsHAsCheckpoint on this unsaved Checkpoints.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pieza_checkpoints_h`
				SET
					`checkpoint_id` = null
				WHERE
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated PiezaCheckpointsHAsCheckpoint
		 * @param PiezaCheckpointsH $objPiezaCheckpointsH
		 * @return void
		*/
		public function DeleteAssociatedPiezaCheckpointsHAsCheckpoint(PiezaCheckpointsH $objPiezaCheckpointsH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsHAsCheckpoint on this unsaved Checkpoints.');
			if ((is_null($objPiezaCheckpointsH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsHAsCheckpoint on this Checkpoints with an unsaved PiezaCheckpointsH.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pieza_checkpoints_h`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPiezaCheckpointsH->Id) . ' AND
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated PiezaCheckpointsHsAsCheckpoint
		 * @return void
		*/
		public function DeleteAllPiezaCheckpointsHsAsCheckpoint() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsHAsCheckpoint on this unsaved Checkpoints.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pieza_checkpoints_h`
				WHERE
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for RegistroTrabajoAsCheckpoint
		//-------------------------------------------------------------------

		/**
		 * Gets all associated RegistroTrabajosAsCheckpoint as an array of RegistroTrabajo objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RegistroTrabajo[]
		*/
		public function GetRegistroTrabajoAsCheckpointArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return RegistroTrabajo::LoadArrayByCheckpointId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated RegistroTrabajosAsCheckpoint
		 * @return int
		*/
		public function CountRegistroTrabajosAsCheckpoint() {
			if ((is_null($this->intId)))
				return 0;

			return RegistroTrabajo::CountByCheckpointId($this->intId);
		}

		/**
		 * Associates a RegistroTrabajoAsCheckpoint
		 * @param RegistroTrabajo $objRegistroTrabajo
		 * @return void
		*/
		public function AssociateRegistroTrabajoAsCheckpoint(RegistroTrabajo $objRegistroTrabajo) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRegistroTrabajoAsCheckpoint on this unsaved Checkpoints.');
			if ((is_null($objRegistroTrabajo->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRegistroTrabajoAsCheckpoint on this Checkpoints with an unsaved RegistroTrabajo.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`registro_trabajo`
				SET
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objRegistroTrabajo->Id) . '
			');
		}

		/**
		 * Unassociates a RegistroTrabajoAsCheckpoint
		 * @param RegistroTrabajo $objRegistroTrabajo
		 * @return void
		*/
		public function UnassociateRegistroTrabajoAsCheckpoint(RegistroTrabajo $objRegistroTrabajo) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRegistroTrabajoAsCheckpoint on this unsaved Checkpoints.');
			if ((is_null($objRegistroTrabajo->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRegistroTrabajoAsCheckpoint on this Checkpoints with an unsaved RegistroTrabajo.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`registro_trabajo`
				SET
					`checkpoint_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objRegistroTrabajo->Id) . ' AND
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all RegistroTrabajosAsCheckpoint
		 * @return void
		*/
		public function UnassociateAllRegistroTrabajosAsCheckpoint() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRegistroTrabajoAsCheckpoint on this unsaved Checkpoints.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`registro_trabajo`
				SET
					`checkpoint_id` = null
				WHERE
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated RegistroTrabajoAsCheckpoint
		 * @param RegistroTrabajo $objRegistroTrabajo
		 * @return void
		*/
		public function DeleteAssociatedRegistroTrabajoAsCheckpoint(RegistroTrabajo $objRegistroTrabajo) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRegistroTrabajoAsCheckpoint on this unsaved Checkpoints.');
			if ((is_null($objRegistroTrabajo->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRegistroTrabajoAsCheckpoint on this Checkpoints with an unsaved RegistroTrabajo.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`registro_trabajo`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objRegistroTrabajo->Id) . ' AND
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated RegistroTrabajosAsCheckpoint
		 * @return void
		*/
		public function DeleteAllRegistroTrabajosAsCheckpoint() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRegistroTrabajoAsCheckpoint on this unsaved Checkpoints.');

			// Get the Database Object for this Class
			$objDatabase = Checkpoints::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`registro_trabajo`
				WHERE
					`checkpoint_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
			return "checkpoints";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Checkpoints::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Checkpoints"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Codigo" type="xsd:string"/>';
			$strToReturn .= '<element name="Descripcion" type="xsd:string"/>';
			$strToReturn .= '<element name="DescripcionRastreo" type="xsd:string"/>';
			$strToReturn .= '<element name="Terminal" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Visibilidad" type="xsd:string"/>';
			$strToReturn .= '<element name="Tipo" type="xsd:string"/>';
			$strToReturn .= '<element name="Notificar" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Imagen" type="xsd:string"/>';
			$strToReturn .= '<element name="Color" type="xsd:string"/>';
			$strToReturn .= '<element name="Observacion" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedAt" type="xsd:string"/>';
			$strToReturn .= '<element name="UpdatedAt" type="xsd:string"/>';
			$strToReturn .= '<element name="DeletedAt" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="UpdatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="DeletedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Checkpoints', $strComplexTypeArray)) {
				$strComplexTypeArray['Checkpoints'] = Checkpoints::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Checkpoints::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Checkpoints();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Codigo'))
				$objToReturn->strCodigo = $objSoapObject->Codigo;
			if (property_exists($objSoapObject, 'Descripcion'))
				$objToReturn->strDescripcion = $objSoapObject->Descripcion;
			if (property_exists($objSoapObject, 'DescripcionRastreo'))
				$objToReturn->strDescripcionRastreo = $objSoapObject->DescripcionRastreo;
			if (property_exists($objSoapObject, 'Terminal'))
				$objToReturn->blnTerminal = $objSoapObject->Terminal;
			if (property_exists($objSoapObject, 'Visibilidad'))
				$objToReturn->strVisibilidad = $objSoapObject->Visibilidad;
			if (property_exists($objSoapObject, 'Tipo'))
				$objToReturn->strTipo = $objSoapObject->Tipo;
			if (property_exists($objSoapObject, 'Notificar'))
				$objToReturn->blnNotificar = $objSoapObject->Notificar;
			if (property_exists($objSoapObject, 'Imagen'))
				$objToReturn->strImagen = $objSoapObject->Imagen;
			if (property_exists($objSoapObject, 'Color'))
				$objToReturn->strColor = $objSoapObject->Color;
			if (property_exists($objSoapObject, 'Observacion'))
				$objToReturn->strObservacion = $objSoapObject->Observacion;
			if (property_exists($objSoapObject, 'CreatedAt'))
				$objToReturn->strCreatedAt = $objSoapObject->CreatedAt;
			if (property_exists($objSoapObject, 'UpdatedAt'))
				$objToReturn->strUpdatedAt = $objSoapObject->UpdatedAt;
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
				array_push($objArrayToReturn, Checkpoints::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
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
			$iArray['Codigo'] = $this->strCodigo;
			$iArray['Descripcion'] = $this->strDescripcion;
			$iArray['DescripcionRastreo'] = $this->strDescripcionRastreo;
			$iArray['Terminal'] = $this->blnTerminal;
			$iArray['Visibilidad'] = $this->strVisibilidad;
			$iArray['Tipo'] = $this->strTipo;
			$iArray['Notificar'] = $this->blnNotificar;
			$iArray['Imagen'] = $this->strImagen;
			$iArray['Color'] = $this->strColor;
			$iArray['Observacion'] = $this->strObservacion;
			$iArray['CreatedAt'] = $this->strCreatedAt;
			$iArray['UpdatedAt'] = $this->strUpdatedAt;
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
     * @property-read QQNode $Codigo
     * @property-read QQNode $Descripcion
     * @property-read QQNode $DescripcionRastreo
     * @property-read QQNode $Terminal
     * @property-read QQNode $Visibilidad
     * @property-read QQNode $Tipo
     * @property-read QQNode $Notificar
     * @property-read QQNode $Imagen
     * @property-read QQNode $Color
     * @property-read QQNode $Observacion
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $DeletedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     * @property-read QQNode $DeletedBy
     *
     *
     * @property-read QQReverseReferenceNodeContainerCkpt $ContainerCkptAsCheckpoint
     * @property-read QQReverseReferenceNodeContenedorCkpt $ContenedorCkptAsCheckpoint
     * @property-read QQReverseReferenceNodeHistoriaCliente $HistoriaClienteAsCheckpoint
     * @property-read QQReverseReferenceNodeNotaEntregaCkpt $NotaEntregaCkptAsCheckpoint
     * @property-read QQReverseReferenceNodeNotaEntregaCkptH $NotaEntregaCkptHAsCheckpoint
     * @property-read QQReverseReferenceNodeNotificacion $NotificacionAsCheckpoint
     * @property-read QQReverseReferenceNodePiezaCheckpoints $PiezaCheckpointsAsCheckpoint
     * @property-read QQReverseReferenceNodePiezaCheckpointsH $PiezaCheckpointsHAsCheckpoint
     * @property-read QQReverseReferenceNodeRegistroTrabajo $RegistroTrabajoAsCheckpoint

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeCheckpoints extends QQNode {
		protected $strTableName = 'checkpoints';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Checkpoints';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'Codigo':
					return new QQNode('codigo', 'Codigo', 'VarChar', $this);
				case 'Descripcion':
					return new QQNode('descripcion', 'Descripcion', 'VarChar', $this);
				case 'DescripcionRastreo':
					return new QQNode('descripcion_rastreo', 'DescripcionRastreo', 'VarChar', $this);
				case 'Terminal':
					return new QQNode('terminal', 'Terminal', 'Bit', $this);
				case 'Visibilidad':
					return new QQNode('visibilidad', 'Visibilidad', 'VarChar', $this);
				case 'Tipo':
					return new QQNode('tipo', 'Tipo', 'VarChar', $this);
				case 'Notificar':
					return new QQNode('notificar', 'Notificar', 'Bit', $this);
				case 'Imagen':
					return new QQNode('imagen', 'Imagen', 'VarChar', $this);
				case 'Color':
					return new QQNode('color', 'Color', 'VarChar', $this);
				case 'Observacion':
					return new QQNode('observacion', 'Observacion', 'VarChar', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'VarChar', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'VarChar', $this);
				case 'DeletedAt':
					return new QQNode('deleted_at', 'DeletedAt', 'VarChar', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'Integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'Integer', $this);
				case 'DeletedBy':
					return new QQNode('deleted_by', 'DeletedBy', 'Integer', $this);
				case 'ContainerCkptAsCheckpoint':
					return new QQReverseReferenceNodeContainerCkpt($this, 'containerckptascheckpoint', 'reverse_reference', 'checkpoint_id', 'ContainerCkptAsCheckpoint');
				case 'ContenedorCkptAsCheckpoint':
					return new QQReverseReferenceNodeContenedorCkpt($this, 'contenedorckptascheckpoint', 'reverse_reference', 'checkpoint_id', 'ContenedorCkptAsCheckpoint');
				case 'HistoriaClienteAsCheckpoint':
					return new QQReverseReferenceNodeHistoriaCliente($this, 'historiaclienteascheckpoint', 'reverse_reference', 'checkpoint_id', 'HistoriaClienteAsCheckpoint');
				case 'NotaEntregaCkptAsCheckpoint':
					return new QQReverseReferenceNodeNotaEntregaCkpt($this, 'notaentregackptascheckpoint', 'reverse_reference', 'checkpoint_id', 'NotaEntregaCkptAsCheckpoint');
				case 'NotaEntregaCkptHAsCheckpoint':
					return new QQReverseReferenceNodeNotaEntregaCkptH($this, 'notaentregackpthascheckpoint', 'reverse_reference', 'checkpoint_id', 'NotaEntregaCkptHAsCheckpoint');
				case 'NotificacionAsCheckpoint':
					return new QQReverseReferenceNodeNotificacion($this, 'notificacionascheckpoint', 'reverse_reference', 'checkpoint_id', 'NotificacionAsCheckpoint');
				case 'PiezaCheckpointsAsCheckpoint':
					return new QQReverseReferenceNodePiezaCheckpoints($this, 'piezacheckpointsascheckpoint', 'reverse_reference', 'checkpoint_id', 'PiezaCheckpointsAsCheckpoint');
				case 'PiezaCheckpointsHAsCheckpoint':
					return new QQReverseReferenceNodePiezaCheckpointsH($this, 'piezacheckpointshascheckpoint', 'reverse_reference', 'checkpoint_id', 'PiezaCheckpointsHAsCheckpoint');
				case 'RegistroTrabajoAsCheckpoint':
					return new QQReverseReferenceNodeRegistroTrabajo($this, 'registrotrabajoascheckpoint', 'reverse_reference', 'checkpoint_id', 'RegistroTrabajoAsCheckpoint');

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
     * @property-read QQNode $Codigo
     * @property-read QQNode $Descripcion
     * @property-read QQNode $DescripcionRastreo
     * @property-read QQNode $Terminal
     * @property-read QQNode $Visibilidad
     * @property-read QQNode $Tipo
     * @property-read QQNode $Notificar
     * @property-read QQNode $Imagen
     * @property-read QQNode $Color
     * @property-read QQNode $Observacion
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $DeletedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     * @property-read QQNode $DeletedBy
     *
     *
     * @property-read QQReverseReferenceNodeContainerCkpt $ContainerCkptAsCheckpoint
     * @property-read QQReverseReferenceNodeContenedorCkpt $ContenedorCkptAsCheckpoint
     * @property-read QQReverseReferenceNodeHistoriaCliente $HistoriaClienteAsCheckpoint
     * @property-read QQReverseReferenceNodeNotaEntregaCkpt $NotaEntregaCkptAsCheckpoint
     * @property-read QQReverseReferenceNodeNotaEntregaCkptH $NotaEntregaCkptHAsCheckpoint
     * @property-read QQReverseReferenceNodeNotificacion $NotificacionAsCheckpoint
     * @property-read QQReverseReferenceNodePiezaCheckpoints $PiezaCheckpointsAsCheckpoint
     * @property-read QQReverseReferenceNodePiezaCheckpointsH $PiezaCheckpointsHAsCheckpoint
     * @property-read QQReverseReferenceNodeRegistroTrabajo $RegistroTrabajoAsCheckpoint

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeCheckpoints extends QQReverseReferenceNode {
		protected $strTableName = 'checkpoints';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Checkpoints';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Codigo':
					return new QQNode('codigo', 'Codigo', 'string', $this);
				case 'Descripcion':
					return new QQNode('descripcion', 'Descripcion', 'string', $this);
				case 'DescripcionRastreo':
					return new QQNode('descripcion_rastreo', 'DescripcionRastreo', 'string', $this);
				case 'Terminal':
					return new QQNode('terminal', 'Terminal', 'boolean', $this);
				case 'Visibilidad':
					return new QQNode('visibilidad', 'Visibilidad', 'string', $this);
				case 'Tipo':
					return new QQNode('tipo', 'Tipo', 'string', $this);
				case 'Notificar':
					return new QQNode('notificar', 'Notificar', 'boolean', $this);
				case 'Imagen':
					return new QQNode('imagen', 'Imagen', 'string', $this);
				case 'Color':
					return new QQNode('color', 'Color', 'string', $this);
				case 'Observacion':
					return new QQNode('observacion', 'Observacion', 'string', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'string', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'string', $this);
				case 'DeletedAt':
					return new QQNode('deleted_at', 'DeletedAt', 'string', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'integer', $this);
				case 'DeletedBy':
					return new QQNode('deleted_by', 'DeletedBy', 'integer', $this);
				case 'ContainerCkptAsCheckpoint':
					return new QQReverseReferenceNodeContainerCkpt($this, 'containerckptascheckpoint', 'reverse_reference', 'checkpoint_id', 'ContainerCkptAsCheckpoint');
				case 'ContenedorCkptAsCheckpoint':
					return new QQReverseReferenceNodeContenedorCkpt($this, 'contenedorckptascheckpoint', 'reverse_reference', 'checkpoint_id', 'ContenedorCkptAsCheckpoint');
				case 'HistoriaClienteAsCheckpoint':
					return new QQReverseReferenceNodeHistoriaCliente($this, 'historiaclienteascheckpoint', 'reverse_reference', 'checkpoint_id', 'HistoriaClienteAsCheckpoint');
				case 'NotaEntregaCkptAsCheckpoint':
					return new QQReverseReferenceNodeNotaEntregaCkpt($this, 'notaentregackptascheckpoint', 'reverse_reference', 'checkpoint_id', 'NotaEntregaCkptAsCheckpoint');
				case 'NotaEntregaCkptHAsCheckpoint':
					return new QQReverseReferenceNodeNotaEntregaCkptH($this, 'notaentregackpthascheckpoint', 'reverse_reference', 'checkpoint_id', 'NotaEntregaCkptHAsCheckpoint');
				case 'NotificacionAsCheckpoint':
					return new QQReverseReferenceNodeNotificacion($this, 'notificacionascheckpoint', 'reverse_reference', 'checkpoint_id', 'NotificacionAsCheckpoint');
				case 'PiezaCheckpointsAsCheckpoint':
					return new QQReverseReferenceNodePiezaCheckpoints($this, 'piezacheckpointsascheckpoint', 'reverse_reference', 'checkpoint_id', 'PiezaCheckpointsAsCheckpoint');
				case 'PiezaCheckpointsHAsCheckpoint':
					return new QQReverseReferenceNodePiezaCheckpointsH($this, 'piezacheckpointshascheckpoint', 'reverse_reference', 'checkpoint_id', 'PiezaCheckpointsHAsCheckpoint');
				case 'RegistroTrabajoAsCheckpoint':
					return new QQReverseReferenceNodeRegistroTrabajo($this, 'registrotrabajoascheckpoint', 'reverse_reference', 'checkpoint_id', 'RegistroTrabajoAsCheckpoint');

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
