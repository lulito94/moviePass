<?php 

include('header.php');
include('nav-bar.php');
require_once ('validate-session-admin.php');
use DAO\CinemaDAODB as CinemaDAODB;
$cinema = new CinemaDAODB();
$cinemaList = $cinema->GetAll();

?>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2 bgded" >
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
<main class="d-flex align-items-center justify-content-center height-100" >
          <div class="content">
               <header class="text-left text-white">
                    <h2>Seleccionar cinema</h2>
               </header>
			   <form action="" method="post">
               <table class="table bg-light-alpha">
                    <thead>
                          <th>ID</th>
                         <th>Nombre</th>
                         <th>Direccion</th>
                         <th>Capacidad</th>
                         <th>Valor de la entrada</th>                         
                         <th>Accion</th>


                    </thead>
                    <tbody>  
                    <form action="" method="POST" >                
                         <?php
                                   if(isset($cinemaList) && !empty($cinemaList)){
                                   foreach($cinemaList as $cinema){
                         ?>
                                        <tr> 
                                             <div>
                                             <td><?php echo $cinema->getIdCinema() ?></td>
                                             <td><?php echo $cinema->getCinemaName(); ?></td>
                                             <td><?php echo $cinema->getAddress(); ?></td>
                                             <td><?php echo $cinema->getCapacity(); ?></td>
                                             <td><?php echo $cinema->getTicketValue(); ?></td>

                                             <td> 
                                              <button type="submit" name="remove" class="btn btn-danger" onclick = "this.form.action = '<?php echo FRONT_ROOT;?>Cinema/SelectRoom'" value="<?php echo $cinema->getIdCinema();?>"> Seleccionar </button>
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