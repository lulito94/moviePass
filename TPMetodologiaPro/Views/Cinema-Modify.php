<?php
include('header.php');
include('nav-bar.php');
//require_once ('validate-session-admin.php');
//use DAO\CinemaDAO as CinemaDAO; js
use DAO\CinemaDAODB as CinemaDAODB;
require_once ('validate-session-admin.php');


// $repo = new CinemaDAO(); js
$repo = new CinemaDAODB();

$cinemaList = $repo->GetAll();
?><!-- ################################################################################################ -->
<div class="wrapper row2 bgded" style="background-image:url('../images/demo/backgrounds/1.png');">
    <div class="overlay">
        <div id="breadcrumb" class="clear">
            <ul>
                <li><a href="<?php echo FRONT_ROOT ?>Home/ShowHome">Pagina Inicial</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>Home/ShowAdminLobby">Menu del Administrador</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- ################################################################################################ -->
<main class="d-flex align-items-center justify-content-center height-100" >
    <div class="content">
        <header class="text-center">
            <h2>Modificar Cinema</h2>
        </header>




        <form action="<?php echo FRONT_ROOT;?>Cinema/Modify" method="post" class="login-form bg-dark-alpha p-5 text-white">
            <div class="form-group">

                <label for="">Selecionar cinema a modificar</label>
                    <?php
                    if(isset($cinemaList) && !empty($cinemaList)){
                        foreach($cinemaList as $cinema){
                            ?>
                            <button type="submit" name="idCinema" class="btn btn-danger"  onclick = "this.form.action = '<?php echo FRONT_ROOT;?>Cinema/SetIdCinema'" value="<?php echo $cinema->getIdCInema();?>"> <?php echo $cinema->getCinemaName(); ?> </button>
                        <?php }
                    }
                    ?>


                <label for=""> Nuevo Nombre </label>
                <input type="text" name="cinemaName" class="form-control form-control-lg" placeholder="Nombre" >
            </div>
            <div class="form-group">
                <label for=""> Nueva Direccion </label>
                <input type="text" name="address" class="form-control form-control-lg" placeholder="Direccion" >
            </div>
            <div class="form-group">
                <?php // Si sobra tiempo mejorar tipo de dato de los horarios ?>
                <label for=""> Nueva Capacidad </label>
                <input type="number" name="capacity" class="form-control form-control-lg" placeholder="Capacidad" >
            </div>
            <div class="form-group">
                <label for=""> Nuevo Valor de ticket</label>
                <input type="number" name="ticketValue" class="form-control form-control-lg" placeholder="Valor Ticket" >
            </div>

<br>
            <button class="btn btn-dark btn-block btn-lg" type="submit"> Modificar Cine </button>
            <button type="submit" name="room" class="btn btn-danger" onclick = "this.form.action = '<?php echo FRONT_ROOT;?>Cinema/ShowAddRoom'" value=""> Agregar nueva sala </button>
            <button type="submit" name="room" class="btn btn-danger" onclick = "this.form.action = '<?php echo FRONT_ROOT;?>Cinema/ShowAddFunction'" value=""> Agregar nueva Funcion </button>
            
        </form>
    </div>
</main>
