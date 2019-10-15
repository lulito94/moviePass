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
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img class="d-block w-100" src="https://image.tmdb.org/t/p/w600_and_h900_bestv2/<?php echo $peli1[1]->getPoster_path() ?>" alt="<?php echo $peli1[1]->getTitle();?>" width="200" height="350">
    </div>
    
    <div class="carousel-item">
    <img class="d-block w-100" src="https://image.tmdb.org/t/p/w600_and_h900_bestv2/<?php echo $peli1[2]->getPoster_path() ?>" alt="<?php echo $peli1[2]->getTitle();?>" width="200" height="350">
    </div>
    <div class="carousel-item">
    <img class="d-block w-100" src="https://image.tmdb.org/t/p/w600_and_h900_bestv2/<?php echo $peli1[3]->getPoster_path() ?>" alt="<?php echo $peli1[3]->getTitle();?>" width="200" height="350">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
