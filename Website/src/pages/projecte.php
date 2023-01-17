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
    <title>Projecte | INSJV</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="shortcut icon" href="../WEB/root/img/logo-insti.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="esquerra">
            <a href="../../main.php"><img id="header-insti" src="../assets/logo-insti.png"></a>
            <a>Institut Josep Vallverdú</a>
        </div>
        <div class="dreta">
            <a class="titols-a" href="../../main.php">Informació</a>
            <a class="titols-a" href="../../control.php">Control</a>
            <a class="titols-a" href="#" style="color:#3AAFFE ; ">Projecte</a>
            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn"></button>
                <div id="myDropdown" class="dropdown-content">
                  <a href="./estats-sensors.php">Estats dels sensors</a>
                  <a href="./contacte.php">Contacte</a>
                  <a href="./logout.php">Tancar la sessió</a>
                </div>
              </div>
        </div>
        <hr>
    </header>
    <div class="projecte">
      <h1>Projecte TDR</h1>
      <p id="lorem">El Nostre TDR es basa en la domotizació del les aules del Institut Josep Vallverdú de les Borges Blanques especialment en l'Aula pilot "Aula ABP", aquest projecte esta format per els membres nombrats al final d'aquest document i supervistat per el tutor Fransesc Solans. Actualment ens trobem en el procès de recerca.</p>
      <div class="imatges">
        <img src="../assets/arduino.jpeg">
        <img src="../assets/clase.jpg">
      </div>
      <div class="integrants">
        <h1 id="integrants">Integrants del Grup</h1>
        <div class="persones">
          <div class="aleix-rosinach">
            <img src="../assets/logo-insti.png">
            <a href="https://www.instagram.com/rosinaaach/" target="_blank">Aleix Rosinach</a>
            <p>Programador</p>
          </div>
          <div class="aleix-rosinach">
            <img src="../assets/logo-insti.png">
            <a href="https://www.instagram.com/albertfarree_/" target="_blank">Albert Farré</a>
            <p>Programador</p>
          </div>
          <div class="aleix-rosinach">
            <img src="../assets/logo-insti.png">
            <a href="https://www.instagram.com/uriii_05._hs/"target="_blank">Oriol Armengol</a href="">
            <p>Programador</p>
          </div>
          <div class="aleix-rosinach">
            <img src="../assets/logo-insti.png">
            <a href="">Fransesc Solans</a>
            <p>Tutor TDR</p>
          </div>
          
        </div>
      </div>
    </div>

    
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