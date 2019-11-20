<?php
    include('header.php');
include('nav-bar.php');
    require_once ('validate-session-admin.php');
    use DAO\CinemaDAODB as CinemaDAODB;
    use DAO\UserDAODB as UserDAODB;
    use DAO\HelperDAO as HelperDAO;

    $repo = new CinemaDAODB();
    $repoUser = new UserDAODB();
    $repoHelper = new HelperDAO();
    $purchases = $repo->GetTotalPurchases();

?>
<!-- ################################################################################################ -->
<div class="wrapper row2 bgded">
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
    <main class="py-5">
     
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4 text-white"> Ventas Por Cinema </h2>
               <table class="table bg-light-alpha">
                    <thead>
                          <th>ID Purchase</th>
                         <th>Usuario</th>
                         <th>Cinema</th>
                         <th>Monto</th>
                         <th>Locaciones</th>
                         

                    </thead>
                    <tbody>  
                    <form action="" method="POST" >                
                         <?php
                                   if(isset($purchases) && !empty($purchases)){
                                   foreach($purchases as $purchase){
                                       $user = $repoUser->GetUserById($purchase['idUser']);
                                       $function = $repo->GetMovieFunctionById($purchase['id_function']);
                         ?>
                                        <tr> 
                                             <div>
                                             <td><?php echo $purchase['id_purchase'];?></td>
                                             <td><?php echo $user->getUserName(); ?></td>
                                             <td><?php echo $function->getCinema()->getcinemaName(); ?></td>
                                             <td><?php echo $purchase['amount']; ?></td>
                                             <td><?php echo $purchase['cant_locations']; ?></td>
                                              </div>
                                        </tr>
                                        <?php
                                        
                                   }}
                                        ?>
                         </form>
                    </tbody>
               </table>
          </div>
     </section>

</main>
