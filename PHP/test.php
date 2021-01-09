<?php

    require "connection_bdd.php";
        
    $req = 'SELECT user_mdp FROM users';
        
    $result = $db->query($req);

    var_dump($result);

    $nbLigne = $result->rowCount();   

    while($row = $result->fetch(PDO::FETCH_OBJ))  
    {
        var_dump($row);
    }

    
   












    ?>