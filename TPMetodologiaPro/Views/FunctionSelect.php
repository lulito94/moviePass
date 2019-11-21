<?php
include('header.php');
include('nav-bar.php');

use DAO\CinemaDAODB as CinemaDAODB;
use DAO\MovieDAODB as MovieDAODB;
use Models\MovieFunction as MovieFunction;
use Models\Cinema as Cinema;
use Models\Movie as Movie;

$repo = new CinemaDAODB();
$cinemas = $repo->GetCinemaById($_SESSION['cinemaElect']);
$repoMovie = new MovieDAODB();
$movie = $repoMovie->getMoviebyID($_SESSION['MovieElect']);
$function = $repo->GetMovieFunctionsByCinema($_SESSION['cinemaElect']);




?>

<!-- ################################################################################################ -->
<div class="wrapper row2 bgded" >
  <div class="overlay">
    <div id="breadcrumb" class="clear">
      <ul class="pagination">
        <li><a href="<?php echo FRONT_ROOT ?>Home/ShowHome">Pagina inicial</a></li>
      </ul>
    </div>
  </div>
</div>
<!-- ################################################################################################ -->

<div class="wrapper row4" style="background-color:transparent">
  <main class="container clear">
    <div class="content text-white">
      <div id="comments">
       
            <!--<li><a  class="smoothscroll" href="#contact">Contact<span>get in touch</span></a></li> -->
          </ul> <!-- end home-sidelinks -->


          <head>
            <title>Sitename</title>
          </head>

          <body>
            <form action="" method="post" >
         

            <h2 class="mb-4"> Funciones Disponibles </h2>
        
               <table class="table bg-light-alpha text-dark" >
                    <thead>
                          <th>Dia</th>
                         <th>Horarios</th>
                         <th></th>
                         
                    </thead>
                    <tbody>  
                    <form action="" method=""   >                
                         <?php
                                   foreach($function as $funct)
                                   {
                                     $moviecheck = $funct->getMovie();
                                     if($movie->getId_movie() == $moviecheck->getId_movie())
                                     {
                                       $dato=$funct->getFunction_time();
                                       $fecha = date('Y-m-d-l',strtotime($dato));
                                       $hora = date('H:i:s',strtotime($dato));
                                     
                         ?>
                                        <tr> 
                                             <div >
                                             <td><?php echo $fecha; ?></td>
                                             <td><?php echo $hora; ?></td>
                                             <td> 
                                             <?php if(isset($_SESSION['loggeduser'])){
                                               ?> 
                                               <button type="submit" name="remove" class="btn btn-danger" onclick = "this.form.action = '<?php echo FRONT_ROOT;?>Ticket/ShowSelectVoucher'" value="<?php echo $funct->getId_function();?>"> Continuar </button>
                                               <button type="submit" name="remove" class="btn btn-danger" onclick = "this.form.action = '<?php echo FRONT_ROOT;?>Ticket/Goback'" value=""> Volver </button>
                                             <?php }else
                                             {?>
                                               <button type="submit" name="remove" class="btn btn-danger" onclick = "this.form.action = '<?php echo FRONT_ROOT;?>User/ShowLogin'" value=""> Continuar </button>
                                             <?php } ?></td>   
                                              </div>
                                        </tr>

                                        <?php
                                   }}
                                        ?>
                         </form>
                    </tbody>
               </table>
             
             

            </form>
          </body>

        </form>
      </div>
    </div>
  </main>
  <table class="table bg-light-alpha">
  <thead>
  <p>Cine Seleccionado "<?php echo $cinemas->getCinemaName(); ?>"</p>
            <br>
  <p>Pelicula Seleccionada "<?php echo $movie->getTitle();?>"</p>



  </thead>
  <tbody>
                      <tr>
                           <div>

                                <td style="width:20%"><img class="" src="https://image.tmdb.org/t/p/w300<?php echo $movie->getPoster_path() ?>" alt="<?php echo $movie->getTitle(); ?>" width="100" height="100"> <br>
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
                                </td>



                           </div>
                      </tr>
            <?php

            ?>
       </form>
  </tbody>
</table>

</div>
<!-- ################################################################################################ -->

<?php
include('footer.php');
?>