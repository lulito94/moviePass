<?php

use DAO\HelperDAO as HelperDAO;

$help = new HelperDAO();

$movieFunction = $help->GetMovieFunctionById($_SESSION['functId']);// Traigo la funcion para la que se esta comprando entradas

$setings = $movieFunction->getAvailableSeatings(); // Almaceno la cantidad de localidades disponibles

if(isset($setings) && ($setings != null)){  
    if($_SESSION['cant'] <= $seatings){ // Si la cantidad que se quiere comprar es <= a la cantidad disponible
        $setings -= $_SESSION['cant']; // disminuyo las localidades
        $movieFunction->setAvailableSeatings($seatings); // y seteo esa cantidad
        $this->TicketDAO->AddTicket($cant);
        echo "<script>alert('Ticket Generado con exito!');</script>";
    }else if($seatings == 0){ // Si no quedan localidades que me avise
        echo "Localidades Agotadas";
    }else{
        echo "No hay la suficiente cantidad de localidades";// Y si hay menos de las que quiero comprar otro mensaje
    }
}

?>