<?php
    // Pour obtenir la bonne heure, il faut configurer la valeur de l'option datetime_zone sur la valeur Europe/Paris.
    // Donc, il faut ajouter l'instruction date_default_timezone_set("Europe/Paris"); dans vos scripts avant toute manipulation de dates. 
    date_default_timezone_set('Europe/Paris');


    // Nous récupérons les informations passées dans le fichier "inscription.php" dans la balise <form> et l'attribut action="script_inscription.php" 
    // Les informations sont récupéré avec variable superglobale $_POST 
    // La fonction "htmlspecialchars" rend inoffensives les balises HTML que le visiteur a pu rentrer et nous aide d'éviter la faille XSS  

    if (!empty($_POST['nom'] && $_POST['prenom'] && $_POST['email'] && $_POST['login'] && $_POST['mdp'] && $_POST['mdp2']))
    {
        $user_nom = htmlspecialchars($_POST['nom']);   
        $user_prenom = htmlspecialchars($_POST['prenom']);
        $user_email = htmlspecialchars($_POST['email']);
        $user_login = htmlspecialchars($_POST['login']);
        $user_mdp = htmlspecialchars($_POST['mdp']);
        $user_mdp2 = htmlspecialchars($_POST['mdp2']);
    }
    else
    {
        echo "<h4> Il faut remplir tous les champs ! </h4>";
        header("refresh:2; url=inscription.php");  // refresh:5 signifie que après 5 secondes l'utilisateur sera redirigé sur la page inscription.php. 
        exit;
    }


    // Un mot de passe ne doit jamais être stocké en clair : il doit être crypté à l'aide d'un algorithme de cryptage afin que 
    // sa valeur ne puisse être lue. La fonction password_hash() permet d’utiliser des algorithmes de cryptage en PHP:  
    // D'abord on vérifie la validité du mot de passe:
    
    if ($user_mdp == $user_mdp2)
    {
        $user_mdp = password_hash($user_mdp, PASSWORD_DEFAULT);  // Si le mot de passe est valide, on fait cryptage avec fonction password_hash()
    }
    else
    {
        echo "<h4> Le mot de passe n'est pas identique  </h4>";
        header("refresh:2; url=inscription.php");
        exit;
    }


    // Vérification si adresse mail saisi par utilisateur déjà existe dans la base de données ou non ?
    // Pour cela d'abord on va se connecter à la base de données: 
    require "connection_bdd.php";
    
    // Ensuite on construit la requête SELECT pour aller chercher la colonne user_email qui se trouve dans table "users" :
    $requete_email = "SELECT user_email FROM users" ;
    
    // Grace à méthode query() on exécute notre requête: on ramene la colonne user_email et on la mets dans l'objet $result
    $result = $db->query($requete_email);

    // Grace à la méthode "rowCount()" nous pouvons connaitre le nombre de lignes retournées par la requête
    $nbLigne = $result->rowCount(); 
    
    if($nbLigne > 1)
    {
        while ($row = $result->fetch(PDO::FETCH_OBJ))    // Grace à la méthode fetch() on choisit 1er ligne de la colonne user_mail et la mets dans l'objet $row                                            
        {                                                // Avec la boucle "while" on choisit 2eme, 3eme, etc... lignes de la colonne user_mail et les mets dans l'objet $row    
            if ($row->user_email == $_POST['email'])
            {
                echo "<h4> L'adresse mail déjà existe  </h4>";
                header("refresh:2; url=inscription.php");
                exit;
            }    
        }

    }        
      
  
    //Construction de la requête INSERT sans injection SQL
    $requete = $db->prepare("INSERT INTO users (user_nom, user_prenom, user_email, user_login, user_mdp, user_inscription, user_connexion) 
    VALUES (:user_nom, :user_prenom, :user_email, :user_login, :user_mdp, :user_inscription, :user_connexion)");


    if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $user_email))  // Vérification la validité de l'adresse mail avec REGEX en utilisant la fonction preg_match() qui renvoie True or False:
    {
        // Association des valeurs aux marqueurs via méthode "bindValue()"
        $requete->bindValue(':user_nom', $user_nom, PDO::PARAM_STR);
        $requete->bindValue(':user_prenom', $user_prenom, PDO::PARAM_STR);
        $requete->bindValue(':user_email', $user_email, PDO::PARAM_STR);
        $requete->bindValue(':user_login', $user_login, PDO::PARAM_STR);
        $requete->bindValue(':user_mdp', $user_mdp, PDO::PARAM_STR);
    
        $date = date('Y-m-d H:i:s');  // On utilise la fonction date() pour montrer date d'inscription et dernier connexion du client  
    
        $requete->bindValue(':user_inscription', $date, PDO::PARAM_STR);  
        $requete->bindValue(':user_connexion', $date, PDO::PARAM_STR);

        // Exécution de la requête
        $requete->execute();
        
        //Libèration la connection au serveur de BDD
        $requete->closeCursor();

        //Redirection vers la page acceuil.php 
        header("Location: acceuil.php");
        exit;
    }

    else
    {
        echo "<h4> L'adresse mail n'a pas bon format! </h4>";
        header("refresh:2; url=inscription.php");
        exit;
    }
    

?>



