<?php
namespace com\leartik\joag\kategoriak;

use Exception;
use PDO;

class KategoriaDB
{
    private static $db;

    private static function getDatabase()
    {
        if (!self::$db) {
            self::$db = new PDO("sqlite:C:\\xampp\\htdocs\\Erronka1\\kotxeak.db");
        }
        return self::$db;
    }

    public static function selectKategoriak()
    {
        try {
            $db = self::getDatabase();
            $registros = $db->query("SELECT * FROM kategoriak");
            $kategoriak = array();

            while ($registro = $registros->fetch()) {
                $kategoria = new Kategoria();
                $kategoria->setId($registro['id']);
                $kategoria->setIzena($registro['izena']);
                $kategoriak[] = $kategoria;
            }
            return $kategoriak;
        } catch (Exception $e) {
            // Log the error or handle it appropriately
            error_log("Error in selectKategoriak: " . $e->getMessage());
            return null;
        }
    }

    public static function selectKategoria($id){
        try{
            $db = self::getDatabase();
            $registros = $db->query("select * from kategoriak where id=" . $id);
            $kategoria = null;

            if ($registro = $registros->fetch()){
                $kategoria = new Kategoria();
                $kategoria->setId($registro['id']);
                $kategoria->setIzena($registro['izena']);
            }
            return  $kategoria;
        } catch (Exception $e){
            error_log("Error in selectKategoriak: " . $e->getMessage());
            return null;
        }
    }
    public static function insertKategoria($kategoria){

        try{
            $db = self::getDatabase();
            $sql = "insert into kategoriak (izena) values";
            $sql = $sql . "('" . $kategoria->getIzena() . "')";

            $emaitza = $db->exec($sql);
            return $emaitza;
        } catch (Exception $e){
            error_log("Error in selectKategoriak: " . $e->getMessage());
            return 0;
        }
    }

    public static function updateKategoria($kategoria) {
        try {
            $db = self::getDatabase();
            $sql = "update kategoriak set "; 
            $sql = $sql . "izena='" . $kategoria->getIzena() . "'";
            $sql = $sql . " WHERE id=" . $kategoria->getId();
            $emaitza = $db->exec($sql);
            return $emaitza;
            
        } catch (Exception $e) {
            error_log("Error in selectKategoriak: " . $e->getMessage());
            return 0;
        }
    }

    public static function deleteKategoria($id)
    {
        try {
            $db = self::getDatabase();
            $checkLinkedCars = $db->query("SELECT COUNT(*) FROM coches WHERE kategoria = " . $id)->fetchColumn();

            if ($checkLinkedCars > 0) {
                // Category is linked to cars, handle accordingly (e.g., display an error message)
                echo "<p>Errorea: Ezin da kategoria ezabatu kotxe bati lotuta bait dago.</p>";
                return 0;
            }
            
            $sql = "DELETE FROM kategoriak WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $emaitza = $stmt->execute();
            return $emaitza;
        } catch (Exception $e) {
            // Log the error or handle it appropriately
            error_log("Error in deleteKategoria: " . $e->getMessage());
            return 0;
        }
    }
}
?>