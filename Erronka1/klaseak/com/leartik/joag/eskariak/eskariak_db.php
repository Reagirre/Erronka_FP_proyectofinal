<?php
namespace com\leartik\joag\eskariak;
use Exception;
use PDO;
class EskariakDB{

    public static function selectEskariak(){
        try{

            $db = new PDO ("sqlite:C:\\xampp\\htdocs\\Erronka1\\kotxeak.db");
            $registros = $db->query("select * from eskariak");
            $karritoak = array();

            while ($registro = $registros->fetch()){
                $karritoa = new Eskaria();
                $karritoa->setId($registro['id']);
                $karritoa->setErabiltzailea($registro['erabiltzailea']);
                $karritoak[] = $karritoa;
            }
            return $karritoak;
        } catch (Exception $e){
            echo "<p>Salbuspena:" . $e->getMessage() . "</p>\n";
            return null;
        }
    }
    
    public static function selectEskaria($id){
        try{
            $db = new PDO ("sqlite:C:\\xampp\\htdocs\\Erronka1\\kotxeak.db");
            $registros = $db->query("select * from eskariak where id=" . $id);
            $karritoa = null;

            if ($registro = $registros->fetch()){
                $karritoa = new Eskaria();
                $karritoa->setId($registro['id']);
                $karritoa->setErabiltzailea($registro['erabiltzailea']);
            }
            return  $karritoa;
        } catch (Exception $e){
            echo "<p>Salbuspena:" .$e->getMessage() . "</p>\n";
            return null;
        }
    }

    public static function updateEskaria($karritoa) {
        try {
            $db = new PDO("sqlite:C:\\xampp\\htdocs\\Erronka1\\kotxeak.db");
            $sql = "update eskariak set ";
            $sql = $sql . "erantzuna=" . $karritoa->getErantzuna();
            $sql = $sql . " WHERE id=" . $karritoa->getId();
            $emaitza = $db->exec($sql);
            return $emaitza;
            
        } catch (Exception $e) {
            echo "<p>Salbuespena: " . $e->getMessage() . "</p>\n";
            return 0;
        }
    }

    public static function deleteEskaria($id){
        try {
            $db = new PDO("sqlite:C:\\xampp\\htdocs\\Erronka1\\kotxeak.db");
            $sql = "DELETE FROM eskariak WHERE id=" . $id . ";";
            $emaitza = $db->exec($sql);
            return $emaitza;
        } catch (Exception $e) {
            echo "<p>Salbuespena: " . $e->getMessage() . "</p>\n";
            return 0;
        }
    }
}
?>