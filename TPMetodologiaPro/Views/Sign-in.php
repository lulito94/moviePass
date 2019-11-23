<?php

include('header.php');
include('nav-bar.php');
?>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2 bgded">
     <div class="overlay">
          <div id="breadcrumb" class="clear">
               <ul class="pagination">
                    <li><a href="<?php echo FRONT_ROOT ?>Home/ShowHome">Home</a></li>
               </ul>
          </div>
     </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<main class="container clear">
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

     <div class="content">

          <header class="text-left">
               <h2 class="w3-text-blue">Registrarse</h2>
          </header>
          <?php //Ojo si se modifican el orden de los campos los datos se graban mal, por ende hay que modificar el 
          //orden en las demas funciones
          ?>
          <form action="<?php echo FRONT_ROOT; ?>User/SignInAdd" method="post" class="login-form bg-dark-alpha p-5 text-black" class="w3-container">


               <div class="form-group">
                    <label for="" style="color: #0E76A8;font-weight: bold">Sexo</label>
                    <p style="color: white;display: inline-block">Masculino</p>
                    <input type="radio" name="sex" value="Masculino" style="display: inline-block" required checked>
                    <p style="color: white;display: inline-block">Femenino</p>
                    <input type="radio" name="sex" value="Femenino" style="display: inline-block">
                    <p style="color: white;display: inline-block">Otro</p>
                    <input type="radio" name="sex" value="Otro" style="display: inline-block">
               </div>

               <div class="form-group">
                    <label for="" style="color: #0E76A8;font-weight: bold">Nombre</label>
                    <input type="text" name="name" class="w3-input w3-animate-input"  style="width:30%"   maxlength="30" placeholder="Ingresar nombres" required>
               </div>
               <div class="form-group">
                    <label for="" style="color: #0E76A8;font-weight: bold">Apellido</label>
                    <input type="text" name="surname" class="w3-input w3-animate-input"  style="width:135px" maxlength="30" placeholder="Ingresar apellido" required>
               </div>
               <div class="form-group">
                    <label for="" style="color: #0E76A8;font-weight: bold">Dni</label>
                    <input type="number" name="dni" class="w3-input w3-animate-input"  style="width:135px" placeholder="Ingresar dni" max="99999999" required>

                    <div class="form-group">
                         <label for="" style="color: #0E76A8;font-weight: bold">Email</label>
                         <input type="email" name="email" class="w3-input w3-animate-input"  style="width:135px" maxlength="30" placeholder="Ingresar email" required>
                    </div>
                    <div class="form-group">
                         <label for="" style="color: #0E76A8;font-weight: bold">Usuario</label>
                         <input type="text" name="userName" class="w3-input w3-animate-input"  style="width:135px" maxlength="20" placeholder="Ingresar tu nombre de usuario" required>
                    </div>
                    <div class="form-group">
                         <label for="" style="color: #0E76A8;font-weight: bold">Contraseña</label>
                         <input type="password" name="password" class="w3-input w3-animate-input"  style="width:135px" placeholder="Ingresar constraseña" maxlength="10" required>
                    </div>

                    <button class="w3-btn w3-blue" type="submit">Registrarse</button>
          </form>
     </div>

</main>