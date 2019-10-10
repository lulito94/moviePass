<?php
    use DAO\CinemaDAO as CinemaDAO;

    $repo = new CinemaDAO();

    $cinemaList = $repo->GetAll();
?>
    <main class="py-5">
     
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4"> Cines Habilitados </h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Nombre</th>
                         <th>Domicilio</th>
                         <th>Horario de Apertura</th>
                         <th>Horario de Cierre</th>
                         <th>Capacidad</th>
                    </thead>
                    <tbody>  
                    <!--<form action="Process/removeBill.php" method="POST" >   -->                   
                         <?php
                                   if(isset($cinemaList) && !empty($cinemaList)){
                                   foreach($cinemaList as $cinema){
                         ?>
                                        <tr> 
                                             <td><?php echo $cinema->getCinemaName(); ?></td>
                                             <td><?php echo $cinema->getAddress(); ?></td>
                                             <td><?php echo $cinema->getOpeningHours(); ?></td>
                                             <td><?php echo $cinema->getClosingHours(); ?></td>
                                             <td><?php echo $cinema->getCapacity(); ?></td>
                                             <td>
                                                <!--  <button type="submit" name="btnRemove" class="btn btn-danger" value="<?php// echo ; ?>"> Eliminar </button> -->
                                             </td>
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
