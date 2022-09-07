drop view if exists v_aptas_para_trasladar_receptoria;
create view v_aptas_para_trasladar_receptoria as
select g.numero, g.origen_id, g.receptoria_origen_id, g.created_by, g.fecha, gp.*
  FROM guia_piezas gp inner join guias g
    on g.id = gp.guia_id
       INNER JOIN productos p
    on g.producto_id = p.id
 where p.codigo in ('NAC','EXP')
   and g.deleted_at is null
   and EXISTS (SELECT NULL
                 from pieza_checkpoints pc inner join checkpoints c
                   on pc.checkpoint_id = c.id
                where c.codigo = 'PU'
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
