
<?php 

// Dans ce fichier, nous récupérons les informations passées dans le fichier "modif.php" dans la balise <form> et 
// l'attribut action="script_modif.php" 

// Les informations sont récupéré avec variable superglobale $_POST pour réaliser la requête de modification: UPDATE

$pro_id = $_POST['id'];
$pro_ref = $_POST['ref'];
$pro_cat_id = $_POST['cat'];
$pro_libelle = $_POST['lib'];
$pro_description = $_POST['desc'];
$pro_prix = $_POST['price'];
$pro_stock = $_POST['stock'];
$pro_couleur = $_POST['color'];
$pro_photo = $_POST['ext'];
$pro_bloque = $_POST['bloq'];


// IMPORTANT : Si il y erreur de "Undefined index" au lieu d'écrire  $pro_id = $_POST['id']; on peut écrire comme suite par exemple:

// if (isset($_POST['id'])) 
// {
//     $pro_id = $_POST['id'];
// }

// if (isset($_POST['ref'])) 
// {
//     $pro_ref = $_POST['ref'];
// }
// etc...........


// Connection à la base de données 
require "connection_bdd.php";

// Construction de la requête UPDATE sans injection SQL
$requete = $db->prepare("UPDATE  produits  SET  pro_ref=:pro_ref,  pro_cat_id=:pro_cat_id,  pro_libelle=:pro_libelle, 
pro_description=:pro_description,  pro_prix=:pro_prix,  pro_stock=:pro_stock,  pro_couleur=:pro_couleur,  pro_photo=:pro_photo, 
pro_bloque=:pro_bloque  WHERE  pro_id=:pro_id");


// Association des valeurs aux marqueurs via méthode "bindValue()"
$requete->bindValue(':pro_id', $pro_id, PDO::PARAM_INT);
$requete->bindValue(':pro_ref', $pro_ref, PDO::PARAM_STR);
$requete->bindValue(':pro_cat_id', $pro_cat_id, PDO::PARAM_INT);
$requete->bindValue(':pro_libelle', $pro_libelle, PDO::PARAM_STR);
$requete->bindValue(':pro_description', $pro_description, PDO::PARAM_STR);
$requete->bindValue(':pro_prix', doubleval($pro_prix), PDO::PARAM_STR);  //fonction doubleval() convertit le type de variable en décimale
$requete->bindValue(':pro_stock', $pro_stock, PDO::PARAM_INT);
$requete->bindValue(':pro_couleur', $pro_couleur, PDO::PARAM_STR);
$requete->bindValue(':pro_photo', $pro_photo, PDO::PARAM_STR);
$requete->bindValue(':pro_bloque', $pro_bloque, PDO::PARAM_INT);

// Exécution de la requête
$requete->execute();

//Libère la connection au serveur de BDD
$requete->closeCursor();

//Redirection vers la page index.php 
header("Location: index.php");

exit;

?>

