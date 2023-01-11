-- Active: 1642856890701@@127.0.0.1@3306@gold
delimiter |
drop procedure if exists spu_delete_records_from_process_awbs;
create procedure spu_delete_records_from_process_awbs(user_id integer)
/*----------------------------------------------------------------------------*/
/* This rutine delete the records asociated to a User from process_awbs table */
/*----------------------------------------------------------------------------*/
begin
    delete 
      from process_awbs 
     where created_by = user_id; 
end;
|
