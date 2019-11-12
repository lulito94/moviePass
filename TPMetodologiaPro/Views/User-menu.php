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
  
  $cinemaElect = $_POST['dowpdown']; // this will print the value if downbox out
}
if (isset($_POST['show_dowpdown_value2'])) {
  
  $MovieElect = $_POST['dowpdown2']; // this will print the value if downbox out
}
$repo = new CinemaDAODB();
$functions = $repo->GetAllMovieFunctions();
$cinemas = $repo->GetAll();
$repoMovies = new MovieDAODB();
if(!isset($cinemaElect))
{
  $MovieList = array();
  $movie = new Movie();
  $movie->setId_movie(0);
  $movie->setTitle("Seleccionar cinema antes");
  array_push($MovieList,$movie);
}else
{
$MovieList = $repoMovies->getMoviesxCinema($cinemaElect);
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
        <h2>Cinema</h2>
        <form action="" method="post" style="background-color: #EAEDED;padding: 2rem !important;">
         
          <head>
            <title>Sitename</title>
          </head>

          <body>
            <form action="" method="post">
              <!-- here start the dropdown list -->
              <select name="dowpdown">
                <?php

                foreach ($cinemas as $cinema) {
                  ?>
                  <option value="<?php echo $cinema->getIdCinema(); ?>"><?php echo $cinema->getCinemaName() ?></option>
                <?php } ?>

              </select>
              <button type="submit" name="show_dowpdown_value" class="btn btn-danger" onclick = "this.form.action ='<?php echo FRONT_ROOT;?>Cinema/ShowUserMenu'" value="<?php echo $cinema->getIdCinema(); ?>" >Elegir Cine</button>

              <br>
              <br>
              <select name="dowpdown2">
                <?php
                
                  
                foreach ($MovieList as $movie){
                  ?>
                  <option value="<?php echo $movie->getId_movie(); ?>"> <?php echo $movie->getTitle(); ?></option>
                <?php }?>

              </select>
              <!--<input type="submit" name="show_dowpdown_value" value="show" />-->
            <button type="submit" name="show_dowpdown_value2" class="btn btn-danger" onclick = "this.form.action ='<?php echo FRONT_ROOT;?>Ticket/ShowSelectFunction'" value="<?php echo $movie->getId(); ?>" >Elegir Pelicula</button>

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