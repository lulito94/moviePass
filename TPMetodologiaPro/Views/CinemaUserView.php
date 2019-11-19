<?php
require_once ('validate-session.php');

    //use DAO\CinemaDAO as CinemaDAO; js
    use DAO\CinemaDAODB as CinemaDAODB;
    use DAO\MovieDAO as MovieDAO;
    use Models\Movie as Movie;
    use DAO\MovieDAODB as MovieDAODB;


   // $repo = new CinemaDAO(); js
    $repo = new CinemaDAODB();
    $movies = new MovieDAO();
    $movieDB = new MovieDAODB();
    $movie = new Movie();
    //$movieList = $movies->GetAll();           PASAJE A BD DESDE JSON
   /* foreach($movieList as $valuesArray){
                $movie->setPopularity($valuesArray->getPopularity());
                $movie->setTitle($valuesArray->getTitle());
                $movie->setRelease_date($valuesArray->getRelease_date());
                $movie->setOriginal_language($valuesArray->getOriginal_language());
                $movie->setVote_count($valuesArray->getVote_count());
                $movie->setPoster_path($valuesArray->getPoster_path());
                $movie->setVote_average($valuesArray->getVote_average());
                $movie->setOverview($valuesArray->getOverview());
               $movieDB->Add($movie);
    }*/
    $cinemaList = $repo->GetAll();
    $movieListDB = $movieDB->GetAll();
?>
<!-- ################################################################################################ -->
<div class="wrapper row2 bgded" style="background-image:url('../images/demo/backgrounds/1.png');">
  <div class="overlay">
    <div id="breadcrumb" class="clear"> 
      <ul class="pagination">
        <li><a href="<?php echo FRONT_ROOT ?>Home/ShowHome">Pagina inicial</a></li>
        <li><a href="<?php echo FRONT_ROOT ?>Home/ShowUserLobby">Menu del Usuario</a></li>
      </ul>
    </div>
  </div>
</div>
<!-- ################################################################################################ -->
    <main class="py-5">
     
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4"> Cines Habilitados </h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Nombre</th>
                         <th>Direccion</th>
                         <th>Capacidad</th>
                         <th>Valor de la entrada</th>
                    </thead>
                    <tbody>  
                         <?php
                                   if(isset($cinemaList) && !empty($cinemaList)){
                                   foreach($cinemaList as $cinema){
                         ?>
                                        <tr> 
                                             <td><p><?php echo $cinema->getCinemaName(); ?></p></td>
                                             <td><p><?php echo $cinema->getAddress(); ?></p></td>
                                             <td><p><?php echo $cinema->getCapacity(); ?></p></td>
                                             <td><p><?php echo $cinema->getTicketValue(); ?></p></td>
                                            
                                        </tr>
                                        <?php
                                   }}
                                        ?>
                         </form>
                    </tbody>
               </table>
          </div>
     </section>

</main>
