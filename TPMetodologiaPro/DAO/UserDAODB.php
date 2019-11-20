<?php
namespace DAO;
//Use's
use Models\User as User;
//------------------------------
use DAO\Connection as Connection;
//------------------------------


class UserDAODB implements IUserDAODB {

    private $userList = array();
    private $connection;
    private $tableName = "Users";

    //User Functions
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
    //-------------------------------------------------------
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
                $user->setId_user($row['idUser']);
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
    //-------------------------------------------------------
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
    //-------------------------------------------------------
    public function GetUserById($id_user)
    {
        try{
            $query = "SELECT * FROM Users WHERE Users.idUser = '$id_user'";

            
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
                $user->setId_user($row['idUser']);
                $user->setUserName($row["userName"]);
                $user->setPassword($row["password"]);  
            }
            return $user;
        }
        catch (Exception $ex){
            throw $ex;
        }
    }
    //-------------------------------------------------------
    function Delete($username)
    {
        try{
            $query = "DELETE FROM ".$this->tableName." WHERE ". $this->tableName . ".userName ='$username'";

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query);
        }
        catch (Exception $ex){
            throw $ex;
        }
    }
    //-------------------------------------------------------
}
?>