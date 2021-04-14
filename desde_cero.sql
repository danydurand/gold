
-- (1) Se crea el Sistema
insert into sistema values (default,'OKINAWA');

-- (2) Se crea el primer Grupo 
insert into grupo values (default,'SUPERUSUARIO',1,true,'2015-10-01','ddurand',null,null);

-- (3) Se crea los tipos de Opciones
insert into tipo_opci_type values (0,'MENU');
insert into tipo_opci_type values (1,'PROGRAMA');

-- (4) Se crean las primeras Opciones
insert into opcion values (default,'Login','oki',1,true,'index.php',null,null,null,null,null);
insert into opcion values (default,'Menu Ppal','oki',0,true,'main','okinawa',0,1,null,0);
insert into opcion values (default,'Admin','oki',0,true,'admin','okinawa',1,2,null,0);
insert into opcion values (default,'Tablas','oki',0,true,'tablas','okinawa',2,2,null,0);
insert into opcion values (default,'Opciones','oki',1,true,'opcion_list.php','okinawa',1,2,'carpeta_verde.png',1);
insert into opcion values (default,'Crear/Editar Opcion','oki',1,true,'opcion_edit.php','okinawa',null,5,null,1);

-- (5) Se crea la primera Sucursal
insert into sucursal values (default,'CARACAS',true,true,'2015-10-01','ddurand',null,null);

-- (6) Se crea el primer Usuario
insert into usuario values (default,'DANIEL DURAND','ddurand','1234',1,true,'CCS','danydurand@gmail.com',0,null,'2015-10-01');
update usuario set password = md5('okinawa14') where login = 'ddurand';

-- (7) Se crean algunos Medios Publicitarios
insert into medio_pub values (default,'PRENSA',true,'2015-10-01','ddurand',null,null);
insert into medio_pub values (default,'RADIO',true,'2015-10-01','ddurand',null,null);
insert into medio_pub values (default,'TELEVISION',true,'2015-10-01','ddurand',null,null);
insert into medio_pub values (default,'REDES SOCIALES',true,'2015-10-01','ddurand',null,null);
insert into medio_pub values (default,'UN(A) AMIGO(A)',true,'2015-10-01','ddurand',null,null);
insert into medio_pub values (default,'PANFLETO',true,'2015-10-01','ddurand',null,null);

-- (8) Se crean tipos de vendedores
insert into tipo_vendedor values (default,'NOMINA');
insert into tipo_vendedor values (default,'FREELANCER');

-- (9) Se crea un vendedor
insert into vendedor values (default,'PAGINA WEB','9999999',1,20,true,'2015-10-01','ddurand',null,null);


