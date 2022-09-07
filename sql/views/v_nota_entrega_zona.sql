-- Active: 1660919823416@@127.0.0.1@3306@gold
drop view if exists v_nota_entrega_zona;
create VIEW v_nota_entrega_zona AS 
select z.descripcion AS zona,
       nz.nota_entrega_id AS nota_entrega_id,
       n.referencia AS manifiesto,
       nz.piezas AS piezas,
       nz.kilos AS kilos,
       nz.pies_cub AS pies_cub,
       nz.precio AS precio,
       nz.total AS total 
   from nota_entrega_zona nz join v_zona_de_facturacion z 
     on z.codigo = nz.zona 
        join nota_entrega n 
     on nz.nota_entrega_id = n.id 
  order by z.descripcion;