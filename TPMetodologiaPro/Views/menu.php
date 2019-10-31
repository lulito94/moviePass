<?php 
 include('header.php');

 include('nav-bar.php');
?>
<!-- ################################################################################################ -->




<div style="float: right; display: flex; justify-content: center;">


<a class="smooth-link"  href="<?php echo FRONT_ROOT ?>User/ShowLogin"><button  style="display: inline-block">Iniciar Session</button></a>
<a class="smooth-link" href="<?php echo FRONT_ROOT ?>User/SignIn"><button  style="display: inline-block">Registrarse</button></a>
</div>

<?php
$fb = new Facebook\Facebook([
  'app_id' => '{app-id}', // Replace {app-id} with your app id
  'app_secret' => '{app-secret}',
  'default_graph_version' => 'v3.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$url = require_once(VIEWS_PATH."fb_callback.php");
$loginUrl = $helper->getLoginUrl('$url', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
?>
<?php
use DAO\MovieDAODB as MovieDAODB;
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
      <img class="d-block w-100" src="https://image.tmdb.org/t/p/w300<?php echo $peli1[1]->getPoster_path() ?>" alt="<?php echo $peli1[1]->getTitle();?>" width="300" height="200">
      
      </div>
      <?php
      foreach($list as $movieList)
      { 
        ?>
      <div class="item">
      
      <img class="d-block w-100" src="https://image.tmdb.org/t/p/w300<?php echo $movieList->getPoster_path() ?>" alt="<?php echo $movieList->getTitle();?>" width="300" height="350">
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
</div>
  </div>
</div>

</body>
</html>


<!-- ################################################################################################ -->

<!-- ################################################################################################ -->

<?php 
  include('footer.php');
?>