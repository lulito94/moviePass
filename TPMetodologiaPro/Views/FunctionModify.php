<?php
include('header.php');
include('nav-bar.php');
//require_once ('validate-session-admin.php');
//use DAO\CinemaDAO as CinemaDAO; js
use DAO\CinemaDAODB as CinemaDAODB;
require_once ('validate-session-admin.php');


?><!-- ################################################################################################ -->
<div class="wrapper row2 bgded" >
    <div class="overlay">
        <div id="breadcrumb" class="clear">
            <ul class="pagination">
                <li><a href="<?php echo FRONT_ROOT ?>Home/ShowHome">Pagina Inicial</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>Home/ShowAdminLobby">Menu del Administrador</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- ################################################################################################ -->
<main class="d-flex align-items-center justify-content-center height-100" >
    <div class="content">
        <header class="text-center text-white">
            <h2>Modificar Horario funcion</h2>
        </header>




        <form action="<?php echo FRONT_ROOT;?>Cinema/ModifyFunction" method="post" class="login-form bg-dark-alpha p-5 text-white">
            <div class="form-group">

                <label for=""> Nuevo Horario de Funcion </label>
                <input type="datetime-local" name="function_date" value= "" class="form-control form-control-lg" placeholder="Fecha" required>
            </div>
           
<br>
            <button class="btn btn-dark btn-block btn-lg" type="submit"> Seleccionar horario </button>

        </form>
    </div>
</main>
