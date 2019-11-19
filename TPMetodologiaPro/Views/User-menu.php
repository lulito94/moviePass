<?php 
 include('header.php');
 include('nav-bar.php');
 require_once ('validate-session.php');
 ?>

<!-- ################################################################################################ -->

 
    <div id="breadcrumb" class="clear">
      <ul>
        <li><a href="<?php echo FRONT_ROOT ?>Home/ShowHome">Pagina inicial</a></li>
        <li><a href="<?php echo FRONT_ROOT ?>Home/ShowUserLobby">Menu del Usuario</a></li>
        <li><a href="<?php echo FRONT_ROOT ?>Home/LogoutUser">Logout</a></li>
      </ul>
    </div>

<!-- ################################################################################################ -->

<main class="container clear"> 
    <div class="content"> 
      <div id="comments" >
        <h2 class="mb-4">Cinema</h2>
  
               <table class="table bg-light-alpha">
                    <thead>
                          <th> Entradas </th>
                          <th> Perfil </th>
                         
                    </thead>
                    <tbody>  
                    <form action="" method="post"   class="login-form bg-dark-alpha p-5 text-white">              
                         
                       <tr> 
                        <div>
                             <td>
                                 <ul class="home-sidelinks">
                                    <li><a class="smooth-link"  href="<?php echo FRONT_ROOT ?>Ticket/userToPurchase">Comprar entradas</a></li>
                                    <li><a class="smooth-link"  href="<?php echo FRONT_ROOT ?>Ticket/userPurchases">Consultar entradas compradas</a></li>

                                 </ul>  
                             </td>                                                       
                             <td>
                                 <ul class="home-sidelinks">
                                     <li><a class="smooth-link"  href="<?php echo FRONT_ROOT ?>Ticket/userInfo">Acerca de <?php echo $_SESSION['loggeduser']->getUserName();?></a></li>
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

<!-- ################################################################################################ -->

<?php 
  include('footer.php');
?>