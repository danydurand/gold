delimiter |
create view v_fecha_ultima_guia as
select codi_clie,
       (select max(fech_guia)
          from guia
         where codi_clie = master_cliente.codi_clie) as ultima_fecha
  from master_cliente
|
