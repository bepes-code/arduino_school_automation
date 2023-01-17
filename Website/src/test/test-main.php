<html>
<body>
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
          <td> <font face="Arial">Temperatura</font> </td> 
          <td> <font face="Arial">Humetat</font> </td> 
          <td> <font face="Arial">Llums</font> </td> 
          <td> <font face="Arial">Alumnes</font> </td> 
      </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $aules = $row["aula"];
        $llums = $row["LLUMS"];
        $temperatura = $row["TEMPERATURA"];
        $reles = $row["RELES"];
        $humetat = $row["HUMETAT"]; 
        
        if($llums == 1){
            $color_llums = "#6ed829";
        }else{
            $color_llums = "#e04141";
        }
        if($reles == 1){
            $color_reles = "#6ed829";
        }else{
            $color_reles = "#e04141";
        }




        echo "<tr> 
                  <td>$aules</td> 
                  <td>$temperatura Cª</td> 
                  <td>$humetat %</td> 
                  <td><button type='submit' style='background-color: $color_llums; font-size: 30px; text-align:center;'></button> </td> 
                  <td><button type='submit' style='background-color: $color_llums; font-size: 30px; text-align:center;'></button></td> 
              </tr>";
    }
    $result->free();
}




?>
</body>
</html>