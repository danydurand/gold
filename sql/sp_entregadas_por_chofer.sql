delimiter |
drop procedure if exists entregadas_x_chofer_x_rango;
create procedure entregadas_x_chofer_x_rango(fech_inic date, fech_fina date, codi_chof integer)
/*---------------------------------------------------------------------*/
/* This rutine feeds guia_piezas table with every piece last checkoint */
/*---------------------------------------------------------------------*/
begin
    if codi_chof = -1 then
      select chofer.nombre chofer,fecha,sum(c.piezas) piezas, sum(c.cantidad_ok) entregadas 
        from containers c inner join chofer  
          on c.chofer_id = chofer.codi_chof 
       where fecha between fech_inic and fech_fina
       group by 1,2 with rollup;
    else
      select chofer.nombre chofer,fecha,sum(c.piezas) piezas, sum(c.cantidad_ok) entregadas 
        from containers c inner join chofer  
          on c.chofer_id = chofer.codi_chof 
       where fecha between fech_inic and fech_fina
         and chofer.codi_chof = codi_chof
       group by 1,2 with rollup;
    end if;
end;
|