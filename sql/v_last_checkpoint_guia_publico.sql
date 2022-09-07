drop view if exists v_last_checkpoint_guia_publico;
create view v_last_checkpoint_guia_publico as
  SELECT g.id guia_id,
         gp.id pieza_id,
         gp.id_pieza,
         gp.descripcion,
         gp.ubicacion,
         lc.checkpoint_id,
         c.codigo codigo_ckpt,
         lc.sucursal_id,
         s.iata,
         lc.fecha,
         lc.hora,
         c.descripcion_rastreo comentario,
         lc.ruta_id,
         r.codigo codigo_ruta,
         lc.created_by,
         u.logi_usua
    FROM guias g
         inner join guia_piezas gp
      on g.id = gp.guia_id
         inner join v_last_checkpoint_publico lc
      on gp.id = lc.pieza_id
         inner join checkpoints c
      on lc.checkpoint_id = c.id
         inner join sucursales s
      on lc.sucursal_id = s.id
         left join rutas r
      on lc.ruta_id = r.id
         left join usuario u
      on lc.created_by = u.codi_usua;
