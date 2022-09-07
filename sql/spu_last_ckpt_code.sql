delimiter |
drop procedure if exists spu_last_ckpt_code;
create procedure spu_last_ckpt_code(guia_idxx integer, cant_piez integer)
/*----------------------------------------------------------------*/
/* This rutine returns the last checkpoint code of the given guia */
/*----------------------------------------------------------------*/
begin
    declare v_ckpt_code varchar(2);
    declare v_cant_piez int;

    declare cur1 cursor for 
    select last_ckpt_code, count(*)
      from guia_piezas    
     where guia_id = guia_idxx
     group by 1
     limit 1;
    
    open cur1;
    fetch cur1 into v_ckpt_code,v_cant_piez;
    close cur1;

    if cant_piez = v_cant_piez then
        select v_ckpt_code;
    else
        select "MX";
    end if;
end;
|