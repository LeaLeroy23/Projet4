<?php

require_once 'Modele/Connexion.php';
require_once 'Vue/vue.php';

class ControleurConnexion
{

  private $connexion;

    public function __construct()
    {
        $this->connexion = new Connexion();
    }

    public function login()
    {
        if (isset($_SESSION['user'])) {
            header("Location: index.php");
            exit();
        }

        $errors=[];
        $form=[];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['message']['email'] = "votre email n'est pas au bon format";
            } else {
                $form['email'] = $email;
            }

            $password = $_POST['password'];
            if (empty($password)) {
                $errors['message']['password'] = 'votre mot de passe est vide';
            } else {
                $form['password'] = $password;
            }

            if (empty($errors)){
                $user = $this->connexion->getUser($email);

                if (!empty($user['email'])){
                    $passwordbdd = $user['password'];

                    if (password_verify($password, $passwordbdd)) {
                    
                        $_SESSION['user'] = $user['email'];
                        
                        header("Location: index.php?action=dashboard");
                        exit();
                    }
                
                }
                $form['message'] = "Identification incorrect";
            }

        }

        $vue = new vue("Connexion");
        $vue->generer(array(
            'errors' => $errors,
            'form' => $form
        ));
    }

    public function logout(){
        session_destroy();
        unset($_SESSION);
        header("Location: index.php");
        exit();
    }

}
