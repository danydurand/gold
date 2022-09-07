-- Active: 1642856890701@@127.0.0.1@3306@gold
delimiter |
drop procedure if exists spu_insert_pieces_with_error_in_error_table;
create procedure spu_insert_pieces_with_error_in_error_table(process_id integer)
begin
    /*---------------------------------------------------------------------------------------*/
    /* The leftover pieces must be register in error detail table to be watched by the User  */
    /*---------------------------------------------------------------------------------------*/
    insert 
      into detalle_error 
           (proceso_id, referencia, mensaje_error, comentario) 
    select process_id, 
           id_pieza, 
           'La Pieza NO Existe - Sobrante', 
           'Match Scanneo' 
      from match_pieces 
     where match_pieces.proceso_error_id = process_id
       and match_pieces.is_leftover = 1; 
    /*------------------------------------------------------------------------------------------------------*/
    /* The pieces which cycle is complete, must be register in error detail table to be watched by the User */
    /*------------------------------------------------------------------------------------------------------*/
    insert 
      into detalle_error 
           (proceso_id, referencia, mensaje_error, comentario) 
    select process_id, 
           id_pieza, 
           'Pieza Entregada - No Admite Incidencias', 
           'Match Scanneo' 
      from match_pieces 
     where match_pieces.proceso_error_id = process_id 
       and match_pieces.is_cycle_completed = 1;        

end;
|
