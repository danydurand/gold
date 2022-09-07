delimiter |
drop procedure if exists sp_update_nota_entrega_pieces;
create procedure sp_update_nota_entrega_pieces()
/*------------------------------------------------------------------*/
/* This rutine feeds the nota_entrega_id field in guia_piezas table */
/*------------------------------------------------------------------*/
begin
    update guia_piezas gp, guias g
       set gp.nota_entrega_id = g.nota_entrega_id
     where gp.guia_id = g.id;
end;
|
