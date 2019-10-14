<?php 

include('header.php');
include('nav-bar.php');
require_once ('validate-session.php');
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
<main class="d-flex align-items-center justify-content-center height-100" style="background-image:url('https://i.pinimg.com/originals/02/a3/95/02a395a756b4756bfd985d8343538313.jpg');">
          <div class="content">
               <header class="text-center">
                    <h2>Add Cinema</h2>
               </header>
              <form action="<?php echo FRONT_ROOT;?>Cinema/Add" method="post" class="login-form bg-dark-alpha p-5 text-white">
                   <div class="form-group">
                        <label for=""> Nombre </label>
                        <input type="text" name="cinemaName" class="form-control form-control-lg" placeholder="Ingresar nombre del Cine">
                   </div>
                   <div class="form-group">
                   <label for=""> Direccion </label>
                        <input type="text" name="address" class="form-control form-control-lg" placeholder="Direccion">
                   </div>
                   <div class="form-group">
                        <?php // Si sobra tiempo mejorar tipo de dato de los horarios ?>
                       <label for=""> Capacidad </label>
                            <input type="number" name="capacity" class="form-control form-control-lg" placeholder="Capacidad">
                       </div>
                   <div class="form-group">
                        <label for="">Valor de ticket</label>
                        <input type="number" name="ticketValue" class="form-control form-control-lg" placeholder="Valor Ticket">
                   </div>
                   
                  
                   <button class="btn btn-dark btn-block btn-lg" type="submit"> Agregar Cine </button>
              </form>
         </div>
    </main>