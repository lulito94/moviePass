<?php 
 include('header.php');
 include('nav-bar.php');
 require_once ('validate-session-admin.php');
 ?>
<!-- ################################################################################################ -->
<div class="wrapper row2 bgded" style="background-image:url('../images/demo/backgrounds/1.png');">
  <div class="overlay">
    <div id="breadcrumb" class="clear"> 
      <ul>
        <li><a href="<?php echo FRONT_ROOT ?>Home/ShowHome">Pagina inicial</a></li>
        <li><a href="<?php echo FRONT_ROOT ?>Home/ShowAdminLobby">Menu del Administrador</a></li>
      </ul>
    </div>
  </div>
</div>
 <main class="py-5">
 
<div class="wrapper row4" style="">
<main class="container clear"> 
    <div class="content"> 
      <div id="comments" >
        <h2>Cinema</h2>
        <form action="" method="post"  style="background-color: #EAEDED;padding: 2rem !important;">
        <ul class="home-sidelinks">
            <li><a class="smooth-link"  href="<?php echo FRONT_ROOT ?>Movie/Add">Refrescar la Database  de Peliduclas a la Api</a></li>
            <li><a class="smooth-link"  href="<?php echo FRONT_ROOT ?>Movie/GetToApiGenres">Refrescar la Database  de Generos a la Api</a></li>

                       <!--<li><a  class="smoothscroll" href="#contact">Contact<span>get in touch</span></a></li> -->
        </ul> <!-- end home-sidelinks -->

        
        </form>
      </div>
    </div>
  </main>
</div>
<!-- ################################################################################################ -->

<?php 
  include('footer.php');
?>