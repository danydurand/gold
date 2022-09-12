-- Active: 1642856890701@@127.0.0.1@3306@gold
drop view v_por_recibir_en_almacen;
create view v_por_recibir_en_almacen as
select gp.*, g.nota_entrega_id 
  FROM guia_piezas gp inner join guias g 
    on g.id = gp.guia_id
 where EXISTS (SELECT NULL 
                 from pieza_checkpoints pc inner join checkpoints c 
                   on pc.checkpoint_id = c.id
                where c.codigo in ('MC','CR')
                  and pc.pieza_id = gp.id)
   and NOT EXISTS (SELECT NULL 
                     from pieza_checkpoints pc inner join checkpoints c2
                       on pc.checkpoint_id = c2.id
                    where c2.codigo = 'RA'
                      and pc.pieza_id = gp.id)
 ORDER by id_pieza 

