-- Active: 1642856890701@@127.0.0.1@3306@gold
delimiter |
drop procedure if exists spu_marking_awbs_as_ready_to_go;
create procedure spu_marking_awbs_as_ready_to_go(
    process_id integer, 
    user_id integer,
    OUT errors_qty integer
)
/*--------------------------------------------------------------------*/
/* This rutine marks awbs and their correspoing pieces as ready to go */
/*--------------------------------------------------------------------*/
begin
    /*-------------------------*/
    /* Detecting existing awbs */
    /*-------------------------*/
    update process_awbs, guias
       set process_awbs.guia_id = guias.id 
     where process_awbs.tracking = guias.tracking
       and process_awbs.proceso_error_id = process_id; 
    /*---------------------------*/
    /* Marking non existent awbs */
    /*---------------------------*/
    update process_awbs 
       set is_processed = 0,
           error_message = 'Guia no existe'
     where guia_id is null
       and proceso_error_id = process_id;
    /*-----------------------------*/
    /* Marking awbs as ready to go */
    /*-----------------------------*/
    update guias 
       set guias.is_ready_to_go = 1,
           guias.ready_to_go_date = current_date(),
           guias.ready_to_go_user_id = user_id
     where guias.id in (select guia_id
                          from process_awbs
                         where process_awbs.proceso_error_id = process_id
                           and is_processed is null);
    /*--------------------------*/
    /* Couting awbs with errors */
    /*--------------------------*/
    select count(*) into errors_qty 
      from process_awbs 
     where is_processed = 0 
       and proceso_error_id = process_id; 
    /*---------------------------------------------*/
    /* Inserting pieces_id in process_prices table */
    /*---------------------------------------------*/
    insert 
      into process_pieces
           (proceso_error_id, id_pieza, pieza_id, created_at, created_by)
    select process_id, id_pieza, id, current_date(), user_id
      from guia_piezas 
     where guia_piezas.guia_id in (select guia_id
                                     from process_awbs);
    /*----------------------------*/
    /* Detecting delivered pieces */
    /*----------------------------*/
    update process_pieces, guia_piezas
       set process_pieces.is_processed = 0,
           process_pieces.error_message = 'Pieza ya Entregada'
     where process_pieces.pieza_id = guia_piezas.id
       and process_pieces.proceso_error_id = process_id
       and guia_piezas.last_ckpt_code = 'OK';
    /*-------------------------------*/
    /* Marking pieces as Ready to Go */
    /*-------------------------------*/
    update guia_piezas
       set guia_piezas.is_ready_to_go = 1,
           guia_piezas.ready_to_go_date = current_date(),
           guia_piezas.ready_to_go_user_id = user_id
     where guia_piezas.id in (select pieza_id
                                from process_pieces
                               where process_pieces.proceso_error_id = process_id
                                 and is_processed is null);
    /*-----------------------------------------*/
    /* Inserting errors in detalle_error table */
    /*-----------------------------------------*/
    insert 
      into detalle_error
           (proceso_id, referencia, mensaje_error, comentario)
    select process_id, CONCAT('Guia: ',tracking), error_message, 'Marcando guia con Ready to Go'
      from process_awbs 
     where is_processed = 0;
    insert 
      into detalle_error
           (proceso_id, referencia, mensaje_error, comentario)
    select process_id, CONCAT('Pieza: ',id_pieza), error_message, 'Marcando pieza con Ready to Go'
      from process_pieces 
     where is_processed = 0;
    /*--------------------------------------*/
    /* Couting errors and completed records */
    /*--------------------------------------*/
    select count(*) + errors_qty into errors_qty 
      from process_pieces 
     where is_processed = 0 
       and proceso_error_id = process_id; 
end;
|
