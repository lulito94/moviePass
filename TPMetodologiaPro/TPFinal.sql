create database TPFinal;

use TPFinal;

create table Rooms(
	id_room integer auto_increment,
    seating integer not null,
    room_name varchar(30),
    idCinema integer,
    
    constraint pk_rooms primary key (id_room),
    constraint unq_nameRoom unique (room_name),
    constraint fk_room_cinema foreign key (idCinema) references Cinemas(idCinema)
);
create table Cinemas
(
 idCinema integer auto_increment,
 cinemaName varchar(50),
 address varchar(50),
 capacity int,
 ticketValue float,
 id_room integer,

 constraint pk_cinemas primary key(idCinema),
 constraint unq_cinemaName unique (cinemaName),
 constraint fk_cinemas_room foreign key (id_room) references Rooms(id_room)
);
select * 
from Rooms;
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

create table Genres(
	id_genre integer not null,
    name varchar(30),
    constraint pk_genre primary key (id_genre)
);

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

create table MoviesxGenres(
	id integer,
    id_genre integer,
    
    constraint pk_idMoviexGenre primary key (id,id_genre),
    constraint fk_MoviesxGenre_movie foreign key (id) references Movies(id),
	constraint fk_MoviesxGenre_genre foreign key (id_genre) references Genres(id_genre)
);


create table MovieFunctions(
	id_function integer auto_increment,
    id_room integer,
    id integer, #Movie
    function_time time,
    
    constraint pk_movieFunction primary key (id_function),
    constraint fk_movieFunction_room foreign key (id_room) references Room (id_room),
    constraint fk_movieFunction_movie foreign key (id) references Movies (id)
);

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


