<?php
    namespace Controllers;

    class HomeController
    {
        //Show's
        public function Index($message = "")
        {
            //Return to Home
            require_once(VIEWS_PATH."menu.php");
        }     
        //------------------------------
        public function ShowUserLobby()
        {
            //Return to User-Menu
            require_once(VIEWS_PATH."User-menu.php");
        }
        //------------------------------
        public function ShowAdminLobby()
        {
            //Return to Admin-Menu
            require_once(VIEWS_PATH."Admin-menu.php");
        }
        //------------------------------

        //Borrar-----
        public function showLobby()
        {
            require_once(VIEWS_PATH."index.php");
        }   
        public function ShowHome()
        {
            require_once(VIEWS_PATH."menu.php");
        }
        //--------------
    }
?>