<?php

session_start();
include("../Connexion/connexion.php");
if (isset($_POST['username']) && (isset($_POST['mdp']))) {
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $username = test_input($_POST['username']);
    $mdp = test_input($_POST['mdp']);

    if (empty($username)) {
        header("Location:../index.php?error=Le login est obligatoire!");
    } else if (empty($mdp)) {
        header("Location:../index.php?error=Le mot de passe est obligatoire!");
    } else {

        $password = sha1($password);

        $query = "SELECT * FROM users WHERE username='$username' AND mdp='$mdp';";
        $result = mysqli_query($connexion, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['mdp'] === $mdp && $row['username'] === $username) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['mdp'] = $row['mdp'];

                header("Location:../home.php");
            } else {
                header("Location:../index.php?error=Login ou mot de passe incorrects!");
            }
        }
    }
} else {
    header("Location:../index.php?error=Le login et le mot de passe obligatoires!");
}
