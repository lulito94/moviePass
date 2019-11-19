<?php

include('header.php');
include('nav-bar.php');
require_once('validate-session-admin.php');

use DAO\MovieDAODB as MovieDAODB;

$movierepo = new MovieDAODB();
$movieList = $movierepo->GetAll();

?>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2 bgded" style="background-image:url('../images/demo/backgrounds/1.png');">
     <div class="overlay">
          <div id="breadcrumb" class="clear">
               <ul class="pagination">
                    <li><a href="<?php echo FRONT_ROOT ?>Home/ShowHome">Pagina Inicial</a></li>
                    <li><a href="<?php echo FRONT_ROOT ?>Home/ShowAdminLobby">Menu del Administrador</a></li>
               </ul>
          </div>
     </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<main class="py-5"> 
     <section id="listado" class="mb-5">
          <div class="container">
          <header class="text-left text-white">
               <h2>Lista de Peliculas</h2>
          </header>
          <form action="" method="post">
               <table class="table bg-light-alpha">
                    <thead>
                         <th style="width:20%">Afiche</th>
                         <th style="width:80%">Descripcion</th>



                    </thead>
                    <tbody>
                         <form action="" method="POST">
                              <?php
                              if (isset($movieList) && !empty($movieList)) {
                                   foreach ($movieList as $movie) {
                                        ?>
                                        <tr>
                                             <div>

                                                  <td style="width:20%"><img class="" src="https://image.tmdb.org/t/p/w300<?php echo $movie->getPoster_path() ?>" alt="<?php echo $movie->getTitle(); ?>" width="50" height="50"> <br>
                                                  <td style="width:80%">
                                                       <ul>
                                                            <li><em> Titulo : </em> <?php echo $movie->getTitle(); ?></li>
                                                            <li><em> Idioma Original : </em> <?php echo $movie->getOriginal_language() ?></li>
                                                            <li><em> Calificacion : </em> <?php echo $movie->getVote_average() ?></li>
                                                            <li><em> Sinopsis : </em>
                                                                 <p><?php echo $movie->getOverview() ?></p>
                                                            </li>
                                                            <?php
                                                                      $repoMovies = new MovieDAODB();
                                                                      $genreList = $repoMovies->GetMovieGenres($movie);
                                                                      ?>
                                                            <li><em> Generos : </em>
                                                                 <ul>
                                                                      <?php
                                                                                foreach ($genreList as $genre) { ?>
                                                                           <li><?php echo $genre ?></li>
                                                                      <?php } ?>
                                                                 </ul>
                                                       </ul>
                                                       <hr style="border-color:blue;">


                                                  </td>



                                             </div>
                                        </tr>
                              <?php

                                   }
                              }
                              ?>
                         </form>
                    </tbody>
               </table>
          </form>
     </div>
     </section>
</main>