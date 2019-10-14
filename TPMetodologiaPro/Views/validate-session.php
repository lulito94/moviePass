<?php
use Controllers\UserController as UserController;
  if(isset($_SESSION['loggeduser']))
  {
    //aca habria que poner tipo un nav con el nombre del tipo
     
  }
  else
  {
    $volver =new UserController();
    echo '<script>alert("Debes loguearte antes!");</script>';
    $volver->ShowLobby();
  }
?>