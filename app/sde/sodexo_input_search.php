<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

/**
 * This is a quick-and-dirty draft form object to do Create, Edit, and Delete functionality
 * of the SodexoInput class.  It extends from the code-generated
 * abstract SodexoInputEditFormBase class.
 *
 * Any display custimizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 *
 * Additional qform control objects can also be defined and used here, as well.
 * 
 * @package My Application
 * @subpackage FormDraftObjects
 * 
 */
class SodexoInputSearchForm extends FormularioBaseKaizen {
    protected $txtCodiTurp;
    protected $txtGuiaSode;
    protected $calFechDesp;
    protected $txtCiudSode;
    protected $txtEstaSode;
    protected $txtRegiPorx;
    protected $calFechRegi;
    protected $txtArchInpu;
    protected $txtGuiaIdxx;
    protected $txtProcPorx;
    protected $calFechProc;
    protected $rdbCierCicl;

    protected function Form_Create() {
        parent::Form_Create();
        $this->lblTituForm->Text = QApplication::Translate('Buscar Guía Sodexo');

        $this->txtCodiTurp_Create();
        $this->txtGuiaSode_Create();
        $this->calFechDesp_Create();
        $this->txtCiudSode_Create();
        $this->txtEstaSode_Create();
        $this->txtRegiPorx_Create();
        $this->calFechRegi_Create();
        $this->txtArchInpu_Create();
        $this->txtGuiaIdxx_Create();
        $this->txtProcPorx_Create();
        $this->calFechProc_Create();
        $this->rdbCierCicl_Create();
    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    protected function txtCodiTurp_Create() {
        $this->txtCodiTurp = new QTextBox($this);
        $this->txtCodiTurp->Name = 'Código Turpial';
        $this->txtCodiTurp->Width = 100;
    }

    protected function txtGuiaSode_Create() {
        $this->txtGuiaSode = new QTextBox($this);
        $this->txtGuiaSode->Name = "Guía Sodexo";
        $this->txtGuiaSode->Width = 200;
    }

    protected function calFechDesp_Create() {
        $this->calFechDesp = new QCalendar($this);
        $this->calFechDesp->Name = QApplication::Translate('Fecha Despacho');
        $this->calFechDesp->Width = 100;
    }

    protected function txtCiudSode_Create() {
        $this->txtCiudSode = new QTextBox($this);
        $this->txtCiudSode->Name = 'Ciudad Destino';
        $this->txtCiudSode->Width = 140;
    }

    protected function txtEstaSode_Create() {
        $this->txtEstaSode = new QTextBox($this);
        $this->txtEstaSode->Name = 'Estado Destino';
        $this->txtEstaSode->Width = 140;
    }

    protected function txtRegiPorx_Create() {
        $this->txtRegiPorx = new QTextBox($this);
        $this->txtRegiPorx->Name = 'Registrado Por';
        $this->txtRegiPorx->Width = 100;
    }

    protected function calFechRegi_Create() {
        $this->calFechRegi = new QCalendar($this);
        $this->calFechRegi->Name = 'Fecha Registro';
        $this->calFechRegi->Width = 100;
    }

    protected function txtArchInpu_Create() {
        $this->txtArchInpu = new QTextBox($this);
        $this->txtArchInpu->Name = 'Archivo Input';
        $this->txtArchInpu->Width = 100;
    }

    protected function txtGuiaIdxx_Create() {
        $this->txtGuiaIdxx = new QTextBox($this);
        $this->txtGuiaIdxx->Name = 'Guía Liberty';
        $this->txtGuiaIdxx->Width = 100;
    }

    protected function txtProcPorx_Create() {
        $this->txtProcPorx = new QTextBox($this);
        $this->txtProcPorx->Name = 'Procesado Por';
        $this->txtProcPorx->Width = 100;
    }

    protected function calFechProc_Create() {
        $this->calFechProc = new QCalendar($this);
        $this->calFechProc->Name = QApplication::Translate('Fecha Proceso');
        $this->calFechProc->Width = 100;
    }

    protected function rdbCierCicl_Create() {
        $this->rdbCierCicl = new QRadioButtonList($this);
        $this->rdbCierCicl->Name = 'Ciclo Cerrado ?';
        foreach (SinoType::$NameArray as $intId => $strValue)
            $this->rdbCierCicl->AddItem(new QListItem("&nbsp;$strValue&nbsp;&nbsp;", $intId));
        $this->rdbCierCicl->RepeatColumns = 3;
        $this->rdbCierCicl->HtmlEntities = false;
    }

    //-----------------------------------
    // Acciones asociadas a los Objetos
    //-----------------------------------

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        $strMensMost = '';
        //-----------------------------------------------
        // Armo el SQL para la busqueda de registros
        //-----------------------------------------------
        $objClausula = QQ::Clause();
        if (strlen($this->txtCodiTurp->Text)) {
            $objClausula[] = QQ::Like(QQN::SodexoInput()->CodigoTurpial,trim($this->txtCodiTurp->Text).'%');
        }
        if (strlen($this->txtGuiaSode->Text)) {
            $objClausula[] = QQ::Like(QQN::SodexoInput()->GuiaSodexo,trim($this->txtGuiaSode->Text).'%');
        }
        if (strlen($this->calFechDesp->Text)) {
            $objClausula[] = QQ::Like(QQN::SodexoInput()->FechaDespacho,trim($this->calFechDesp->Text).'%');
        }
        if (strlen($this->txtCiudSode->Text)) {
            $objClausula[] = QQ::Like(QQN::SodexoInput()->Ciudad,trim($this->txtCiudSode->Text).'%');
        }
        if (strlen($this->txtEstaSode->Text)) {
            $objClausula[] = QQ::Like(QQN::SodexoInput()->Estado,trim($this->txtEstaSode->Text).'%');
        }
        if (strlen($this->txtRegiPorx->Text)) {
            $objClausula[] = QQ::Like(QQN::SodexoInput()->RegistradoPor,trim($this->txtRegiPorx->Text).'%');
        }
        if (!is_null($this->calFechRegi->DateTime)) {
            $objClausula[] = QQ::Equal(QQN::SodexoInput()->FechaRegistro,$this->calFechRegi->DateTime);
        }
        if (strlen($this->txtArchInpu->Text)) {
            $objClausula[] = QQ::Like(QQN::SodexoInput()->ArchivoInput,trim($this->txtArchInpu->Text).'%');
        }
        if (strlen($this->txtGuiaIdxx->Text)) {
            $objClausula[] = QQ::Like(QQN::SodexoInput()->GuiaId,trim($this->txtGuiaIdxx->Text).'%');
        }
        if (strlen($this->txtProcPorx->Text)) {
            $objClausula[] = QQ::Like(QQN::SodexoInput()->ProcesadoPor,trim($this->txtProcPorx->Text).'%');
        }
        if (!is_null($this->calFechProc->DateTime)) {
            $objClausula[] = QQ::Equal(QQN::SodexoInput()->FechaProceso,$this->calFechProc->DateTime);
        }
        if (!is_null($this->rdbCierCicl->SelectedValue)) {
            $objClausula[] = QQ::Equal(QQN::SodexoInput()->CierreCiclo,$this->rdbCierCicl->SelectedValue);
        }
        if (count($objClausula)){
            $intGuiaSode = SodexoInput::QueryCount(QQ::AndCondition($objClausula));
            if ($intGuiaSode > 0) {
                if ($intGuiaSode < 2000) {
                    $_SESSION['CritCons'] = serialize($objClausula);
                    QApplication::Redirect('sodexo_input_list.php');
                } else {
                    unset($_SESSION['CritCons']);
                    $strMensMost = 'Existen +2000 registros que satisfacen la consulta. Por favor sea más específico.';
                }
            } else {
                unset($_SESSION['CritCons']);
                $strMensMost = 'No existen registros que satisfagan las condiciones!';
            }
        } else {
            unset($_SESSION['CritCons']);
            $strMensMost = 'Debe proporcionar al menos un Criterio de Búsqueda!';
        }
        $this->mensaje($strMensMost,'','d','i','hand-stop-o');
    }
}

SodexoInputSearchForm::Run('SodexoInputSearchForm');
?>