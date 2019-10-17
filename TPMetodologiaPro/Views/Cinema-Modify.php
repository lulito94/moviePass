<?php
include('header.php');
include('nav-bar.php');
//require_once ('validate-session-admin.php');
    //use DAO\CinemaDAO as CinemaDAO; js
    use DAO\CinemaDAODB as CinemaDAODB;
    require_once ('validate-session-admin.php');


   // $repo = new CinemaDAO(); js
    $repo = new CinemaDAODB();

    $cinemaList = $repo->GetAll();
?><!-- ################################################################################################ -->
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
<h2>Modificar Cinema</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Nombre</th>
                         <th>Direccion</th>
                         <th>Capacidad</th>
                         <th>Valor de la entrada</th>
                    </thead>
                    <tbody>  
                    <form action="<?php echo FRONT_ROOT;?>Cinema/ModifyCinema" method="post" class="login-form bg-dark-alpha p-5 text-white">
                         <?php
                                   if(isset($cinemaList) && !empty($cinemaList)){
                                   foreach($cinemaList as $cinema){
                         ?>
                                        <tr> 
                                             <td><?php echo $cinema->getCinemaName(); ?></td>
                                             <td><?php echo $cinema->getAddress(); ?></td>
                                             <td><?php echo $cinema->getCapacity(); ?></td>
                                             <td><?php echo $cinema->getTicketValue(); ?></td>
                                             <td>
                                             <label for=""> Valor de ticket Nuevo </label>
                        <button type="submit" name="modify" class="btn btn-danger" value="<?php echo $cinema->getCinemaName(); ?>"> Modificar </button>
                        </td><td>
                        <input type="text" name="ticketValue" class="form-control form-control-lg" value="" placeholder="Valor de ticket" require>
                        </td>
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




               </header>
              <form action="<?php echo FRONT_ROOT;?>Cinema/ModifyCinema" method="post" class="login-form bg-dark-alpha p-5 text-white">
                   <div class="form-group">
                        <label for=""> Valor de ticket Nuevo </label>
                        <button type="submit" name="modify" class="btn btn-danger" value="<?php echo $cinema->getCinemaName(); ?>"> Modificar </button>

                        <input type="text" name="ticketValue" class="form-control form-control-lg" placeholder="Valor de ticket">

                   
                  
                   <button class="btn btn-dark btn-block btn-lg" type="submit"> Agregar Cine </button>
              </form>