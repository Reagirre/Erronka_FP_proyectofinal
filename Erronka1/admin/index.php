<?php
session_start();
require('../klaseak/com/leartik/joag/kotxeak/kotxea.php');
require('../klaseak/com/leartik/joag/kotxeak/kotxea_db.php');
require('../klaseak/com/leartik/joag/kategoriak/kategoria.php');
require('../klaseak/com/leartik/joag/kategoriak/kategoria_db.php');
require('../klaseak/com/leartik/joag/komentarioak/komentarioa.php');
require('../klaseak/com/leartik/joag/komentarioak/komentarioa_db.php');
require('../klaseak/com/leartik/joag/karritoa/karrito.php');
require('../klaseak/com/leartik/joag/karritoa/karritoa_db.php');
require('../klaseak/com/leartik/joag/eskariak/eskariak.php');
require('../klaseak/com/leartik/joag/eskariak/eskariak_db.php');
require('../klaseak/com/leartik/joag/erabiltzaileak/erabiltzailea.php');
require('../klaseak/com/leartik/joag/erabiltzaileak/erabiltzailea_db.php');
use com\leartik\joag\kotxeak\KotxeaDB;
use com\leartik\joag\kategoriak\KategoriaDB;
use com\leartik\joag\komentarioak\KomentarioaDB;
use com\leartik\joag\karritoa\KarritoaDB;
use com\leartik\joag\eskariak\EskariakDB;
use com\leartik\joag\erabiltzaileak\ErabiltzaileaDB;


$admin = false;

if (isset($_POST['sartu'])) {
	if ($_POST['erabiltzailea'] == "admin" && $_POST['pasahitza'] == "admin"){
		$admin = true;
		$_SESSION['erabiltzailea']= "admin";
	}
} else if (isset($_SESSION['erabiltzailea']) && $_SESSION['erabiltzailea'] == "admin"){
	$admin = true;
}



if ($admin == true) {
	require('hasiera.php');
	if (isset($_POST['Karritoa'])) {
		$karritoak = KarritoaDB::selectKarritoak();
		$erabiltzaileak = ErabiltzaileaDB::selectErabiltzaileak();
		$eskariak = EskariakDB::selectEskariak();
		$kotxeak = KotxeaDB::selectKotxeak();
		include('karritoa_erakutsi.php');
	} 
	else if (isset($_POST['Kotxeak'])){
		$kotxeak = KotxeaDB::selectKotxeak();
		$kategoriak = KategoriaDB::selectKategoriak();
		$komentarioak = KomentarioaDB::selectKomentarioak();
		include('kotxeak_erakutsi.php');
	}
	else if (isset($_POST['Komentarioak'])){
		$komentarioak = KomentarioaDB::selectKomentarioak();
		include('komentarioak_erakutsi.php');
	}
	else if (isset($_POST['Kategoriak'])){
		$kategoriak = KategoriaDB::selectKategoriak();
		include('kategoriak_erakutsi.php');
	}
} else {	

	if (isset($_POST['sartu']))
		$mezua = "Datuak ez dira zuzenak";
	else
		$mezua = "";
	
	include('login.php');
} 