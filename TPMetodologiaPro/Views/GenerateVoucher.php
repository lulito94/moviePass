<?php
include('header.php');
include('nav-bar.php');
//require_once ('validate-session-admin.php');
//use DAO\CinemaDAO as CinemaDAO; js
use DAO\CinemaDAODB as CinemaDAODB;
require_once ('validate-session.php');


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
            <h2>Seleccionar tus Entradas</h2>
        </header>


        <table class="table bg-light-alpha">
                    <thead>
                         <th>Cantidad de Entradas</th>
                         <th>Costo</th>
                         <th>Subtotal</th>
                    </thead>
                    <tbody>  
                    <form action="" method="POST" >                
                       
                                        <tr> 
                                             <div>
                                             <input type="text">
                                             <td><?php echo $cinema->getTicketValue(); ?></td>
                                             <td><?php echo $cinema->getAddress(); ?></td>
                                             
                                        </tr>
                         </form>
                    </tbody>
               </table>
    </div>
</main>