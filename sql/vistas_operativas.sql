drop view if exists v_por_recibir_en_almacen;
create view v_por_recibir_en_almacen as
select gp.*, g.nota_entrega_id 
  FROM guia_piezas gp inner join guias g 
    on g.id = gp.guia_id
 where EXISTS (SELECT NULL 
                 from pieza_checkpoints pc inner join checkpoints c 
                   on pc.checkpoint_id = c.id
                where c.codigo = 'CM'
                  and pc.pieza_id = gp.id)
   and NOT EXISTS (SELECT NULL 
                     from pieza_checkpoints pc inner join checkpoints c2
                       on pc.checkpoint_id = c2.id
                    where c2.codigo = 'RA'
                      and pc.pieza_id = gp.id)
   and NOT EXISTS (SELECT NULL 
                     from pieza_checkpoints pc inner join checkpoints c3
                       on pc.checkpoint_id = c3.id
                    where c3.codigo = 'OK'
                      and pc.pieza_id = gp.id)
 ORDER by id_pieza;

drop view if exists v_aptas_para_trasladar;
create view v_aptas_para_trasladar as
select gp.*, g.destino_id
  FROM guia_piezas gp inner join guias g 
    on g.id = gp.guia_id
 where EXISTS (SELECT NULL 
                 from pieza_checkpoints pc inner join checkpoints c 
                   on pc.checkpoint_id = c.id
                where c.codigo = 'RA'
                  and pc.pieza_id = gp.id)
   and NOT EXISTS (SELECT NULL 
                     from pieza_checkpoints pc inner join checkpoints c2
                       on pc.checkpoint_id = c2.id
                    where c2.codigo = 'TR'
                      and pc.pieza_id = gp.id)
   and NOT EXISTS (SELECT NULL 
                     from pieza_checkpoints pc inner join checkpoints c3
                       on pc.checkpoint_id = c3.id
                    where c3.codigo = 'OK'
                      and pc.pieza_id = gp.id);


