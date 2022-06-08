<?php

session_start();
include "../Connexion/connexion.php";
if (isset($_POST['username']) && (isset($_POST['password']))) {
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);

    if (empty($username)) {
        header("Location:../index.php?error=Le login est obligatoire!");
    } else if (empty($password)) {
        header("Location:../index.php?error=Le mot de passe est obligatoire!");
    } else {
        $password = sha1($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password';";
        $result = mysqli_query($connexion, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['password'] === $password && $row['username'] === $username) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $row['password'];
                header("Location:../php/home.php");
            }
        } else {
            header("Location:../index.php?error=Login ou mot de passe incorrects!");
        }
    }
} else {
    header("Location:../index.php?error=Le login et le mot de passe obligatoires!");
}
