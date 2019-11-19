<?php
use Controllers\UserController as UserController;

if(isset($_SESSION['loggedadmin']))
{
  //nav con el nombre y horario 
}
else
{
    $volver = new UserController;
    echo '<script>alert("Debes ser Administrador para ingresar a esta seccion");</script>';
    $volver->ShowLobby();
}

?>