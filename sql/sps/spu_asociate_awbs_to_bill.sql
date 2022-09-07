-- Active: 1642856890701@@127.0.0.1@3306@gold
delimiter |
drop procedure if exists spu_asociate_awbs_to_bill;
create procedure spu_asociate_awbs_to_bill(manifest_id integer, bill_id integer)
/*------------------------------------------------------------------------------*/
/* This rutine asocaites the awbs that belong to a Manifest, to a specific bill */
/*------------------------------------------------------------------------------*/
begin
    update guias
       set guias.factura_id = bill_id
     where guias.nota_entrega_id = manifest_id;
end;
|
