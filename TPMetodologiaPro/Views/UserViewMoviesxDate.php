<?php
    include('header.php');
    include('nav-bar.php');
    require_once ('validate-session.php');
    use DAO\CinemaDAODB as CinemaDAODB;
    use DAO\HelperDAO as HelperDAO;
    use Models\Movie as Movie;
    use DAO\MovieDAODB as MovieDAODB;
    $repoMovies = new MovieDAODB();
    $repoGenres = new CinemaDAODB();
    $listGenres = $repoGenres->GetAllGenres();

  
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
            <title>Date</title>
          </head>

          <body>
            <form action="" method="post">
              <!-- here start the dropdown list -->
              <input type="date" name="search" class="form-control form-control-lg"  required>
              <button type="submit" name="show_dowpdown_value" class="btn btn-danger" onclick = "this.form.action ='<?php echo FRONT_ROOT;?>Ticket/userViewDateWithButton'" >Buscar</button>
              
              <br>
              <br>
              <?php if(isset($_SESSION['date']) && !empty($_SESSION['date']))
              { 
                $row = $repoGenres->GetGenreById($_SESSION['id_genre']);
                foreach($row as $genre)
                {
                    ?><h2>La Fecha de busqueda es: <?php echo $_SESSION['date'];?></h2><?php
                    echo "<br>";
                }
              
                  $repoHelper = new HelperDAO();
                  $listMovies = $repoHelper->GetAllMovieFunctions();
                  
                  foreach($listMovies as $moviesF)
                  {
                     $year = date('Y',strtotime($moviesF->getFunction_time()));
                     $month = date ('m',strtotime($moviesF->getFunction_time()));
                     $day = date('d',strtotime($moviesF->getFunction_time()));


                    if($year == date('Y',strtotime($_SESSION['date'])))
                    {
                        if($month == date('m',strtotime($_SESSION['date'])))
                        {
                            

                            if($day = date('d',strtotime($_SESSION['date'])))
                            {

                                $movie = $moviesF->getMovie();
                ?>
              <table class="table bg-light-alpha">
               
                <thead>
                <th>Afiche</th>
                     <th>Titulo</th>
                     <th>Reseña</th>
                     <th>Popularidad 1-100</th>
                     <th>Idioma</th>
                     <th>Fecha</th>
                     
                </thead>
                <tbody>  
                    
                                    <tr> 
                                        <td style="width:20%"><img class="" src="https://image.tmdb.org/t/p/w300<?php echo $movie->getPoster_path() ?>" alt="<?php echo $movie->getTitle(); ?>" width="50" height="50"> <br>
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
                               }}}}else{
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