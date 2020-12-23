<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">

        <!-- Responsive web design -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS 4.5.3 import from CDN -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <title> Delete </title>
    </head>


    <!-- PAGE HEAD -->
    <?php
        include("header.php")
    ?>


    <!-- Code PHP -->
    <?php

    // Récupération de l'identifiant concerné, passé en GET dans le fichier "detail.php": <a href="modif.php?pro_id=<?php echo $row->pro_id"> 
    $pro_id=$_GET['pro_id'];

    // Connection à la base de données 
    require "connection_bdd.php";

    // Construction de la requète
    $requete = "SELECT * FROM produits WHERE pro_id=".$pro_id;
    $result = $db->query($requete);

    //Si la requête renvoit un seul et unique résultat, on ne fait pas de boucle, contrairement à la page index.php !
    $row = $result->fetch(PDO::FETCH_OBJ);

    //Libèration de la connection au serveur de BDD
    $result->closeCursor();
        
    ?>



    <!-- PAGE MAIN CONTENT -->

    <div class="container"> 
        <form  action="script_delete.php"  method="GET"  style="padding-left: 100px">
            <label for="image"> </label> <br>
            <img src="<?php echo "public/image/"; echo $row->pro_id; echo "."; echo $row->pro_photo ?>"  alt="imgproduit"  class="img-fluid"  
            style="width:600px; padding-left:300px">
            <br><br>

            <label style="font-size:50px; margin-left:370px;">  <?php echo $row->pro_libelle?>  </label>  <br>
            
            <p style="font-size:30px; width:100%;"> 
                Etes vous sûr de vouloir supprimer  <?php echo $row->pro_libelle?>  de la base de données ? 
            </p>
            <br><br>
        </form>

        <!-- Les boutons SUPPRIMER et ANNULER  -->
        <div style="margin: 0 30px 40px 300px">
            <a href="script_delete.php?pro_id=<?php echo $row->pro_id?>">    
                <button style="margin-left:50px; padding:10px 30px; border-radius:10px; background-color:red; color:white"> Supprimer </button> 
            </a>

            <a href="index.php"> 
                <button style="margin-left:100px; padding:10px 40px; border-radius:10px; background-color:green; color:white"> Annuler </button> 
            </a> 
        </div>   
    </div>



    <!-- PAGE FOOT -->
    <?php
        include("footer.php")
    ?>    


</html>



