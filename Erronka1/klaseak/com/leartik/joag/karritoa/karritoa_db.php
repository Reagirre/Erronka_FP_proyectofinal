<?php
namespace com\leartik\joag\karritoa;
use Exception;
use PDO;
class KarritoaDB{

    public static function selectKarritoak(){
        try{

            $db = new PDO ("sqlite:C:\\xampp\\htdocs\\Erronka1\\kotxeak.db");
            $registros = $db->query("select * from eskariko_produktuak");
            $karritoak = array();

            while ($registro = $registros->fetch()){
                $karritoa = new Karritoa();
                $karritoa->setId($registro['id']);
                $karritoa->setId_eskaria($registro['id_eskaria']);
                $karritoa->setId_produktua($registro['id_produktua']);
                $karritoa->setCantidad($registro['cantidad']);
                $karritoa->setEnvio($registro['envio']);
                $karritoak[] = $karritoa;
            }
            return $karritoak;
        } catch (Exception $e){
            echo "<p>Salbuspena:" . $e->getMessage() . "</p>\n";
            return null;
        }
    }
    
    public static function selectKarritoa($id){
        try{
            $db = new PDO ("sqlite:C:\\xampp\\htdocs\\Erronka1\\kotxeak.db");
            $registros = $db->query("select * from eskariko_produktuak where id=" . $id);
            $karritoa = null;

            if ($registro = $registros->fetch()){
                $karritoa = new Karritoa();
                $karritoa->setId($registro['id']);
                $karritoa->setId_eskaria($registro['id_eskaria']);
                $karritoa->setId_produktua($registro['id_produktua']);
                $karritoa->setCantidad($registro['cantidad']);
                $karritoa->setEnvio($registro['envio']);
            }
            return  $karritoa;
        } catch (Exception $e){
            echo "<p>Salbuspena:" .$e->getMessage() . "</p>\n";
            return null;
        }
    }

    public static function updateKarritoa($karritoa) {
        try {
            $db = new PDO("sqlite:C:\\xampp\\htdocs\\Erronka1\\kotxeak.db");
            $sql = "update eskariko_produktuak set ";
            $sql = $sql . "envio=" . $karritoa->getEnvio();
            $sql = $sql . " WHERE id=" . $karritoa->getId();
            $emaitza = $db->exec($sql);
            return $emaitza;
            
        } catch (Exception $e) {
            echo "<p>Salbuespena: " . $e->getMessage() . "</p>\n";
            return 0;
        }
    }

    public static function deleteKarritoa($id){
        try {
            $db = new PDO("sqlite:C:\\xampp\\htdocs\\Erronka1\\kotxeak.db");
            $sql = "DELETE FROM eskariko_produktuak WHERE id=" . $id . ";";
            $emaitza = $db->exec($sql);
            return $emaitza;
        } catch (Exception $e) {
            echo "<p>Salbuespena: " . $e->getMessage() . "</p>\n";
            return 0;
        }
    }
}