-- Active: 1642856890701@@127.0.0.1@3306@gold
delimiter |
drop procedure if exists spu_insert_received_checkpoint;
create procedure spu_insert_received_checkpoint(
    xcheckpoint_id integer, 
    xsucursal_id integer,
    ckpt_description varchar(30),
    user_id integer,
    process_id integer
)
/*-----------------------------------------------------------------------------------------*/
/* This rutine insert a received checkpoint for every piece existent in match_pieces table */
/* that not is a leftover and which cycle is not completed                                 */
/*-----------------------------------------------------------------------------------------*/
begin
    insert 
      into pieza_checkpoints 
           (pieza_id, checkpoint_id, sucursal_id, fecha, hora, comentario, created_at, created_by) 
    select match_pieces.pieza_id, 
           xcheckpoint_id, 
           xsucursal_id, 
           CURRENT_DATE(), 
           SUBSTR(CURTIME(),1,5), 
           ckpt_description, 
           CURRENT_DATE(), 
           user_id 
      from match_pieces 
     where match_pieces.proceso_error_id = process_id
       and match_pieces.is_leftover = 0 
       and match_pieces.pieza_id is not null 
       and match_pieces.is_cycle_completed = 0; 
end;
|
