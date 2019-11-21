<?php 
 include('header.php');

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


<div style="float: right; display: flex; justify-content: center;">
<?php 
if(isset($_SESSION['loggeduser']))
{ ?>
 <a href="<?php echo FRONT_ROOT?>User/ShowUserHome" rel="nofollow" class="button" ><img src="https://www.cinemarkhoyts.com.ar/images/res/user-outline.png"> </img></a>';    
<?php }else {
?>
<a href="<?php echo FRONT_ROOT?>User/ShowLogin" rel="nofollow" class="button" ><img src="https://www.cinemarkhoyts.com.ar/images/res/user-outline.png"> </img></a>';
<?php } ?>

<a href="#" rel="nofollow" class="fblogin-button" onClick="javascript:CallAfterLogin();return false;"><img src="https://www.cinemacenter.com.ar/images/icon-facebook-likebox.png"> </img></a>';

</div>



<?php
$repo = new MovieDAODB();
$list = $repo->GetAll();
$peli1 = array();
foreach($list as $movieList)
{
  array_push($peli1,$movieList);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<?php if(isset($list) && !empty($list))
{
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
                    <img class="bx-pager" src="https://image.tmdb.org/t/p/w300<?php echo $peli1[1]->getPoster_path() ?>" alt="<?php echo $peli1[1]->getTitle();?>" width="200" height="100">

                </div>
                <?php
                foreach($list as $movieList)
                {
                   
                    ?>
                    <div class="item">

                        <img class="bx-pager" src="https://image.tmdb.org/t/p/w300<?php echo $movieList->getPoster_path() ?>" alt="<?php echo $movieList->getTitle();?>" width="200" height="100">
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
                  if(isset($cinema) && !empty($cinema))
                  { 
                  ?>
                  <option value="<?php echo $cinema->getIdCinema(); ?>"><?php echo $cinema->getCinemaName() ?></option>
                <?php }else{?>
                  <option value="">No hay cinemas</option>
                <?php } } ?>
                
              </select>
              <?php if(isset($cinema))
              { ?>
              <button type="submit" name="show_dowpdown_value" class="btn btn-danger" onclick = "this.form.action ='<?php echo FRONT_ROOT;?>Ticket/ShowUserMenuNotLogged'" value="<?php echo $cinema->getIdCinema(); ?>" >Elegir Cine</button>
              <?php } ?>
              <br>
              <br>
              <select name="dowpdown2">
              
<?php
                if(isset($MovieList) && !empty($MovieList))
                {  
                foreach ($MovieList as $movie){
                  ?>
                  <option value="<?php echo $movie->getId_movie(); ?>"> <?php echo $movie->getTitle(); ?></option>
                <?php }}else{
                  ?>
                  <option value=""> No hay funciones disponibles</option>
                <?php } ?>

              </select>
              <!--<input type="submit" name="show_dowpdown_value" value="show" />-->
              <?php if(isset($movie) && isset($cinema) )
              { ?>
            <button type="submit" name="show_dowpdown_value2" class="btn btn-danger" onclick = "this.form.action ='<?php echo FRONT_ROOT;?>Ticket/ShowSelectFunctionNotLogged'" value="<?php echo $movie->getId_movie(); ?>" >Elegir Pelicula</button>
<?php } ?>
            </form>
          </body>

        </form>
    </div>
</div>
</div>>
<?php } 
?>

<?php 
  include('footer.php');
?>