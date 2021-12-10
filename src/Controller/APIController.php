<?php 

namespace src\Controller;

use Config\ORM\RequestOrm;
use DateTime;

class API {


    public function getTable($table) {
        $Orm = new RequestOrm();
        $result = $Orm->findAll($table);
        echo json_encode($result);
        return $result;
    }



    public function getTicket($id) {
        $Orm = new RequestOrm();
        $result = $Orm->findBy($id,'ticket');
        echo json_encode($result);
        return $result;
    }


    public function getComment($id) {
        $Orm = new RequestOrm();
        $result = $Orm->findCommentsOf($id);
        echo json_encode($result);
        return $result;
    }


    public function exportTable($table, $type) {
        $Orm = new RequestOrm();
        $date = new DateTime();
        $result = $Orm->findAll($table);
        $newdate= getdate();
        if ($result) {
            $nameOfFile = 'table'.'-'.$table.$newdate[0].'.txt';     
            if ($type == 'json') {
                $fp = fopen('src/Data/json/'.$nameOfFile, 'w');
                fwrite($fp, print_r(json_encode($result), true));
                fclose($fp);
            } elseif ( $type == 'array') {
                $fp = fopen('src/Data/array/'.$nameOfFile, 'w');
                fwrite($fp, print_r($result, true));
                fclose($fp);
            }else {
                return 'File type given isn\'t supported';
            }
        }   
    }

    public function exportTicketBy($id, $type) {
        $Orm = new RequestOrm();
        $date = new DateTime();
        $result = $Orm->findBy($id,'ticket');
        $newdate= getdate();
        if ($result) {
            $nameOfFile = 'ticket'.'-'.$id.'-'.$newdate[0].'.txt';     
            if ($type == 'json') {
                $fp = fopen('src/Data/json/'.$nameOfFile, 'w');
                fwrite($fp, print_r(json_encode($result), true));
                fclose($fp);
            } elseif ( $type == 'array') {
                $fp = fopen('src/Data/array/'.$nameOfFile, 'w');
                fwrite($fp, print_r($result, true));
                fclose($fp);
            }else {
                return 'File type given isn\'t supported';
            }
        }   
    }

    public function postTicket() {
        $Orm = new RequestOrm();
        $json = file_get_contents('php://input');
        $data = json_decode($json);
        $title = $data->title;
        $service = $data->section;
        $description = $data->description;
        $result = $Orm->postTicketORM($title, $description, $service);
        var_dump($result);
    }



}