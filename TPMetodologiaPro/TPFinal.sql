create database TPFinal;

use TPFinal;

create table Cinemas
(
 idCinema integer auto_increment,
 cinemaName varchar(50),
 address varchar(50),
 capacity int,
 constraint id_cinema_pk primary key(idCinema),
 constraint unq_cinemaName unique (cinemaName)
);

create table Users(
    idUser integer auto_increment,
    userName varchar(20),
    password varchar(10),
    email varchar(30),
    constraint pk_idUser primary key(idUser),
    constraint unq_userName unique (userName)
);

select *
from Cinemas;
