<?php

    // Connecter à la base de données: 
    require "connection_bdd.php";
        
    // Ensuite on construit la requête SELECT:
    $requete = "SELECT * FROM users";
        
    // Grace à méthode query() on exécute notre requête:  
    $result = $db->query($requete);

    $nbLigne = $result->rowCount(); 

    while($row = $result->fetch(PDO::FETCH_OBJ))
    {
        var_dump($row);
    }

    
    // var_dump($result);
    // var_dump($nbLigne);
    // var_dump($row);














    ?>