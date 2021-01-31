<?php 

    if (!defined('BASEPATH')) exit('No direct script access allowed');

    /* IMPORTANT
    Dans le design pattern M.V.C. les requêtes SQL doivent se trouver dans les modèles. 
    Comme pour un contrôleur, le nom de classe de modèle doit commencer par une majuscule et 
    le fichier php doit porter le même nom, comme:  classe UsersModel et le fichier UsersModel.php . 
    Il est recommandé d'ajouter le suffixe "Model" au nom de la classe (et donc au fichier aussi puisqu'ils doivent porter le même nom).
    Comme on peut le voir, les modèles héritent la classe CI_model.
    On va transférer les requêtes SQL du contrôleur Users.php vers le modèle UsersModel.php .
    Pour cela dans le modèle UsersModel.php on va écrire plusieurs méthodes pour effectuer différents requêtes SQL en base de données.
    */

    /* ATTENTION
    Le modèle contient généralement les méthodes qui effectuent les actions C.R.U.D. : il faudra écrire une méthode par action.
    On pourra passer des arguments à ces méthodes pour exécuter des requêtes avec critères (clauses WHERE).
    */

    /* Pour pré-charger automatiquement dans chaque méthode tous les assistants et librairies nécessaires pour tout le projet il faut :
    1. Ouvrir le fichier config/autoload.php.
    2. Rechercher la ligne $autoload['libraries'] et remplacer par: $autoload['libraries'] = array('database', 'form_validation', 'session', 'email');
    3. Rechercher la ligne $autoload['helpers'] et remplacer par:   $autoload['helpers'] = array('form', 'url');    
    */


    class UsersModel extends CI_Model
    {
        // liste() est une méthode destinée à sélectionner les champs "mot de passe" et "user_blocked" en base de données 
        public function liste($user_login) 
        {
            $user_login = htmlspecialchars($user_login);    // La fonction "htmlspecialchars" nous aide d'éviter la faille XSS

            $requete = $this->db->query("SELECT user_mdp, user_blocked FROM users WHERE user_login =?", $user_login);    // Requête de SELECT

            $resultat = $requete->row();   // Récupération première ligne du résultat dans la variable $resultat 

            return $resultat;
        }



        // liste2() est une méthode destinée à mettre à jour la date et l'heure du connexion du client
        public function liste2($user_login) 
        {
            $user_login = htmlspecialchars($user_login);    // La fonction "htmlspecialchars" nous aide d'éviter la faille XSS

            // On utilise l'objet DateTime() pour montrer la date et l'heure du dernier connexion du client: 
            $time = new DateTime();  
            $date = $time->format("Y/m/d H:i:s"); 

            $requete = $this->db->query("UPDATE users SET user_connexion=?",$date,"WHERE user_login=?", $user_login);   // Requête de UPDATE
        }



        // liste3() est une méthode destinée à sélectionner "user_role" avec critères (clauses WHERE) en base de données
        public function liste3($user_login) 
        {
            $user_login = htmlspecialchars($user_login);    // La fonction "htmlspecialchars" nous aide d'éviter la faille XSS

            $requete = $this->db->query("SELECT user_role FROM users WHERE user_login=?", $user_login);

            $resultat = $requete->row();   // Récupération première ligne du résultat dans la variable $resultat 
            
            return $resultat;
        }



        // liste4() est une méthode destinée à sélectionner "login_fail", "user_blocked" et "unblock_time" avec critères (clauses WHERE) en base de données
        public function liste4($user_login) 
        {
            $user_login = htmlspecialchars($user_login);    // La fonction "htmlspecialchars" nous aide d'éviter la faille XSS

            $requete = $this->db->query("SELECT login_fail, user_blocked, unblock_time FROM users WHERE user_login=?", $user_login);
                            
            $resultat = $requete->row();   // Récupération première ligne du résultat dans la variable $resultat
            
            return $resultat;
        }



        // liste5() est une méthode destinée à mettre à jour le champ "login_fail"
        public function liste5($user_login, $login_fail) 
        {
            $user_login = htmlspecialchars($user_login);    // La fonction "htmlspecialchars" nous aide d'éviter la faille XSS
            $login_fail = htmlspecialchars($login_fail);

            $requete = $this->db->query("UPDATE users SET login_fail=?",$login_fail, "WHERE user_login=?",$user_login);
        }



        // liste6() est une méthode destinée à mettre à jour les champs "user_blocked" et "unblock_time"
        public function liste6($user_login) 
        {
            $user_login = htmlspecialchars($user_login);    // La fonction "htmlspecialchars" nous aide d'éviter la faille XSS

            $unblock_time = time() + (1*1*2*60);   // La fonction time() renvoie l'heure actuelle en nombre de secondes depuis l'époque Unix (1er janvier 1970 00:00:00 GMT).

            $requete = $this->db->query("UPDATE users SET user_blocked=?",$user_login, "WHERE user_login=?", $user_login);
            $requete = $this->db->query("UPDATE users SET unblock_time=?",$unblock_time, "WHERE user_login=?", $user_login);
        }



        // liste7() est une méthode destinée à mettre à jour les champs "login_fail", "user_blocked" et "unblock_time"
        public function liste7($user_login)
        { 
            $user_login = htmlspecialchars($user_login);    // La fonction "htmlspecialchars" nous aide d'éviter la faille XSS

            $requete = $this->db->query("UPDATE users SET login_fail=?",0, "WHERE user_login=?", $user_login);
            $requete = $this->db->query("UPDATE users SET user_blocked=?",0, "WHERE user_login=?", $user_login);
            $requete = $this->db->query("UPDATE users SET unblock_time=?",0, "WHERE user_login=?", $user_login);
        }



        // liste8() est une méthode destinée à selectionner le champ "user_login"
        public function liste8()
        { 
            $requete = $this->db->query("SELECT user_login FROM users");
            
            $result = $requete->result();   // Récupération des résultats de la requête dans la variable $result
            
            return $result;
        }



    }   



    /* Maintenant dans le contrôleur Users.php on va remplacer notre connexion à la base et la requête SQL par l'utilisation de 
    modèles (NOUVEAU CODE) comme suit :
        
    Chargement du modèle 
    $this->load->model('usersModel');

    On appelle la méthode liste() du modèle, qui retourne le tableau de résultat ici affecté dans la variable $aListe (un objet) :
    $aListe = $this->usersModel->liste();

    $aView["liste"] = $aListe;

    $this->load->view('liste', $aListe);

    --  fin NOUVEAU CODE  --
    */

?>