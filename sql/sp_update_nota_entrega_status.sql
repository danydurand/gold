delimiter |
drop procedure if exists sp_update_nota_entrega_status;
create procedure sp_update_nota_entrega_status(ckpt_idxx integer, sucu_idxx integer, text_ckpt char(100), codi_usua integer, nota_idxx integer)
/*------------------------------------------------------------------------------------*/
/* This rutine insert a checkpoint for every piece that belongs to a Nota de Entrega  */
/*------------------------------------------------------------------------------------*/
begin
    insert 
      into pieza_checkpoints
           (pieza_id, checkpoint_id, sucursal_id, fecha, hora, comentario, created_at, created_by)
    select id,
           ckpt_idxx,
           sucu_idxx,
           CURRENT_DATE(),
           SUBSTR(CURTIME(),1,5),
           text_ckpt,
           CURRENT_DATE(),
           codi_usua
      from guia_piezas 
     where nota_entrega_id = nota_idxx
       and last_ckpt_id not in (select id from checkpoints where terminal = 1)
    union
    select id,
           ckpt_idxx,
           sucu_idxx,
           CURRENT_DATE(),
           SUBSTR(CURTIME(),1,5),
           text_ckpt,
           CURRENT_DATE(),
           codi_usua
     from guia_piezas 
    where nota_entrega_id = nota_idxx
      and last_ckpt_id is null;
end;
|
