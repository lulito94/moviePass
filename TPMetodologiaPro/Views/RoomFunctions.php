<?php
include('header.php');
include('nav-bar.php');
require_once ('validate-session-admin.php');
?>
    <!-- ################################################################################################ -->
    <div class="wrapper row2 bgded" style="background-image:url('../images/demo/backgrounds/1.png');">
        <div class="overlay">
            <div id="breadcrumb" class="clear">
                <ul class="pagination">
                    <li><a href="<?php echo FRONT_ROOT ?>Home/ShowHome">Pagina Inicial</a></li>
                    <li><a href="<?php echo FRONT_ROOT ?>Home/ShowAdminLobby">Menu del Administrador</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- ################################################################################################ -->
    <div class="wrapper row4"  style="background-color:transparent">
        <main class="container clear">
            <div class="content">
                <div id="comments" >
                    <h2>Cinema Room Options</h2>
                    <form action="" method="post"  >
                        <ul class="home-sidelinks">
                            <li><a class="smooth-link"  href="<?php echo FRONT_ROOT ?>Cinema/ShowRoomList">Listas Salas</a></li>
                            <li><a class="smooth-link"  href="<?php echo FRONT_ROOT ?>Cinema/ShowRoomModify">Modificar Salas</a></li>


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