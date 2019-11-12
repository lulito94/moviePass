<?php
    //use DAO\CinemaDAO as CinemaDAO; js
    use DAO\CinemaDAODB as CinemaDAODB;
    use DAO\MovieDAODB as MovieDAODB;
    require_once ('validate-session-admin.php');


    $repoMovieFunctions = $this->FunctionList;
?>
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
                         foreach($repoMovieFunctions as $MovieFunction)
                         {
                                   if(isset($MovieFunction) && !empty($MovieFunction)){
                                        $cinema = $MovieFunction->getCinema();
                                        $room = $MovieFunction->getRoom();
                                        $movie = $MovieFunction->getMovie();
                         ?>
                                        <tr> 
                                             <div>
                                             <td><?php echo $cinema->getCinemaName() ?></td>
                                             <td><?php echo $room->getRoom_name(); ?></td>
                                             <td><?php echo $movie->getTitle(); ?></td>
                                             <td><?php echo $MovieFunction->getFunction_time(); ?></td>

                                             <td>
                                             <button type="submit" name="modify" class="btn btn-danger" onclick = "this.form.action ='<?php echo FRONT_ROOT;?>Cinema/ShowModifyFunction'" value="<?php echo $MovieFunction->getId_Function(); ?>" > Modificar </button>
                                              <button type="submit" name="remove" class="btn btn-danger" onclick = "this.form.action = '<?php echo FRONT_ROOT;?>Cinema/DeleteFunction'" value="<?php echo $MovieFunction->getId_function(); ?>"> Eliminar </button>
                                              </td>   
                                              </div>
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
