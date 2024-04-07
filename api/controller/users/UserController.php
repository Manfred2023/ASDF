<?php
if (!require realpath(dirname(__DIR__, 2)) . '/conf.php')
    http_response_code(403);
class UserController {
    
    public function register() {
        // Cette méthode gérerait le processus d'inscription des utilisateurs
        // Par exemple, elle pourrait recevoir les données du formulaire d'inscription via POST
        // Valider ces données et les sauvegarder dans la base de données
        // Vous devriez implémenter cette logique en fonction de vos besoins spécifiques
        echo "Page d'inscription";
    }

    public function login() {
        try { 
            # Check required fields
            Criteria::_formRequiredCheck([EMAIL, PASSWORD], $_POST);
            $user = User::_get(Criteria::EMAIL, $_POST[EMAIL]);
            if (!($user instanceof User))
                return false;
          
            $authenticated = (password_verify($_POST[PASSWORD], $user->getPassword())) ;
            if ($authenticated) {
                header("Location:../../screen/overview/index.php");
                echo "succes";
                exit();
            } else {
               header("Location:../../screen/auth/index.php");
               echo "Page non trouvée";
                exit();
            }
            
        } catch (Exception $exception) {
            Reply::_exception($exception);
        }
        
    }

    public function logout() {
        // Cette méthode gérerait le processus de déconnexion des utilisateurs
        // Par exemple, elle pourrait détruire la session en cours
        // Vous devriez implémenter cette logique en fonction de vos besoins spécifiques
        echo "Déconnexion de l'utilisateur";
    }
}

?>
