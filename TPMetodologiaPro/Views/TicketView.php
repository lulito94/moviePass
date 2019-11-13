<?php 
 include('header.php');
 include('nav-bar.php');
 require_once ('validate-session.php');
 use DAO\CinemaDAODB as CinemaDAODB;
 use DAO\MovieDAODB as MovieDAODB;
 $user = $_SESSION['loggeduser'];
 $repoCinema = new CinemaDAODB();
 $repoMovie = new MovieDAODB();
$cinema = $repoCinema->GetCinemaById($_SESSION['cinemaElect']);
$function = $repoCinema->GetMovieFunctionById($_SESSION['functId']);
$movie = $repoMovie->GetMovieById($_SESSION['MovieElect']);
$roomList = $repoCinema->GetAllRooms();
foreach($roomList as $roomSearch)
{
     $roomCheck = $function->getRoom();
    if($roomSearch->getId_room() ==  $roomCheck->getId_room())
    {
        $room = $roomSearch;
    }
}
?>
<div class="wrapper row2 bgded" style="background-image:url('../images/demo/backgrounds/1.png');">
  <div class="overlay">
    <div id="breadcrumb" class="clear"> 
      <ul>
        <li><a href="<?php echo FRONT_ROOT ;?>Home/ShowHome">Pagina inicial</a></li>
        <li><a href="<?php echo FRONT_ROOT ;?>Home/ShowUserLobby">Menu del Usuario</a></li>
      </ul>
    </div>
  </div>
</div>
 <main class="py-5">
     
 <section id="listado" class="mb-5">
      <div class="container">
           <h2 class="mb-4"style="color:#FF0000"> Ticket</h2>
           <table class="table bg-light-alpha">
                <thead>
                     <th>Datos Personales</th>
                   
                     <th>Cine</th>
                     <th>Sala </th>
                     <th>Funcion</th>
                     <th>Pelicula</th>
                     <th>Localidades</th>
                     <th>Importe</th>
                     
                </thead>
                <tbody>  
                    
                                    <tr> 
                                         <td>
                                            <ul>
                                                 <li>Nombre : <?php echo $user->getName(); ?></li>
                                                 <li>Apellido : <?php echo $user->getSurname(); ?></li>
                                                 <li>Email : <?php echo $user->getEmail(); ?></li>
                                                 <li>Dni : <?php echo $user->getDni(); ?></li>
                                            </ul></td>
                                         <td> <em><?php echo $cinema->getCinemaName(); ?> </em></td>
                                         <td> <?php echo $room->getRoom_name() ;?> </td>
                                         <td> <?php echo $function->getFunction_time() ;?></td>
                                         <td> <?php echo $movie->getTitle();?></td>
                                         <td> <?php echo $_SESSION['cant'];?></td>
                                         <td> <?php echo "$".($_SESSION['cant'] * $cinema->getTicketValue());?></td>
                                         <td></td>
                                    </tr>
                                   
                </tbody>
           </table>
           <div>
           <form action="">
           <button>Generar Ticket</button>
           <button type="submit" name="qr" class="btn btn-danger" onclick = "this.form.action = '<?php echo FRONT_ROOT;?>Ticket/Qr'" value=""> Generar Codigo Qr </button>
           </form>
           </div>
      </div>
 </section>

</main>

 <?php 
 
 ?>
