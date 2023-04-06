<?php
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
$page = $_SERVER['PHP_SELF'];
$sec = "10";
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="refresh" content="<?php echo $sec ?>;URL='<?php echo $page ?>'">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Control | INSJV</title>
  <link rel="stylesheet" href="./src/css/main.css">
    <link rel="shortcut icon" href="./src/assets/logo-insti.png">
  <script src="https://kit.fontawesome.com/c2702ad8da.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
  <script src="https://cdn.rawgit.com/adriancooney/console.image/c9e6d4fd/console.image.min.js"></script>
  <script src="./src/js/dropdown.js"></script>

</head>

<body>
  <header>
    <div class="esquerra">
      <a href="./main.php"><img id="header-insti" src="./src/assets/logo-insti.png"></a>
      <a>Institut Josep Vallverdú</a>
    </div>
    <div class="dreta">
      <a class="titols-a" href="./main.php">Informació</a>
      <a class="titols-a" style="color:#3AAFFE ; " href="#">Control</a>
      <a class="titols-a" href="./src/pages/projecte.php">Projecte</a>
      <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn"></button>
        <div id="myDropdown" class="dropdown-content">
          <a href="./src/pages/estats-sensors.php">Estats dels sensors</a>
          <a href="./src/pages/contacte.php">Contacte</a>
          <a href="../../index.php">Tancar la sessió</a>
        </div>
      </div>
    </div>
    <hr>
  </header>
  <?php 

$page = $_SERVER['PHP_SELF'];
$sec = "60";
$username = ""; 
$password = ""; 
$database = "tdr_database_group"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT * FROM clases";





echo '<div class="control"> <table style="text-align:center; align-items: center; justify-content: center; border: 1px solid #ffff">
      <tr> 
          <td> <font face="Arial">Aules</font> </td> 
          <td> <font face="Arial">Llums</font> </td> 
          <td> <font face="Arial">Ventiladors</font> </td> 
          <td> <font face="Arial">Projector</font> </td> 
      </tr></table></div>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        
        $column1 = "LLUMS";
        $column2 = "VENTILADORS";
        $column3 = "RELES";
        $column4 = "Master";

        $unit_id = $row['id'];
        $aules = $row["aula"];
        $llums = $row["LLUMS"];
        $ventiladors = $row["VENTILADORS"];
        $projector = $row["RELES"];
        $albert = $row["CAIXA_PORTA"];
        $master = $row["Master"];
        
        if($llums == 1){
            $inv_current_bool_1 = 0;
        }else{
            $inv_current_bool_1 = 1;
        }
        if($albert == 1){
          $color_llums = "#6ed829";

        }else{
          $color_llums = "#e04141";
        }
        if($ventiladors == 1){

            $inv_current_bool_2 = 0;
            $color_ventiladors = "#6ed829";
        }else{
            $inv_current_bool_2 = 1;
            $color_ventiladors = "#e04141";
        }
        if($projector == 1){
          $inv_current_bool_3 = 0;
          $color_projector = "#6ed829";
        }else{
            $inv_current_bool_3 = 1;
            $color_projector = "#e04141";
        }
        //Botó master
        if($master == 1){
          $inv_current_bool_4= 0;
          $color_master = "#6ed829";
        }else{
          $inv_current_bool_4= 1;
          $color_master = "#e04141";
        }

        echo "<div class='control'><table style='text-align:center; justify-content: center;  align-items: center; border: 1px solid #ffff'><tr> 
                  <td style='text-align:center; justify-content: center; border: 1px solid #ffff'>$aules</td> 
                  <td style='text-align:center; justify-content: center; border: 1px solid #ffff'><form action= ./src/db/actualitzar-dades-control.php method= 'post'><input type='hidden' name='value2' value=$llums><input type='hidden' name='value' value=$inv_current_bool_1   >	<input type='hidden' name='unit' value=$unit_id ><input type='hidden' name='column' value=$column1 ><button type= 'submit' name= 'change_but' style='background-color: $color_llums'><i class='fa-solid fa-lightbulb'></i></button></form></td> 
                  <td style='text-align:center; justify-content: center; border: 1px solid #ffff'><form action= ./src/db/actualitzar-dades-control.php method= 'post'><input type='hidden' name='value2' value=$ventiladors><input type='hidden' name='value' value=$inv_current_bool_2   >	<input type='hidden' name='unit' value=$unit_id ><input type='hidden' name='column' value=$column2 ><button type= 'submit' name= 'change_but' style='background-color: $color_ventiladors'><i class='fa-solid fa-fan'></button></form></td> 
                  <td style='text-align:center; justify-content: center; border: 1px solid #ffff'><form action= ./src/db/actualitzar-dades-control.php method= 'post'><input type='hidden' name='value2' value=$projector><input type='hidden' name='value' value=$inv_current_bool_3   >	<input type='hidden' name='unit' value=$unit_id ><input type='hidden' name='column' value=$column3 ><button type= 'submit' name= 'change_but' style='background-color: $color_projector'><i class='fa-solid fa-person-chalkboard'></i></button></form></td> 
                  </div> </tr></table>";
    }
    $result->free();
}

//Master test
//if($llums || $ventiladors || $projector == 1){
  //$master = 1;
 // $inv_current_bool_4= 0;

//}
//          <td> <font face="Arial">Master</font> </td> 

//<td><form action= ./src/db/actualitzar-dades-control.php method= 'post'><input type='hidden' name='value2' value=$master><input type='hidden' name='value' value=$inv_current_bool_4   >	<input type='hidden' name='unit' value=$unit_id ><input type='hidden' name='column' value=$column4 ><button type= 'submit' name= 'change_but' style='background-color: $color_master'><i class='fa-solid fa-power-off'></i></button></form></td> 
//test

?>
  </div>
  <footer>
    <h1>Institut Josep Vallverdú</h1>
    <div class="logos">
      <a href="http://insjv.cat/" target="_blank"><img id="foto1" src="./src/assets/facebook.png"></a>
      <a href="http://insjv.cat/" target="_blank"><img id="foto2" src="./src/assets/instagram.png"></a>
    </div>

  </footer>

</body>

</html>