<?php 
 include('header.php');
 include('nav-bar.php');
 require_once ('validate-session.php');



?>
<div class="wrapper row2 bgded" >
  <div class="overlay">
    <div id="breadcrumb" class="clear"> 
      <ul class="pagination">
        <li><a href="<?php echo FRONT_ROOT ;?>Home/ShowHome">Pagina inicial</a></li>
        <li><a href="<?php echo FRONT_ROOT ;?>Home/ShowUserLobby">Menu del Usuario</a></li>
      </ul>
    </div>
  </div>
</div>
 <main class="py-5">
     
 <section id="listado" class="mb-5">
      <div class="container">
           <h2 class="mb-4"style="color:white"> User Info</h2>
           <table class="table bg-light-alpha">
                <thead>
                     <th>Nombre</th>
                     <th>Apellido</th>
                     <th>Username</th>
                     <th>password</th>
                     <th>email</th>
                     <th>dni</th>
                     <th>sex</th>
                </thead>
                <tbody>  
                     <?php
                     $user = $_SESSION['loggeduser'];
                               if(isset($user))
                               {

                     ?>
                                    <tr> 
                                         <td><p><?php echo $user->getName(); ?></p></td>
                                         <td><p><?php echo $user->getSurname(); ?></p></td>
                                         <td><p><?php echo $user->getUserName(); ?></p></td>
                                         <td><p><?php echo $user->getPassword(); ?></p></td>
                                         <td><p><?php echo $user->getEmail(); ?></p></td>
                                         <td><p><?php echo $user->getDni(); ?></p></td>
                                         <td><p><?php echo $user->getSex(); ?></p></td>
                                    </tr>
                                    <?php
                               }
                                    ?>
                </tbody>
           </table>
      </div>
 </section>

</main>

 ?>