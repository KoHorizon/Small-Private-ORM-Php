<?php 

namespace Config\ORM;

use DateTime;
use PDO;
use PDOException;

class RequestOrm {

    protected $db;
    protected $dbi;

    public function __construct()
    {
        $this->dbi = parse_ini_file('config/config.ini');
        $this->db = new \PDO('mysql:' . $this->dbi["type"] .'=' .$this->dbi["host"] . ';dbname=' . $this->dbi["name"], $this->dbi["user"], $this->dbi["pass"]);
        // $this->db = new PDO('mysql:host=localhost;dbname=ticket', 'root', ''); 
    } 
    
    
    public function findAll($table) {
        
        try {
            $query = $this->db->prepare("SELECT * FROM $table WHERE 1");
            $query->setFetchMode(\PDO::FETCH_CLASS, 'Config/ORM/RequestOrm');
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
            // set the PDO error mode to exception
            echo "Connected successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }


    public function findBy($id,$table) {
        try {
            $query = $this->db->prepare("SELECT * FROM $table WHERE idticket = :id");
            $query->setFetchMode(\PDO::FETCH_CLASS, 'Config/ORM/RequestOrm');
            $query->execute(['id' => $id]);
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result[0];
            // set the PDO error mode to exception
            echo "Connected successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function findCommentsOf($id) {
        try {
            $query = $this->db->prepare("SELECT * FROM `comment` WHERE ticket_idticket = :id");
            $query->setFetchMode(\PDO::FETCH_CLASS, 'Config/ORM/RequestOrm');
            $query->execute(['id' => $id]);
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            
            return $result;
            // set the PDO error mode to exception
            echo "Connected successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function findIdOfService($nameOfService) {
        
        try {
            $query = $this->db->prepare("SELECT `idservice` FROM `service` WHERE `name` = :name");
            $query->setFetchMode(\PDO::FETCH_CLASS, 'Config/ORM/RequestOrm');
            $query->execute(['name' => $nameOfService]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            
            return $result;
            // set the PDO error mode to exception
            // echo "Connected successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function postTicketORM($titleOfTicket, $descriptionOfTicket, $nameOfService) {
        $idService = $this->findIdOfService($nameOfService)['idservice'];
        $date = date("Y/m/d");
        $status = 'non resolu';
        try {
            $query = $this->db->prepare("INSERT INTO `ticket`(`title`, `description`, `date`, `status`, `service_idservice`) 
            VALUES (:title, :description, :date, :status, :serviceId)");
            $query->setFetchMode(\PDO::FETCH_CLASS, 'Config/ORM/RequestOrm');
            $query->execute(['title' => $titleOfTicket,
                            'description' => $descriptionOfTicket,
                            'date' => $date,
                            'status' => $status,
                            'serviceId' => $idService]);

            echo "Done";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }



}
