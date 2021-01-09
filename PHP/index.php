<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">

        <!-- Responsive web design -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS 4.5.3 import from CDN -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <title> Index </title>
    </head>


<!-- PAGE HEAD -->
<?php
    if (file_exists("header.php"))
    {
        include("header.php");
    }
    else
    {
        echo "file 'header.php' n'existe pas";
    }
?>


    <!-- PAGE MAIN CONTENT -->
    <div class="container"> 
        <div class="table-responsive" style="margin-top: 20px;"> 
            <!-- AJOUTER button -->
            <a href="ajout.php"> 
                <button style="margin:0 0 10px 950px; padding:10px 40px; border-radius:10px; background-color:green; color:white"> Ajouter </button> 
            </a> 
            <!-- Table of products -->
            <table class="table table-bordered table-striped"> 
                <thead class="thead-light" >
                    <tr class="font-weight-bolder">
                        <th scope="col"> Photo </th>
                        <th scope="col"> ID </th>
                        <th scope="col"> Référence </th>
                        <th scope="col"> Libellé </th>
                        <th scope="col"> Prix </th>
                        <th scope="col"> Stock </th>
                        <th scope="col"> Couleur </th>
                        <th scope="col"> Ajout </th>
                        <th scope="col"> Modif </th>
                        <th scope="col"> Bloqué </th>
                    </tr>
                </thead>
                <tbody>         
                <!-- Code PHP -->
<?php
                //Connéxion à la base de données 
                require "connection_bdd.php";
                
                //Sélectionne toutes les informations de la table 'produits'
                $requete = "SELECT * FROM produits";

                // Exécution de notre requête via la méthode "query()" et on met le résultat retourné dans une variable  $result
                $result = $db->query($requete);

                // Grace à la méthode "rowCount()" nous pouvons connaitre le nombre de lignes retournées par la requête
                $nbLigne = $result->rowCount(); 
                
                if($nbLigne >= 1)
                {
                    while ($row = $result->fetch(PDO::FETCH_OBJ))  // Grace à méthode fetch() on choisit le 1er ligne de chaque colonne et la mets dans l'objet $row
                    {                                              // Avec la boucle "while" on choisit 2eme, 3eme, etc... lignes de chaque colonne et les mets dans l'objet $row
?>
                        <tr>
                            <td class="table-warning"  style="width: 150px">
                                <div>
                                    <img  src="<?php echo "public/image/"; echo $row->pro_id; echo "."; echo $row->pro_photo ?>"  alt="imgproduit"  class="img-fluid">
                                </div>
                            </td> 
                            <td> 
                                <div> 
                                    <?php  echo $row->pro_id; ?>  
                                </div>
                            </td>
                            <td> 
                                <div> 
                                    <?php  echo $row->pro_ref; ?>
                                </div>
                            </td>
                            <td class="table-warning"> 
                                <div>  
                                    <a href="detail.php?pro_id=<?php echo $row->pro_id ?>">  <?php echo $row->pro_libelle; ?>  </a>
                                </div>
                            </td>
                            <td> 
                                <div> 
                                    <?php  echo $row->pro_prix; ?>
                                </div>
                            </td>
                            <td> 
                                <div> 
                                    <?php  echo $row->pro_stock; ?>
                                </div>
                            </td>
                            <td> 
                                <div> 
                                    <?php  echo $row->pro_couleur; ?>
                                </div>
                            </td>
                            <td> 
                                <div> 
                                    <?php  echo $row->pro_d_ajout; ?>
                                </div>
                            </td>
                            <td> 
                                <div> 
                                    <?php  echo $row->pro_d_modif; ?>
                                </div>
                            </td>
                            <td> 
                                <div> 
                                    <?php  echo $row->pro_bloque; ?>
                                </div>
                            </td>
                        </tr>
<?php
                    }
                    
                    // Sert à finir proprement une série de fetch(), libère la connection au serveur de BDD
                    $result->closeCursor();
                }
?>    
                </tbody>
            </table>
        </div>
    </div>



<!-- PAGE FOOT -->
<?php
    include("footer.php")
?>



</html>
            