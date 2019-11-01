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

$repo = new CinemaDAODB();
$functions = $repo->GetAllMovieFunctions();
$cinemas = $repo->GetAll();
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
          <ul class="home-sidelinks">
            <li><a class="smooth-link" href="<?php echo FRONT_ROOT ?>User/UserShowCinemas">List-Cinemas</a></li>
            <li><a class="smooth-link" href="<?php echo FRONT_ROOT ?>User/User_Info">View Info Account</a></li>

            <!--<li><a  class="smoothscroll" href="#contact">Contact<span>get in touch</span></a></li> -->
          </ul> <!-- end home-sidelinks -->


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
                  <option value="<?php echo $cinema->getIdCinema() ?>"><?php echo $cinema->getCinemaName() ?></option>
                <?php } ?>

              </select>
              <button type="submit" name="show_dowpdown_value" class="btn btn-danger" onclick = "this.form.action ='<?php echo FRONT_ROOT;?>Cinema/ShowUserMenu'" value="<?php echo $cinemaElect; ?>" >Elegir Cinema</button>

              <br>
              <br>
              <select name="dowpdown">
                <?php
                $repoMovies = new MovieDAODB();
                $MovieList = $repoMovies->ge
                foreach ($cinemas as $cinema) {
                  ?>
                  <option value="<?php echo $cinema->getIdCinema() ?>"><?php echo $cinema->getCinemaName() ?></option>
                <?php } ?>

              </select>
              <!--<input type="submit" name="show_dowpdown_value" value="show" />-->
              <button type="submit" name="show_dowpdown_value" class="btn btn-danger" onclick = "this.form.action ='<?php echo FRONT_ROOT;?>Cinema/ShowUserMenu'" value="<?php echo $cinemaElect; ?>" >Elegir Cinema</button>

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