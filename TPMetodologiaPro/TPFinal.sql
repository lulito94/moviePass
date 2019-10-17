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
    sex varchar(9),
    name varchar(30),
    surname varchar(30),
    dni integer,
    email varchar(30),
    userName varchar(20),
    password varchar(10),
    constraint pk_idUser primary key(idUser),
    constraint unq_userName unique(userName),
    constraint unq_dni unique(dni),
    constraint unq_email unique(email)
);
drop table Genres;
create table Genres(
	id_genre integer not null,
    name varchar(30),
    constraint pk_genre primary key (id_genre)
);

drop table Genres;
select *
from Genres;

create table MoviesxGenres(
id integer not null,
id_genre integer not null,

constraint pk_id_moviexgenres primary key(id,id_genre),
constraint fk_id_movie foreign key (id) references Movies(id),
constraint fk_id_genre foreign key (id_genre) references Genres(id_genre)
);
select * 
from MoviesxGenres;
select * 
from Movies;

create table Movies(
	id integer not null,
    popularity int, 
    title varchar(500) ,
    release_date date,
    original_language varchar(4),
    vote_count integer,
    poster_path varchar(50),
    vote_average float,
    isAdult boolean,
    overview varchar(5000),
    id_genre integer,
    
    constraint pk_idMovies primary key (id),
    constraint unq_movieTitle unique (title),
    constraint fk_movies_genre foreign key (id_genre) references Genres (id_genre)
);
select *
from Cinemas;
drop table Movies;

create table MoviesXCinema(
	id integer,
    idCinema integer,
    function_time time,
    ticket_price float not null,
    tickets_sold integer,
    
    constraint pk_moviesXcinema primary key (id , idCinema),
    constraint fk_moviesXcinema_movies foreign key (id) references Movies(id),
    constraint fk_moviesXcinema_cinema foreign key (idCinema) references Cinemas(idCinema)
);
select *
from Users;


