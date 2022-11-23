*************************************************************************************************************
****************************************BASE DE DATOS DE PLUGINPLUS******************************************
****************************************__________________________*******************************************
/*ROL 1 = ADMINISTRADOR
  ROL 2 = EMPLEADO
  ROL 3 = AYUDANTE  */


drop database tienda;
create database tienda;
use tienda;

Drop table usuarios;

create table usuarios(
nombre varchar(100) not null,
apellidoPa varchar(100) not null,
apellidoMa varchar(100) not null,
matricula varchar(100) not null,
password varchar(100) not null,
rol int(1) not null,
PRIMARY KEY (matricula))engine=InnoDB;

select * from usuarios;

insert into usuarios(nombre,apellidoPa,apellidoMa,matricula,password,rol)
values ('Ernesto','Arauz','Júarez','EAJ-ET1','18302030',1);
select * from usuarios;

insert into usuarios(nombre,apellidoPa,apellidoMa,matricula,password,rol)
values ('Yassmin Elizabeth','García','Hernández','YEGH-ET2','123',2);
select * from usuarios;

insert into usuarios(nombre,apellidoPa,apellidoMa,matricula,password,rol)
values ('Cristofer Jair','López','Rojas','CFF-ET3','S_23F_G',3);
select * from usuarios;

insert into usuarios(nombre,apellidoPa,apellidoMa,matricula,password,rol)
values ('Pedro Edwin','Nolasco','Rosas','PENR-ET3','QWER_DE2_S',3);
select * from usuarios;



Drop table productos;

create table productos(
id varchar(100) not null,
nombre varchar(100) not null,
modelo varchar(100) not null,
marca varchar(100) not null,
precio int not null,
cantidad int not null,
almacen varchar(100) not null,
numeroDeParte varchar(100) not null,
observaciones varchar(200) not null,
PRIMARY KEY (id))engine=InnoDB;

select * from productos;

insert into productos(id,nombre,modelo,marca,precio,cantidad,almacen,numeroDeParte,observaciones)
values ('01','Teclado','Y19','Dell',200,2,'2','S/N','');
select * from productos;











****************************************__________________________*******************************************
****************************************BASE DE DATOS DE PLUGINPLUS******************************************
*************************************************************************************************************