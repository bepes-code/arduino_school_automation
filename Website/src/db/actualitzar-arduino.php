<?php
// Revbem les dades que ens envia el arduino
foreach($_REQUEST as $key => $value) 
{
if($key =="id"){
$unit = $value;
}	
if($key =="pw"){
$pass = $value;
}	
if($key =="un"){
$update_number = $value;
}
	
if($update_number == 1)
{
	if($key =="n1"){
		$temperatura = $value;
	}			
}
else if($update_number == 2)
{
	if($key =="n2"){
	$humetat = $value;
	}			
}else if ($update_number == 3){
	if($key =="b3"){
		$caixa_main = $value;
		}	
		if($key =="b4"){
		$caixa_porta = $value;
		}	
		if($key =="b5"){
			$caixa_reles = $value;
		}
}
	
else if($update_number == 5)
	{
	if($key =="b6"){
	$alumnes = $value;
	}	

}
}
// Actualitzem la base de dades

include("config-arduino.php"); 	

if (mysqli_connect_errno()) {
  echo "Error al conectar amb la base de dades: " . mysqli_connect_error();
}

if($update_number == 1)	
	{
		mysqli_query($con,"UPDATE clases SET TEMPERATURA = $temperatura WHERE id=$unit AND PASSWORD=$pass");	
	}
else if($update_number == 2)
	{
		mysqli_query($con,"UPDATE clases SET HUMETAT = $humetat WHERE id=$unit AND PASSWORD=$pass");	;	
	}
	else if($update_number == 3)
	{
		mysqli_query($con,"UPDATE clases SET CAIXA_MAIN  = $caixa_main, CAIXA_RELES = $caixa_reles, CAIXA_PORTA = $caixa_porta WHERE id=$unit AND PASSWORD=$pass");	;	
	}


else if($update_number == 5)
	{
		mysqli_query($con,"UPDATE clases SET ALUMNES = $alumnes WHERE id=$unit AND PASSWORD=$pass");	;	
	}


	if($caixa_main == 0){
		mysqli_query($con,"UPDATE clases SET CAIXA_PORTA = $caixa_main WHERE id=$unit AND PASSWORD=$pass");	
	}
	if($caixa_main == 1){
		mysqli_query($con,"UPDATE clases SET CAIXA_PORTA = $caixa_main WHERE id=$unit AND PASSWORD=$pass");	
	}


//Enviem dades a l'arduino
date_default_timezone_set('UTC');
$t1 = date("gi"); 	

$result = mysqli_query($con,"SELECT * FROM clases");	//table select is ESPtable2, must be the same on yor database

while($row = mysqli_fetch_array($result)) {
	if($row['id'] == $unit){

			$b1 = $row['LLUMS']; // Llums
			$b2 = $row['ALUMNES'];	
			$b3 = $row['RELES'];	// Projector
			$b4 = $row['VENTILADORS'];	// Ventiladors
			$b5 = $row['RECEIVED_BOOL5'];
		
			$n1 = $row['TEMPERATURA_ABP'];	
			$n2 = $row['HUMETAT_ABP'];	
			$n3 = $row['RECEIVED_NUM3'];
			$n4 = $row['RECEIVED_NUM4'];	
			$n5 = $row['RECEIVED_NUM5'];
			
			$n6 = $row['TEXT_1'];
			
			echo " _t1$t1##_b1$b1##_b2$b2##_b3$b3##_b4$b4##_b5$b5##_n1$n1##_n2$n2##_n3$n3##_n4$n4##_n5$n5##_n6$n6##";
		
	}
	//echo " _t1$t1##_b1$b1##_b2$b2##_b3$b3##_b4$b4##_b5$b5##_n1$n1##_n2$n2##_n3$n3##_n4$n4##_n5$n5##_n6$n6##";

	echo"prova";
	}
	?>
	







