<?php
    include('header.php');
    include('nav-bar.php');
    require_once ('validate-session.php');
    use DAO\CinemaDAODB as CinemaDAODB;
    use DAO\HelperDAO as HelperDAO;
    use DAO\MovieDAODB as MovieDAODB;
    $repoMovies = new MovieDAODB();
    $repoGenres = new CinemaDAODB();
    $listGenres = $repoGenres->GetAllGenres();

    if (isset($_POST['show_dowpdown_value'])) {
  
        $genreElect = $_POST['dowpdown']; // this will print the value if downbox out
      }
?>

<!-- ################################################################################################ -->
<div class="wrapper row2 bgded" style="background-color:transparent);">
  <div class="overlay">
    <div id="breadcrumb" class="clear">
      <ul class="pagination">
        <li><a href="<?php echo FRONT_ROOT ?>Home/ShowHome">Pagina inicial</a></li>
        <li><a href="<?php echo FRONT_ROOT ?>Home/ShowUserLobby">Menu del Usuario</a></li>
        <li><a href="<?php echo FRONT_ROOT ?>Home/LogoutUser">Logout</a></li>
      </ul>
    </div>
    </div>
    </div>
<!-- ################################################################################################ -->
<div class="wrapper row4" >
  <main class="container clear ">
    <div class="content">
      <div id="comments">
        <h2>Consulta Peliculas por genero</h2>
        <form action="" method="post" style="background-color:transparent ;padding: 2rem !important;">
         
          <head>
            <title>Generos</title>
          </head>

          <body>
            <form action="" method="post">
              <!-- here start the dropdown list -->
              <select name="dowpdown">
                <?php

                foreach ($listGenres as $genre) {
                  ?>
                  <option value="<?php echo $genre->getId_genre(); ?>"><?php echo $genre->getName(); ?></option>
                <?php } ?>

              </select>
              <?php if(isset($genre))
              { ?>
              <button type="submit" name="show_dowpdown_value" class="btn btn-danger" onclick = "this.form.action ='<?php echo FRONT_ROOT;?>Ticket/userViewGenreWithButton'" value="<?php echo $genre->getId_genre(); ?>" >Elegir Cine</button>
              <?php } ?>
              <br>
              <br>
              <?php if(isset($_SESSION['id_genre']) && !empty($_SESSION['id_genre']))
              { 
                $row = $repoGenres->GetGenreById($_SESSION['id_genre']);
                foreach($row as $genre)
                {
                    ?><h2>Genero: <?php echo $genre['name'];?></h2><?php
                    echo "<br>";
                }
              
                  $repoHelper = new HelperDAO();
                  $listMoviesxGenres = $repoHelper->GetMoviesxGenreByid($_SESSION['id_genre']);
                  foreach($listMoviesxGenres as $row)
                  {
                      
                    $movie = $repoMovies->GetMovieById($row['id_movie']);
                ?>
              <table class="table bg-light-alpha">
               
                <thead>
                     <th>Titulo</th>
                     <th>Reseña</th>
                     <th>Popularidad 1-100</th>
                     <th>Idioma</th>
                     <th>Fecha</th>
                     
                </thead>
                <tbody>  
                    
                                    <tr> 
                                         <td><p><?php echo $movie->getTitle();?> </p></td>
                                         <td><p><?php echo $movie->getOverview();?> </p></td>
                                         <td><p><?php echo $movie->getPopularity();?></p></td>
                                         <td><p><?php echo $movie->getOriginal_language();?></p></td>
                                         <td><p><?php echo $movie->getRelease_date();?></p></td>
                                    </tr>
                                    <?php
                               }
                                    ?>
                </tbody>
           </table>
           <?php
                               }else{
                                   echo "<br>"."Empty"."<br>";
                               }
                                    ?>
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