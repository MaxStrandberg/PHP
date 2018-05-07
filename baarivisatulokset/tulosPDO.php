<?php

require_once "tulos.php";
class tulosPDO{

    private $db;
    private $lkm;

    function __construct($dsn="mysql:host=localhost;dbname=visatulokset", $user="root", $password="salainen") {
    $this->db  = new PDO($dsn, $user);
    $this->db ->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $this->db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $this->lkm   = 0;
    }


    public function allResults() {
        $sql = "SELECT id, place, address, date, quiztype, players, points, placement, comment FROM tulokset";
                if (! $stmt = $this->db->prepare($sql)) {
                        $virhe = $this->db->errorInfo(); 
                        throw
                        new PDOException($virhe[2], $virhe[1]);} 
                        if (! $stmt->execute()) {
                        $virhe = $stmt->errorInfo(); 
                        throw new PDOException($virhe[2], $virhe[1]);
                                }
                    $tulos = array();
                    while($row = $stmt->fetchObject()) {
                                $result = new Tulos();
                                $result->setId($row->id);
                                $result->setPlace(utf8_encode($row->place));
                                $result->setAddress(utf8_encode($row->address));
                                $result->setDate(utf8_encode($row->date));
                                $result->setQuiztype(utf8_encode($row->quiztype));
                                $result->setPlayers(utf8_encode($row->players)); 
                                $result->setPoints(utf8_encode($row->points)); 
                                $result->setPlacement(utf8_encode($row->placement));
                                $result->setComment(utf8_encode($row->comment));  
                                $tulos[] = $result;
                                }
                                $this->lkm = $stmt->rowCount();
                                return
                                $tulos;
            }
            
            public function deleteResult() {
                $valittuID = $_POST['valittuID'];
                $sql = "DELETE FROM tulokset where id =$valittuID";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();



            }


            public function getResult() {
                
                $valittuID = $_GET['valittuID'];
                $sql = "SELECT id, place, address, date, quiztype, players, points, placement, comment FROM tulokset where id =$valittuID";
                        if (! $stmt = $this->db->prepare($sql)) {
                                $virhe = $this->db->errorInfo(); 
                                throw
                                new PDOException($virhe[2], $virhe[1]);} 
                                if (! $stmt->execute()) {
                                $virhe = $stmt->errorInfo(); 
                                throw new PDOException($virhe[2], $virhe[1]);
                                        }
                            $tulos = array();
                            while($row = $stmt->fetchObject()) {
                                        $result = new Tulos();
                                        $result->setId($row->id);
                                        $result->setPlace(utf8_encode($row->place));
                                        $result->setAddress(utf8_encode($row->address));
                                        $result->setDate(utf8_encode($row->date));
                                        $result->setQuiztype(utf8_encode($row->quiztype));
                                        $result->setPlayers(utf8_encode($row->players)); 
                                        $result->setPoints(utf8_encode($row->points)); 
                                        $result->setPlacement(utf8_encode($row->placement));
                                        $result->setComment(utf8_encode($row->comment));  
                                        $tulos[] = $result;
                                        }
                                        $this->lkm = $stmt->rowCount();
                                        return
                                        $tulos;
                    }
        

    function addResult($result){

        $sql = "insert into tulokset ( place, address, date, quiztype, players, points, placement, comment)
        values (:place, :address, :date, :quiztype, :players, :points, :placement, :comment)";

        if (! $stmt= $this->db->prepare($sql)) {$virhe = $this->db->errorInfo(); 
                     throw new PDOException($virhe[2], $virhe[1]);
                         }
        $stmt -> bindValue(":place", utf8_encode($result->getPlace()), PDO::PARAM_STR);
        $stmt -> bindValue(":address", utf8_encode($result->getAddress()), PDO::PARAM_STR);
        $stmt -> bindValue(":date", utf8_encode($result->getDate()), PDO::PARAM_STR);
        $stmt -> bindValue(":quiztype", utf8_encode($result->getQuiztype()), PDO::PARAM_STR);
        $stmt -> bindValue(":players", utf8_encode($result->getPlayers()), PDO::PARAM_STR);
        $stmt -> bindValue(":points", utf8_encode($result->getPoints()), PDO::PARAM_STR);
        $stmt -> bindValue(":placement", utf8_encode($result->getPlacement()), PDO::PARAM_STR);
        $stmt -> bindValue(":comment", utf8_encode($result->getComment()), PDO::PARAM_STR);

        if (! $stmt->execute()) {$virhe = $stmt->errorInfo(); 
        if ($virhe[0] == "HY093") {
            $virhe[2] = "Invalid parameter"; 
                                }
            throw new PDOException($virhe[2], $virhe[1]);}
        $this->lkm = 1;
        return
        $this->db->lastInsertId();
}
}

?>