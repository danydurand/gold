-- Active: 1642856890701@@127.0.0.1@3306@gold

drop view IF EXISTS v_customers_balance;
create view v_customers_balance as 
select cliente_corp_id,
       razon_social,
       (monto_a_favor-monto_pendiente) as saldo
  from (
select codi_clie as cliente_corp_id,
       nomb_clie as razon_social,
       (select if(sum(monto_pendiente),sum(monto_pendiente),0)
          from facturas 
         where cliente_corp_id = codi_clie 
           and estatus_pago in ('PENDIENTE','PAGOPARCIAL') 
           and estatus != 'ANULADA') as monto_pendiente,
       (select if(sum(monto),sum(monto),0) 
          from nota_credito_corp 
         where cliente_corp_id = codi_clie 
           and estatus = 'DISPONIBLE' ) as monto_a_favor
  from master_cliente
  ) as x