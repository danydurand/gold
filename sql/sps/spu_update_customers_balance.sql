delimiter |
drop procedure if exists spu_update_customers_balance;
create procedure spu_update_customers_balance()
/*-----------------------------------------------------------------------------*/
/* This rutine updates the customers balance based on v_customers_balance view */
/*-----------------------------------------------------------------------------*/
begin
    update master_cliente, v_customers_balance
       set master_cliente.saldo_excedente = v_customers_balance.saldo 
     where master_cliente.codi_clie = v_customers_balance.cliente_corp_id
       and master_cliente.saldo_excedente != v_customers_balance.saldo; 
end;
|