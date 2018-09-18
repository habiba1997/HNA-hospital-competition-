<?php
 session_start();

 echo "<h1 style='color:#0075b4' class='do text-center'>".$_SESSION["user"]."</h1>";

 require 'mySQLConnection.php';


$slkt = $data->prepare("SELECT `ID`, `ID Card`, `Full Name`, `Main Physician`, `Family Contact` FROM `InPatients` WHERE  `Main Physician`=:main");
$slkt->execute(array(":main"=> $_SESSION["user"]));
  
    
   
?>
<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <style>
        body{ background-image: url(2.jpg);  font-family: 'Open Sans', sans-serif; background-size: cover; color: #0075b4}
        .do{background-color: rgba(255,255,255,0.7); border-radius:1%;; margin: 3% 7%; padding: 3% 3%; width: 86%; }


        
    </style>
</head>
    <body>
       
<div class="do">
      <table class="table table-hover table-condensed table-bordered">
	   <thead>
	    <tr>
	      <th scope="col"> Patient ID </th>
	      <th scope="col"> Name </th>
	      <th scope="col"> Show </th>
	    </tr>
	   </thead>
	   <tbody>    

                    <?php 

                       foreach ($slkt as $value) 
                       {
                       	echo "<tr><td>".$value['ID']."</td>";
                       	echo "<td>".$value['Full Name']."</td>";
                       	echo "<td><a href='patient.php?id=".$value['ID']."'><i class='far fa-eye'></i></a></td></tr>";
                       }

                       

                    ?>
            </tbody>
	  	</table>
</div>
<a href='logout.php'> <button class='btn btn-primary btn-lg ' style="float: right; margin: 0% 5% 5% 5%"> LOG OUT </button></a>

    </body>
</html>
