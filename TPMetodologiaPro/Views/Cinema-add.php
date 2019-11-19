<?php 

include('header.php');
include('nav-bar.php');
require_once ('validate-session-admin.php');

?>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2 bgded" style="background-image:url('../images/demo/backgrounds/1.png');">
  <div class="overlay">
    <div id="breadcrumb" class="clear"> 
      <ul class="pagination">
        <li><a href="<?php echo FRONT_ROOT ?>Home/ShowHome">Home</a></li>
        <li><a href="<?php echo FRONT_ROOT ?>Home/ShowAdminLobby">MenuAdmin</a></li>
      </ul>
    </div>
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<main class="d-flex align-items-center justify-content-center height-100" >
          <div class="content">
               <header class="text-center">
                    <h2>Add Cinema</h2>
               </header>
              <form action="<?php echo FRONT_ROOT;?>Cinema/Add" method="post" class="login-form bg-dark-alpha p-5 text-white">
                   <div class="form-group">
                        <label for=""> Nombre </label>
                        <input type="text" name="cinemaName" class="form-control form-control-lg" placeholder="Ingresar nombre del Cine"required>
                   </div>
                   <div class="form-group">
                   <label for=""> Direccion </label>
                        <input type="text" name="address" class="form-control form-control-lg" placeholder="Direccion"required>
                   </div>
                   <div class="form-group">
                        <?php // Si sobra tiempo mejorar tipo de dato de los horarios ?>
                       <label for=""> Capacidad </label>
                            <input type="number" name="capacity" class="form-control form-control-lg"  max=1000 placeholder="Capacidad"required>
                       </div>
                   <div class="form-group">
                        <label for="">Valor de ticket</label>
                        <input type="number" name="ticketValue" class="form-control form-control-lg" placeholder="Valor Ticket" required>
                   </div>
                   
                  
                   <button class="btn btn-dark btn-block btn-lg" type="submit"> Agregar Cine </button>
              </form>
         </div>
    </main>