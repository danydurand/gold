

DROP VIEW IF EXISTS v_despachadas_y_no_entregadas;
create VIEW v_despachadas_y_no_entregadas as
select gp.*
  FROM guia_piezas gp inner join guias g
    on g.id = gp.guia_id
 where EXISTS (SELECT NULL
                from pieza_checkpoints pc inner join checkpoints c
                  on pc.checkpoint_id = c.id
               where c.codigo in ('TR','ER')
                 and pc.pieza_id = gp.id)
   and NOT EXISTS (SELECT NULL
                     from pieza_checkpoints pc inner join checkpoints c3
                       on pc.checkpoint_id = c3.id
                    where c3.codigo = 'OK'
                      and pc.pieza_id = gp.id)
 ORDER by id_pieza;

DROP VIEW IF EXISTS v_recibidas_y_no_despachadas;
create VIEW v_recibidas_y_no_despachadas as
select gp.*
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
                    where c2.codigo in ('TR','ER')
                      and pc.pieza_id = gp.id)
   and NOT EXISTS (SELECT NULL
                     from pieza_checkpoints pc inner join checkpoints c3
                       on pc.checkpoint_id = c3.id
                    where c3.codigo = 'OK'
                      and pc.pieza_id = gp.id)
 ORDER by id_pieza;

DROP VIEW IF EXISTS v_cargadas_y_no_recibidas;
create VIEW v_cargadas_y_no_recibidas as
select gp.*
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

