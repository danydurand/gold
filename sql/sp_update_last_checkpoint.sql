delimiter |
drop procedure if exists sp_update_last_checkpoint;
create procedure sp_update_last_checkpoint()
/*---------------------------------------------------------------------*/
/* This rutine feeds guia_piezas table with every piece last checkoint */
/*---------------------------------------------------------------------*/
begin
    update guia_piezas, v_last_checkpoint 
       set guia_piezas.last_ckpt_id = v_last_checkpoint.id, 
           guia_piezas.last_ckpt_code = (select codigo 
                                           from checkpoints 
                                          where checkpoints.id = v_last_checkpoint.checkpoint_id 
                                            and v_last_checkpoint.pieza_id = guia_piezas.id), 
           guia_piezas.is_cycle_completed = (select terminal 
                                               from checkpoints 
                                              where checkpoints.id = v_last_checkpoint.checkpoint_id 
                                                and v_last_checkpoint.pieza_id = guia_piezas.id), 
           guia_piezas.last_ckpt_sucursal_id = v_last_checkpoint.sucursal_id, 
           guia_piezas.last_ckpt_date = v_last_checkpoint.fecha, 
           guia_piezas.last_ckpt_hour = v_last_checkpoint.hora, 
           guia_piezas.last_ckpt_comment = v_last_checkpoint.comentario, 
           guia_piezas.last_ckpt_ruta_id = v_last_checkpoint.ruta_id, 
           guia_piezas.last_ckpt_user_id = v_last_checkpoint.created_by, 
           guia_piezas.last_ckpt_user_login = (select logi_usua 
                                                 from usuario 
                                                where usuario.codi_usua = v_last_checkpoint.created_by 
                                                  and v_last_checkpoint.pieza_id = guia_piezas.id) 
     where guia_piezas.id = v_last_checkpoint.pieza_id 
       and guia_piezas.last_ckpt_id != v_last_checkpoint.id; 

    update guia_piezas, v_last_checkpoint 
       set guia_piezas.last_ckpt_id = v_last_checkpoint.id, 
           guia_piezas.last_ckpt_code = (select codigo 
                                           from checkpoints 
                                          where checkpoints.id = v_last_checkpoint.checkpoint_id 
                                            and v_last_checkpoint.pieza_id = guia_piezas.id), 
           guia_piezas.is_cycle_completed = (select terminal 
                                               from checkpoints 
                                              where checkpoints.id = v_last_checkpoint.checkpoint_id 
                                                and v_last_checkpoint.pieza_id = guia_piezas.id), 
           guia_piezas.last_ckpt_sucursal_id = v_last_checkpoint.sucursal_id, 
           guia_piezas.last_ckpt_date = v_last_checkpoint.fecha, 
           guia_piezas.last_ckpt_hour = v_last_checkpoint.hora, 
           guia_piezas.last_ckpt_comment = v_last_checkpoint.comentario, 
           guia_piezas.last_ckpt_ruta_id = v_last_checkpoint.ruta_id, 
           guia_piezas.last_ckpt_user_id = v_last_checkpoint.created_by, 
           guia_piezas.last_ckpt_user_login = (select logi_usua 
                                                 from usuario 
                                                where usuario.codi_usua = v_last_checkpoint.created_by 
                                                  and v_last_checkpoint.pieza_id = guia_piezas.id) 
     where guia_piezas.id = v_last_checkpoint.pieza_id 
       and guia_piezas.last_ckpt_id is null; 
end;
|
