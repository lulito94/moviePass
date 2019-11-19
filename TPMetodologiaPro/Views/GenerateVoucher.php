<?php
include('header.php');
include('nav-bar.php');
//require_once ('validate-session-admin.php');
//use DAO\CinemaDAO as CinemaDAO; js
use DAO\CinemaDAODB as CinemaDAODB;
require_once ('validate-session.php');
$repo = new CinemaDAODB();
$cinema = $repo->GetCinemaById($_SESSION['cinemaElect']);




?><!-- ################################################################################################ -->
<div class="wrapper row2 bgded" style="background-image:url('../images/demo/backgrounds/1.png');">
  <div class="overlay">
    <div id="breadcrumb" class="clear">
      <ul class="pagination">
        <li><a href="<?php echo FRONT_ROOT ?>Home/ShowHome">Pagina inicial</a></li>
        <li><a href="<?php echo FRONT_ROOT ?>Home/ShowUserLobby">Menu del Usuario</a></li>
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

<form action="<?php echo FRONT_ROOT;?>Ticket/GenerateTicket" method="post">
        <table class="table bg-light-alpha">
                    <thead>
                         <th>Cantidad de Entradas</th>
                         <th>Costo</th>
                    </thead>
                    <tbody> 
                    <tr>
                    <td>
                    <select name="cant">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    </select>
                    </td>
                            <td><?php echo $cinema->getTicketValue(); ?></td>
                            <td><button type="submit" name="buy" class="btn btn-danger"> Generar ticket </button></td>

                    </tr>
                                        
                         </form>
                    </tbody>
               </table>
    </div>
</main>