create database if not exists TPFinal;
#drop database tpfinal;
use TPFinal;


create table if not exists Cinemas
(
 idCinema int not null auto_increment,
 cinemaName varchar(50) not null,
 address varchar(50) not null,
 capacity int not null,
 ticketValue float,
 
 constraint pk_cinemas primary key(idCinema),
 constraint unq_cinemaName unique (cinemaName)
);


create table if not exists Users(
    idUser int not null auto_increment,
    sex varchar(9) not null,
    name varchar(30) not null,
    surname varchar(30)not null,
    dni int not null,
    email varchar(30) not null,
    userName varchar(20) not null,
    password varchar(10) not null,
    
    constraint pk_idUser primary key(idUser),
    constraint unq_userName unique(userName),
    constraint unq_dni unique(dni),
    constraint unq_email unique(email)
);

create table if not exists Genres(
	id_genre int not null,
    name varchar(30) not null,
    constraint pk_genre primary key (id_genre)
);


create table if not exists Movies(
	id_movie int not null,
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
    
    constraint pk_idMovies primary key (id_movie),
    constraint unq_movieTitle unique (title),
    constraint fk_movies_genre foreign key (id_genre) references Genres (id_genre)
);

#drop table MoviesxGenres;

create table if not exists MoviesxGenres(
	id_movie int,
    id_genre int,
    
    constraint pk_idMoviexGenre primary key (id_movie,id_genre),
    constraint fk_MoviesxGenre_movie foreign key (id_movie) references Movies(id_movie),
	constraint fk_MoviesxGenre_genre foreign key (id_genre) references Genres(id_genre)
);


#drop table Rooms;

create table if not exists Rooms(
	id_room int not null auto_increment,
    seating int not null,
    room_name varchar(30) not null,
    idCinema int,
    id_function int,
    
    constraint pk_rooms primary key (id_room),
    constraint unq_nameRoom unique (room_name),
    constraint fk_room_cinema foreign key (idCinema) references Cinemas(idCinema) on delete cascade,
    constraint fk_room_function foreign key (id_function) references MovieFunctions(id_function)
);
create table if not exists MovieFunctions(
	
	id_function int not null auto_increment,
    idCinema int,
    id_room int,
    id_movie int,
    function_time Datetime ,
    
    constraint pk_movieFunction primary key (id_function),
    constraint fk_movieFunction_cinema foreign key (idCinema)references Cinemas(idCinema) on delete cascade, #se borra la func si se borra el cine
    constraint fk_movieFunction_room foreign key (id_room) references Rooms (id_room) on delete cascade, #se borra la func si se borra la sala
    constraint fk_movieFunction_movie foreign key (id_movie) references Movies (id_movie) 
);
truncate table Movies;
select *
from Movies;