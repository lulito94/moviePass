<?php
namespace DAO;
use Models\User as User;
use DAO\Connection as Connection;


class UserDAODB {

    private $userList = array();
    private $connection;
    private $tableName = "Users";


    public function Add(User $user)
    {
       
        try
        {
            $query = "INSERT INTO ".$this->tableName." (sex, name, surname, dni, email, serName, password, email) VALUES (:sex, :name, :surname, :dni, :email, :serName, :password, :email);";
            
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
            $userList = array();

            $query = "SELECT * FROM ".$this->tableName;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);
            
            foreach ($resultSet as $row)
            {                
                $user = new user();
                $user->setName($row["name"]);
                $user->setSurname($row["surname"]);
                $user->setDni($row["dni"]);
                $user->setEmail($row["email"]);
                $user->setUserName($row["userName"]);
                $user->setPassword($row["password"]);
                $user->setSex($row["sex"]);

                array_push($userList, $user);
            }

            return $userList;
        }
        catch(Exception $ex)
        {
            throw $ex;
        }
    }
}

?>