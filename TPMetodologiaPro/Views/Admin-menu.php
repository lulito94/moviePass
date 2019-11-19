<?php
include('header.php');
include('nav-bar.php');
require_once('validate-session-admin.php');
?>
<!-- ################################################################################################ -->
<div class="wrapper row2 bgded" style="background-image:url('../images/demo/backgrounds/1.png');">
  <div class="overlay">
    <div id="breadcrumb" class="clear">
      <ul class="pagination">
        <li><a href="<?php echo FRONT_ROOT ?>Home/ShowHome">Pagina inicial</a></li>
        <li><a href="<?php echo FRONT_ROOT ?>Home/ShowAdminLobby">Menu del Administrador</a></li>
        <li><a href="<?php echo FRONT_ROOT ?>Home/LogoutAdmin">Logout</a></li>
      </ul>
    </div>
  </div>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row4" style="background-color:transparent">
  <main class="container clear">
    <div class="content">
      <div id="comments">
        <h2 class="mb-4 text-white">Cinema</h2>

        <table class="table bg-light-alpha">
          <thead>
            <th> Opciones de Cine </th>
            <th> Opciones de Sala y Funciones</th>
            <th> Perfiles </th>
            <th> Actualizacion de Peliculas </th>




          </thead>
          <tbody>
            <form action="" method="post" class="login-form bg-light-alpha p-5 text-white">

              <tr>
                <div>
                  <td>
                    <ul class="home-sidelinks">
                      <li><a class="smooth-link" href="<?php echo FRONT_ROOT ?>Cinema/ShowCinemaView">Agregar Cinemas</a></li>
                      <li><a class="smooth-link" href="<?php echo FRONT_ROOT ?>Cinema/ShowCinemaModify">Modificar Cinemas</a></li>
                      <li><a class="smooth-link" href="<?php echo FRONT_ROOT ?>Cinema/ShowCinemaListView">Listar Cinemas</a></li>
                    </ul>
                  </td>
                  <td>
                    <ul class="home-sidelinks">
                      <li><a class="smooth-link" href="<?php echo FRONT_ROOT ?>Cinema/ShowFunctions">Listar Funciones</a></li>
                      <li><a class="smooth-link" href="<?php echo FRONT_ROOT ?>Movie/ShowMovies">Listar Peliculas</a></li>
                      <li><a class="smooth-link" href="<?php echo FRONT_ROOT ?>Cinema/ShowRoomFunctions">Opciones de Salas</a></li>
                    </ul>
                  </td>
                  <td>
                    <ul class="home-sidelinks">
                      <li><a class="smooth-link" href="<?php echo FRONT_ROOT ?>user/AdminProfile">Mi Perfil</a></li>
                      <li><a class="smooth-link" href="<?php echo FRONT_ROOT ?>user/UsersProfiles">Perfiles de Usuarios</a></li>
                    </ul>
                  </td>
                  <td>
                    <ul class="home-sidelinks">
                      <li><a class="smooth-link" href="<?php echo FRONT_ROOT ?>Movie/Add">Refresh Database Movies To Api</a></li>
                      <li><a class="smooth-link" href="<?php echo FRONT_ROOT ?>Movie/GetToApiGenres">Refresh Database Genres To Api</a></li>
                    </ul>
                  </td>
                </div>
              </tr>

            </form>
          </tbody>
        </table>

      </div>
    </div>
  </main>
</div>
<!-- ################################################################################################ -->

<?php
include('footer.php');
?>