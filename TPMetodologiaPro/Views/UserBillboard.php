
<!-- Esto esta en tratamiento :D -->

<?php
include('header.php');
include('nav-bar.php');
require_once('validate-session.php');

use DAO\CinemaDAODB as CinemaDAODB;
use Models\Cinema;

// here starts the php

if (isset($_POST['show_dowpdownFunction_value'])) {

  $functionElect = $_POST['dowpdownFunc']; // this will print the value if downbox out
}

$repo = new CinemaDAODB();
$functions = $repo->GetAllMovieFunctions();
$cinemas = $repo->GetAll();
             echo "<select name='dowpdownFunc'>";
              $cinemaFunctions = $cinemas->GetMovieFunctions($cinemaElect);
              var_dump($cinemaFunctions);
              foreach ($cinemaFunctions as $function) {

                ?>
                <option value="<?php echo $function->getId_function() ?>"><?php echo $function->getFunction_time() ?></option>
              <?php } ?>
              </select>
              <?php echo $functionElect;?>
              <button type="submit" name="show_dowpdownFunc_value" class="btn btn-danger" onclick = "this.form.action ='<?php echo FRONT_ROOT;?>Cinema/ShowUserMenu'" value="<?php echo $functionElect; ?>" >Elegir Funcion</button>
?>
