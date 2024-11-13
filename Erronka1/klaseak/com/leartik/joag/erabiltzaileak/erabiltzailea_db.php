<?php
namespace com\leartik\joag\erabiltzaileak;
use Exception;
use PDO;
class ErabiltzaileaDB{

    public static function selectErabiltzaileak(){
        try{

            $db = new PDO ("sqlite:C:\\xampp\\htdocs\\Erronka1\\kotxeak.db");
            $registros = $db->query("select * from erabiltzaileak");
            $erabiltzaileak = array();

            while ($registro = $registros->fetch()){
                $erabiltzailea = new Erabiltzailea();
                $erabiltzailea->setId($registro['id_era']);
                $erabiltzailea->setIzena($registro['izena']);
                $erabiltzailea->setEmail($registro['email']);
                $erabiltzailea->setKomentarioa($registro['deskripzioa']);
                $erabiltzaileak[] = $erabiltzailea;
            }
            return $erabiltzaileak;
        } catch (Exception $e){
            echo "<p>Salbuspena:" . $e->getMessage() . "</p>\n";
            return null;
        }
    }
    
    public static function selectErabiltzailea($id){
        try{
            $db = new PDO ("sqlite:C:\\xampp\\htdocs\\Erronka1\\kotxeak.db");
            $registros = $db->query("select * from erabiltzaileak where id=" . $id);
            $erabiltzailea = null;

            if ($registro = $registros->fetch()){
                $erabiltzailea = new Erabiltzailea();
                $erabiltzailea->setId($registro['id']);
                $erabiltzailea->setIzena($registro['izena']);
                $erabiltzailea->setEmail($registro['email']);
                $erabiltzailea->setKomentarioa($registro['deskripzioa']);
            }
            return  $erabiltzailea;
        } catch (Exception $e){
            echo "<p>Salbuspena:" .$e->getMessage() . "</p>\n";
            return null;
        }
    }

    public static function updateErabiltzailea($erabiltzailea) {
        try {
            $db = new PDO("sqlite:C:\\xampp\\htdocs\\Erronka1\\kotxeak.db");
            $sql = "update erabiltzaileak set ";
            $sql = $sql . "erantzuna=" . $erabiltzailea->getErantzuna();
            $sql = $sql . " WHERE id=" . $erabiltzailea->getId();
            $emaitza = $db->exec($sql);
            return $emaitza;
            
        } catch (Exception $e) {
            echo "<p>Salbuespena: " . $e->getMessage() . "</p>\n";
            return 0;
        }
    }

    public static function deleteErabiltzailea($id){
        try {
            $db = new PDO("sqlite:C:\\xampp\\htdocs\\Erronka1\\kotxeak.db");
            $sql = "DELETE FROM erabiltzaileak WHERE id=" . $id . ";";
            $emaitza = $db->exec($sql);
            return $emaitza;
        } catch (Exception $e) {
            echo "<p>Salbuespena: " . $e->getMessage() . "</p>\n";
            return 0;
        }
    }
}
?>