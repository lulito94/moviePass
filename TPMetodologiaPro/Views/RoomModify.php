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
<div class="wrapper row2 bgded" >
    <div class="overlay">
        <div id="breadcrumb" class="clear">
            <ul class="pagination">
                <li><a href="<?php echo FRONT_ROOT ?>Home/ShowHome">Pagina Inicial</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>Home/ShowAdminLobby">Menu del Administrador</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>Cinema/ShowRoomFunctions">Opciones de Salas</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- ################################################################################################ -->
<main class="d-flex align-items-center justify-content-center height-100" >
    <div class="content">
        <header class="text-center">
            <h2>Modificar Salas</h2>
        </header>




        <form action="<?php echo FRONT_ROOT;?>Cinema/ModifyRoom" method="post" class="login-form bg-dark-alpha p-5 text-white">
            <div class="form-group">

                <label for="">Selecionar cinema a modificar</label>
                <?php
                if(isset($cinemaList) && !empty($cinemaList)){
                    foreach($cinemaList as $cinema) {
                        foreach ($cinema->getRooms() as $room) {
                            ?>
                            <button type="submit" name="idRoom" class="btn btn-danger"
                                    onclick="this.form.action = '<?php echo FRONT_ROOT; ?>Cinema/SetIdRoom'"
                                    value="<?php echo $room->getId_room(); ?>"> <?php echo $room->getRoom_name(); ?> </button>
                        <?php }
                    }
                }
                ?>




                <?php if(isset ($cinema))
                { ?>
                <label for=""> Nuevo Nombre </label>
                <input type="text" name="roomName" class="form-control form-control-lg" placeholder="Nombre" >
            </div>
            <div class="form-group">
                <label for=""> Nuevos Asientos </label>
                <input type="text" name="seatings" class="form-control form-control-lg" placeholder="Asientos" >
            </div>
            <div class="form-group">

            <button class="btn btn-dark btn-block btn-lg" type="submit"> Modificar Sala </button>
                <?php } else {?>
                <h2> No hay salas para modificar </h2>
               <?php } ?>

        </form>
    </div>
</main>
