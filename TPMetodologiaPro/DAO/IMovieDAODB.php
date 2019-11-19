<?php
namespace DAO;
use Models\Movie as Movie;
interface IMovieDAODB 
{
    function Add(Movie $movie);
    function DeleteMovie(Movie $movie);
    function GetAll();
}
?>