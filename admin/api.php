<?php
$file = "db.json";
$database = [
    [
        "users" => []
    ],
    [
        "dogs" => []
    ]
]; //skapar tom array för att kunna lägga in innehållet

if (file_exists($file)) { //om filen finns ska vi ta innehållet och decoda så vi får en associativ array att jobba med
    $data = file_get_contents($file); //tar filen
    $database = json_decode($data, true); //gör om vår fil till en associativ array, den kommer se ut som ovan eftersom att det är så vi skapar den från början om filen ej finns
}

$method = $_SERVER["REQUEST_METHOD"];

//Vår API tillåter POST, GET & DELETE så först kollar vi om det inte är den metoden för att meddela användaren att det inte går
if ($method !== "GET" && $method !== "POST" && $method !== "DELETE") {
    http_response_code(405);
    header("Content-Type: application/json");
    echo json_encode(["message" => "Method not allowed"]);
    exit();
}

$input = file_get_contents("php://input"); // all data som skickas till PHP hamnar i denna tillfälliga fil, dock ej om det är GET
$json = json_decode($input, true); // vi tar innehållet i filen och gör en associativ array som vi kan använda

if ($method === "POST") {
    //if (isset($json["registration"])) { //NEDAN HÄNDER OM NÅGON VILL REGISTRERA SIG!!!

    if ($json["phone"] === "" || $json["email"] === "" || $json["password"] == "") {
        http_response_code(400);
        header("Content-Type: application/json");
        echo json_encode(["errors" => "All fields must to be filled out"]);
        exit();
    }

    if (!isset($json["phone"]) || !isset($json["email"]) || !isset($json["password"])) {
        http_response_code(400);
        header("Content-Type: application/json");
        echo json_encode(["errors" => "All fields must to be filled out)"]);
        exit();
    }

    /*if (preg_match('/\s/',$json["username"])) {
        http_response_code(400);
        header("Content-Type: application/json");
        echo json_encode(["errors" => "No spaces allowed in username"]);
        exit();
    }*/

    //Loopa igenom users för att kolla så att användarnamnet ej redan finns!
    foreach ($database["users"] as $user => $value) {
        if ($value["email"] == $json["email"]) {
            http_response_code(400);
            header("Content-Type: application/json");
            echo json_encode(["errors" => "Email already registered"]);
            exit();
        }
    }


    $highestID = 0; 
    foreach ($database["users"] as $user) {
        if ($user["id"] > $highestID) {
            $highestID = $user["id"];
        }
    } 
    // Lägg till det nya ID:et 
    $okId = $highestID + 1;


    $user = [ "id" => $okId, 
    "email" => $json["email"], 
    "phone" => $json["phone"], 
    "password" => $json["password"], 
    "gamePlay" => 
        ["backpack" => 
            ["name" => "ID-card", "code" => 0, "itemImg" => "link"],
        "level" => 0,
        "currentLocation" => ["longitude" => 0, "latitude" => 0]
        ]
    ];
    $database["users"][] = $user;

    var_dump($database);

    $dataAsJSON = json_encode($database, JSON_PRETTY_PRINT);
    file_put_contents($file, $dataAsJSON);
    http_response_code(201);
    header("Content-Type: application/json");
    $message = [
        "data" => $user
    ];
    echo json_encode($message);
    exit();
    //}
}
?>