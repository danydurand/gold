<?php
//--------------------------------------------------------------------------------------------------------------------
// Programa       : asignar_cupon.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 03/08/16 01:14 PM
// Proyecto       : newliberty
// Descripcion    : Este programa permite buscar un cupón disponible en la base de datos, asignarlo a una guía
//                  y a su vez permita aplicarle el ajuste de descuento al monto base de la guía y calcule nuevamente
//                  la tarifa de la misma en base al ajuste realizado.
//--------------------------------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class AsignarCupon extends FormularioBaseKaizen {
    //-----------------------
    // Parámetros de objetos
    //-----------------------
    protected $objGuia;
    protected $objCupon;
    protected $objClieTari;

    //----------------------
    // Parámetros regulares
    //----------------------
    protected $strNumeGuia;
    protected $strReceOrig;
    protected $strPagiRetr;
    protected $intNumeCupo;
    protected $decMontDesc;

    //---------------------------
    // Parámetros de información
    //---------------------------
    protected $txtNumeCupo;
    protected $lblNumeCupo;
    protected $lblTipoCupo;
    protected $lblPorcDesc;
    protected $lblReceCupo;
    protected $lblNumeGuia;
    protected $lblMontBase;
    protected $lblMontDesc;
    protected $lblTotaDesc;

    protected function SetupValues() {
        $this->strNumeGuia = QApplication::PathInfo(0);
        $this->objGuia = Guia::Load($this->strNumeGuia);
        $this->strReceOrig = unserialize($_SESSION['ReceOrig']);
        $this->objClieTari = unserialize($_SESSION['ClieTari']);
    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->SetupValues();

        $this->lblTituForm->Text = 'Aplicación de Cupón';

        $this->txtNumeCupo_Create();

        $this->lblNumeCupo_Create();
        $this->lblTipoCupo_Create();
        $this->lblPorcDesc_Create();
        $this->lblReceCupo_Create();
        $this->lblNumeGuia_Create();
        $this->lblMontBase_Create();
        $this->lblMontDesc_Create();
        $this->lblTotaDesc_Create();

        $this->btnSave->Text = TextoIcono('cogs','Aplicar','F','lg');

        $this->txtNumeCupo->SetFocus();
    }

    //-------------------------
    // Construcción de objetos
    //-------------------------

    protected function txtNumeCupo_Create() {
        $this->txtNumeCupo = new QIntegerTextBox($this);
        $this->txtNumeCupo->Name = QApplication::Translate('Número de Cupón');
        $this->txtNumeCupo->Width = 80;
        $this->txtNumeCupo->Required = true;
        $this->txtNumeCupo->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        $this->txtNumeCupo->AddAction(new QBlurEvent(), new QAjaxAction('txtNumeCupo_Blur'));
    }

    protected function lblNumeCupo_Create() {
        $this->lblNumeCupo = new QLabel($this);
        $this->lblNumeCupo->Name = 'Cupón N°: ';
        $this->lblNumeCupo->Visible = false;
    }

    protected function lblTipoCupo_Create() {
        $this->lblTipoCupo = new QLabel($this);
        $this->lblTipoCupo->Name = 'Tipo: ';
        $this->lblTipoCupo->Visible = false;
    }

    protected function lblPorcDesc_Create() {
        $this->lblPorcDesc = new QLabel($this);
        $this->lblPorcDesc->Name = 'Porcentaje Descuento: ';
        $this->lblPorcDesc->Visible = false;
    }

    protected function lblReceCupo_Create() {
        $this->lblReceCupo = new QLabel($this);
        $this->lblReceCupo->Name = 'Receptoria: ';
        $this->lblReceCupo->Visible = false;
    }

    protected function lblNumeGuia_Create() {
        $this->lblNumeGuia = new QLabel($this);
        $this->lblNumeGuia->Name = 'Guía: ';
        $this->lblNumeGuia->Visible = false;
    }

    protected function lblMontBase_Create() {
        $this->lblMontBase = new QLabel($this);
        $this->lblMontBase->Name = 'Monto Base: ';
        $this->lblMontBase->Visible = false;
    }

    protected function lblMontDesc_Create() {
        $this->lblMontDesc = new QLabel($this);
        $this->lblMontDesc->Name = 'Monto Descuento: ';
        $this->lblMontDesc->Visible = false;
    }

    protected function lblTotaDesc_Create() {
        $this->lblTotaDesc = new QLabel($this);
        $this->lblTotaDesc->Name = 'Monto Base - Descuento: ';
        $this->lblTotaDesc->Visible = false;
    }

    //----------------------------------
    // Acciones asociadas a los objetos
    //----------------------------------

    protected function txtNumeCupo_Blur() {
        $this->intNumeCupo = $this->txtNumeCupo->Text;
        $this->lblMensUsua->Text = '';
        $strMensErro = '';
        $blnTodoOkey = true;

        if (strlen($this->intNumeCupo) > 0) {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::Cupon()->Numero,$this->intNumeCupo);

            $this->objCupon = Cupon::QuerySingle(QQ::AndCondition($objClauWher));

            if ($this->objCupon) {
                if (trim($this->objCupon->Receptoria) == trim($this->strReceOrig)) {

                    if (strlen($this->objCupon->GuiaId) == 0) {
                        //---------------------------------------------------------
                        // En caso de que el cupón corresponda a una promoción ...
                        //---------------------------------------------------------
                        if ($this->objCupon->Tipo == 'P') {
                            //--------------------------------------------------------------------------------------
                            // Si el cupón de promoción aplica un 20% de descuento, y el peso de la guía excede los
                            // 5 Kg., entonces no se podrá aplicar el mismo a la guía, y se notifica al usuario.
                            //--------------------------------------------------------------------------------------
                            if ($this->objCupon->PorcentajeDescuento == 20 && $this->objGuia->PesoGuia > 5) {
                                $strMensErro = 'El cupón N° '.$this->intNumeCupo.' pertenece a una Promocion vigente.';
                                $strMensErro .= ' Solamente es valido para guias con contenido menor o igual a 5Kg.!';
                                $blnTodoOkey = false;
                            }
                        }

                        //----------------------------------------------------------------------------
                        // Solo para información, se calcula en frío desde aquí el monto de descuento
                        //----------------------------------------------------------------------------
                        $decMontDesc = $this->objGuia->MontoBase * $this->objCupon->PorcentajeDescuento / 100;
                        $decMontBase = $this->objGuia->MontoBase - $decMontDesc;

                        $this->lblNumeCupo->Visible = true;
                        $this->lblNumeCupo->Text = $this->intNumeCupo;

                        $this->lblTipoCupo->Visible = true;
                        $this->lblTipoCupo->Text = $this->objCupon->Tipo == 'P' ? 'Promoción' : 'Normal';

                        $this->lblReceCupo->Visible = true;
                        $this->lblReceCupo->Text = $this->objCupon->Receptoria;

                        $this->lblPorcDesc->Visible = true;
                        $this->lblPorcDesc->Text = $this->objCupon->PorcentajeDescuento;

                        $this->lblNumeGuia->Visible = true;
                        $this->lblNumeGuia->Text = $this->strNumeGuia;

                        $this->lblMontDesc->Visible = true;
                        $this->lblMontDesc->Text = $decMontDesc;

                        $this->lblMontBase->Visible = true;
                        $this->lblMontBase->Text = $this->objGuia->MontoBase;

                        $this->lblTotaDesc->Visible = true;
                        $this->lblTotaDesc->Text = str_replace('.',',',$decMontBase);

                        $this->btnSave->Visible = true;
                    } else {
                        $strMensErro = 'El cupón N° '.$this->intNumeCupo.' ya ha sido asignado a otra Guía!';
                        $blnTodoOkey = false;
                    }

                } else {
                    $strMensErro = 'El cupón N° '.$this->intNumeCupo.' no es válido para esta Receptoria!';
                    $blnTodoOkey = false;
                }

            } else {
                $strMensErro = 'El cupón N° '.$this->intNumeCupo.' no está disponible!';
                $blnTodoOkey = false;
            }

            if (!$blnTodoOkey) {
                $this->mensaje($strMensErro,'','d','exclamation-triangle');

                $this->lblNumeCupo->Visible = false;
                $this->lblTipoCupo->Visible = false;
                $this->lblReceCupo->Visible = false;
                $this->lblPorcDesc->Visible = false;
                $this->lblNumeGuia->Visible = false;
                $this->lblMontDesc->Visible = false;
                $this->lblMontBase->Visible = false;
                $this->lblTotaDesc->Visible = false;

                $this->btnSave->Visible = false;
            }
        }
    }

    protected function btnSave_Click() {
        $this->ActualizarGuia();
        $this->objGuia->Save();

        $this->objCupon->UsadoPor        = $this->objUsuario->LogiUsua;
        $this->objCupon->UsadoEl         = new QDateTime(QDateTime::Now);
        $this->objCupon->GuiaId          = $this->strNumeGuia;
        $this->objCupon->MontoDescuento  = $this->decMontDesc;
        $this->objCupon->Save();

        $this->mensaje("El Cupo N° $this->intNumeCupo Se ha asignado exitosamente a la guía N° $this->strNumeGuia",'','s','check');
    }

    protected function btnCancel_Click() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__."/".$objUltiAcce->__toString());
    }

    //------------------------------
    // Otras funciones del programa
    //------------------------------

    protected function RecalcularTarifa() {
        $arrParaTari['dttFechGuia'] = $this->objGuia->FechGuia->__toString("YYYY-MM-DD");
        $arrParaTari['strCodiOrig'] = $this->objGuia->EstaOrig;
        $arrParaTari['strCodiDest'] = $this->objGuia->EstaDest;
        $arrParaTari['dblPesoGuia'] = $this->objGuia->PesoGuia;
        $arrParaTari['dblValoDecl'] = $this->objGuia->ValorDeclarado;
        $arrParaTari['intChecAseg'] = $this->objGuia->Asegurado;
        $arrParaTari['dblPorcSgro'] = $this->objGuia->PorcentajeSeguro;
        $arrParaTari['dblPorcDiva'] = $this->objGuia->PorcentajeIva;
        $arrParaTari['decSgroClie'] = $this->objClieTari->PorcentajeSeguro;
        $arrParaTari['decPorcDesc'] = $this->objCupon->PorcentajeDescuento;

        $arrValoTari = calcularTarifaParcialPmn($arrParaTari);

        return $arrValoTari;
    }

    protected function ActualizarGuia() {
        $arrValoTari = $this->RecalcularTarifa();

        $blnTodoOkey = $arrValoTari['blnTodoOkey'];
        $strMensUsua = $arrValoTari['strMensUsua'];
        $dblMontBase = $arrValoTari['dblMontBase'];
        $dblFranPost = $arrValoTari['dblFranPost'];
        $dblMontDiva = $arrValoTari['dblMontDiva'];
        $dblMontSgro = $arrValoTari['dblMontSgro'];
        $dblMontTota = $arrValoTari['dblMontTota'];
        $dblMontOtro = $arrValoTari['dblMontOtro'];

        $this->decMontDesc = $arrValoTari['decMontDesc'];

        if ($blnTodoOkey) {
            $this->objGuia->MontoBase = $dblMontBase;
            $this->objGuia->MontoFranqueo = $dblFranPost;
            $this->objGuia->MontoIva = $dblMontDiva;
            $this->objGuia->MontoSeguro = $dblMontSgro;
            $this->objGuia->MontoOtros = $dblMontOtro;
            $this->objGuia->MontoTotal = $dblMontTota;
        } else {
            $this->lblMensUsua->Text = $strMensUsua;
            $this->lblMensUsua->ForeColor = 'yellow';
        }
    }
}

AsignarCupon::Run('AsignarCupon');