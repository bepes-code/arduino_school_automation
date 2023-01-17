<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

$page = $_SERVER['PHP_SELF'];
$sec = "60";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="refresh" content="<?php echo $sec ?>;URL='<?php echo $page ?>'">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informació | INSJV</title>
    <link rel="stylesheet" href="./src/css/main.css">
    <link rel="shortcut icon" href="./src/assets/logo-insti.png">
  
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <script src="./src/js/dropdown.js"></script>
</head>

<body>
    <header>
        <div class="esquerra">
            <a href="#"><img id="header-insti" src="./src/assets/logo-insti.png"></a>
            <a>Institut Josep Vallverdú</a>
        </div>
        <div class="dreta">
            <a class="titols-a" style="color:#3AAFFE ; " href="#">Informació</a>
            <a class="titols-a" href="./control.php">Control</a>
            <a class="titols-a" href="./src/pages/projecte.php">Projecte</a>
            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn"></button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="./src/pages/estats-sensors.php">Estats dels sensors</a>
                    <a href="./src/pages/contacte.php">Contacte</a>
                    <a href="./src/pages/logout.php">Tancar la sessió</a>
                </div>
            </div>
        </div>
        <hr>
    </header>
    <!--Començem el php-->
    <?php
$username = "solans"; 
$password = "solans_2022"; 
$database = "tdr_database_group"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT * FROM clases";





echo "<div class='informacio'><table style='text-align:center; justify-content: center; align-items: center;'> 
      <tr> 
          <td> <font face='Arial'>Aules</font> </td> 
          <td> <font face='Arial'>Temperatura</font> </td> 
          <td> <font face='Arial'>Humetat</font> </td> 
          <td> <font face='Arial'>Llums</font> </td> 
          <td> <font face='Arial'>Alumnes</font> </td> 
      </tr></div>";

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $aules = $row["aula"];
        $llums = $row["LLUMS"];
        $temperatura = $row["TEMPERATURA"];
        $alumnes = $row["ALUMNES"];
        $humetat = $row["HUMETAT"]; 
        $albert = $row["CAIXA_PORTA"];

        
        if($albert == 1){
            $color_llums = "#6ed829";
  
          }else{
            $color_llums = "#e04141";
          }
        if($alumnes == 1){
            $color_alumnes = "#6ed829";
        }else{
            $color_alumnes = "#e04141";
        }




        echo "<table style='text-align:center; justify-content: center; align-items: center;'><tr> 
                  <td>$aules</td> 
                  <td>$temperatura Cª</td> 
                  <td>$humetat %</td> 
                  <td><button type='submit' style='background-color: $color_llums; font-size: 30px; text-align:center;'></button> </td> 
                  <td><button type='submit' style='background-color: $color_alumnes; font-size: 30px; text-align:center;'></button></td> 
              </tr></table>";
    }
    $result->free();
}




    ?>
    <h1 class="my-5" style="color: #ffff">Hola, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>.</h1>
    <footer>
        <h1>Institut Josep Vallverdú</h1>
        <div class="logos">
            <a href="http://insjv.cat/" target="_blank"><img id="foto1" src="./src/assets/facebook.png"></a>
            <a href="http://insjv.cat/" target="_blank"><img id="foto2" src="./src/assets/instagram.png"></a>
        </div>

    </footer>

</body>

</html>
