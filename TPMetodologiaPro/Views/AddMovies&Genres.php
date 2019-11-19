<?php 
 include('header.php');
 include('nav-bar.php');
 require_once ('validate-session-admin.php');
 ?>
<!-- ################################################################################################ -->
<div class="wrapper row2 bgded" >
  <div class="overlay">
    <div id="breadcrumb" class="clear"> 
      <ul class="pagination">
        <li><a href="<?php echo FRONT_ROOT ?>Home/ShowHome">Pagina Inicial</a></li>
        <li><a href="<?php echo FRONT_ROOT ?>Home/ShowAdminLobby">Menu del Administrador</a></li>
      </ul>
    </div>
  </div>
</div>
 <main class="py-5">
 
<div class="wrapper row4" >
<main class="container clear"> 
    <div class="content"> 
      <div id="comments" >
        <h2>Cinema</h2>
        <form action="" method="post"  style="background-color: #EAEDED;padding: 2rem !important;">
        <ul class="home-sidelinks">
            <li><a class="smooth-link"  href="<?php echo FRONT_ROOT ?>Movie/Add">Refresh Database  Movies To Api</a></li>
            <li><a class="smooth-link"  href="<?php echo FRONT_ROOT ?>Movie/GetToApiGenres">Refresh Database Genres To Api</a></li>

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