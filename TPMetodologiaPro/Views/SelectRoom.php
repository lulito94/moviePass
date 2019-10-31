<?php 

include('header.php');
include('nav-bar.php');
require_once ('validate-session-admin.php');
use DAO\CinemaDAODB as CinemaDAODB;
$cinema = new CinemaDAODB();
$RoomList = $cinema->GetRoomById($_SESSION['idCinema']);

?>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2 bgded" style="background-image:url('../images/demo/backgrounds/1.png');">
  <div class="overlay">
    <div id="breadcrumb" class="clear"> 
      <ul>
        <li><a href="<?php echo FRONT_ROOT ?>Home/ShowHome">Pagina inicial</a></li>
        <li><a href="<?php echo FRONT_ROOT ?>Home/ShowAdminLobby">Menu del Administrador</a></li>
      </ul>
    </div>
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<main class="d-flex align-items-center justify-content-center height-100" >
          <div class="content">
               <header class="text-center">
                    <h2>Seleccionar cinema</h2>
               </header>
			   <form action="" method="post">
               <table class="table bg-light-alpha">
                    <thead>
                          <th>ID</th>
                         <th>Nombre</th>
                         <th>Asientos</th>


                    </thead>
                    <tbody>  
                    <form action="" method="POST" >                
                         <?php
                                   if(isset($RoomList) && !empty($RoomList)){
                                   foreach($RoomList as $room){
                         ?>
                                        <tr> 
                                             <div>
                                             <td><?php echo $room->getId_room();?></td>
                                             <td><?php echo $room->getRoom_name(); ?></td>
                                             <td><?php echo $room->getSeating(); ?></td>
                                            

                                             <td> 
                                              <button type="submit" name="add" class="btn btn-danger" onclick = "this.form.action = '<?php echo FRONT_ROOT;?>Cinema/SelectMovie'" value="<?php echo $room->getId_room();?>"> Seleccionar </button>
                                              </td>   
                                              </div>
                                        </tr>
                                        <?php
                                        
                                   }}
                                        ?>
                         </form>
                    </tbody>
               </table>
                                                      </form>
         </div>
    </main>