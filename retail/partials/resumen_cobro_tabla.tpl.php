                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-condensed" style="font-size: 13px">
                            <thead>
                                <tr>
                                    <th colspan="2" style="text-align: right">Dolares&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th style="text-align: right">Bs&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="30%" style="vertical-align: middle">
                                        <span class="etiqueta">Total</span>
                                    </td>
                                    <td style="text-align: right"><?php $this->txtTotaDola->Render(); ?></td>
                                    <td style="text-align: right"><?php $this->txtTotal->Render(); ?></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: middle">
                                        <span class="etiqueta">Cobro</span>
                                    </td>
                                    <td style="text-align: right"><?php $this->txtCobrDola->Render(); ?></td>
                                    <td style="text-align: right"><?php $this->txtMontoCobrado->Render(); ?></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: middle">
                                        <span class="etiqueta">Pendiente</span>
                                    </td>
                                    <td style="text-align: right"><?php $this->txtPendDola->Render(); ?></td>
                                    <td style="text-align: right"><?php $this->txtMontoPendiente->Render(); ?></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: middle">
                                        <span class="etiqueta">Cambio</span>
                                    </td>
                                    <td style="text-align: right"><?php $this->txtCambDola->Render(); ?></td>
                                    <td style="text-align: right"><?php $this->txtCambBoli->Render(); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
