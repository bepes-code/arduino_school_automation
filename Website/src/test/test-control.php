<?php
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
$page = $_SERVER['PHP_SELF'];
$sec = "30";
?>
<!DOCTYPE html>
<html lang="en">

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

</head>

<body>
  <header>
    <div class="esquerra">
      <a href="./main.php"><img id="header-insti" src="../img/logo-insti.png"></a>
      <a>Institut Josep Vallverdú</a>
    </div>
    <div class="dreta">
      <a class="titols-a" href="./main.php">Informació</a>
      <a class="titols-a" style="color:#3AAFFE ; " href="#">Control</a>
      <a class="titols-a" href="./src/pages/projecte.php">Projecte</a>
      <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn"></button>
        <div id="myDropdown" class="dropdown-content">
          <a href="./estat-sensors.html">Estats dels sensors</a>
          <a href="./contacte.html">Contacte</a>
          <a href="../../index.php">Tancar la sessió</a>
        </div>
      </div>
    </div>
    <hr>
  </header>
  <?php 

$page = $_SERVER['PHP_SELF'];
$sec = "60";
// include("./src/db/config-test.php")
$username = "root"; 
$password = "root"; 
$database = "tdr_database"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT * FROM clases";





echo '<table border="1" cellspacing="2" cellpadding="2" border-color: #BB3316; > 
      <tr> 
          <td> <font face="Arial">Aules</font> </td> 
          <td> <font face="Arial">Llums</font> </td> 
          <td> <font face="Arial">Ventiladors</font> </td> 
          <td> <font face="Arial">Projector</font> </td> 
      </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        
        $column1 = "LLUMS";
        $column2 = "RELES";
        
        $unit_id = $row['id'];
        $aules = $row["aula"];
        $llums = $row["LLUMS"];
        $reles = $row["RELES"];
        
        if($llums == 1){
            $inv_current_bool_1 = 0;
            $color_llums = "#6ed829";
        }else{
            $inv_current_bool_1 = 1;
            $color_llums = "#e04141";
        }
        if($reles == 1){
            $inv_current_bool_2 = 0;
            $color_reles = "#6ed829";
        }else{
            $inv_current_bool_2 = 1;
            $color_reles = "#e04141";
        }




        echo "<tr> 
                  <td>$aules</td> 
                  <td><form action= ./src/db/actualitzar-dades-control.php method= 'post'><input type='hidden' name='value2' value=$llums><input type='hidden' name='value' value=$inv_current_bool_1   >	<input type='hidden' name='unit' value=$unit_id ><input type='hidden' name='column' value=$column1 ><button type= 'submit' name= 'change_but' style='background-color: $color_llums'><i class='fa-solid fa-power-off'></button></form></td> 
                  <td><button ><i class='fa-solid fa-snowflake' style='color:#50AFE2;''></i></button></td> 
                  <td><button ><i class='fa-solid fa-temperature-empty'></i></button></td> 
                  <td><button ><i class='fa-solid fa-power-off'></i></button></td> 
              </tr>";
    }
    $result->free();
}




?>
  </div>
  <footer>
    <h1>Institut Josep Vallverdú</h1>
    <div class="logos">
      <a href="http://insjv.cat/" target="_blank"><img id="foto1" src="../img/facebook.png"></a>
      <a href="http://insjv.cat/" target="_blank"><img id="foto2" src="../img/instagram.png"></a>
    </div>

  </footer>
  <script>
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
  </script>
</body>
<script>
 console.meme("Bepes-code", "Copiright", "Not Sure Fry", 400, );
    

</script>
</html>