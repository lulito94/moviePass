
use TPFinal;

create table Cinemas
(
 idCinema integer auto_increment,
 cinemaName varchar(50),
 address varchar(50),
 capacity int,
 constraint id_cinema_pk primary key(idCinema),
 constraint unq_cinemaName unique (cinemaName)
)

select *
from Cinemas;

create table Movies
(

)