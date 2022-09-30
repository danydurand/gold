<?php
	require(__MODEL_GEN__ . '/NewOpcionGen.class.php');

	/**
	 * The NewOpcion class defined here contains any
	 * customized code for the NewOpcion class in the
	 * Object Relational Model.  It represents the "new_opcion" table
	 * in the database, and extends from the code generated abstract NewOpcionGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 *
	 */
	class NewOpcion extends NewOpcionGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objNewOpcion->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
        public function __toString() {
            $strTipoOpci = $this->EsMenu ? 'M' : 'P';
            return sprintf('%s',  $this->strNombre." ($strTipoOpci)");
        }

        public function __toStringComoMenu() {
            if ($this->EsMenu) {
                return sprintf('==> %s <==',  strtoupper($this->strNombre));
            } else {
                return sprintf('%s',  $this->strNombre, $this->DependenciaObject->Nombre);
//                return sprintf('%s (Dep. de: %s)',  $this->strNombre, $this->DependenciaObject->Nombre);
            }
        }

        public function CountDependencia() {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::NewOpcion()->Dependencia, $this->intId);
            $objClauWher[] = QQ::Equal(QQN::NewOpcion()->Activo, true);
            return NewOpcion::QueryCount(QQ::AndCondition($objClauWher));
        }

        public function HtmlMenuBootstrap($strCodiSist='sde') {
            $objUsuario  = unserialize($_SESSION['User']);
            if (!defined('__SIST__')) {
                define('__SIST__', $strCodiSist);
                t('__SIST__ no estaba definido, quedo con: '.__SIST__);
            }
            $strDireProg = '/'.$this->strDirectorio != __SIST__ ? '/'.$this->strDirectorio.'/' : '';
            if ($strCodiSist == 'sde') {
                if ($strDireProg != '/common/') {
                    $strDireProg = __APP__."/".$this->strDirectorio."/";
                }
            } else {
                $strDireProg = __SIST__ .'/';
            }
            $strCadeTabu = "\t";
            if ($this->Nivel > 0) {
                for ($i = 1; $i <= $this->Nivel + 1; $i++) {
                    $strCadeTabu .= "\t";
                }
            }
            if (!$this->EsMenu) {
                //---------------
                //  PROGRAMA
                //---------------
                $strHtmlMenu  = $strCadeTabu."<li>\n";
                if (strlen($this->strImagen) > 0) {
                    $strHtmlMenu .= $strCadeTabu."\t<a href='".$strDireProg.$this->strPrograma."'><i class='fa ".$this->strImagen."'></i> ".$this->strNombre."</a>\n";
                } else {
                    $strHtmlMenu .= $strCadeTabu."\t<a href='".$strDireProg.$this->strPrograma."'>".$this->strNombre."</a>\n";
                }
                $strHtmlMenu .= $strCadeTabu."</li>\n";
            } else {
                //---------------
                //  MENU
                //---------------
                // echo "Aqui estoy con ".$this->strName."<br>\n";
                $strHtmlMenu  = $strCadeTabu."<li>\n";
                if (strlen($this->strImagen) > 0) {
                    // echo "El menu tiene imagen<br>\n";
                    $strHtmlMenu .= $strCadeTabu."\t<a href='#'><i class='fa ".$this->strImagen."'></i> ".$this->strNombre."<span class='fa arrow'></span></a>\n";
                } else {
                    // echo "No hay imagen asociada el menu<br>\n";
                    $strHtmlMenu .= $strCadeTabu."\t<a href='#'>".$this->strNombre."</a>\n";
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
                $objClauOrde[] = QQ::OrderBy(QQN::NewOpcion()->Posicion);
                $objClauWher   = QQ::Clause();
                $objClauWher[] = QQ::Equal(QQN::NewOpcion()->SistemaId,$_SESSION['Sistema']);
                $objClauWher[] = QQ::Equal(QQN::NewOpcion()->Dependencia,$this->intId);
                $objClauWher[] = QQ::Equal(QQN::NewOpcion()->Activo,true);
                if ( ($objUsuario->GrupoId != 1) && (in_array($_SESSION['Sistema'], ['sde','ret'])) ) {
                    //---------------------------------------------------------
                    // Aqui se identifican las Opciones del grupo del Usuario
                    //---------------------------------------------------------
                    $objClauPerm   = QQ::Clause();
                    $objClauPerm[] = QQ::Equal(QQN::Permiso()->GrupoId,$objUsuario->GrupoId);
                    $arrOpciGrup   = Permiso::QueryArray(QQ::AndCondition($objClauPerm));
                    $arrGroupId = array();
                    foreach ($arrOpciGrup as $objOpciGrup) {
                        $arrGroupId[] = $objOpciGrup->OpcionId;
                    }
                    $objClauWher[] = QQ::In(QQN::NewOpcion()->Id,$arrGroupId);
                }
                //--------------------------------------------------------
                // Ahora se seleccionan y procesan las opciones del menu
                //--------------------------------------------------------
                $arrOpciMenu = NewOpcion::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
                if ($arrOpciMenu) {
                    foreach ($arrOpciMenu as $objOpcion) {
                        $strHtmlMenu .= $objOpcion->HtmlMenuBootstrap($strCodiSist);
                    }
                }
                $strHtmlMenu .= $strCadeTabu."\t</ul>\n";
                $strHtmlMenu .= $strCadeTabu."</li>\n";
            }
            return $strHtmlMenu;
        }

        public function HtmlMenuConnectBootstrap($strDireSist='') {
            $objCliente = unserialize($_SESSION['ClieMast']);
            //$strDireProg = "/".$this->strDirectorio."/";
            $strDireProg = "$strDireSist/";
            //----------------------------------------
            // Se identifica la Opción de Cargar Guía
            //----------------------------------------
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::NewOpcion()->SistemaId,$_SESSION['Sistema']);
            $objClauWher[] = QQ::Like(QQN::NewOpcion()->Programa,"%cargar_guia%");
            $objClauWher[] = QQ::Equal(QQN::NewOpcion()->Activo,true);
            $objOpciGuia   = NewOpcion::QuerySingle(QQ::AndCondition($objClauWher));
            //----------------------------------------
            // Se identifica la Opción de SubClientes
            //----------------------------------------
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::NewOpcion()->SistemaId,$_SESSION['Sistema']);
            $objClauWher[] = QQ::Like(QQN::NewOpcion()->Programa,"%subcuentas%");
            $objClauWher[] = QQ::Equal(QQN::NewOpcion()->Activo,true);
            $objOpciSubc   = NewOpcion::QuerySingle(QQ::AndCondition($objClauWher));
            //--------------------------------------
            // Se identifica la Opción de Mi Tarifa
            //--------------------------------------
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::NewOpcion()->SistemaId,$_SESSION['Sistema']);
            $objClauWher[] = QQ::Like(QQN::NewOpcion()->Programa,"%tarifa_peso_list%");
            $objClauWher[] = QQ::Equal(QQN::NewOpcion()->Activo,true);
            $objOpciMita   = NewOpcion::QuerySingle(QQ::AndCondition($objClauWher));
            //------------------------------------------------------------------------------
            // Si el Cliente está inactivo, la opción de Cargar Guía se agrega en el vector
            // de opciones bloqueadas o invisibles.
            //------------------------------------------------------------------------------
            if (!$objCliente->CodiStat) {
                $arrOpciExcl[] = $objOpciGuia->Id;
            }
            //---------------------------------------------------------------------------------------
            // Si el Cliente no tiene SubCuentas, la opción de SubClientes se agrega en el vector de
            // opciones bloqueadas o invisibles.
            //---------------------------------------------------------------------------------------
            if (!$objCliente->tieneSubCuentas()) {
                if ($objOpciSubc) {
                    $arrOpciExcl[] = $objOpciSubc->Id;
                }
            }
            //------------------------------------------------------------------------------
            // Si el Cliente posee una Tarifa que no sea "Por Peso", se agrega en el vector
            // de opciones bloqueadas o invisibles.
            //------------------------------------------------------------------------------
            //if ($objCliente->Tarifa->TipoTarifa != FacTipoTarifaType::PORPESO) {
            //    $arrOpciExcl[] = $objOpciMita->Id;
            //}
            //------------------------------------------
            // Comenzando a dibujar o armar el Menú ...
            //------------------------------------------
            $strCadeTabu = "\t";
            if ($this->Nivel > 0) {
                for ($i = 1; $i <= $this->Nivel + 1; $i++) {
                    $strCadeTabu .= "\t";
                }
            }
            if (!$this->EsMenu) {
                //---------------
                //  PROGRAMA
                //---------------
                $strHtmlMenu  = $strCadeTabu."<li>\n";
                if (strlen($this->strImagen) > 0) {
                    $strHtmlMenu .= $strCadeTabu."\t<a href='".$strDireProg.$this->strPrograma."'><i class='fa ".$this->strImagen."'></i> ".$this->strNombre."</a>\n";
                } else {
                    $strHtmlMenu .= $strCadeTabu."\t<a href='".$strDireProg.$this->strPrograma."'>".$this->strNombre."</a>\n";
                }
                $strHtmlMenu .= $strCadeTabu."</li>\n";
            } else {
                //---------------
                //  MENU
                //---------------
                // echo "Aqui estoy con ".$this->strName."<br>\n";
                $strHtmlMenu  = $strCadeTabu."<li>\n";
                if (strlen($this->strImagen) > 0) {
                    // echo "El menu tiene imagen<br>\n";
                    $strHtmlMenu .= $strCadeTabu."\t<a href='#'><i class='fa ".$this->strImagen."'></i> ".$this->strNombre."<span class='fa arrow'></span></a>\n";
                } else {
                    // echo "No hay imagen asociada el menu<br>\n";
                    $strHtmlMenu .= $strCadeTabu."\t<a href='#'>".$this->strNombre."</a>\n";
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
                $objClauOrde[] = QQ::OrderBy(QQN::NewOpcion()->Posicion);
                $objClauWher   = QQ::Clause();
                $objClauWher[] = QQ::Equal(QQN::NewOpcion()->SistemaId,$_SESSION['Sistema']);
                $objClauWher[] = QQ::Equal(QQN::NewOpcion()->Dependencia,$this->intId);
                $objClauWher[] = QQ::Equal(QQN::NewOpcion()->Activo,true);
                if (!empty($arrOpciExcl)) {
                    //---------------------------------------------------------------------------
                    // Si existen opciones bloqueadas, éstos no se muestran en el Menú Principal
                    //---------------------------------------------------------------------------
                    $objClauWher[] = QQ::NotIn(QQN::NewOpcion()->Id,$arrOpciExcl);
                }
                //--------------------------------------------------------
                // Ahora se seleccionan y procesan las opciones del menu
                //--------------------------------------------------------
                $arrOpciMenu = NewOpcion::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
                if ($arrOpciMenu) {
                    foreach ($arrOpciMenu as $objOpcion) {
                        $strHtmlMenu .= $objOpcion->HtmlMenuConnectBootstrap();
                    }
                }
                $strHtmlMenu .= $strCadeTabu."\t</ul>\n";
                $strHtmlMenu .= $strCadeTabu."</li>\n";
            }
            return $strHtmlMenu;
        }


        // Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of NewOpcion objects
			return NewOpcion::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::NewOpcion()->Param1, $strParam1),
					QQ::GreaterThan(QQN::NewOpcion()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single NewOpcion object
			return NewOpcion::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::NewOpcion()->Param1, $strParam1),
					QQ::GreaterThan(QQN::NewOpcion()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of NewOpcion objects
			return NewOpcion::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::NewOpcion()->Param1, $strParam1),
					QQ::Equal(QQN::NewOpcion()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using QCubed Query)

			// Get the Database Object for this Class
			$objDatabase = NewOpcion::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`new_opcion`.*
				FROM
					`new_opcion` AS `new_opcion`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return NewOpcion::InstantiateDbResult($objDbResult);
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