<?php 
 include('header.php');
 include('nav-bar.php');
 require_once ('validate-session.php');

 //use's
use DAO\TicketDAO as TicketDAO;

$repo = new TicketDAO();
$list = $repo->GetTicketsByUser($_SESSION['loggeduser']->getId_user());
$ticket
?>
<div class="wrapper row2 bgded" style="background-image:url('../images/demo/backgrounds/1.png');">
  <div class="overlay">
    <div id="breadcrumb" class="clear"> 
      <ul>
        <li><a href="<?php echo FRONT_ROOT ;?>Home/ShowHome">Pagina inicial</a></li>
        <li><a href="<?php echo FRONT_ROOT ;?>Home/ShowUserLobby">Menu del Usuario</a></li>
      </ul>
    </div>
  </div>
</div>
 <main class="py-5">
     
 <section id="listado" class="mb-5">
      <div class="container">
           <h2 class="mb-4"style="color:#FF0000">Entradas adquiridas por <?php echo $_SESSION['loggeduser']->getUserName();?> </h2>
           <table class="table bg-light-alpha">
                <thead>
                     <th>Id Ticket</th>
                     <th>Id Compra</th>
                     <th>Locaciones</th>
                     <th>Monto</th>
                     
                </thead>
                <tbody>  
                     <?php
                               if(isset($list))
                               {
                                foreach ($list as $row) {

                     ?>
                                    <tr> 
                                         <td><p><?php echo $row["id_ticket"] ?></p></td>
                                         <td><p><?php echo $row["id_purchase"] ?></p></td>
                                         <td><p><?php echo $row["cant_locations"] ?></p></td>
                                         <td><p><?php echo $row["amount"] ?></p></td>

                                    </tr>
                                    <?php
                               }
                            }
                                    ?>
                </tbody>
           </table>
      </div>
 </section>

</main>

 ?>