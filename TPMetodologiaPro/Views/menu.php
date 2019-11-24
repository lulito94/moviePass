
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="<?php echo CSS_PATH; ?>layout.css" rel="stylesheet" type="text/css" media="all">
  <link rel="stylesheet" href="<?php echo BOOS_PATH; ?>bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo BOOS_PATH; ?>estilos.css">

</head>
<?php
include('nav-bar.php');

use DAO\CinemaDAODB as CinemaDAODB;
use DAO\MovieDAODB as MovieDAODB;
use Models\MovieFunction as MovieFunction;
use Models\Cinema as Cinema;
use Models\Movie as Movie;

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
if (!isset($cinemaElect)) {
  $MovieList = array();
  $movie = new Movie();
  $movie->setId_movie(0);
  $movie->setTitle("Seleccionar cinema antes");
  array_push($MovieList, $movie);
} else {
  $MovieList = $repoMovies->getMoviesxCinema($cinemaElect);
}

?>
<!-- ################################################################################################ -->



<div style="float: right; display: flex; justify-content: center;">
  <?php
  if (isset($_SESSION['loggeduser'])) { ?>
    <button onclick="this.form.action = '<?php echo FRONT_ROOT; ?>User/ShowUserHome'" class="button"><img src="https://www.cinemarkhoyts.com.ar/images/res/user-outline.png"> </button>
  <?php } else {
    ?>
    <html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div class="w3-container">
  <button onclick="document.getElementById('id01').style.display='block'" class="button"><img src="https://www.cinemarkhoyts.com.ar/images/res/user-outline.png"> </button>

  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
        <img src="https://svgsilh.com/svg/1299805.svg"  alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
      </div>

      <form class="w3-container" action="<?php echo FRONT_ROOT; ?>User/Check">
        <div class="w3-section">
          <label><b>Username</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="userName" required>
          <label><b>Password</b></label>
          <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="password" required>
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Login</button>
          <input class="w3-check w3-margin-top" type="checkbox" checked="checked"> Remember me
        </div>
      </form>

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
      <form action="">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
      <button  type="submit" class="w3-button w3-red"  onclick="this.form.action ='<?php echo FRONT_ROOT ?>User/SignIn'">Registrarse</button>
     </form>
      </div>

    </div>
  </div>
</div>

  <?php } ?>

  <a href="#" rel="nofollow" class="fblogin-button" onClick="javascript:CallAfterLogin();return false;"><img src="https://www.cinemacenter.com.ar/images/icon-facebook-likebox.png"> </img></a>';

</div>



<?php
$repo = new MovieDAODB();
$list = $repo->GetAll();
$peli1 = array();
foreach ($list as $movieList) {
  array_push($peli1, $movieList);
}
?>


<body style="background-image:url('https://www.estanlee.com/blog/wp-content/uploads/2019/06/Cine.jpg');">



  <div class="container">
    <?php if (isset($list) && !empty($list)) {
      ?>
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            <div class="carousel-inner">
              <div class="item active">
                <img class="bx-pager" src="https://image.tmdb.org/t/p/w300<?php echo $peli1[1]->getPoster_path() ?>" alt="<?php echo $peli1[1]->getTitle(); ?>" width="200" height="100">

              </div>
              <?php
                foreach ($list as $movieList) {

                  ?>
                <div class="item">

                  <img class="bx-pager" src="https://image.tmdb.org/t/p/w300<?php echo $movieList->getPoster_path() ?>" alt="<?php echo $movieList->getTitle(); ?>" width="200" height="100">
                </div>

              <?php
                }
                ?>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          <form action="" method="post">
            <!-- here start the dropdown list -->
            <select name="dowpdown">
              <?php

                foreach ($cinemas as $cinema) {
                  if (isset($cinema) && !empty($cinema)) {
                    ?>
                  <option value="<?php echo $cinema->getIdCinema(); ?>"><?php echo $cinema->getCinemaName() ?></option>
                <?php } else { ?>
                  <option value="">No hay cinemas</option>
              <?php }
                } ?>

            </select>
            <?php if (isset($cinema)) { ?>
              <button type="submit" name="show_dowpdown_value" class="btn btn-danger" onclick="this.form.action ='<?php echo FRONT_ROOT; ?>Ticket/ShowUserMenuNotLogged'" value="<?php echo $cinema->getIdCinema(); ?>">Elegir Cine</button>
            <?php } ?>
            <br>
            <br>
            <select name="dowpdown2">

              <?php
                if (isset($MovieList) && !empty($MovieList)) {
                  foreach ($MovieList as $movie) {
                    ?>
                  <option value="<?php echo $movie->getId_movie(); ?>"> <?php echo $movie->getTitle(); ?></option>
                <?php }
                  } else {
                    ?>
                <option value=""> No hay funciones disponibles</option>
              <?php } ?>

            </select>
            <!--<input type="submit" name="show_dowpdown_value" value="show" />-->
            <?php if (isset($movie) && isset($cinema)) { ?>
              <button type="submit" name="show_dowpdown_value2" class="btn btn-danger" onclick="this.form.action ='<?php echo FRONT_ROOT; ?>Ticket/ShowSelectFunctionNotLogged'" value="<?php echo $movie->getId_movie(); ?>">Elegir Pelicula</button>
            <?php } ?>
          </form>
        </div>
      </div>
  </div>


<?php }
include('footer.php');
?>