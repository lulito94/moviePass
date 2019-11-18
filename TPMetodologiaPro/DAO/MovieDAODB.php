<?php
namespace DAO;

//Use's 
use Models\Movie as Movie;
//-------------------------------
use DAO\Connection as Connection;
//-------------------------------

class MovieDAODB extends HelperDAO implements IMovieDAODB
{
    private $moviesList = array();
    private $connection;
    private $tableName = "Movies";


    //Movie Functions
    public function Add(Movie $movie)
    {

        try {
            $query = "INSERT INTO " . $this->tableName . " (id_movie, popularity, title, release_date, original_language, vote_count,poster_path, vote_average, isAdult, overview)
                                             VALUES (:id_movie, :popularity, :title, :release_date, :original_language, :vote_count, :poster_path, :vote_average, :isAdult, :overview);";

            $parameters["id_movie"] = $movie->getId_movie();
            $parameters["popularity"] = $movie->getPopularity();
            $parameters["title"] = $movie->getTitle();
            $parameters['release_date'] = $movie->getRelease_date();
            $parameters["original_language"] = $movie->getOriginal_language();
            $parameters["vote_count"] = $movie->getVote_count();
            $parameters["poster_path"] = $movie->getPoster_path();
            $parameters["vote_average"] = $movie->getVote_average();
            $parameters['isAdult'] = $movie->getIsAdult();
            $parameters['overview'] = $movie->getOverview();
            $array = $movie->getGenre_ids();

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);

            foreach ($array as $values) {

                $query_Genre = "INSERT INTO " . "MoviesxGenres" . " (id_movie,id_genre)
                                                    VALUES (:id_movie, :id_genre)";
                $parameters2["id_movie"] = $movie->getId_movie();
                $parameters2["id_genre"] = $values;
                $this->connection->ExecuteNonQuery($query_Genre, $parameters2);
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    //--------------------------------------------------------------------
   
    public function GetToMovieName($MovieName)
    {
        try {
            $movie = null;
            
            $query = "SELECT * FROM Movies WHERE Movies.id_movie = '$MovieName'";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $movie = new Movie();
                $movie->setId_movie($row["id_movie"]);
                $movie->setPopularity($row["popularity"]);
                $movie->setTitle($row["title"]);
                $movie->setRelease_date($row["release_date"]);
                $movie->setOriginal_language($row["original_language"]);
                $movie->setIsAdult($row["isAdult"]);
                $movie->setVote_count($row["vote_count"]);
                $movie->setPoster_path($row["poster_path"]);
                $movie->setVote_average($row["vote_average"]);
                $movie->setOverview($row["overview"]);
                $movie->setGenre_ids($row["id_genre"]);
            }
            return $movie;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    //--------------------------------------------------------------------
    public function getGenrexId($id_genre)
    {
        try {

            $query = "SELECT * FROM Genres WHERE Genres.id_genre = '$id_genre'";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            return $resultSet;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    //--------------------------------------------------------------------
    public function AddGenres()
    {
        try {
            $array = $this->getToApiGeners();

            foreach ($array as $fatherArray) {
                foreach ($fatherArray as $sunArray) {
                    $genreCheck = $this->getGenrexId($sunArray['id']);
                    if(!isset($genreCheck) && empty($genreCheck))
                    {
                    $query = "INSERT INTO " . "Genres" . " (id_genre,name)
            VALUES (:id_genre, :name)";

                    $parameters["id_genre"] = $sunArray['id'];
                    $parameters["name"] = $sunArray['name'];
                    $this->connection = Connection::GetInstance();
                    $this->connection->ExecuteNonQuery($query, $parameters);
                    }
                }
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    //--------------------------------------------------------------------
    public function GetAll()
    {
        try {
            $movieList = array();

            $query = "SELECT * FROM " .$this->tableName;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $movie = new movie();
            
                $movie->setId_movie($row["id_movie"]);
                $movie->setPopularity($row["popularity"]);
                $movie->setTitle($row["title"]);
                $movie->setRelease_date($row["release_date"]);
                $movie->setOriginal_language($row["original_language"]);
                $movie->setVote_count($row["vote_count"]);
                $movie->setPoster_path($row["poster_path"]);
                $movie->setVote_average($row["vote_average"]);
                $movie->setIsAdult($row["isAdult"]);
                $movie->setOverview($row["overview"]);


                array_push($movieList, $movie);
            }

            return $movieList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    //--------------------------------------------------------------------
    public function getToApiGeners()
    {
        $repo = new MovieDAODB();
        $jsonObject = file_get_contents('https://api.themoviedb.org/3/genre/movie/list?api_key=c65889a54974a405a970caef706f7005&language=en-US');
        $result = json_decode($jsonObject, true);

        return $result;
    }
    //--------------------------------------------------------------------
    public function GetMovieGenres(Movie $movie)
    {
        try {
            //$movieFounded = null;
            $movieList = $this->GetAll();
            foreach ($movieList as $values) {

                if ($movie->getId_movie() == $values->getId_movie()) {
                    $query = "SELECT Genres.name 
                            FROM MoviesxGenres 
                            JOIN Genres 
                            ON MoviesxGenres.id_genre = Genres.id_genre 
                            JOIN Movies 
                            ON MoviesxGenres.id_movie = Movies.id_movie
                            WHERE Movies.id_movie =" .$values->getId_movie();
                    //var_dump($query);
                    $this->connection = Connection::GetInstance();
                    $resultSet = $this->connection->Execute($query);
                    $genreArray = array();
                    foreach($resultSet as $value){
                        $genreName = $value['name'];
                        array_push($genreArray,$genreName);
                    }
                }
            }
            return $genreArray;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    //--------------------------------------------------------------------
    public function DeleteMovie(Movie $movie)
    {
        try {
            $movieList = $this->GetAll();
            foreach ($movieList as $movieToRemove) {

                if ($movieToRemove->getTitle() == $movie->getTitle()) {
                    $query = "DELETE FROM " . $this->tableName . " WHERE " . $this->tableName . "title ='$movie->getTitle()'";
                    $this->connection = Connection::GetInstance();
                    $this->connection->Execute($query);
                }
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    //--------------------------------------------------------------------
    public function getMoviesxCinema($idCinema)
    {
        $MovieList = array();
        try {
            $query = "SELECT  Movies.title, Movies.id_movie FROM Cinemas JOIN Rooms ON Cinemas.idCinema = Rooms.idCinema JOIN MovieFunctions ON Rooms.id_room = MovieFunctions.id_room JOIN Movies ON MovieFunctions.id_movie = Movies.id_movie WHERE Cinemas.idCinema = '$idCinema'"; 
            $this->connection = Connection::GetInstance();
            $result = $this->connection->Execute($query);

            foreach($result as $value){
                $movie = new Movie();
                $movie->setId_movie($value["id_movie"]);
                $movie->setTitle($value["title"]);
                array_push($MovieList,$movie);
            }
            return $MovieList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    //--------------------------------------------------------------------
    public function GetMovieById($id_movie)
    {
        $movie = null;
        try {
            $movie = null;

            
            $query = "SELECT * FROM Movies WHERE Movies.id_movie = '$id_movie'";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $movie = new Movie();
                $movie->setId_movie($row["id_movie"]);
                $movie->setPopularity($row["popularity"]);
                $movie->setTitle($row["title"]);
                $movie->setRelease_date($row["release_date"]);
                $movie->setOriginal_language($row["original_language"]);
                $movie->setIsAdult($row["isAdult"]);
                $movie->setVote_count($row["vote_count"]);
                $movie->setPoster_path($row["poster_path"]);
                $movie->setVote_average($row["vote_average"]);
                $movie->setOverview($row["overview"]);
                $movie->setGenre_ids($row["id_genre"]);
            }
            return $movie;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    //--------------------------------------------------------------------
}
