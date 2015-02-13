<?php
/**
 * Supprime la demande pass� en param�tre
 *
 * @param login 
 * @param pass
 * @param id_reponse
 *
 * 1) R�cup�ration des informations envoy�es par l'application (login & mdp)
 * 2) Connection DB
 * 3) R�cup�ration de l'id de la reponse a supprimer
 * 4) Supression de la reponse
 * 5) Retour
 *
 * Liens : 
 */
include("include/include.php");

/* 3) Connection DB */
$connexion = new PDO('mysql:host='.$config['host'].';dbname='.$config['db'], $config['user'], $config['pass']);

/* 3)R�cup�ration de l'id de la demande a supprimer */
$id_reponse = $_POST['id_reponse'];

/* 4) Supression de la demande */
$sql_del_reponses = "DELETE FROM takeaphotoforme_reponses WHERE id_reponse = $id_reponse";
$query_del_reponses = $connexion->prepare($sql_del_reponses);
$query_del_reponses->execute();

$result['result'] = "TRUE";

/* 4) Retour */
print(json_encode($result));
?>