<?php
    namespace Controllers;
    
    //Use's
    use Models\User as User;
    //-------------------------
    use DAO\UserDAODB as UserDAODB;
    use DAO\CinemaDAODB as CinemaDAODB;
    //------------------------
    
    class UserController
    {
        //private $userDAO; js
        private $userDAODB;

        //Constructor
        public function __construct()
        {
            //$this->userDAO = new UserDAO(); js
            $this->userDAODB = new UserDAODB();
        }
        //---------------------------------------------------

        //Show's
        public function ShowAdminView()
        {
            //Return to Admin-Menu
            require_once(VIEWS_PATH."Admin-menu.php");
        }
        //---------------------------------------------------
        public function AdminOptions()
        {
            //Return to Add Movies and Genres 
            require_once(VIEWS_PATH."AddMovies&Genres.php");
        }
        //---------------------------------------------------
        public function ShowCinemaView()
        {
            //User Returns To Cinema View
            require_once(VIEWS_PATH."CinemaUserView.php");
        }
        //---------------------------------------------------
        public function ShowLobby()
        {
            //Return to Lobby
            require_once(VIEWS_PATH."menu.php");
        }
        //---------------------------------------------------
        public function ShowLogin()
        {
            //Return to Login
            require_once(VIEWS_PATH."inic-login.php");
        }
        //---------------------------------------------------
        public function ShowSignIn()
        {
            //Return to Sign-in 
            require_once(VIEWS_PATH."Sign-in.php");
        }
        //---------------------------------------------------
        public function ShowUserHome()
        {
            //Return To User-Menu
            require_once(VIEWS_PATH."User-menu.php");
        }
        //---------------------------------------------------
        public function User_Info()
        {
            //Show User-Info
            require_once(VIEWS_PATH."User_Info.php");
        }
        //---------------------------------------------------
        public function AdminProfile()
        {
            //Show Admin-Info
            require_once(VIEWS_PATH."Admin_info.php");
        }
        //---------------------------------------------------
        public function UsersProfiles()
        {
            //Show Users-Profiles
            require_once(VIEWS_PATH."UsersProfiles.php");
        }
        //---------------------------------------------------


        //To Delete---
        public function SignIn()
        {
            //
            $this->ShowSignIn();
        }
        //---------------------------------------------------
        public function UserShowCinemas()
        {
            //
            require_once(VIEWS_PATH."CinemaUserView.php");
        }
        //---------------------------------------------------


        //User's Functions
        public function Check($username,$password)
        {
           // $usercheck = $this->userDAO->getByUserName($username); js
           $usercheck = $this->userDAODB->getByUserName($username);
            if(!empty($usercheck))
            {
                if(($usercheck->getUsername() == "Mati") && ($password == "sarasa"))
                {
                    $_SESSION['loggedadmin'] = $usercheck;
                    $this->ShowAdminView();
                }
                else{
                   if($usercheck->getPassword() == $password)
                    {
                     $_SESSION['loggeduser'] = $usercheck;
                      $this->ShowUserHome(); 
                     
                    } else{
                        echo '<script>alert("Contraseña incorrecta!");</script>';
                        $this->ShowLogin();
                    }
                }
            }
            else
            {
                echo "<script>alert('Debes crear tu usuario');</script>";
            $this->ShowLogin();
            }
        }
        //-------------------------------------------------------
        public function SignInAdd($sex,$name,$surname,$dni,$email,$userName,$password)
        {
            $user = new User();
            $user->setSex($sex);
            $user->setName($name);
            $user->setSurname($surname);
            $user->setDni($dni);
            $user->setEmail($email);
            $user->setUserName($userName);
            $user->setPassword($password);
            
            
            //$repo = new UserDAO(); js
            $repo = new UserDAODB();
            $newuser = $repo->getByUserName($user->getUserName());
            if(!empty($newuser)) {
                echo "<script>alert('El usuario ya se encuentra registrado');</script>";
                $this->ShowLogin();
            }
            else{
            $repo->Add($user);
            echo "<script>alert('El usuario fue generado con exito');</script>";
            $this->ShowLogin();
            }

        }
        //---------------------------------------------------
        public function Delete($username){
            $repo = new UserDAODB();

            $repo->Delete($username);
            echo "<script>alert('El usuario fue eliminado exitosamente');</script>";

            $this->UsersProfiles();
        }
        //---------------------------------------------------

}

?>