create database Autos;
#drop database Autos;
use Autos;

 
create table Autos(
id_auto integer auto_increment,
kilometros long,
año int,
valor float,
id_modelo integer,
patente  varchar(10),
id_titular integer,
constraint id_auto_pk primary key(id_auto),
constraint id_modelo_fk foreign key(id_modelo) references Modelos(id_modelo),
constraint id_titular_fk foreign key(id_titular) references Titular(id_titular)
);
create table Titular(
id_titular integer auto_increment,
nombre varchar(20),
apellido varchar(20),
dni int,
constraint id_titular_pk primary key(id_titular)
);

create table Modelos(
id_modelo integer auto_increment,
id_marca integer,
nombre_modelo varchar(20),
constraint id_modelo_pk primary key(id_modelo),
constraint id_marca_fk foreign key(id_marca) references Marcas(id_marca)
);

create table Multas(
id_multa integer auto_increment,
id_auto integer,
valor float,
fecha date,
constraint id_multa_pk primary key(id_multa),
constraint id_auto_fk foreign key(id_auto) references Autos(id_auto)
);

create table Marcas(
id_marca integer auto_increment,
nombre_marca varchar(20),
constraint id_marca_pk primary key(id_marca)
);


insert into Marcas(nombre_marca) values ('Ford'),('Chevrolet'),('Fiat'),('VW'),('BMW'),('Ferrari');
insert into Modelos(nombre_modelo,id_marca) values('Fiesta','1'),('Focus','1'),('Onix','2'),('Argos','3'),('Cruze','2'),('Punto','3');
insert into Titular(nombre,apellido,dni) values('Matias','Mackiewicz','41209665'),('Ezequiel','Rebasa','22505884'),('Roman','Riquelme','35047343'),('Juan','Martinez','42995566');
insert into Autos(kilometros,año,valor,patente,id_modelo,id_titular) values('10','2016','50.000','ABC123','1','2'),('20','2017','20.000','ACC157','2','3'),('30','2019','10.000','RXD631','6','1'),('50','2015','12.000','DAD255','1','1'),('80','2018','15.000','PEF175','5','4');
insert into Multas(id_auto,valor,fecha) values('1','10.000','2019-8-19'),('2','6.000','2018-3-12');
truncate table Autos;
/**mostrar todas las marcas y ademas las que tiene un modelo asignado**/
select *
from Marcas as ma
left join Modelos as mo
on mo.id_marca = ma.id_marca;


/* 1) Listar todas las marcas existentes tengan o no autos . Las que tengan mostrar las patentes*/

select ma.nombre_marca as 'Marca',mo.nombre_modelo as 'Modelo', auto.patente as 'Patente'
from Marcas as ma
left join Modelos as mo
on ma.id_marca = mo.id_marca
left join Autos as auto
on mo.id_modelo = auto.id_modelo;

/* 2) == que la 1 pero si no tiene escribir "no tiene" (pista usar if null() ) */
select ma.nombre_marca as 'Marca',ifnull(mo.nombre_modelo,"No tiene Marca") as 'Modelo', ifnull(auto.patente,"No tiene patente") as 'Patente'
from Marcas as ma
left join Modelos as mo
on ma.id_marca = mo.id_marca
left join Autos as auto
on mo.id_modelo = auto.id_modelo;

/*2.1) Mostrar la marca y la cantidad */

select ma.nombre_marca as 'Marca', count(*) as 'Cantidad AutoxMarca'
from Marcas as ma
join Modelos as mo
on ma.id_marca = mo.id_marca
join Autos as auto
on mo.id_modelo = auto.id_modelo
group by ma.id_marca;

/*2.2)Mostrar el modelo y la cantidad*/
select mo.nombre_modelo as 'Modelo', count(*) as 'Cantidad AutoxModelo'
from Modelos as mo
join Autos as auto
on mo.id_modelo = auto.id_modelo
group by mo.id_modelo;


/*2.3) contar la cantidad de modelos qe no tiene auto */
select mo.nombre_modelo as "Modelos"
from Modelos as mo
left join Autos as auto
on mo.id_modelo = auto.id_modelo
where auto.id_modelo = null;

