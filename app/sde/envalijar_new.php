<?php
//---------------------------------------------------------------------------------------------------
// Programa      : ajusta_consecutivo.php
// Migrado por   : Daniel Durand
// Fecha Migr.   : 15/11/2017
// Descripcion   : El uso (manual) indiscriminado de números de guias trajo como consecuencia el
//                 uso de mecanismos de validacion que resultaron muy costos en terminos de tiempo.
//                 Para solventar ese problema, se eliminó el mecanismo de validación pero quedamos
//                 expuestos a "choques" entre los datos existentes y los asignados por el Sistema.
//                 Este programa ajusta el consecutivo del nro de guía asignado por el Sistema,
//                 colocando en la tabla generadora un número de guía más alto de la secuencia.
//---------------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class EnvalijarNew extends FormularioBaseKaizen {
	protected $lstOperAbie;
	protected $txtNumeCont;
	protected $txtListNume;
	protected $lstTipoOper;

	protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = 'Envalijar';

        $this->objDefaultWaitIcon = new QWaitIcon($this);

		$this->lstTipoOper_Create();
		$this->lstOperAbier_Create();
		$this->txtNumeCont_Create();
		$this->txtListNume_Create();

	}

	//-----------------------------
	// Aqui se crean los objetos
	//-----------------------------

	protected function lstTipoOper_Create() {
		$this->lstTipoOper = new QListBox($this);
		$this->lstTipoOper->Name = QApplication::Translate("Tipo Operacion/Ruta");
		$this->lstTipoOper->Required = true;
		$this->lstTipoOper->AddItem(QApplication::Translate("- Seleccione Uno -"),null);
		foreach (SdeTipoOper::LoadAll() as $objTipoOper) {
			$this->lstTipoOper->AddItem($objTipoOper->__toString(),$objTipoOper->CodiTipo);
		}
		$this->lstTipoOper->AddAction(new QChangeEvent(), new QAjaxAction('lstTipoOper_Change'));
	}

	protected function lstOperAbier_Create() {
		$this->lstOperAbie = new QListBox($this);
		$this->lstOperAbie->Name = 'Operación';
		$this->lstOperAbie->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
		$this->lstOperAbie->Required = true;
		$this->lstOperAbie->Width = 300;
		$this->lstOperAbie->AddAction(new QChangeEvent(), new QAjaxAction('lstOperAbie_Change'));
	}

	protected function txtNumeCont_Create() {
		$this->txtNumeCont = new QTextBox($this);
		$this->txtNumeCont->Name = 'Contenedor';
		$this->txtNumeCont->Width = 200;
	}

	protected function txtListNume_Create() {
		$this->txtListNume = new QTextBox($this);
		$this->txtListNume->Name = 'Guías / Valijas';
		$this->txtListNume->TextMode = QTextMode::MultiLine;
		$this->txtListNume->Required = true;
		$this->txtListNume->Width = 300;
		$this->txtListNume->Height = 250;
	}

	//---------------------------------------
	// Acciones asociadas a los objetos
	//---------------------------------------

    protected function lstOperAbie_Change() {
        //------------------------------------------------------------------------
        // En funcion de la Ruta seleccionada, se asigna un numero de Manifiesto
        //------------------------------------------------------------------------7
        $intOperSele = $this->lstOperAbie->SelectedValue;
        $objOperSele = SdeOperacion::Load($intOperSele);
        $this->txtNumeCont->Text = $objOperSele->Ruta->Codigo.date('YmdHi');
    }

	protected function lstTipoOper_Change() {
        if (!is_null($this->lstTipoOper->SelectedValue)) {
            $this->lstOperAbie->RemoveAllItems();
            $intTipoOper   = $this->lstTipoOper->SelectedValue;
            $strCodiSucu   = $this->objUsuario->SucursalId;
            $objClauOrde   = QQ::Clause();
            $objClauOrde[] = QQ::OrderBy(QQN::SdeOperacion()->Ruta->Codigo);
            $arrSdexOper   = SdeOperacion::LoadArrayByCodiTipoSucursalId($intTipoOper,$strCodiSucu,$objClauOrde);
            $intCantOper   = count($arrSdexOper);
            $this->lstOperAbie->AddItem('- Seleccione Uno - ('.$intCantOper.')',null);
            foreach ($arrSdexOper as $objOperacion) {
                $this->lstOperAbie->AddItem(substr($objOperacion->__toString(),0,50),$objOperacion->CodiOper);
			}
		}
	}

	protected function btnSave_Click() {
	    t('===========================================');
	    t('Entrando a Salvar en la opcion de Envalijar');
		//--------------------------------------
		// Se graba o actualiza el Contenedor
		//--------------------------------------
        $objContainer  = Containers::LoadByNumero($this->txtNumeCont->Text);
		if (!$objContainer) {
		    t('El container no existe');
			$objContainer              = new Containers();
			$objContainer->Numero      = $this->txtNumeCont->Text;
			$objContainer->OperacionId = $this->lstOperAbie->SelectedValue;
			$objContainer->Fecha       = new QDateTime(QDateTime::Now);
			$objContainer->Hora        = date('H:i');
			$objContainer->Estatus     = 'ABIERT@';
			$objContainer->Tipo        = 'VALIJA';
			$objContainer->CreatedBy   = $this->objUsuario->CodiUsua;
			$objContainer->Save();
            //------------------------
            // Log de Transacciones
            //------------------------
            $arrLogxCamb['strNombTabl'] = 'Containers';
            $arrLogxCamb['intRefeRegi'] = $objContainer->Id;
            $arrLogxCamb['strNombRegi'] = $objContainer->Numero;
            $arrLogxCamb['strDescCamb'] = 'Creado';
            LogDeCambios($arrLogxCamb);
		} else {
            //------------------------
            // Log de Transacciones
            //------------------------
            $arrLogxCamb['strNombTabl'] = 'Container';
            $arrLogxCamb['intRefeRegi'] = $objContainer->Id;
            $arrLogxCamb['strNombRegi'] = $objContainer->Numero;
            $arrLogxCamb['strDescCamb'] = 'Container Actualizado';
            LogDeCambios($arrLogxCamb);
		}
		t('C1');
		$blnTodoOkey = true;
		$arrListNume = explode(',',nl2br2($this->txtListNume->Text));
		$arrListNume = LimpiarArreglo($arrListNume,false);
		$this->txtListNume->Text = '';

		$arrDestinos = $objContainer->GetDestinos();
		t('La Operaciones es:  '.$this->lstOperAbie->SelectedValue);
		t('Los destinos asociados a la ruta del contenedor son: ');
		foreach ($arrDestinos as $intCodiSucu) {
		    t('Sucursal: '.$intCodiSucu);
        }
		$intCodiRuta = $objContainer->Operacion->RutaId;

		$objDatabase = Containers::GetDatabase();
		$objDatabase->TransactionBegin();
		$intContVali = 0;
		$intContGuia = 0;
		$intContCkpt = 0;
		foreach ($arrListNume as $strNumeSeri) {
            t('Procesando la pieza: '.$strNumeSeri);
            //-----------------------------------------------------------------------
            // Se procesa una a una las Guias/Valijas proporcionadas por el Usuario
            //-----------------------------------------------------------------------
            $objPiezGuia = GuiaPiezas::LoadByIdPieza($strNumeSeri);
            if ($objPiezGuia) {
                t('Encontre la pieza');
                //------------------------------------------------------------
                // Primeramente se verifica que la guia pueda ser procesada
                //------------------------------------------------------------
                $arrSepuProc = $objPiezGuia->Guia->SePuedeProcesar();
                if ($arrSepuProc['TodoOkey']) {
                    t('La guia se puede procesar');
                    //-----------------------------------------------------------------------------------
                    // Antes de asociar la Pieza al Contenedor, se debe verificar que el destino
                    // de la Guia, coincida con algunos de los Destinos de la Operacion seleccionada
                    // por el Usuario
                    //-----------------------------------------------------------------------------------
                    if (in_array($objPiezGuia->Guia->DestinoId,$arrDestinos)) {
                        t('El destino de la guia esta incluido en los destinos de la Operacion');
                        if (!$objContainer->IsGuiaPiezasAsContainerPiezaAssociated($objPiezGuia)) {
                            t('La pieza no esta asociada');
                            //------------------------------------------------------
                            // Se establece la relación "contenedor-pieza"
                            //------------------------------------------------------
                            $objContainer->AssociateGuiaPiezasAsContainerPieza($objPiezGuia);
                        }
                        $intContGuia ++;
                    } else {
                        t('Destino no coincide');
                        $blnTodoOkey = false;
                        $this->txtListNume->Text .= $strNumeSeri." (Destino no Coincide)".chr(13);
                    }
                } else {
                    t('No se puede procesar la guia por: '.$arrSepuProc['MensUsua']);
                    $blnTodoOkey = false;
                    $this->txtListNume->Text .= $strNumeSeri." (".$arrSepuProc['MensUsua'].")".chr(13);
                }
            } else {
                t('No es una pieza, se asume que se trata de una Valija');
                //---------------------------------------------------
                // Si no es una Guia, se chequea que sea una Valija
                //---------------------------------------------------
                $objValija = Containers::LoadByNumero($strNumeSeri);
                if ($objValija) {
                    t('La Valija existe');
                    if (!$objContainer->IsContainersAsContainerContainerAssociated($objValija)) {
                        t('La valija no esta asociada al contenedor');
                        //---------------------------------------------------
                        // Se establece la relación "contenedor-valija"
                        //---------------------------------------------------
                        $objContainer->AssociateContainersAsContainerContainer($objValija);
                    }
                    $intContVali ++;
                } else {
                    t('No existe la valija');
                    $blnTodoOkey = false;
                    $this->txtListNume->Text .= $strNumeSeri." (No Existe Valija)".chr(13);
                }
            }
            if ($blnTodoOkey) {
                t('Ahora voy a grabar el checkpoint BG');
                $objCheckpoint = Checkpoints::LoadByCodigo('BG');
                if ($objCheckpoint) {
                    if ($objPiezGuia) {
                        //-------------------------------------------------
                        // Se registra un checkpoint "BG" para cada pieza
                        //-------------------------------------------------
                        $arrDatoCkpt             = array();
                        $arrDatoCkpt['NumePiez'] = $strNumeSeri;
                        $arrDatoCkpt['GuiaAnul'] = $objPiezGuia->Guia->Anulada();
                        $arrDatoCkpt['CodiCkpt'] = $objCheckpoint->Id;
                        $arrDatoCkpt['TextCkpt'] = $objCheckpoint->Descripcion." (".$objContainer->Numero.")";
                        $arrDatoCkpt['CodiRuta'] = $intCodiRuta;
                        $arrDatoCkpt['NotiCkpt'] = $objCheckpoint->Notificar;
                        $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
                        if ($arrResuGrab['TodoOkey']) {
                            $intContCkpt ++;
                        } else {
                            $blnTodoOkey = false;
                        }
                    } else {
                        //-----------------------------------------------------------------------
                        // Se registra en "contenedor_ckpt" un checkpoint "BG" para cada Valija
                        //-----------------------------------------------------------------------
                        $arrDatoCkpt             = array();
                        $arrDatoCkpt['NumeCont'] = $strNumeSeri;
                        $arrDatoCkpt['CodiCkpt'] = $objCheckpoint->Id;
                        $arrDatoCkpt['TextObse'] = $objCheckpoint->Descripcion;
                        $arrResuGrab = GrabarCheckpointContenedorNew($arrDatoCkpt)." (".$objContainer->Numero.")";
                        if ($arrResuGrab['TodoOkey']) {
                            $intContVali ++;
                        } else {
                            $blnTodoOkey = false;
                        }
                    }
                } else {
                    t('No existe el checkpoint BG');
                    $strMensUsua = 'No existe el checkpoint BG';
                    $this->danger($strMensUsua);
                    $blnTodoOkey = false;
                }
            }
		}
		$objContainer->actualizarTotales();
		$objDatabase->TransactionCommit();
		if ($blnTodoOkey && ($intContGuia == $intContCkpt)) {
			$strMensUsua = sprintf('El Proceso culmino Exitosamente. Guias procesadas (%s)  Checkpoints procesados (%s)',$intContGuia,$intContCkpt);
            $this->success($strMensUsua);
			$this->inicializarPantalla();
		} else {
			$strMensUsua = sprintf('Hubo Errores en la Transaccion. Guias procesadas (%s)  Checkpoints procesados (%s)',$intContGuia,$intContCkpt);
            $this->warning($strMensUsua);
		}
        //------------------------
        // Log de Transacciones
        //------------------------
        $arrLogxCamb['strNombTabl'] = 'Containers';
        $arrLogxCamb['intRefeRegi'] = $objContainer->Id;
        $arrLogxCamb['strNombRegi'] = $objContainer->Numero;
        $arrLogxCamb['strDescCamb'] = 'Envalijado: '.$strMensUsua;
        LogDeCambios($arrLogxCamb);
	}

	protected function inicializarPantalla() {
		$this->lstOperAbie->SelectedIndex = 0;
		$this->txtNumeCont->Text = '';
		$this->txtListNume->Text = '';
	}

}

EnvalijarNew::Run('EnvalijarNew','envalijar.tpl.php');
?>