<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">

        <!-- Responsive web design -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS 4.5.3 import from CDN -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <title> Ajout </title>
    </head>

    
    <!-- PAGE HEAD -->
    <?php
        include("header.php")
    ?>


    <!-- PAGE MAIN CONTENT -->
    <div class="container"  style="margin-top: 60px">
        <form  action="script_ajout.php"  method="post"  enctype="multipart/form-data"  style="padding-left: 100px">
            <!-- Upload photo of product -->
            <h5> Télécharger la photo du produit : </h5> 
            <input type="file"  name="fichier"> 
            <br><br>

            <label for="id_produit"> Produit ID : </label> <br>
            <input type="text"  name="id"  id="id_produit" style="width:90%">
            <br><br>

            <label for="reference"> Réference : </label> <br>
            <input type="text"  name="ref"  id="reference"  style="width:90%">
            <br><br>

            <label for="categorie"> Catégorie : </label> <br>
                <select id="categorie"  name="cat"  style="width:90%"> 
                        <!-- Code PHP -->
                        <?php
                        //Connéxion à la base de données 
                        require "connection_bdd.php";
                        
                        //Sélectionne toutes les informations de la table 'categories'
                        $requete = "SELECT * FROM categories";

                        // Exécution de notre requête via la méthode "query()" qui retourne un jeu de résultats en tant qu'objet PDO Statement  
                        // et on met ce résultat dans une variable  $result
                        $result = $db->query($requete);

                        // Grace à la méthode "rowCount()" nous pouvons connaitre le nombre de lignes retournées par la requête
                        $nbLigne = $result->rowCount(); 
                        if($nbLigne > 1)
                        {
                            while ($row = $result->fetch(PDO::FETCH_OBJ))
                            { ?>
                                <option  value="<?php echo $row->cat_id ?>"> <?php echo $row->cat_nom ?> </option> 
                                <br>

                        <?php
                            }
                    
                            // sert à finir proprement une série de fetch(), libère la connection au serveur de BDD
                            $result->closeCursor();
                        }
                        ?>    
                </select>
            <br><br>

            <label for="libelle"> Libellé : </label> <br>
            <input type="text"  name="lib"  id="libelle"  style="width:90%">
            <br><br>

            <label for="description"> Description : </label> <br>
            <input type="text"  name="desc"  id="description"  style="width:90%">
            <br><br>

            <label for="prix"> Prix : </label> <br>
            <input type="text"  name="price"  id="prix"  style="width:90%">
            <br><br>

            <label for="stock_produit"> Stock : </label> <br>
            <input type="text"  name="stock"  id="stock_produit"  style="width:90%">
            <br><br>

            <label for="couleur"> Couleur : </label> <br>
            <input type="text"  name="color"  id="couleur"  style="width:90%">
            <br><br>

            <label for="extension"> Extension de la photo : </label> <br>
            <input type="text"  name="ext"  id="extension"  style="width:90%">
            <br><br>

            <label for="ajout"> Date d'ajout : </label> <br>
            <input type="text"  name="add"  id="ajout"  style="width:90%">
            <br><br>

            <label for="modification"> Date de modification : </label> <br>
            <input type="date"  name="modif"  id="modification"  style="width:90%">
            <br><br>

            <label for="bloque"> Produit bloqué ? : </label> <br>
            <input type="radio"  name="bloq"  id="bloque"> Oui
            <input type="radio"  name="bloq"  id="bloque"> Non
            <br><br>

             <!-- Les boutons AJOUTER et ANNULER -->
             <div style="margin: 20px 0 30px 150px">
                <!-- Pour voir le code de la fonction "verif" regardez tout en bas de la page -->
                <input type="submit"  value="Ajouter"  onclick="verif()"  style="margin-left:50px; padding:10px 40px; border-radius:10px; background-color:green; color:white"> 
            
                <a href="index.php"> 
                    <button style="margin-left:100px; padding:10px 30px; border-radius:10px; background-color:red; color:white"> ANNULER </button> 
                </a> 
            </div>
    
        </form>
    </div>


    <!-- PAGE FOOT -->
    <?php
            include("footer.php")
        ?>      



    <!-- JavaScript Code de la fonction verif() -->
    
    <script>

        //vérifie si on envoit ou non le formulaire à "script_modif.php"
        function verif()
        { 
            //Rappel : confirm() -> Bouton OK et Annuler, renvoie true ou false
            var resultat = confirm("Etes-vous certain de vouloir ajouter ce produit ?");

            //alert("retour :" + resultat);

            if (resultat==false)
            {
                alert("Vous avez annulé les modifications \n Aucune modification ne sera apportée à cet enregistrement !");

                //annule l'évènement par défaut ... SUBMIT vers "script_modif.php"
                event.preventDefault();    
            }
        }
    </script>
          
</html>


