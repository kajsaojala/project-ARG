<?php

session_start();

//include "../database.json";
$data = file_get_contents("db.json"); //tar filen
$database = json_decode($data, true); 


//Om användaren har lyckats ta sig vidare till login så sparar vi användarnamnet och lösenordet som användaren skickat med i en variabel
if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    //Här loopar vi igenom alla användare som finns saparade och kollar om det stämmer överrens med det som användaren fyllt i formuläret
    foreach ($database["users"] as $user) {
        if ($user["email"] == $email && $user["password"] == $password) {
            $foundUser = $user;
        }
    }

    //Om användaren finns så skicka användaren till home sidan
    if ($foundUser !== null) {
        $_SESSION["email"] = $foundUser["email"];
        //$_SESSION["IsLoggedIn"] = true;
        header("Location: /pages/home.php");
        exit();
    }
    
}

header("Location: ../pages/login-register.php?error=1");
//http_response_code(405);
exit();
?>