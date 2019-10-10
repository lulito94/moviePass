<?php 

include('header.php');
include('nav-bar.php');
?>
<!-- ################################################################################################ -->
<div class="wrapper row2 bgded" style="background-image:url('../images/demo/backgrounds/1.png');">
  <div class="overlay">
    <div id="breadcrumb" class="clear"> 
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Add</a></li>
        <li><a href="#">List - Remove</a></li>
      </ul>
    </div>
  </div>
</div>
<!-- ################################################################################################ -->
<main class="d-flex align-items-center justify-content-center height-100" >
          <div class="content">
               <header class="text-center">
                    <h2>Login</h2>
               </header>
               <?php echo FRONT_ROOT; ?>
              <form action="<?php echo FRONT_ROOT;?>Cinema/Add" method="post" class="login-form bg-dark-alpha p-5 text-white">
                   <div class="form-group">
                        <label for=""> Nombre </label>
                        <input type="text" name="cinemaName" class="form-control form-control-lg" placeholder="Ingresar nombre del Cine">
                   </div>
                   <div class="form-group">
                   <label for=""> Domicilio </label>
                        <input type="text" name="address" class="form-control form-control-lg" placeholder="Ingresar Domicilio">
                   </div>
                   <div class="form-group">
                        <?php // Si sobra tiempo mejorar tipo de dato de los horarios ?>
                       <label for=""> Horario de Apertura </label>
                            <input type="number" name="openingHours" class="form-control form-control-lg" placeholder="Horaio Apertura">
                       </div>
                   <div class="form-group">
                        <label for="">Horario Cierre</label>
                        <input type="number" name="closingHours" class="form-control form-control-lg" placeholder="Horario de Cierre">
                   </div>
                   <div class="form-group">
                        <label for=""> Capacidad </label>
                        <input type="number" name="capacity" class="form-control form-control-lg" placeholder="Capacidad">
                   </div>
                  
                   <button class="btn btn-dark btn-block btn-lg" type="submit"> Agregar Cine </button>
              </form>
         </div>
    </main>