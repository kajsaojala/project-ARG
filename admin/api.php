<?php
$file = "db.json";

if (file_exists($file)) { //om filen finns ska vi ta innehållet och decoda så vi får en associativ array att jobba med
    $data = file_get_contents($file); //tar filen
    $database = json_decode($data, true); //gör om vår fil till en associativ array, den kommer se ut som ovan eftersom att det är så vi skapar den från början om filen ej finns
} else {
    header("Location: /pages/error.php");
    exit();
}

$method = $_SERVER["REQUEST_METHOD"];

//Vår API tillåter POST, GET & DELETE så först kollar vi om det inte är den metoden för att meddela användaren att det inte går
if ($method !== "GET" && $method !== "POST" && $method !== "PATCH" && $method !== "DELETE") {
    http_response_code(405);
    header("Content-Type: application/json");
    echo json_encode(["message" => "Method not allowed"]);
    exit();
}

$input = file_get_contents("php://input"); // all data som skickas till PHP hamnar i denna tillfälliga fil, dock ej om det är GET
$json = json_decode($input, true); // vi tar innehållet i filen och gör en associativ array som vi kan använda


//------------ GET (get används i functions.js i window.onload där STATE fyller i userLevel ---------

// Om metoden är GET
if ($method === "GET") {
        $userInfo;

        foreach ($database["users"] as $index => $user) {
            if ($user["id"] == $_GET["userID"]) {
                $userInfo = $user["gamePlay"];
            }
        }
    
        http_response_code(200);
        //header("Content-Type: application/json");
        // Skicka med hela DB
        $message = ["data" => $userInfo];
        echo json_encode($message);
        exit();
}


//REGISTRERING AV ANVÄNDARE

if ($method === "POST") {

    //Först gör vi några kontroller:

    //Användare har ej fyllt i alla fält (tomma strängar)
    if ($json["email"] === "" || $json["password"] == "") {
        http_response_code(400);
        header("Content-Type: application/json");
        echo json_encode(["errors" => "All fields must to be filled out"]);
        exit();
    }

    //Användare har ej fyllt i alla fält (finns inte med i json)
    if (!isset($json["email"]) || !isset($json["password"])) {
        http_response_code(400);
        header("Content-Type: application/json");
        echo json_encode(["errors" => "All fields must to be filled out)"]);
        exit();
    }

    //Användare har fyllt i emailadress som redan finns
    foreach ($database["users"] as $user => $value) {
        if ($value["email"] == $json["email"]) {
            http_response_code(400);
            header("Content-Type: application/json");
            echo json_encode(["errors" => "Email already registered"]);
            exit();
        }
    }


    //Skapar ett ID till användaren
    $highestID = 0; 
    foreach ($database["users"] as $user) {
        if ($user["id"] > $highestID) {
            $highestID = $user["id"];
        }
    } 
    // Lägg till det nya ID:et 
    $okId = $highestID + 1;


    //Skapar ett objekt med användarens uppgifter
    $user = [ 
        "id" => $okId, 
        "email" => $json["email"], 
        //"phone" => $json["phone"], 
        "password" => $json["password"], 
        "gamePlay" => 
        ["inventory" => ["name" => "ID-card", "code" => 0, "itemImg" => "link"],
        "level" => 0,
        "currentLocation" => ["longitude" => 0, "latitude" => 0]
        ]
    ];

    //Lägger till användaren i databasen
    $database["users"][] = $user;

    $dataAsJSON = json_encode($database, JSON_PRETTY_PRINT);
    file_put_contents($file, $dataAsJSON);
    http_response_code(201);
    header("Content-Type: application/json");
    $message = [
        "data" => "You're now signed up, log in"
    ];
    echo json_encode($message);
    exit();
}


//-------------------------PATCH (ändra userlevel vid collect)-----------------------------

if ($method === "PATCH") {
    $currentUserIndex;

    foreach ($database["users"] as $index => $user) {
        if ($user["id"] == $json['userID']) {
            $currentUserIndex = $index;
        }
    }
    
    $newLevel = $database["users"][$currentUserIndex]["gamePlay"]["level"] = ++$json["level"];

    $newData = $database["users"][$currentUserIndex];
    

    $dataJSON = json_encode($database, JSON_PRETTY_PRINT);
    file_put_contents($file, $dataJSON);
    http_response_code(201);
    header("Content-Type: application/json");
    $message = [
        "data" => $newData
    ];
    echo json_encode($message);
    exit();

 

}
?>