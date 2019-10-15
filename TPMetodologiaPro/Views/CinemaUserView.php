<?php
    //use DAO\CinemaDAO as CinemaDAO; js
    use DAO\CinemaDAODB as CinemaDAODB;
    use DAO\MovieDAO as MovieDAO;
    use DAO\MovieDAODB as MovieDAODB;


   // $repo = new CinemaDAO(); js
    $repo = new CinemaDAODB();
    $movies = new MovieDAO();
    $movieDB = new MovieDAODB();

    $movieList = $movies->GetAll();
    foreach($movieList as $movie){
        $count =0;
        $movieDB->Add($movie);
        var_dump($count);
    }
    $cinemaList = $repo->GetAll();
?>
    <main class="py-5">
     
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4"> Cines Habilitados </h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Nombre</th>
                         <th>Direccion</th>
                         <th>Capacidad</th>
                         <th>Valor de la entrada</th>
                         <th>Funciones</th>
                    </thead>
                    <tbody>  
                    <form action="<?php // Aca se echo FRONT_ROOT;?>/" method="POST" >                
                         <?php
                                   if(isset($cinemaList) && !empty($cinemaList)){
                                   foreach($cinemaList as $cinema){
                         ?>
                                        <tr> 
                                             <td><?php echo $cinema->getCinemaName(); ?></td>
                                             <td><?php echo $cinema->getAddress(); ?></td>
                                             <td><?php echo $cinema->getCapacity(); ?></td>
                                             <td><?php echo $cinema->getTicketValue(); ?></td>
                                             <td><?php
                                                if(isset($movieList) && !empty($movieList)){
                                                for($count =0 ; $count < 6; $count++){
                                                    if(!empty($movieList)){
                                                        ?> <div>
                                                    <?php echo $movieList[$count]->getTitle();}
                                                }}?>
                                                </div></td>
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
