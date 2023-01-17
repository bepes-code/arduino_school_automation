<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sensors | INSJV</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="shortcut icon" href="../WEB/root/img/logo-insti.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
<script src="../js/dropdown.js"></script>

</head>
<body>
    <header>
        <div class="esquerra">
            <a href="../html/main.html"><img id="header-insti" src="../img/logo-insti.png"></a>
            <a>Institut Josep Vallverdú</a>
        </div>
        <div class="dreta">
            <a class="titols-a" href="../../main.php">Informació</a>
            <a class="titols-a" href="../../control.php">Control</a>
            <a class="titols-a" href="./projecte.php">Projecte</a>
            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn"></button>
                <div id="myDropdown" class="dropdown-content">
                  <a href="#">Estats dels sensors</a>
                  <a href="./contacte.php">Contacte</a>
                  <a href="./logout.php">Tancar la sessió</a>
                </div>
              </div>
        </div>
        <hr>
    </header>
    <?php
$username = "root"; 
$password = "root"; 
$database = "tdr_database_group"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT * FROM clases";





echo "<div class='informacio'><table> 
      <tr> 
          <td> <font face='Arial'>Aules</font> </td> 
          <td> <font face='Arial'>Caixa Main</font> </td> 
          <td> <font face='Arial'>Caixa Reles</font> </td> 
          <td> <font face='Arial'>Caixa Porta</font> </td> 
      </tr></div>";

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $aules = $row["aula"];
        $caixa_main = $row["CAIXA_MAIN"];
        $caixa_reles = $row["CAIXA_RELES"];
        $caixa_porta = $row["CAIXA_PORTA"];
        
        if($caixa_main == 1){
            $color_main = "#6ed829";
        }else{
            $color_main = "#e04141";
        }
        if($caixa_reles == 1){
            $color_reles = "#6ed829";
        }else{
            $color_reles = "#e04141";
        }
        if($caixa_porta == 1){
          $color_porta = "#6ed829";
      }else{
          $color_porta = "#e04141";
      }




        echo "<table><tr> 
                  <td>$aules</td> 
                  <td><button type='submit' style='background-color: $color_main; font-size: 30px; text-align:center;'></button> </td>
                  <td><button type='submit' style='background-color: $color_reles; font-size: 30px; text-align:center;'></button> </td> 
                  <td><button type='submit' style='background-color: $color_porta; font-size: 30px; text-align:center;'></button> </td> 
                  </tr></table>";
    }
    $result->free();
}




    ?>
    <footer>
      <h1>Institut Josep Vallverdú</h1>
      <div class="logos">
          <a href="http://insjv.cat/" target="_blank"><img id="foto1" src="../assets/facebook.png"></a>
          <a href="http://insjv.cat/"target="_blank"><img id="foto2" src="../assets/instagram.png"></a>
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
</html>