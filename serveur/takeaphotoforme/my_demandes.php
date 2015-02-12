<?php
/**
 * Renvoie le tableau des demandes d'un utilisateur
 *
 * @param login 
 * @param pass
 *
 * 1) Récupération des informations envoyées par l'application (login & mdp)
 * 2) Connection DB
 * 3) Récupération des demandes de l'utilisateur
 * 4) Retour
 *
 * Liens : 
 * http://php.net/manual/fr/pdostatement.fetchall.php (PDO)
 */
include("include/include.php");

/* 1) Récupération des informations envoyées par l'application */
$id_user = $_POST['idUser'];

/* 3) Connection DB */
$connexion = new PDO('mysql:host='.$config['host'].';dbname='.$config['db'], $config['user'], $config['pass']);

/* 3) Récupération des demandes de l'utilisateur */
$sql_select_demandes = "SELECT * FROM takeaphotoforme_demandes WHERE id_user = '$id_user'";
$query_select_demandes = $connexion->prepare($sql_select_demandes);
$query_select_demandes->execute();

//Construction json
$json = array();

while($data=$query_select_demandes->fetch(PDO::FETCH_OBJ)){
	$json[] = array(
		"id_demande" => $data->id_demande,
		"id_user" => $data->id_user,
		"latitude" => $data->latitude,
		"longitude" => $data->longitude,
		"description" => $data->description,
	    "etat" => $data->etat
	);
}

$result['result'] = "TRUE";
$result['demande'] = $json;

/* 4) Retour */
print(json_encode($result));
print(json_encode("USER + " . $id_user));

?>