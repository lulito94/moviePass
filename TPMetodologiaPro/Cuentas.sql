create database Cuentas;
use Cuentas;
create table Cuentas(
id_cuenta integer auto_increment,
numero int,
razon_social varchar(30),
constraint id_cuenta_pk primary key(id_cuenta)
);

create table Depositos(
id_deposito integer auto_increment,
id_cuenta integer,
fecha date,
monto float,
constraint id_deposito_pk primary key(id_deposito),
constraint id_cuenta_fk foreign key(id_cuenta) references Cuentas(id_cuenta)
);

create table Extracciones(
id_extraccion integer auto_increment,
id_cuenta integer,
fecha date,
monto float,
constraint id_extraccion_pk primary key(id_extraccion),
constraint id_cuenta_fk foreign key(id_cuenta) references Cuenta(id_cuenta)
);

insert into Cuentas(numero,razon_social) values('41','MatiSA'),('40','EzeSCS'),('39','RocaSCA');
insert into Depositos(id_cuenta,fecha,monto) values('1','2019-2-19','40000'),('2','2019-10-9','12000'),('3','2018-12-26','100000'),('1','2019-10-4','20000');
insert into Extracciones(id_cuenta,fecha,monto) values('1','2019-2-19','15500'),('2','2019-10-9','3000'),('3','2018-12-26','35000'),('3','2019-10-4','21500');


/*datepart*/
/**tiene que tener el mismo numero de columnas para */
select * from depositos;

(select 'Depositos' as 'Tipo de movimiento','+',id_deposito,fecha,monto from Depositos limit 3)

union all /*union all mete los duplicados tambien*/
(select 'Extracciones','-',id_extraccion,fecha,monto from Extracciones limit 3);
/*limit 2;  los dos primeros registro muestra nada mas*/


(select 'Depositos' , sum(monto) as 'Total' from Depositos)
union all
(select 'Extracciones', sum(monto) from Extracciones);


