<?php
    namespace Controllers;
    
    use DAO\UserDAODB as UserDAODB;
    //use DAO\UserDAO as UserDAO;
    use Models\User as User;

    class UserController
    {
        //private $userDAO; js
        private $userDAODB;

        public function __construct()
        {
            //$this->userDAO = new UserDAO(); js
            $this->userDAODB = new UserDAODB();
        }

        public function Check($username,$password)
        {
           // $usercheck = $this->userDAO->getByUserName($username); js
           $usercheck = $this->userDAODB->getByUserName($username);
            if(!empty($usercheck))
            {
                if(($usercheck->getUsername() == "Mati") && ($usercheck->getPassword() == "sarasa"))
                {
                    $_SESSION['loggedadmin'] = $usercheck;
                    $this->ShowAdminView();
                }
                else{
                   if($usercheck->getPassword() == $password)
                    {
                     $_SESSION['loggeduser'] = $usercheck;
                      $this->ShowCinemaView();
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
        public function ShowAdminView()
        {
            require_once(VIEWS_PATH."Admin-menu.php");
        }

        public function ShowCinemaView()
        {
            require_once(VIEWS_PATH."Cinema-menu.php");
        }
        public function ShowLobby()
        {
            require_once(VIEWS_PATH."menu.php");
        }

        public function ShowLogin()
        {
            require_once(VIEWS_PATH."inic-login.php");
        }
        
        public function ShowSignIn()
        {
            require_once(VIEWS_PATH."Sign-in.php");
        }

        public function SignIn()
        {
            $this->ShowSignIn();
        }

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
        

    }

?>