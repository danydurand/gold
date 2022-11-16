drop view if exists v_info_awbs_and_pieces;
create view v_info_awbs_and_pieces as
  SELECT g.id guia_id,
         g.numero,
         g.tracking,
         g.cliente_corp_id,
         mc.nomb_clie cliente_corp,
         g.fecha fecha_guia,
         g.producto_id,
         p.codigo,
         g.servicio_importacion,
         g.origen_id,
         o.iata origen,
         g.receptoria_origen_id,
         ro.siglas receptoria_origen,
         g.destino_id,
         d.iata destino,
         d.zona,
         g.receptoria_destino_id,
         rd.siglas receptoria_destino,
         g.forma_pago,
         g.nombre_remitente remitente,
         g.nombre_destinatario,
         g.kilos,
         g.libras,
         g.volumen,
         g.pies_cub,
         g.piezas,
         g.valor_declarado,
         g.vendedor_id,
         g.factura_id,
         f.referencia factura,
         g.total,
         g.deleted_by,
         ne.id nota_entrega_id,
         ne.referencia,
         ta.descripcion tarifa,
         gp.id pieza_id,
         gp.id_pieza,
         gp.descripcion,
         gp.ubicacion,
         gp.pies_cub pieza_pies_cub,
         gp.kilos pieza_kilos,
         gp.last_ckpt_id,
         gp.last_ckpt_code codigo_ckpt,
         gp.last_ckpt_sucursal_id,
         s.iata,
         gp.last_ckpt_date fecha,
         gp.last_ckpt_hour hora,
         gp.last_ckpt_comment comentario,
         gp.last_ckpt_ruta_id ruta_id,
         r.codigo codigo_ruta,
         gp.last_ckpt_user_id created_by,
         gp.last_ckpt_user_login logi_usua,
				 gp.first_inventory,
         datediff(current_date,gp.first_inventory) as inventory_days,
				 datediff(current_date,gp.last_ckpt_date) as last_ckpt_days
    FROM guias g
         LEFT JOIN counter ro
      ON g.receptoria_origen_id = ro.id
         LEFT JOIN counter rd
      ON g.receptoria_destino_id = rd.id
         LEFT JOIN facturas f
      ON g.factura_id = f.id
         LEFT JOIN master_cliente mc
      ON g.cliente_corp_id = mc.codi_clie
         INNER JOIN productos p
      on g.producto_id = p.id
         INNER JOIN sucursales o
      on g.origen_id = o.id
         INNER JOIN sucursales d
      on g.destino_id = d.id
         inner join guia_piezas gp
      on g.id = gp.guia_id
         inner join sucursales s
      on gp.last_ckpt_sucursal_id = s.id
         left join rutas r
      on gp.last_ckpt_ruta_id = r.id
         left join nota_entrega ne
      on g.nota_entrega_id = ne.id
         left join fac_tarifa ta
      on g.tarifa_id = ta.id
