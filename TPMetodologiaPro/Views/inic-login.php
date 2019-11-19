<?php

include('header.php');
include('nav-bar.php');
?>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<div class="wrapper row2 bgded" >
  <div class="overlay">
    
      <ul class="pagination">
        <li><a href="<?php echo FRONT_ROOT ?>Home/ShowHome" > <em> Home</em></a></li>
       
      </ul>
    
  </div>
</div>


<div class="container">

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<main class="d-flex align-items-left justify-content-left height-100">
  <div class="content">
    <header class="text-center text-white">
      <h2 >Login</h2>
    </header>

    <form action="<?php echo FRONT_ROOT; ?>User/Check" method="post" class="login-form bg-dark-alpha p-5 text-white">

      <div class="form-group">
        <label for="" >UserName</label>
        <input type="text" name="username" class="form-control form-control-lg" placeholder="Ingresar usuario">
      </div>
      <div class="form-group">
        <label for="" >Password</label>
        <input type="password" name="password" class="form-control form-control-lg" placeholder="Ingresar constraseña">
      </div>
      <div >
      <button class="btn btn-dark btn-block btn-lg" type="submit">Iniciar Sesión</button>
      <button class="btn btn-dark btn-block btn-lg" name="register" type="submit" onclick="this.form.action ='<?php echo FRONT_ROOT ?>User/SignIn'">Registrarse</button>
      </div>
    </form>
  </div>
</main>
</div>

<?php

include('footer.php');
?>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId: '518915292277614',
      cookie: true,
      xfbml: true,
      version: 'v4.0'
    });

    FB.AppEvents.logPageView();
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
      return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
