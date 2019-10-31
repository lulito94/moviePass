<?php
//use DAO\CinemaDAO as CinemaDAO; js
use DAO\CinemaDAODB as CinemaDAODB;
require_once ('validate-session-admin.php');


// $repo = new CinemaDAO(); js
$repo = new CinemaDAODB();

$cinemaList = $repo->GetAll();
?>
<!-- ################################################################################################ -->
<div class="wrapper row2 bgded" style="background-image:url('../images/demo/backgrounds/1.png');">
    <div class="overlay">
        <div id="breadcrumb" class="clear">
            <ul>
                <li><a href="<?php echo FRONT_ROOT ?>Home/ShowHome">Pagina inicial</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>Home/ShowAdminLobby">Menu del Administrador</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>Cinema/ShowRoomFunctions">Opciones de Salas</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- ################################################################################################ -->
<main class="py-5">

    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4"> Salas Habilitadas </h2>
            <table class="table bg-light-alpha">
                <thead>
                <th>Cinema</th>
                <th>ID</th>
                <th>Nombre</th>
                <th>Assientos</th>

                <th>Accion</th>


                </thead>
                <tbody>
                <form action="" method="POST" >
                    <?php
                    if(isset($cinemaList) && !empty($cinemaList)){
                        foreach($cinemaList as $cinema){
                            foreach ($cinema->getRooms() as $room){
                            ?>
                            <tr>
                                <div>
                                    <td><?php echo $cinema->getCinemaName() ?></td>
                                    <td><?php echo $room->getId_room() ?></td>
                                    <td><?php echo $room->getRoom_Name() ?></td>
                                    <td><?php echo $room->getSeating() ?></td>


                                    <td>
                                        <button type="submit" name="remove" class="btn btn-danger" onclick = "this.form.action = '<?php echo FRONT_ROOT;?>Cinema/DeleteRoom'" value="<?php echo $room->getId_room();?>"> Eliminar </button>
                                    </td>
                                </div>
                            </tr>
                            <?php

                        }}}
                    ?>
                </form>
                </tbody>
            </table>
        </div>
    </section>

</main>
