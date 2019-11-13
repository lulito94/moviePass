<?php 

include('header.php');
include('nav-bar.php');
?>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2 bgded" style="background-image:url('../images/demo/backgrounds/1.png');">
  <div class="overlay">
    <div id="breadcrumb" class="clear"> 
      <ul>
        <li><a href="<?php echo FRONT_ROOT ?>Home/ShowHome">Home</a></li>
      </ul>
    </div>
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
          <div class="content">
              
               <header class="text-center">
                    <h2 style="color: #0E76A8">Registrarse</h2>
               </header>
               <?php //Ojo si se modifican el orden de los campos los datos se graban mal, por ende hay que modificar el 
               //orden en las demas funciones?>
               <form action="<?php echo FRONT_ROOT;?>User/SignInAdd" method="post" class="login-form bg-dark-alpha p-5 text-white">
               <div class="form-group" >
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
                         <input type="text" name="name" class="form-control form-control-lg" maxlength="30" placeholder="Ingresar nombres" required>
                    </div>
                    <div class="form-group">
                        <label for="" style="color: #0E76A8;font-weight: bold">Apellido</label>
                             <input type="text" name="surname" class="form-control form-control-lg" maxlength="30" placeholder="Ingresar apellido" required>
                        </div>
                    <div class="form-group">
                         <label for="">Dni</label>
                         <input type="number" name="dni" class="form-control form-control-lg" placeholder="Ingresar dni" max="99999999" required>
                    
                    <div class="form-group">
                         <label for="" style="color: #0E76A8;font-weight: bold">Email</label>
                         <input type="email" name="email" class="form-control form-control-lg" maxlength="30" placeholder="Ingresar email" required>
                    </div>
                    <div class="form-group">
                         <label for="">Usuario</label>
                         <input type="text" name="userName" class="form-control form-control-lg" maxlength="20" placeholder="Ingresar tu nombre de usuario" required>
                    </div>
                    <div class="form-group">
                         <label for="">Contraseña</label>
                         <input type="password" name="password" class="form-control form-control-lg"  placeholder="Ingresar constraseña" maxlength="10" required>
                    </div>
                    
                    <button class="btn btn-dark btn-block btn-lg" type="submit">Registrarse</button>
               </form>
          </div>

     </main>
