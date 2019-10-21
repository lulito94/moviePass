<?php
namespace DAO;
use Models\User as User;
interface IUserDAO
{
    function Add(User $newUser);
    function Delete($username);
    function GetAll();

}
?>