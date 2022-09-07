delimiter |
drop procedure if exists spu_qty_received_from_manifest;
create procedure spu_qty_received_from_manifest(mani_idxx INT, OUT cant_reci integer)
/*---------------------------------------------------------------------*/
/* This rutine returns the quantity of recaived pieces from a Manifest */
/*---------------------------------------------------------------------*/
begin
    select count(*) 
      into cant_reci
      from guia_piezas gp inner join pieza_checkpoints pc 
        on gp.id = pc.pieza_id 
     where gp.nota_entrega_id = mani_idxx
       and pc.checkpoint_id = 1;
end;
|