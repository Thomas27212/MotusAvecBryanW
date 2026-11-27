<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brainrodle</title>
    <audio id="testSound" src="sounds/bass-only.mp3" preload="auto"></audio>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Federant&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<?php
// db.php
// Charge le fichier .env
$env = parse_ini_file(__DIR__ . '/.env');

// Utilise les variables
$host = $env['DB_HOST'];
$dbname = $env['DB_NAME'];
$user = $env['DB_USER'];
$pass = $env['DB_PASS'];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}


// Creation d'un nombre aleatoire qui def le mot 
$min = 2;
$max = 3620;
$nb_alea = rand($min, $max);

// Récupérer une valeur précise
$sql = "SELECT mot FROM mots WHERE id_mots = $nb_alea";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => 1]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
echo $result;
if ($result) {
    echo $result['colonne'];
} else {
    echo "Aucun résultat trouvé.";
}

?>
</head>
<body>
    <header>
        <div class="button logo">
               <a href="homepage.html"> <img src="./img/Gemini_Generated_Image_h7nxcjh7nxcjh7nx-removebg-preview.png"></a>
        </div>
        <div class="button title">
            BRAINRODLE
        </div>
        <div class="button account">
            <a href="#account">ACCOUNT</a>
        </div>
    </header>
    <div class="dock">
        <div class="content">
            <div class="button">
                <a href="#Leaderboard">Leaderboard</a>
            </div>
            <hr />
            <div class="button">
                <a href="#Stats">Stats</a>
            </div>
            <hr />
            <div class="button">
                <a href="#Games">Games</a>
            </div>
        </div>
    </div>
    <main>
        <div class="card">
            <div class="word">

            </div>
            <div class="keyboard">

            </div>
        </div>
    </main>

<script src="script.js"></script> 

</body>
</html>