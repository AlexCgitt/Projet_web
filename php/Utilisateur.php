<?php
class Utilisateur   //Classe qui gere l'ajout et le changement d'informations de l'utilisateur (ses informations)
{
    /**Permet à l'utilisateur de se connecter
     * @return false|mixed|string
     */
    static function Connexion()
    {
        $path = explode('/', $_SERVER['PHP_SELF']);
        $file = array_pop($path);   //Fichier où se trouve l'utilisateur

        if (isset($_SESSION['utilisateur'])) { //Si l'utilisateur est connecté
            if ($file == 'Login.php') { //Et qu'il est sur la page de connexion
                header('Location: Accueil.php'); //On l'envoie à l'accueil
            }
            return $_SESSION['utilisateur'];   //on renvoie sa session dans tous les cas s'il en a une
        }

        if (!isset($_SESSION['id_utilisateur']) && $file != 'Login.php') {    //Utilisateur qui se déconnecte
            header('Location: Login.php');
        }


        if (!empty($_POST['identifiant']) && !empty($_POST['mdp'])) { //S'il a rentré les deux champs
            try {
                $conn = Database::connexionBD();
                $statement = $conn->prepare('SELECT identifiant, mdp FROM Utilisateur WHERE identifiant=:identifiant');
                //on récupère le mot de passe associé au mail
                $statement->bindParam(':identifiant', $_POST['identifiant']);
                $statement->execute();
                $result = $statement->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $exception) {
                error_log('Connection error: ' . $exception->getMessage());
                return false;
            }

            if (password_verify($_POST['mdp'], $result['mdp']) && !empty($result)) { //si les deux passwords sont les mêmes
                $_SESSION['utilisateur'] = $result['identifiant'];
                header('Location: Accueil.php');
            } else {    //sinon
                return "Identifiant ou Mot de passe invalide !";
            }
            //on retourne sa session pour les prochains fichiers
            return $_SESSION['utilisateur'];
        }
        return false;
    }
}

?>