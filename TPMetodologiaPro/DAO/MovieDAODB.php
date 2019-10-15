<?php
namespace DAO;
use Models\Movie as Movie;
use DAO\Connection as Connection;


class MovieDAODB {

    private $moviesList = array();
    private $connection;
    private $tableName = "Movies";
    public function Add(Movie $movie)
    {
       
        try
        {
            $query = "INSERT INTO ".$this->tableName." (id, popularity, title, release_date, original_language, vote_count, vote_average, isAdult, overview)
                                             VALUES (:id, :popularity, :title, :release_date, :original_language, :vote_count, :vote_average, :isAdult, :overview);";
            
            $parameters["id"] = $movie->getId();
            $parameters["popularity"] = $movie->getPopularity();
            $parameters["title"] = $movie->getTitle();
            $parameters['release_date'] = $movie->getRelease_date();
            $parameters["original_language"] = $movie->getOriginal_language();
            $parameters["vote_count"] = $movie->getVote_count();
            $parameters["vote_average"] = $movie->getVote_average();
            $parameters['isAdult'] = $movie->getIsAdult();
            $parameters['overview'] = $movie->getOverview();


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
            $movieList = array();

            $query = "SELECT * FROM ".$this->tableName;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);
            
            foreach ($resultSet as $row)
            {                
                $movie = new movie();
                $movie->setId($row["id"]);
                $movie->setPopularity($row["popularity"]);
                $movie->setTitle($row["title"]);
                $movie->setRelease_date($row["release_date"]);
                $movie->setOriginal_language($row["original_language"]);
                $movie->setVote_count($row["vote_count"]);
                $movie->setVote_average($row["vote_average"]);
                $movie->setIsAdult($row["isAdult"]);
                $movie->setOverview($row["overview"]);

             
                array_push($movieList, $movie);
            }

            return $movieList;
        }
        catch(Exception $ex)
        {
            throw $ex;
        }
    }

    public function DeleteMovie(Movie $movie)
    {
        try
        {
            $movieList = $this->GetAll();
            foreach($movieList as $movieToRemove)
            {
            
                if($movieToRemove->getTitle() == $movie->getTitle())
                {
                    $query = "DELETE FROM ".$this->tableName." WHERE ". $this->tableName . "title ='$movie->getTitle()'";
                    var_dump($query);
                    $this->connection = Connection::GetInstance();
                    $this->connection->ExecuteNonQuery($query);
                }
            }
        }
        catch(Exception $ex)
        {
            throw $ex;
        }
    }
}