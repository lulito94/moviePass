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
                <li><a href="<?php echo FRONT_ROOT ?>Home/ShowHome">Home</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>Home/ShowAdminLobby">MenuAdmin</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>Cinema/ShowRoomFunctions">Room Options</a></li>
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
                <th>ID</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Capacidad</th>
                <th>Valor de la entrada</th>
                <th>Salas</th>

                <th>Accion</th>


                </thead>
                <tbody>
                <form action="" method="POST" >
                    <?php
                    if(isset($cinemaList) && !empty($cinemaList)){
                        foreach($cinemaList as $cinema){
                            ?>
                            <tr>
                                <div>
                                    <td><?php echo $cinema->getIdCinema() ?></td>
                                    <td><?php echo $cinema->getCinemaName(); ?></td>
                                    <td><?php echo $cinema->getAddress(); ?></td>
                                    <td><?php echo $cinema->getCapacity(); ?></td>
                                    <td><?php echo $cinema->getTicketValue(); ?></td>

                                    <td><ul>
                                            <?php $list = $cinema->getRooms($cinema->getIdCinema());

                                            foreach($list as $room){?>

                                            <li><?php echo $room->getRoom_name(). " Capacidad : ". $room->getSeating(); ?>

                                                <?php  } ?>
                                        </ul>
                                    </td>
                                    <td>
                                        <button type="submit" name="remove" class="btn btn-danger" onclick = "this.form.action = '<?php echo FRONT_ROOT;?>Cinema/Delete'" value="<?php echo $cinema->getCinemaName();?>"> Eliminar </button>
                                    </td>
                                </div>
                            </tr>
                            <?php

                        }}
                    ?>
                </form>
                </tbody>
            </table>
        </div>
    </section>

</main>
