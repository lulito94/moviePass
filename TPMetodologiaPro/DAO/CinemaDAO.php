<?php
namespace DAO;
use Models\Cinema as Cinema;
use DAO\ICinemaDAO as ICinemaDAO;

class CinemaDAO implements ICinemaDAO {

    private $cinemasList = array();

    public function GetAll(){
        $this->RetrieveData();
        return $this->cinemasList;
    }

    public function GetByCinemaName($cinemaName){
        $this->RetrieveData();
        $cinemaFounded = null;
        
        if(!empty($this->cinemasList)){
            foreach($this->cinemasList as $cinema){
                if($cinema->getCinemaName() == $cinemaName){
                    $cinemaFounded = $cinema;
                }
            }
        }

        return $cinemaFounded;
    }

    public function Add(Cinema $newCinema){
        
        $this->RetrieveData();
        
        array_push($this->cinemasList, $newCinema);

        $this->SaveData();
    }

    //Json Persistence
    private function SaveData()
    {
        $arrayToEncode = array();

        foreach($this->cinemasList as $cinema)
        {
            $valuesArray["cinemaName"] = $cinema->getCinemaName();
            $valuesArray["address"] = $cinema->getAddress();
            $valuesArray["capacity"] = $cinema->getCapacity();
            $valuesArray["ticketValue"] = $cinema->getTicketValue();
            

            array_push($arrayToEncode, $valuesArray);
        }

        $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
        
        file_put_contents('Data/Cinema.json', $jsonContent);
    }

    private function RetrieveData()
    {
        $this->cinemasList = array();

        if(file_exists('Data/Cinema.json'))
        {
            $jsonContent = file_get_contents('Data/Cinema.json');

            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

            foreach($arrayToDecode as $valuesArray)
            {
                $cinema = new Cinema();
                $cinema->setCinemaName($valuesArray["cinemaName"]);
                $cinema->setAddress($valuesArray["address"]);
                $cinema->setCapacity($valuesArray["capacity"]);
                $cinema->setTicketValue($valuesArray["ticketValue"]);

                array_push($this->cinemasList, $cinema);
            }
        }
    }
}

?>