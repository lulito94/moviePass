<?php
use Controllers\UserController as UserController;

if(isset($_SESSION['loggeduser']))
{

}else if(isset($_SESSION['loggedadmin']))
{

}
else{
    $volver =new UserController();
    echo '<script>alert("Lo 100To no se puede entrar aca");</script>';
    $volver->ShowLobby();
}