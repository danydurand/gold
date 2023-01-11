delimiter |
drop procedure if exists spu_qty_pieces_without_tr;
create procedure spu_qty_pieces_without_tr(guia_id integer, OUT qty_pieces integer)
/*------------------------------------------------------------------*/
/* This routine returns how many awb's pieces haven't TR checkpoint */
/*------------------------------------------------------------------*/
begin
    select count(*) into qty_pieces
      from guia_piezas 
     where guia_piezas.guia_id = guia_id
       and not exists (select null
                         from checkpoints inner join pieza_checkpoints
                           on checkpoints.id = pieza_checkpoints.checkpoint_id
                        where pieza_checkpoints.pieza_id = guia_piezas.id
                          and checkpoints.codigo = 'TR');
end;
|