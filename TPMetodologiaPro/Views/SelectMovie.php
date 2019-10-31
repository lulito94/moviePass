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
               <ul>
                    <li><a href="<?php echo FRONT_ROOT ?>Home/ShowHome">Pagina Inicial</a></li>
                    <li><a href="<?php echo FRONT_ROOT ?>Home/ShowAdminLobby">Menu del Administrador</a></li>
               </ul>
          </div>
     </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<main class="d-flex align-items-center justify-content-center height-100">
     <div class="content">
          <header class="text-center">
               <h2>Seleccionar Pelicula</h2>
          </header>
          <form action="" method="post">
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Afiches</th>
                         <th>Titulos</th>
                         <th>Descripcion</th>

                    </thead>
                    <tbody>
                         <form action="" method="POST">
                              <?php
                              if (isset($movieList) && !empty($movieList)) {
                                   foreach ($movieList as $movie) {
                                        ?>
                                        <tr>
                                             <div>
                                                  
                                                  <td><img class="" src="https://image.tmdb.org/t/p/w300<?php echo $movie->getPoster_path() ?>" alt="<?php echo $movie->getTitle(); ?>" width="100" height="100"> <br> 
                                                  <button type="submit" name="remove" class="btn btn-danger" onclick="this.form.action = '<?php echo FRONT_ROOT; ?>Cinema/AddMovie'" value="<?php echo $movie->getId(); ?>"> Seleccionar </button> </td>
                                                  <td><?php echo $movie->getTitle(); ?></td>
                                                  <td>
                                                       <u> Fecha de Lanzamiento :</u>  <?php echo $movie->getRelease_date(); ?><br><br>    
                                                       <?php echo $movie->getOriginal_language(); ?><br>
                                                       <u> Cantidad de Calificaciones :</u>  <?php echo $movie->getVote_count(); ?><br>
                                                       <u> Puntuación :</u>  <?php echo $movie->getVote_average(); ?><br>
                                                       <u> Sinapsis :</u><p><?php echo $movie->getOverview(); ?></p><br>
                                                       </ul>
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
</main>