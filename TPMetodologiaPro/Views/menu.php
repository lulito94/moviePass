<?php 
 include('header.php');

 include('nav-bar.php');
?>
<!-- ################################################################################################ -->


<div style="float: right; display: flex; justify-content: center;">
<a href="<?php echo FRONT_ROOT?>User/ShowLogin" rel="nofollow" class="button" ><img src="https://www.cinemarkhoyts.com.ar/images/res/user-outline.png"> </img></a>';

<a href="#" rel="nofollow" class="fblogin-button" onClick="javascript:CallAfterLogin();return false;"><img src="https://www.cinemacenter.com.ar/images/icon-facebook-likebox.png"> </img></a>';

</div>



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
    </div>
</div>
</div>>
<?php } ?>



<?php 
  include('footer.php');
?>