<?php
function Login()
{
    if(empty($_POST['username'])){
        $this->HandleError("UserName is empty!");
        return false;
    }

    if(empty($_POST['password'])){
        $this->HandleError("Password is empty!");
        return false;
    }

    $username = trim($_POST['username']);

    $password = trim($_POST['password']);

    if(!$this->CheckLoginInDB($username,$password)){
        return false;
    }
    session_start();

    $_SESSION[$this->GetLoginSessionVar()] = $username;
    return true;
}

function CheckLoginInDB($username, $password){
    if(!$this->DBLogin()){
        $this->HandleError("La connexion à echouée");
        return false;
    }
    $username = $this->SanitizeForSQL($username);
    $pwdmd5 = md5($password);
    $qry = "Select name, email from $this->tablename "." where username = '$username' and password='$pwdmd5' " . "and confirmcode='y'";

    $result = mysql_query($qry, $this->connection);

    if(!$result || myqle_num_roxs($result) <= 0){
        $this->HandleError("Erreur de connexion. " . "l'identifiant ou le mot de passe ne correspond pas");
        return false;
    }
    return true;
}

?>