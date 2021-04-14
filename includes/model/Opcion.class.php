<?php
	require(__MODEL_GEN__ . '/OpcionGen.class.php');

	/**
	 * The Opcion class defined here contains any
	 * customized code for the Opcion class in the
	 * Object Relational Model.  It represents the "opcion" table
	 * in the database, and extends from the code generated abstract OpcionGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class Opcion extends OpcionGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objOpcion->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
            $strTipoOpci = substr(TipoOpciType::ToString($this->intCodiTipo),0,1);
			return sprintf('%s',  $this->strDescOpci." ($strTipoOpci)");
		}

		public function __toStringComoMenu() {
			if ($this->intNivel == 0) {
				return sprintf('=> %s <=',  $this->strNombProg);
			} else {
				return sprintf('=> %s (Dep. de: %s)',  $this->strNombProg, $this->NumeDepeObject->DescOpci);
			}
		}

		public function CountDependencia() {
			$objClauWher   = QQ::Clause();
			$objClauWher[] = QQ::Equal(QQN::Opcion()->NumeDepe, $this->intCodiOpci);
			$objClauWher[] = QQ::Equal(QQN::Opcion()->CodiStat, 1);
			return Opcion::QueryCount(QQ::AndCondition($objClauWher));
		}

		public function HtmlMenuBootstrap() {
			$objUsuario  = unserialize($_SESSION['User']);
			$strDireProg = __APP__."/".$this->strPathOpci."/";
			$strCadeTabu = "\t";
			if ($this->Nivel > 0) {
				for ($i = 1; $i <= $this->Nivel + 1; $i++) {
					$strCadeTabu .= "\t";
				}
			}
			if ($this->intCodiTipo == TipoOpciType::PROGRAMA) {
				//---------------
				//  PROGRAMA
				//---------------
				$strHtmlMenu  = $strCadeTabu."<li>\n";
				if (strlen($this->strImagOpci) > 0) {
					$strHtmlMenu .= $strCadeTabu."\t<a href='".$strDireProg.$this->strNombProg."'><i class='fa ".$this->strImagOpci."'></i> ".$this->strDescOpci."</a>\n";
				} else {
					$strHtmlMenu .= $strCadeTabu."\t<a href='".$strDireProg.$this->strNombProg."'>".$this->strDescOpci."</a>\n";
				}
				$strHtmlMenu .= $strCadeTabu."</li>\n";
			} else {
				//---------------
				//  MENU
				//---------------
				// echo "Aqui estoy con ".$this->strName."<br>\n";
				$strHtmlMenu  = $strCadeTabu."<li>\n";
				if (strlen($this->strImagOpci) > 0) {
					// echo "El menu tiene imagen<br>\n";
					$strHtmlMenu .= $strCadeTabu."\t<a href='#'><i class='fa ".$this->strImagOpci."'></i> ".$this->strDescOpci."<span class='fa arrow'></span></a>\n";
				} else {
					// echo "No hay imagen asociada el menu<br>\n";
					$strHtmlMenu .= $strCadeTabu."\t<a href='#'>".$this->strDescOpci."</a>\n";
				}
				// $strHtmlMenu .= "\t<li><a href='".$strDireProg."'>".$this->strName."</a>\n";
				//---------------------------------------------------------
				// La Clase del Menu, se determina en funcion de su nivel
				//---------------------------------------------------------
				// echo "El nivel es: ".$this->intLevel."<br>\n";
				switch ($this->intNivel) {
					case 0:
						$strClasMenu = 'second';
						break;
					case 1:
						$strClasMenu = 'third';
						break;
					case 2:
						$strClasMenu = 'fourth';
						break;
					case 3:
						$strClasMenu = 'fifth';
						break;
					default:
						$strClasMenu = 'second';
						break;
				}
				$strHtmlMenu .= $strCadeTabu."\t<ul class='nav nav-".$strClasMenu."-level'>\n";
				//-------------------------------------------------
				// Se prepara el Query para las opciones del menu
				//-------------------------------------------------
				$objClauOrde   = QQ::Clause();
				$objClauOrde[] = QQ::OrderBy(QQN::Opcion()->PosiOpci);
				$objClauWher   = QQ::Clause();
				$objClauWher[] = QQ::Equal(QQN::Opcion()->CodiSist,$_SESSION['Sistema']);
				$objClauWher[] = QQ::Equal(QQN::Opcion()->NumeDepe,$this->intCodiOpci);
				$objClauWher[] = QQ::Equal(QQN::Opcion()->CodiStat,1);
				if ($objUsuario->CodiGrup != 1) {
					//---------------------------------------------------------
					// Aqui se identifican las Opciones del grupo del Usuario
					//---------------------------------------------------------
					$objClauWher   = QQ::Clause();
					$objClauWher[] = QQ::Equal(QQN::OpciGrup()->CodiGrup,$this->objUsuario->CodiGrup);
					$arrOpciGrup   = OpciGrup::QueryArray(QQ::AndCondition($objClauWher));
					$arrGroupId = array();
					foreach ($arrOpciGrup as $objOpciGrup) {
						$arrGroupId[] = $objOpciGrup->Opcion->CodiOpci;
					}
					$objClauWher[] = QQ::In(QQN::Opcion()->CodiOpci,$arrGroupId);
				}
				//--------------------------------------------------------
				// Ahora se seleccionan y procesan las opciones del menu
				//--------------------------------------------------------
				$arrOpciMenu = Opcion::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
				if ($arrOpciMenu) {
					foreach ($arrOpciMenu as $objOpcion) {
						$strHtmlMenu .= $objOpcion->HtmlMenuBootstrap($strHtmlMenu);
					}
				}
				$strHtmlMenu .= $strCadeTabu."\t</ul>\n";
				$strHtmlMenu .= $strCadeTabu."</li>\n";
			}
			return $strHtmlMenu;
		}

		public static function DeQuienDepende($strNombProg, $strNombSist) {
			$objClauWher   = QQ::Clause();
			$objClauWher[] = QQ::Equal(QQN::Opcion()->NombProg,$strNombProg);
			$objClauWher[] = QQ::Equal(QQN::Opcion()->CodiSist,$strNombSist);
			$objOpcion     = Opcion::QuerySingle(QQ::AndCondition($objClauWher));
			if ($objOpcion) {
				$objOpciDepe = Opcion::Load($objOpcion->NumeDepe);
				return $objOpciDepe;
			} else {
				return null;
			}
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of Opcion objects
			return Opcion::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::Opcion()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Opcion()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single Opcion object
			return Opcion::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Opcion()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Opcion()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of Opcion objects
			return Opcion::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Opcion()->Param1, $strParam1),
					QQ::Equal(QQN::Opcion()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = Opcion::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`opcion`.*
				FROM
					`opcion` AS `opcion`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Opcion::InstantiateDbResult($objDbResult);
		}
*/



		// Override or Create New Properties and Variables
		// For performance reasons, these variables and __set and __get override methods
		// are commented out.  But if you wish to implement or override any
		// of the data generated properties, please feel free to uncomment them.
/*
		protected $strSomeNewProperty;

		public function __get($strName) {
			switch ($strName) {
				case 'SomeNewProperty': return $this->strSomeNewProperty;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		public function __set($strName, $mixValue) {
			switch ($strName) {
				case 'SomeNewProperty':
					try {
						return ($this->strSomeNewProperty = QType::Cast($mixValue, QType::String));
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				default:
					try {
						return (parent::__set($strName, $mixValue));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
*/


		// Initialize each property with default values from database definition
/*
		public function __construct()
		{
			$this->Initialize();
		}
*/
	}
?>