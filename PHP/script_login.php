<?php 
    
    // On va enregistrer l'heure de dernier connexion du client. Pour obtenir la bonne heure, il faut configurer la valeur 
    // de l'option datetime_zone sur la valeur Europe/Paris.
    // Donc, il faut ajouter l'instruction date_default_timezone_set("Europe/Paris") dans vos scripts avant toute manipulation de dates :
    date_default_timezone_set('Europe/Paris');


    // Nous récupérons les informations passées dans le fichier "login.php" dans la balise <form> et l'attribut action="script_login.php" 
    // Les informations sont récupéré avec variable superglobale $_POST 

    if (isset($_POST['login']) && isset($_POST['mdp']))
    {
        if (!empty($_POST['login'] && $_POST['mdp']))
        {
            $user_login = htmlspecialchars($_POST['login']);    // La fonction "htmlspecialchars" rend inoffensives les balises HTML que le visiteur a pu rentrer et nous aide d'éviter la faille XSS  
            $user_mdp = htmlspecialchars($_POST['mdp']);
        }
        else
        {
            echo "<h4> Veuillez remplir tous les champs ! </h4>";
            header("refresh:2; url=login.php");  // refresh:2 signifie que après 2 secondes l'utilisateur sera redirigé sur la page login.php. 
            exit;
        }
    }
    else
    {
        echo "<h4> Veuillez remplir tous les champs ! </h4>";
        header("refresh:2; url=login.php");  // refresh:2 signifie que après 2 secondes l'utilisateur sera redirigé sur la page login.php. 
        exit;
    }
        

    // Puis on fait 2 type de vérification:
    // 1. Vérification si login de l'utilisateur est bloqué ou non ?
    // 2. Vérification si le mot de passe saisi par utilisateur déjà existe dans la base de données ou non ?
    
    // D'abord on va se connecter à la base de données: 
    require "connection_bdd.php";


    // Vérification N°1 :  Est-ce que l'utilisateur est bloqué ou non ?
    // Pour cette partie il faut écrire le code !


    // Vérification N°2 : Est-ce que le mot de passe saisi par utilisateur déjà existe dans la base de données ou non ?
    // D'abord on doit récupérer le mot de passe hashé de l'utilisateur qui se trouve dans la base de données.
    // Pour cela, on fait préparation de la requête SELECT avec la fonction prepare(): 
    $requete = $db->prepare('SELECT user_mdp FROM users WHERE user_login = :user_login');

    // Execution de requête:
    $requete->execute(array(
        'user_login' => $user_login
    ));
    
    // $resultat est un array associatif qui contient user_mdp et sa valeur
    $resultat = $requete->fetch();  

    // Pour vérifier si un mot de passe saisi est bien celui enregistré en base, il faut utiliser la fonction password_verify() qui 
    // renvoie True ou False :
    $PasswordCorrect = password_verify($_POST['mdp'], $resultat['user_mdp']);   

    if ($PasswordCorrect)
    {
        //Construction de la requête UPDATE:
        $requete = $db->prepare("UPDATE users SET user_connexion=:user_connexion WHERE user_login=:user_login");

        // On utilise la fonction date() pour montrer la date et l'heure du dernier connexion du client: 
        $date = date("Y/m/d H:i:s");  
        
        // Association des valeurs aux marqueurs via méthode "bindValue()"
        $requete->bindValue(':user_connexion', $date, PDO::PARAM_STR);
        $requete->bindValue(':user_login', $user_login, PDO::PARAM_STR);

        // Exécution de la requête
        $requete->execute(); 

        // Création d'une session :
        session_start();
        
        $_SESSION['login'] = $user_login;
        echo '<h4>  Bonjour ' . $_SESSION['login'] . '<br> Vous êtes connecté ! </h4>';
    }
    else
    {
        echo "<h4> Mauvais identifiant ou mot de passe ! </h4>";
        header("refresh:2; url=login.php");  // refresh:2 signifie que après 2 secondes l'utilisateur sera redirigé sur la page login.php.
        exit;
        
        //  Si l'utilisateur 3 fois ne saisit pas son mot de passe correctement on peut le bloquer.
        // Pour cela ici on peut apeller la fonction Verify() qui se trouve dans la fichier "function.php" 
        // Avant d'appeler la fonction Verify() on doit écrire le code :  require('function.php')
    }  
    

    $requete->closeCursor();

    header("refresh:2; url=index.php");  // refresh:2 signifie que après 2 secondes l'utilisateur sera redirigé sur la page index.php.
    exit;


    

?>



