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
    <title>Contacte | INSJV</title>
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
             <a class="titols-a" style="color:#3AAFFE ; " href="../../main.php">Informació</a>
            <a class="titols-a" href="../../control.php">Control</a>
            <a class="titols-a" href="./projecte.php">Projecte</a>
            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn"></button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="./estats-sensors.php">Estats dels sensors</a>
                    <a href="#">Contacte</a>
                    <a href="./logout.php">Tancar la sessió</a>
                </div>
            </div>
        </div>
        <hr>
    </header>
    <div class="contacte">
      <h1>Contacte</h1>
      <hr>
      <div class="contacte-form">
        <form action="">
          <input type="text" id="fname" name="firstname" placeholder="El vostre nom">
          <p for="motiu">Motiu</p>
          <select id="motiu" name="motiu">
            <option value="australia">Bug</option>
            <option value="canada">Falla del sistema</option>
            <option value="usa">Nose com funciona</option>
          </select>
      
          <p for="subject">Especificar el problema</p>
          <textarea id="subject" name="subject" placeholder="El problema" style="height:200px"></textarea>
      <div class="buttoncontacte">
        <input id="button-contacte" type="submit" value="Submit">

      </div>
        </form>
      </div>
   
    <footer>
        <h1>Institut Josep Vallverdú</h1>
        <div class="logos">
            <a href="http://insjv.cat/" target="_blank"><img id="foto1" src="../img/facebook.png"></a>
            <a href="http://insjv.cat/"target="_blank"><img id="foto2" src="../img/instagram.png"></a>
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
        function alerta_misatge(){
          alert('hola')
        }
        </script>
</body>
</html>