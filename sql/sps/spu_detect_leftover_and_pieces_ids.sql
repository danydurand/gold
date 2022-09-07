-- Active: 1642856890701@@127.0.0.1@3306@gold
delimiter |
drop procedure if exists spu_detect_leftover_and_pieces_ids;
create procedure spu_detect_leftover_and_pieces_ids(
    process_id integer, 
    OUT leftover_qty integer,
    OUT cycle_completed_qty integer
)
/*--------------------------------------------------------------------------------------------*/
/* This rutine detects leftover pieces and pieces ids.  It returns how many leftover quantity */
/*--------------------------------------------------------------------------------------------*/
begin
    /*---------------------------*/
    /* Detecting leftover pieces */
    /*---------------------------*/
    update match_pieces 
       set is_leftover = 1 
     where proceso_error_id = process_id 
       and id_pieza not in (select id_pieza 
                              from guia_piezas);
    /*--------------------------*/
    /* Counting leftover pieces */
    /*--------------------------*/
    select count(*) into leftover_qty 
      from match_pieces 
     where is_leftover = 1 
       and proceso_error_id = process_id; 
    /*----------------------------------*/
    /* Getting the existent pieces' ids */
    /*----------------------------------*/
    update match_pieces
       set match_pieces.pieza_id = (select guia_piezas.id 
                                      from guia_piezas 
                                     where guia_piezas.id_pieza = match_pieces.id_pieza),
           match_pieces.is_cycle_completed = (select guia_piezas.is_cycle_completed 
                                                from guia_piezas 
                                               where guia_piezas.id_pieza = match_pieces.id_pieza)                          
     where match_pieces.proceso_error_id = process_id 
       and match_pieces.is_leftover = 0; 
    /*--------------------------------------*/
    /* Counting pieces with cycle completed */
    /*--------------------------------------*/
    select count(*) into cycle_completed_qty 
      from match_pieces 
     where is_cycle_completed = 1 
       and proceso_error_id = process_id; 
end;
|
