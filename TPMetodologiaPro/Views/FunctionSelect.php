<?php
include('header.php');
include('nav-bar.php');
require_once('validate-session.php');

use DAO\CinemaDAODB as CinemaDAODB;
use DAO\MovieDAODB as MovieDAODB;
use Models\MovieFunction as MovieFunction;
use Models\Cinema as Cinema;
use Models\Movie as Movie;

// here starts the php
if (isset($_POST['show_dowpdown_value'])) {
  
  $dateElect = $_POST['dowpdown']; // this will print the value if downbox out
}

$repo = new CinemaDAODB();
$cinemas = $repo->GetCinemaById($_SESSION['cinemaElect']);
$repoMovie = new MovieDAODB();
$function = $repo->GetMovieFunctions($_SESSION['cinemaElect']);
$movie = $repoMovie->getMoviebyID($_SESSION['MovieElect']);
foreach($function as $funct)
{
    $dato=$funct->getFunction_time();
    $fecha = date('Y-m-d',strtotime($dato));
    $hora = date('H:i:s',strtotime($dato)); 
    echo "Fecha: ".$fecha;
    echo " Hora: ".$hora;
    echo "<br>"."--------------------"."<br>";
}

?>

<!-- ################################################################################################ -->
<div class="wrapper row2 bgded" style="background-image:url('../images/demo/backgrounds/1.png');">
  <div class="overlay">
    <div id="breadcrumb" class="clear">
      <ul>
        <li><a href="<?php echo FRONT_ROOT ?>Home/ShowHome">Pagina inicial</a></li>
        <li><a href="<?php echo FRONT_ROOT ?>Home/ShowUserLobby">Menu del Usuario</a></li>
      </ul>
    </div>
  </div>
</div>
<!-- ################################################################################################ -->

<div class="wrapper row4" style="">
  <main class="container clear">
    <div class="content">
      <div id="comments">
       
            <!--<li><a  class="smoothscroll" href="#contact">Contact<span>get in touch</span></a></li> -->
          </ul> <!-- end home-sidelinks -->


          <head>
            <title>Sitename</title>
          </head>

          <body>
            <form action="" method="post">
            <p>Cine Seleccionado "<?php echo $cinemas->getCinemaName(); ?>"</p>
            <br>
            <p>Pelicula Seleccionada "<?php echo $movie->getTitle();?>"</p>

              <!-- here start the dropdown list -->
              <select name="dowpdown">
               
                  <option value=""></option>
               

              </select>
              <button type="submit" name="show_dowpdown_value" class="btn btn-danger" onclick = "this.form.action ='<?php echo FRONT_ROOT;?>Cinema/ShowUserMenu'" value="" >Elegir Cine</button>

              <br>
              <br>
              <select name="dowpdown2">
                
                  <option value=""></option>

              </select>
              <!--<input type="submit" name="show_dowpdown_value" value="show" />-->
            <button type="submit" name="show_dowpdown_value2" class="btn btn-danger" onclick = "this.form.action ='<?php echo FRONT_ROOT;?>Ticket/ShowSelectFunction'" value="" >Elegir Pelicula</button>

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