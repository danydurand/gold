alter table facturas
add constraint chk_manif_qty CHECK (select count(*)
                                      from nota_entrega.factura_id >=18 AND City='Sandnes')