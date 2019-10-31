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
      <ul>
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
               <header class="text-center">
                    <h2>Agregar Sala</h2>
               </header>
              <form action="<?php echo FRONT_ROOT;?>Cinema/AddRoom" method="post" class="login-form bg-dark-alpha p-5 text-white">
                   <div class="form-group">
                        <label for=""> Nombre Sala </label>
                        <input type="text" name="roomName" class="form-control form-control-lg" placeholder="Ingresar nombre Sala" required>
                   </div>
                   <div class="form-group">
                   <label for=""> Asientos </label>
                        <input type="text" name="seatings" class="form-control form-control-lg" placeholder="Asientos" required>
                   </div>
                                            
                   <button class="btn btn-dark btn-block btn-lg" type="submit"> Agregar Sala </button>
              </form>
         </div>
    </main>