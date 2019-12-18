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
        //$email = (isset($_POST['email']) ? $_POST['email'] : NULL);
        //$password = isset($_POST['password']) ? $_POST['password'] : NULL;

        $errors=[];
        $form=[];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['message']['email'] = "votre email n'est pas au bon format";
            }else {
                $form['email'] = $email;
            }

            $password = $_POST['password'];
            if (empty($password)) {
                $errors['message']['password'] = 'votre mot de passe est vide';
            } else {
                $form['password'] = $password;
            }

            if (empty($errors)){
                $user = $this->connexion->getUser($email, $password);
                // if user = O => message erreur 'identifiant incoorect' si user exist on va recupere user password et recuperer aussi le user passsword form
                echo '<pre>';
                print_r($user);
                die();
                //$form = [];
                //header (Location: admin); exit;
            }

        }

        //$this->connexion->getConnexion($email, $password);
        $vue = new vue("Connexion");
        $vue->generer(array(
            'errors' => $errors,
            'form' => $form

        ));
    }
}
