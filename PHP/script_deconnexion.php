<?php

    session_start();

    $_SESSION['login'] = "";

    unset($_SESSION['login']);


    if (ini_get("session.use_cookies")) 
    {
        setcookie(session_name(), '', time()-1);
    }


    session_destroy();
    
    echo "<h4> Vous êtes déconnecté ! </h4>";
    
    header("refresh:2; url=acceuil.php");  // refresh:2 signifie que après 2 secondes l'utilisateur sera redirigé sur la page acceuil.php. 
    exit;
   


    // Lignes 3 : on affecte une valeur vide aux variables de session.
    // Lignes 5 : suppression des variables de session.
    // Lignes 8-11 : via la fonction setcookie(), on fait expirer en termes de date le cookie qui concerne le nom de la session. 
    // Ceci n’est valide que dans le cas où les sessions sont gérées par cookies (comportement par défaut de PHP), d’où la condition.
    // Ligne 14 : la fonction session_destroy() détruit le reste de la session.

?>