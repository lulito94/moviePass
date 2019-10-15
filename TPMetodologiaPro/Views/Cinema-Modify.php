<?php
include('header.php');
include('nav-bar.php');
//require_once ('validate-session-admin.php');


?>

<main class="d-flex align-items-center justify-content-center height-100" style="background-image:url('https://i.pinimg.com/originals/02/a3/95/02a395a756b4756bfd985d8343538313.jpg');">
          <div class="content">
               <header class="text-center">
                    <h2>Modificar Cinema</h2>
               </header>
              <form action="<?php echo FRONT_ROOT;?>Cinema/ModifyCinema" method="post" class="login-form bg-dark-alpha p-5 text-white">
                   <div class="form-group">
                        <label for=""> Valor de ticket Nuevo </label>
                        <input type="text" name="ticketValue" class="form-control form-control-lg" placeholder="Valor de ticket">
                  
                   
                  
                   <button class="btn btn-dark btn-block btn-lg" type="submit"> Agregar Cine </button>
              </form>
         </div>
    </main>