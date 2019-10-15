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
<main class="d-flex align-items-center justify-content-center height-100" style="background-image:url('https://i.pinimg.com/originals/02/a3/95/02a395a756b4756bfd985d8343538313.jpg');">
          <div class="content">
               <header class="text-center">
                    <h2>Login</h2>
               </header>

               <form action="<?php echo FRONT_ROOT;?>User/SignInAdd" method="post" class="login-form bg-dark-alpha p-5 text-white">
                     <div class="form-group">
                        <label for="">Sexo</label>
                        <input type="radio" name="sex" value="Masculino" checked> Masculino
                        <input type="radio" name="sex" value="Femenino"> Femenino
                        <input type="radio" name="sex" value="Otro"> Otro
                    </div>    
                
                    <div class="form-group">
                    <label for="">Nombre</label>
                         <input type="text" name="name" class="form-control form-control-lg" placeholder="Ingresar nombres">
                    </div>
                    <div class="form-group">
                        <label for="">Apellido</label>
                             <input type="text" name="surname" class="form-control form-control-lg" placeholder="Ingresar apellido">
                        </div>
                    <div class="form-group">
                         <label for="">Dni</label>
                         <input type="dni" name="dni" class="form-control form-control-lg" placeholder="Ingresar dni">
                    </div>   
                    <div class="form-group">
                         <label for="">Email</label>
                         <input type="email" name="email" class="form-control form-control-lg" placeholder="Ingresar email">
                    </div>
                    <div class="form-group">
                         <label for="">Usuario</label>
                         <input type="text" name="userName" class="form-control form-control-lg" placeholder="Ingresar tu nombre de usuario">
                    </div>
                    <div class="form-group">
                         <label for="">Contraseña</label>
                         <input type="password" name="password" class="form-control form-control-lg" placeholder="Ingresar constraseña">
                    </div>
                    
                    
                  
                    <button class="btn btn-dark btn-block btn-lg" type="submit">Iniciar Sesión</button>
               </form>
          </div>
     </main>
