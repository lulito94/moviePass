<?php
namespace Controllers;

class TicketController{


    function __construct()
    {
        
    }


    public function ShowSelectFunction($id_cinema,$id_movie)
    {
        $_SESSION['MovieElect'] = $id_movie;
        require_once(VIEWS_PATH."FunctionSelect.php");
    }

}
?>