<?php
namespace DAO;
use Models\User as User;
use DAO\Connection as Connection;


class UserDAODB implements IUserDAO {

    private $userList = array();
    private $connection;
    private $tableName = "Users";


    public function Add(User $user)
    {
       
        try
        {
            $query = "INSERT INTO ".$this->tableName."(sex, name, surname, dni, email,userName, password) VALUES (:sex, :name, :surname, :dni, :email, :userName, :password);";
            
            $parameters["sex"] = $user->getSex();
            $parameters["name"] = $user->getName();
            $parameters["surname"] = $user->getSurname();
            $parameters["dni"] = $user->getDni();
            $parameters["email"] = $user->getEmail();
            $parameters["userName"] = $user->getUserName();
            $parameters["password"] = $user->getPassword();
        

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        }
        catch(Exception $ex)
        {
            throw $ex;
        }
    }

    public function GetAll()
    {
        try
        {
            $this->userList = array();

            $query = "SELECT * FROM ".$this->tableName;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);
            
            foreach ($resultSet as $row)
            {                
                $user = new user();
                $user->setSex($row["sex"]);
                $user->setName($row["name"]);
                $user->setSurname($row["surname"]);
                $user->setDni($row["dni"]);
                $user->setEmail($row["email"]);
                $user->setUserName($row["userName"]);
                $user->setPassword($row["password"]);
                

                array_push($this->userList, $user);
            }
            return $this->userList;
        }
        catch(Exception $ex)
        {
            throw $ex;
        }
    }

    public function GetByUserName($userName)
    {
        $this->GetAll();
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



    function Delete($username)
    {
        try{
<<<<<<< HEAD
            $query = "DELETE FROM ".$this->tableName." WHERE ". $this->tableName . ".userName ='$username'";
=======
            $query = "DELETE FROM ".$this->tableName." WHERE userName = ".$username;
>>>>>>> f0e0ffacd9a7e273c954ad960b03ae704ab896c3

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query);
        }
        catch (Exception $ex){
            throw $ex;
        }
    }
}
?>