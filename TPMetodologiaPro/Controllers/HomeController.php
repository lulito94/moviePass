<?php
    namespace Controllers;

    class HomeController
    {
        public function Index($message = "")
        {
            require_once(VIEWS_PATH."menu.php");
        }     
        public function showLobby()
        {
            require_once(VIEWS_PATH."index.php");
        }   
        public function ShowHome()
        {
            require_once(VIEWS_PATH."menu.php");
        }
        public function ShowUserLobby()
        {
            require_once(VIEWS_PATH."User-menu.php");
        }
        public function ShowAdminLobby()
        {
            require_once(VIEWS_PATH."Admin-menu.php");
        }

    }
?>