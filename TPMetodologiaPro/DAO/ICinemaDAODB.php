<?php
namespace DAO;
use Models\Cinema as Cinema;
interface ICinemaDAODB 
{
    function Add(Cinema $cinema);
    function DeleteCinema($cinemaName);
    function GetAll();
    function ModifyCinema(Cinema $newCinema);
}
?>