
<?php 

include('header.php');
include('nav-bar.php');
?>
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<main class="d-flex align-items-center justify-content-center height-100" style="background-image:url('https://i.pinimg.com/originals/02/a3/95/02a395a756b4756bfd985d8343538313.jpg');">
          <div class="content">
               <header class="text-center">
                    <h2 style="color: #0E76A8">Login</h2>
               </header>

               <form action="<?php  echo FRONT_ROOT;?>User/Check" method="post" class="login-form bg-dark-alpha p-5 bg-light">
              
               <div class="form-group">
                         <label for="" style="color: #0E76A8">UserName</label>
                         <input type="text" name="username" class="form-control form-control-lg" placeholder="Ingresar usuario" required>
                    </div>
                    <div class="form-group">
                         <label for="" style="color: #0E76A8">Password</label>
                         <input type="password" name="password" class="form-control form-control-lg" placeholder="Ingresar constraseña" required>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg" type="submit">Iniciar Sesión</button>
               </form>
          </div>
     </main>
