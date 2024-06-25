class Utilisateur   //Classe qui gere l'ajout et le changement d'informations de l'utilisateur (ses informations)
{
    /**Permet à l'utilisateur de se connecter
     * @return false|mixed|string
     */
    static function Connexion()
    {
        $path = explode('/', $_SERVER['PHP_SELF']);
        $file = array_pop($path);   //Fichier où se trouve l'utilisateur

        if (isset($_SESSION['user'])) { //Si l'utilisateur est connecté
            if ($file == 'Login.php') { //Et qu'il est sur la page de connexion
                header('Location: Accueil.php'); //On l'envoie à l'accueil
            }
            return $_SESSION['user'];   //on renvoie sa session dans tous les cas s'il en a une
        }

        if (!isset($_SESSION['id_utilisateur']) && $file != 'Login.php') {    //Utilisateur qui se déconnecte
            header('Location: Login.php');
        }


        if (!empty($_POST['mail']) && !empty($_POST['password'])) { //S'il a rentré les deux champs
            try {
                $conn = Database::connexionBD();
                $statement = $conn->prepare('SELECT id_user, mot_de_passe FROM users WHERE mail_user=:mail');
                //on récupère le mot de passe associé au mail
                $statement->bindParam(':mail', $_POST['mail']);
                $statement->execute();
                $result = $statement->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $exception) {
                error_log('Connection error: ' . $exception->getMessage());
                return false;
            }

            if (password_verify($_POST['password'], $result['mot_de_passe']) && !empty($result)) { //si les deux passwords sont les mêmes
                $_SESSION['user'] = $result['id_user'];
                header('Location: Accueil.php');
            } else {    //sinon
                return "E-Mail ou Mot de passe invalide !";
            }
            //on retourne sa session pour les prochains fichiers
            return $_SESSION['user'];
        }
        return false;
    }
}