-- Active: 1642856890701@@127.0.0.1@3306@gold
drop VIEW IF EXISTS v_resumen_del_manifiesto;
create VIEW v_resumen_del_manifiesto as
SELECT m.id,numero,chofer_id,
                   (select count(*)
                      FROM containers m1
                           INNER JOIN container_pieza_assn
                        on m1.id = container_pieza_assn.container_id
                           INNER JOIN guia_piezas p
                        on container_pieza_assn.guia_pieza_id = p.id
                     WHERE m1.id = m.id
                       AND p.last_ckpt_code = 'OK') entregadas,
                   (select count(*)
                      FROM containers m1
                           INNER JOIN container_pieza_assn
                        on m1.id = container_pieza_assn.container_id
                           INNER JOIN guia_piezas p
                        on container_pieza_assn.guia_pieza_id = p.id
                     WHERE m1.id = m.id
                       AND p.last_ckpt_code = 'DV') devueltas,
                   (select count(*)
                      FROM containers m1
                           INNER JOIN container_pieza_assn
                        on m1.id = container_pieza_assn.container_id
                           INNER JOIN guia_piezas p
                        on container_pieza_assn.guia_pieza_id = p.id
                     WHERE m1.id = m.id
                       AND p.last_ckpt_code = 'TR') sin_gestionar,
                   (select count(*)
                      FROM containers m1
                           INNER JOIN container_pieza_assn
                        on m1.id = container_pieza_assn.container_id
                           INNER JOIN guia_piezas p
                        on container_pieza_assn.guia_pieza_id = p.id
                     WHERE m1.id = m.id
                       AND p.last_ckpt_code not in ('OK','DV')) pendientes,
                   (select count(*)
                      FROM containers m1
                           INNER JOIN container_pieza_assn
                        on m1.id = container_pieza_assn.container_id
                     WHERE m1.id = m.id) cant_piezas
  FROM containers m;