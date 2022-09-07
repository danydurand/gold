-- Active: 1642856890701@@127.0.0.1@3306@gold
delimiter |
drop procedure if exists spu_delete_user_records;
create procedure spu_delete_user_records(user_id integer)
/*---------------------------------------------------------------------------*/
/* This rutine delete the pieces asociated to a User from match_pieces table */
/*---------------------------------------------------------------------------*/
begin
    delete 
      from match_pieces 
     where created_by = user_id; 
end;
|
