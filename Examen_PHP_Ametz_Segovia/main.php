<?php
if(isset($_POST["usuario"])){
    $usuario = $_POST["usuario"];
    setcookie("usuario", $usuario, time() + 3600);
}
?>
<html>
<head>
    <title>Ametz Segovia</title>
    <?php 
    require('statistics.php');
    ?>
</head>
<body>
<?php
//control de datos y insert
$db = new DBManager();
$ganada = false;
$fallos = 0;

if (isset($_POST['fallos'])) {
    $fallos = $_POST['fallos'];
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
if (
    !empty($_POST["juego"]) &&
    !empty($_POST["nombre"]) &&
    isset($_POST["miembros"]) && 
    isset($_POST["puntuacion"]) &&
    !empty($_POST["fecha"])
) {
    // Validar nombre del juego
    $juegosValidos = ["LoL", "Wow", "Valorant", "Fortnite", "Minecraft"];
    if (!in_array($_POST["juego"], $juegosValidos)) {
        echo "<script>alert('Nombre del juego no válido');</script>";
    } elseif (!is_numeric($_POST["miembros"]) || $_POST["miembros"] < 3 || $_POST["miembros"] > 5) {
        echo "<script>alert('El número de miembros debe ser un número entre 3 y 5');</script>";
    } elseif (!is_numeric($_POST["puntuacion"]) || $_POST["puntuacion"] <= 0) {
        echo "<script>alert('La puntuación debe ser un número positivo');</script>";
    } elseif (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $_POST["fecha"])) {
        echo "<script>alert('Formato de fecha incorrecto. Debe ser YYYY-MM-DD');</script>";
    } else {
        if (isset($_POST['ganada'])) {
            $ganada = true;
        }
        $stat = new Statistics($_POST['juego'], $_POST['nombre'], $_POST['miembros'], $_POST['puntuacion'], $ganada, $_POST['fecha']);
        $db->insertStatistics($stat);
        $fallos = 0;
    }
} else {
    echo "<script>alert('Todos los campos del formulario deben estar llenos!!!');</script>";
    $fallos++;
}
}
if($fallos == 3){
    echo "<script>alert('¿Qué estás haciendo?');</script>";
}

if(isset($_COOKIE["usuario"])){
    echo "<h1>". $_COOKIE["usuario"]."</h1>";
} else {
    echo "<h1>". $_POST["usuario"]."</h1>";
}
?>

<form method="post" action="main.php">
    <label>Juego:</label>
    <select name="juego" id="juego">
        <option value="LoL">LoL</option>
        <option value="Wow">Wow</option>
        <option value="Valorant">Valorant</option>
        <option value="Fortnite">Fortnite</option>
        <option value="Minecraft">Minecraft</option>
    </select><br><br>
    <label>Nombre del Equipo:</label>
    <input type="text" name="nombre"><br><br>
    <label>Miembros del equipo:</label>
    <input type="number" name="miembros"><br><br>
    <label>Puntuacion:</label>
    <input type="number" name="puntuacion"><br><br>
    <label>Ganada:</label>
    <input type="checkbox" name="ganada" id="ganada"><br><br>
    <label>Fecha:</label>
    <input type="date" name="fecha"><br><br>
    <input type="submit" value="enviar">
    <input type="hidden" name="fallos" value="<?php echo $fallos; ?>">
</form>

<?php
// Porcentaje de victorias por equipo
$statsArray = $db->getStatistics();
$winCountByTeam = array();
$totalGamesByTeam = array();

foreach ($statsArray as $victoria) {
    $array = explode(',', $victoria);
    $teamName = trim($array[1]);

    if (!isset($winCountByTeam[$teamName])) {
        $winCountByTeam[$teamName] = 0;
        $totalGamesByTeam[$teamName] = 0;
    }

    $totalGamesByTeam[$teamName]++;

    if ($array[4] == 1) {
        $winCountByTeam[$teamName]++;
    }
}

echo "<h2>Porcentaje de victorias por equipo:</h2>";
echo "<table border='1'>";
echo "<tr><th>Equipo</th><th>Porcentaje de Victorias</th></tr>";

foreach ($winCountByTeam as $teamName => $wins) {
    $totalGames = $totalGamesByTeam[$teamName];
    $winPercentage = ($totalGames > 0) ? ($wins / $totalGames * 100) : 0;

    echo "<tr><td>$teamName</td><td>$winPercentage%</td></tr>";
}

echo "</table>";
// Media de puntuación general en cada videojuego
$scoreSumByGame = array();
$gameCountByGame = array();

foreach ($statsArray as $victoria) {
    $array = explode(',', $victoria);
    $game = trim($array[0]);

    if (!isset($scoreSumByGame[$game])) {
        $scoreSumByGame[$game] = 0;
        $gameCountByGame[$game] = 0;
    }

    $scoreSumByGame[$game] += $array[3];
    $gameCountByGame[$game]++;
}

echo "<h2>Media de puntuación general en cada videojuego:</h2>";
echo "<table border='1'>";
echo "<tr><th>Videojuego</th><th>Media de Puntuación</th></tr>";

foreach ($scoreSumByGame as $game => $scoreSum) {
    $gameCount = $gameCountByGame[$game];
    $averageScore = ($gameCount > 0) ? ($scoreSum / $gameCount) : 0;

    echo "<tr><td>$game</td><td>$averageScore</td></tr>";
}

echo "</table>";
?>
</body>
</html>