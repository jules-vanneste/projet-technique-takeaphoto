<?php
/**
 * Supprime la reponse pass�e en param�tre
 *
 * @param id_reponse
 */
include("include/include.php");

/* Connection DB */
$connexion = new PDO('mysql:host='.$config['host'].';dbname='.$config['db'], $config['user'], $config['pass']);

/* R�cup�ration de l'id de la reponse a supprimer */
$id_reponse = $_POST['id_reponse'];

/* Supression de la reponse */
$sql_del_reponses = "DELETE FROM takeaphotoforme_reponses WHERE id_reponse = $id_reponse";
$query_del_reponses = $connexion->prepare($sql_del_reponses);
$query_del_reponses->execute();

$result['result'] = "TRUE";

/* Retour */
print(json_encode($result));
?>