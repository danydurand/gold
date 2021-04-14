<?php
//----------------------------------------------------------------------------------------
// Programa       : repo_consulta_datobanco.php
// Realizado por  : Juan Martinez
// Fecha Elab.    : 25/02/2011
// Descripcion    : Reporte de Bancos, programa que muestra la información de movimientos
//                  bancarios realizados por los clientes de Liberty Express.
//                  Este programa extrae informacion de la tabla conciliacion_bancaria.
//-----------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class RepoGuiasAuditoria extends FormularioBaseKaizen {
    protected $calFechInic;
    protected $calFechFina;
    protected $lstCodiSucu;
    protected $lstCritBusq;

    protected function Form_Create() {
        parent::Form_Create();
        $this->lblTituForm->Text = QApplication::Translate('Auditoría de Guías');

        $this->calFechInic_Create();
        $this->calFechFina_Create();
        $this->lstCodiSucu_Create();
        $this->lstCritBusq_Create();
    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    protected function lstCodiSucu_Create() {
        $this->lstCodiSucu = new QListBox($this);
        $this->lstCodiSucu->Name = QApplication::Translate('Sucursal');
        $this->lstCodiSucu->Width = 200;
        $this->lstCodiSucu->AddItem(QApplication::Translate('- Seleccione Uno - '),null);

        $arrSucursal = Estacion::LoadSucursalesActivasToClients();
        foreach ($arrSucursal as $objSucursal) {
            $this->lstCodiSucu->AddItem($objSucursal->DescEsta, $objSucursal->CodiEsta);
        }
    }

    protected function lstCritBusq_Create() {
        $this->lstCritBusq = new QListBox($this);
        $this->lstCritBusq->Name = QApplication::Translate('Modificación');
        $this->lstCritBusq->Width = 200;
        $this->lstCritBusq->AddItem(QApplication::Translate('- Seleccione Uno - '),null);
        $this->lstCritBusq->AddItem(QApplication::Translate(' Cambio Modalidad de Pago'), 'M.PAGO');
        $this->lstCritBusq->AddItem(QApplication::Translate(' Cambio Condición Cliente'), 'CLIENTE:');
        $this->lstCritBusq->AddItem(QApplication::Translate(' Guía Anulada'), 'ANULADA');
    }

    protected function calFechInic_Create() {
        $this->calFechInic = new QCalendar($this);
        $this->calFechInic->Name = QApplication::Translate('Fecha Inicial');
        $this->calFechInic->Required = true;
    }

    protected function calFechFina_Create() {
        $this->calFechFina = new QCalendar($this);
        $this->calFechFina->Name = QApplication::Translate('Fecha Final');
        $this->calFechFina->Required = true;
    }

    protected function btnSave_Create() {
        $this->btnSave = new QButton($this);
        $this->btnSave->Text = '<i class="fa fa-search fa-lg"></i> Buscar';
        $this->btnSave->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
        $this->btnSave->CssClass = 'btn btn-success btn-sm';
        $this->btnSave->PrimaryButton = true;
        $this->btnSave->CausesValidation = true;
    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    protected function Form_Validate() {
        $strMensAdve = 'Debe indicar alguna <b>Modificación</b>.';
        $blnTodoOkey = true;
        if ($this->lstCritBusq->SelectedValue == null) {
            $blnTodoOkey = false;
            $this->mensaje($strMensAdve,'m','d','','exclamation-triangle');
        }
        return $blnTodoOkey;
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        $strMensOkey = 'Registros Encontrados!';
        $strMensErro = 'No se encontraron registros.';
        $strFechInic = $this->calFechInic->DateTime->__toString("YYYY-MM-DD");
        $strFechFina = $this->calFechFina->DateTime->__toString("YYYY-MM-DD");
        if ($this->lstCritBusq->SelectedValue == 'ANULADA') {
            //---------------------------
            // Se buscan Guías Anuladas
            //---------------------------
            $objCondicion = QQ::Clause();
            $objCondicion[] = QQ::GreaterorEqual(QQN::Guia()->FechaCreacion, $strFechInic);
            $objCondicion[] = QQ::LessorEqual(QQN::Guia()->FechaCreacion, $strFechFina);
            if ($this->lstCodiSucu->SelectedValue) {
                $objCondicion[] = QQ::Equal(QQN::Guia()->EstaOrig, $this->lstCodiSucu->SelectedValue);
            }
            $objCondicion[] = QQ::Equal(QQN::Guia()->Anulada, 1);
            $arrRegiGuia = Guia::QueryArray(QQ::AndCondition($objCondicion));

            // Si se encuentran datos...
            if ($arrRegiGuia) {
                foreach ($arrRegiGuia as $objGuia) {
                    if ($objGuia->CodiClie) {
                        $objCliente = MasterCliente::Load($objGuia->CodiClie);
                    } elseif ($objGuia->ClienteId) {
                        $objCliente = ClienteI::Load($objGuia->ClienteId);
                    }
                    $arrRegistro[] = array(' '.$objGuia->NumeGuia.' ',
                        $objGuia->FechGuia->__toString('DD/MM/YYYY'),$objGuia->EstaDest,
                        $objGuia->MontoTotal,$objCliente->__toString()
                    );
                }
                if (isset($arrRegistro[0])) {
                    //-----------------------------------------
                    // Se genera un archivo xls con los datos
                    // procesados dentro del arreglo anterior
                    //-----------------------------------------
                    $arrEncaCtrl = array('Nro. Guia','Fecha Creacion','Destino','Monto','Cliente');
                    $arrAnchCtrl = array(30, 30, 30, 30, 60,30, 30, 30, 30, 30,30, 30, 30, 30, 30,30, 30, 30, 30, 30, 30);
                    $arrJustCtrl = array('C', 'C', 'C', 'C', 'C','C', 'C', 'C', 'C', 'C','C', 'C', 'C', 'C', 'C','C', 'C', 'C', 'C', 'C', 'C');

                    $_SESSION['Dato'] = serialize($arrRegistro);
                    $_SESSION['Enca'] = serialize($arrEncaCtrl);
                    $_SESSION['Anch'] = serialize($arrAnchCtrl);
                    $_SESSION['Just'] = serialize($arrJustCtrl);

                    QApplication::Redirect('../../includes/app_includes/tabla2xls2.php?nomb_repo=Reporte_Auditoria_de_Guias');
                } else {
                    $this->mensaje($strMensErro,'m','d','hand-stop-o');
                }
            } else {
                $this->mensaje($strMensErro,'m','d','hand-stop-o');
            }
        } else {
            //--------------------------------------------
            // Se buscan cambios en el Código de Cliente
            // o en la Modalidad de Pago de las Guías.
            //--------------------------------------------
            $objCondicion = QQ::Clause();
            $objCondicion[] = QQ::GreaterorEqual(QQN::RegistroTrabajo()->Fecha, $strFechInic);
            $objCondicion[] = QQ::LessorEqual(QQN::RegistroTrabajo()->Fecha, $strFechFina);
            if ($this->lstCodiSucu->SelectedValue) {
                $objCondicion[] = QQ::Equal(QQN::RegistroTrabajo()->SucursalId, $this->lstCodiSucu->SelectedValue);
            }
            $objCondicion[] = QQ::Like(QQN::RegistroTrabajo()->Comentario, "%".$this->lstCritBusq->SelectedValue."%");
            $objCondicion[] = QQ::NotLike(QQN::RegistroTrabajo()->Comentario, "%PAGO PROCESADO%");
            $objCondicion[] = QQ::Equal(QQN::RegistroTrabajo()->Guia->Anulada, 0);
            $arrRegiTrab = RegistroTrabajo::QueryArray(QQ::AndCondition($objCondicion));

            // Si se encuentran datos...
            if ($arrRegiTrab) {
                foreach ($arrRegiTrab as $objRegiTrab) {
                    if ($objRegiTrab->GuiaId) {
                        $strGuia = $objRegiTrab->GuiaId;
                    } else {
                        $strGuia = '';
                    }
                    if (strlen($objRegiTrab->Comentario) > 0) {
                        $strComentario = $objRegiTrab->Comentario;
                    } else {
                        $strComentario = '';
                    }
                    if (strlen($objRegiTrab->Usuario->LogiUsua) > 0) {
                        $strUsuario = $objRegiTrab->Usuario->LogiUsua;
                    } else {
                        $strUsuario = '';
                    }
                    if ($objRegiTrab->Fecha) {
                        $strFecha = $objRegiTrab->Fecha->__toString("DD/MM/YYYY");
                    } else {
                        $strFecha = '';
                    }
                    if ($objRegiTrab->Sucursal->DescEsta) {
                        $strEstacion = $objRegiTrab->Sucursal->DescEsta;
                    } else {
                        $strEstacion = '';
                    }
                    $arrRegistro[] = array(' '.$strGuia.' ',$strComentario,$strUsuario,$strFecha,$strEstacion);
                }
                if (isset($arrRegistro[0])) {
                    //-----------------------------------------
                    // Se genera un archivo xls con los datos
                    // procesados dentro del arreglo anterior
                    //-----------------------------------------
                    $arrEncaCtrl = array('Nro. Guia','Registro','Usuario','Fecha','Sucursal');
                    $arrAnchCtrl = array(30, 30, 30, 30, 30,30, 30, 30, 30, 30,30, 30, 30, 30, 30,30, 30, 30, 30, 30, 30);
                    $arrJustCtrl = array('C', 'C', 'C', 'C', 'C','C', 'C', 'C', 'C', 'C','C', 'C', 'C', 'C', 'C','C', 'C', 'C', 'C', 'C', 'C');

                    $_SESSION['Dato'] = serialize($arrRegistro);
                    $_SESSION['Enca'] = serialize($arrEncaCtrl);
                    $_SESSION['Anch'] = serialize($arrAnchCtrl);
                    $_SESSION['Just'] = serialize($arrJustCtrl);

                    QApplication::Redirect('../../includes/app_includes/tabla2xls2.php?nomb_repo=Reporte_Guias_x_Receptoria');
                }
            } else {
                $this->mensaje($strMensErro,'m','d','hand-stop-o');
            }
        }
    }
}

RepoGuiasAuditoria::Run('RepoGuiasAuditoria');
?>