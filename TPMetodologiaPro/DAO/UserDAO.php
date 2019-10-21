<?php 
namespace DAO;

use Models\User as User;
use DAO\IUserDAO as IUserDAO;

class UserDAO implements IUserDAO{

    private $userList = array();

    public function GetAll(){
        $this->RetrieveData();

        return $this->userList;
    }

    public function GetByUserName($userName){
        $this->RetrieveData();
        $userFounded = null;
        
        if(!empty($this->userList)){
            foreach($this->userList as $user){
                if($user->getUserName() == $userName){
                    $userFounded = $user;
                }
            }
        }

        return $userFounded;
    }

    public function Add(User $newUser){
        
        $this->RetrieveData();
        
        array_push($this->userList, $newUser);

        $this->SaveData();
    }

    //Json Persistence
    public function SaveData()
    {
        $arrayToEncode = array();

        foreach($this->userList as $user)
        {
            $valuesArray["sex"] = $user->getSex();
            $valuesArray["name"] = $user->getName();
            $valuesArray["surname"] = $user->getSurname();
            $valuesArray["dni"] = $user->getDni();
            $valuesArray["email"] = $user->getEmail();
            $valuesArray["userName"] = $user->getUserName();
            $valuesArray["password"] = $user->getPassword();

            array_push($arrayToEncode, $valuesArray);
        }

        $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
        
        file_put_contents('Data/users.json', $jsonContent);
    }

    public function RetrieveData()
    {
        $this->userList = array();

        if(file_exists('Data/users.json'))
        {
            $jsonContent = file_get_contents('Data/users.json');

            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

            foreach($arrayToDecode as $valuesArray)
            {
                $user = new User();
                $user->setName($valuesArray["name"]);
                $user->setSurname($valuesArray["surname"]);
                $user->setDni($valuesArray["dni"]);
                $user->setEmail($valuesArray["email"]);
                $user->setUserName($valuesArray["userName"]);
                $user->setPassword($valuesArray["password"]);
                $user->setSex($valuesArray["sex"]);

                array_push($this->userList, $user);
            }
        }
    }

    function Delete($username)
    {
        // TODO: Implement Delete() method.
    }
}

?>

