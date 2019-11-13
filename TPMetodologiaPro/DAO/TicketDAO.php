<?php
namespace DAO;
use DAO\Connection as Connection;
use Models\Ticket as Ticket;
use Models\Purchase as Purchase;

class TicketDAO extends HelperDAO
{
    private $connection;


    public function AddTicket($cant)
    {
       
        try {
            $query = "INSERT INTO Tickets (id_function, cant_locations) VALUES (:id_function, :cant_locations);";

            $parameters["id_function"] = $_SESSION['functId'];
            $parameters["cant_locations"] = $cant;

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
}
?>