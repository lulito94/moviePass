<?php
include('header.php');
include('nav-bar.php');
require_once('validate-session.php');

use DAO\CinemaDAODB as CinemaDAODB;
use DAO\MovieDAODB as MovieDAODB;
use Models\MovieFunction as MovieFunction;
use Models\Cinema as Cinema;
use Models\Movie as Movie;

$repo = new CinemaDAODB();
$cinemas = $repo->GetCinemaById($_SESSION['cinemaElect']);
$repoMovie = new MovieDAODB();
$movie = $repoMovie->getMoviebyID($_SESSION['MovieElect']);
$function = $repo->GetMovieFunctionsByCinema($_SESSION['cinemaElect']);




?>

<!-- ################################################################################################ -->
<div class="wrapper row2 bgded" >
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

<div class="wrapper row4" style="background-color:transparent">
  <main class="container clear">
    <div class="content text-white">
      <div id="comments">
       
            <!--<li><a  class="smoothscroll" href="#contact">Contact<span>get in touch</span></a></li> -->
          </ul> <!-- end home-sidelinks -->


          <head>
            <title>Sitename</title>
          </head>

          <body>
            <form action="" method="post" >
            <p>Cine Seleccionado "<?php echo $cinemas->getCinemaName(); ?>"</p>
            <br>
            <p>Pelicula Seleccionada "<?php echo $movie->getTitle();?>"</p>

            <h2 class="mb-4"> Funciones Disponibles </h2>
        
               <table class="table bg-light-alpha text-dark" >
                    <thead>
                          <th>Dia</th>
                         <th>Horarios</th>
                         <th></th>
                         
                    </thead>
                    <tbody>  
                    <form action="" method=""   >                
                         <?php
                                   foreach($function as $funct)
                                   {
                                     $moviecheck = $funct->getMovie();
                                     if($movie->getId_movie() == $moviecheck->getId_movie())
                                     {
                                       $dato=$funct->getFunction_time();
                                       $fecha = date('Y-m-l',strtotime($dato));
                                       $hora = date('H:i:s',strtotime($dato));
                                     
                         ?>
                                        <tr> 
                                             <div >
                                             <td><?php echo $fecha; ?></td>
                                             <td><?php echo $hora; ?></td>
                                             <td> 
                                              <button type="submit" name="remove" class="btn btn-danger" onclick = "this.form.action = '<?php echo FRONT_ROOT;?>Ticket/ShowSelectVoucher'" value="<?php echo $funct->getId_function();?>"> Continuar </button>
                                              </td>   
                                              </div>
                                        </tr>
                                        <?php
                                   }}
                                        ?>
                         </form>
                    </tbody>
               </table>
             
             

            </form>
          </body>

        </form>
      </div>
    </div>
  </main>
</div>
<!-- ################################################################################################ -->

<?php
include('footer.php');
?>