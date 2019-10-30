<?php
    //use DAO\CinemaDAO as CinemaDAO; js
    use DAO\CinemaDAODB as CinemaDAODB;
    use DAO\MovieDAODB as MovieDAODB;
    require_once ('validate-session-admin.php');


   // $repo = new CinemaDAO(); js
    $repo = new CinemaDAODB();


?>
<!-- ################################################################################################ -->
<div class="wrapper row2 bgded" style="background-image:url('../images/demo/backgrounds/1.png');">
  <div class="overlay">
    <div id="breadcrumb" class="clear"> 
      <ul>
        <li><a href="<?php echo FRONT_ROOT ?>Home/ShowHome">Home</a></li>
        <li><a href="<?php echo FRONT_ROOT ?>Home/ShowAdminLobby">MenuAdmin</a></li>
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
                          <th>Cine</th>
                         <th>Sala</th>
                         <th>Pelicula</th>
                         <th>Dia y hora de la funcion</th>
                        


                    </thead>
                    <tbody>  
                    <form action="" method="POST" >      
          
                         <?php
                         $CinemaList = $repo->getAll();
                         foreach($CinemaList as $cinema)
                         {
                             $FunctionList = $repo->GetMovieFunctions($cinema->getIdCinema());
                                   if(isset($FunctionList) && !empty($FunctionList)){
                                   foreach($FunctionList as $function){
                         ?>
                                        <tr> 
                                             <div>
                                             <td><?php echo $cinema->getCinemaname() ?></td>
                                             <?php $room1 = $function->getId_room(); 
                                                       $repoRoom= $repo->GetAllRooms();
                                                       foreach($repoRoom as $room)
                                                       {
                                                            if($room->getId_room() == $room1)
                                                            {
                                                            ?><td><?php echo $room->getRoom_name(); ?></td><?php

                                                            }
                                                       }

                                             ?>
                                             <?php
                                             $repoMovies = new MovieDAODB();
                                             $repoList = $repoMovies->getAll();
                                             
                                             foreach($repoList as $movie)
                                             {
                                                  if($movie->getId() == $function->getId_movie())
                                                  {
                                                       ?><td><?php echo $movie->getTitle(); ?></td> <?php

                                                  }
                                             }
                                             ?>
                                             <td><?php echo $function->getFunction_time(); ?></td>

                                             <td>
                                             <button type="submit" name="modify" class="btn btn-danger" onclick = "this.form.action = '<?php ?>"> Modificar </button>
                                              <button type="submit" name="remove" class="btn btn-danger" onclick = "this.form.action = '<?php ?>"> Eliminar </button>
                                              </td>   
                                              </div>
                                        </tr>
                                        <?php
                                        
                                   }}
                              }
                                        ?>
                         </form>
                    </tbody>
               </table>
          </div>
     </section>

</main>
