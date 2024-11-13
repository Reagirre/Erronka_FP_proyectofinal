<?php
namespace com\leartik\joag\kotxeak;
use Exception;
use PDO;
class KotxeaDB{

    public static function selectKotxeak(){
        try{

            $db = new PDO ("sqlite:C:\\xampp\\htdocs\\Erronka1\\kotxeak.db");
            $registros = $db->query("SELECT coches.id, coches.marka, coches.modeloa, coches.kolorea, coches.irudia, coches.prezioa, kategoriak.izena
            FROM coches
            JOIN kategoriak ON coches.kategoria = kategoriak.id");
            $kotxeak = array();

            while ($registro = $registros->fetch()){
                $kotxea = new Kotxea();
                $kotxea->setId($registro['id']);
                $kotxea->setMarka($registro['marka']);
                $kotxea->setModeloa($registro['modeloa']);
                $kotxea->setKolorea($registro['kolorea']);
                $kotxea->setKategoria($registro['izena']);
                $kotxea->setIrudia($registro['irudia']);
                $kotxea->setPrezioa($registro['prezioa']);
                $kotxeak[] = $kotxea;
            }
            return $kotxeak;
            header('Content-Type: application/json');
            echo json_encode($kotxeak);
        } catch (Exception $e){
            echo "<p>Salbuspena:" . $e->getMessage() . "</p>\n";
            return null;
        }
    }

    public static function selectKotxea($id){
        try{
            $db = new PDO ("sqlite:C:\\xampp\\htdocs\\Erronka1\\kotxeak.db");
            $registros = $db->query("SELECT coches.id,
            coches.marka,
            coches.modeloa,
            coches.kolorea,
            coches.irudia,
            coches.audioa,
            coches.prezioa,
            kategoriak.izena
            FROM coches
            JOIN kategoriak ON coches.kategoria = kategoriak.id where coches.id=" . $id);
            $kotxea = null;

            if ($registro = $registros->fetch()){
                $kotxea = new Kotxea();
                $kotxea->setId($registro['id']);
                $kotxea->setMarka($registro['marka']);
                $kotxea->setModeloa($registro['modeloa']);
                $kotxea->setKolorea($registro['kolorea']);
                $kotxea->setKategoria($registro['izena']);
                $kotxea->setIrudia($registro['irudia']);
                $kotxea->setAudioa($registro['audioa']);
                $kotxea->setPrezioa($registro['prezioa']);
            }
            return  $kotxea;
        } catch (Exception $e){
            echo "<p>Salbuspena:" .$e->getMessage() . "</p>\n";
            return null;
        }
    }
    public static function insertKotxea($kotxea){

        try{
            $db = new PDO ("sqlite:C:\\xampp\\htdocs\\Erronka1\\kotxeak.db");
            $sql = "insert into coches (marka, modeloa, kolorea, kategoria, prezioa, irudia) values";
            $sql = $sql . "('" . $kotxea->getMarka() . "'";
            $sql = $sql . ",'" . $kotxea->getModeloa() . "'";
            $sql = $sql . ",'" . $kotxea->getKolorea() . "'";
            $sql = $sql . ",'" . $kotxea->getKategoria() . "'";
            $sql = $sql . ",'" . $kotxea->getPrezioa() . "'";
            $sql = $sql . ",'" . $kotxea->getIrudia() . "')";

            $emaitza = $db->exec($sql);
            return $emaitza;
        } catch (Exception $e){
            echo "<p>Salbuspena:" .$e->getMessage() . "</p>\n";
            return 0;
        }
    }

    public static function updateKotxea($kotxea) {
        try {
            $db = new PDO("sqlite:C:\\xampp\\htdocs\\Erronka1\\kotxeak.db");
            $sql = "update coches set "; 
            $sql = $sql . "marka='" . $kotxea->getMarka() . "',";
            $sql = $sql . "modeloa='" . $kotxea->getModeloa() . "',";
            $sql = $sql . "kolorea='" . $kotxea->getKolorea() . "',";
            $sql = $sql . "kategoria='" . $kotxea->getKategoria() . "',";
            $sql = $sql . "prezioa='" . $kotxea->getPrezioa() . "',";
            $sql = $sql . "irudia='" . $kotxea->getIrudia() . "'";
            $sql = $sql . " WHERE id=" . $kotxea->getId();
            $emaitza = $db->exec($sql);
            return $emaitza;
            
        } catch (Exception $e) {
            echo "<p>Salbuespena: " . $e->getMessage() . "</p>\n";
            return 0;
        }
    }

    public static function deleteKotxea($id){
        try {
            $db = new PDO("sqlite:C:\\xampp\\htdocs\\Erronka1\\kotxeak.db");
            $sql = "DELETE FROM coches WHERE id=" . $id . ";";
            $emaitza = $db->exec($sql);
            return $emaitza;
        } catch (Exception $e) {
            echo "<p>Salbuespena: " . $e->getMessage() . "</p>\n";
            return 0;
        }
    }
}
?>