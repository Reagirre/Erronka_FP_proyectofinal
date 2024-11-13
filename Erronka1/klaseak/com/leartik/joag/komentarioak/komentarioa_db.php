<?php
namespace com\leartik\joag\komentarioak;
use Exception;
use PDO;
class KomentarioaDB{

    public static function selectKomentarioak(){
        try{

            $db = new PDO ("sqlite:C:\\xampp\\htdocs\\Erronka1\\kotxeak.db");
            $registros = $db->query("select * from komentarioak");
            $komentarioak = array();

            while ($registro = $registros->fetch()){
                $komentarioa = new Komentarioa();
                $komentarioa->setId($registro['id']);
                $komentarioa->setIzena($registro['izena']);
                $komentarioa->setEmail($registro['email']);
                $komentarioa->setKomentarioa($registro['deskripzioa']);
                $komentarioa->setEguna($registro['eguna']);
                $komentarioa->setErantzuna($registro['erantzuna']);
                $komentarioak[] = $komentarioa;
            }
            return $komentarioak;
        } catch (Exception $e){
            echo "<p>Salbuspena:" . $e->getMessage() . "</p>\n";
            return null;
        }
    }
    
    public static function selectKomentarioa($id){
        try{
            $db = new PDO ("sqlite:C:\\xampp\\htdocs\\Erronka1\\kotxeak.db");
            $registros = $db->query("select * from komentarioak where id=" . $id);
            $komentarioa = null;

            if ($registro = $registros->fetch()){
                $komentarioa = new Komentarioa();
                $komentarioa->setId($registro['id']);
                $komentarioa->setIzena($registro['izena']);
                $komentarioa->setEmail($registro['email']);
                $komentarioa->setKomentarioa($registro['deskripzioa']);
                $komentarioa->setEguna($registro['eguna']);
                $komentarioa->setErantzuna($registro['erantzuna']);
            }
            return  $komentarioa;
        } catch (Exception $e){
            echo "<p>Salbuspena:" .$e->getMessage() . "</p>\n";
            return null;
        }
    }

    public static function updateKomentarioa($komentarioa) {
        try {
            $db = new PDO("sqlite:C:\\xampp\\htdocs\\Erronka1\\kotxeak.db");
            $sql = "update komentarioak set ";
            $sql = $sql . "erantzuna=" . $komentarioa->getErantzuna();
            $sql = $sql . " WHERE id=" . $komentarioa->getId();
            $emaitza = $db->exec($sql);
            return $emaitza;
            
        } catch (Exception $e) {
            echo "<p>Salbuespena: " . $e->getMessage() . "</p>\n";
            return 0;
        }
    }

    public static function deleteKomentarioa($id){
        try {
            $db = new PDO("sqlite:C:\\xampp\\htdocs\\Erronka1\\kotxeak.db");
            $sql = "DELETE FROM komentarioak WHERE id=" . $id . ";";
            $emaitza = $db->exec($sql);
            return $emaitza;
        } catch (Exception $e) {
            echo "<p>Salbuespena: " . $e->getMessage() . "</p>\n";
            return 0;
        }
    }
}
?>