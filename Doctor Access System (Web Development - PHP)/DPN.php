<?php
 session_start();
 require 'mySQLConnection.php';

 echo "<h1 style='color:#0075b4' class='text-center'>".$_SESSION["user"]."</h1>";
 if(!isset($_SESSION["entry"]))
  	{
  		header("Location:LogPage.php");
  	}


 if($_SERVER['REQUEST_METHOD']=="POST" )      
    { 				
    				$checkBox = implode(",", $_POST['gi_status']);
    				
             
                   $in = $data->prepare("INSERT INTO `ICU Daily Progress Notes`(`ID`, `Activity Status`, `Mental Status`, `GI Status`, `Respiratory Status`, `Heart Rate`, `Blood Sugar`, `Daily Weight`, `Notes`)VALUES(:id, :a, :ms, :gs, :rs, :hr, :bs, :dw , :n)");


                    if($in->execute(array(':id'=> $_SESSION['id'], ':a' => $_POST['act_status'],':ms' => $_POST['mental_status'],  ':gs' => $checkBox , ':rs' => $_POST['respiratory_status'], ':hr' => $_POST['heart_rate'],':bs' => $_POST['blood_sugar'], ':dw' => $_POST['daily_weight'], ':n'=>$_POST['notes'] )))
                    {
                    	 echo "<h6 style='color:#0075b4' class='text-center'>"."inserted successfully"."</h6>";

                    }
                    else
                    {
                    	                    	 echo "<h6 style='color:#0075b4' class='text-center'>"."inserted not successfully"."</h6>";

                    }
                        

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>New Daily Progress Note</title>
	<link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<style>
		body{ background-image: url(22.jpg);  font-family: 'Open Sans', sans-serif; background-size: cover; color: #0075b4}
        h1{background-color: rgba(255,255,255,0.7); border-radius:1%;; margin: 3% 7%; padding: 3% 3%; width: 86%; }
        .beebz{width: 96%;background-color: rgba(255,255,255,0.7); border-radius: 1%; margin: 2%; padding: 3%; display: block; }
        button{float: right; margin: 2% 5% 5% 5%; display: block;}
        h4{display: inline-block;}

	</style>
</head>
<body>
	
	<div class="beebz row">
		<form action="" method="POST" style="padding-bottom: 5%">
  			
  			<h2>Assessment of the Situation</h2> <br>
<div class=" row">
  			  <div class="col-sm-3">
              	<h4 for="ms">Activity Status</h4> <br>
                <input type="radio" id="ms" name="act_status" value="Ambulatory with assist"  >Ambulatory with assist<br>
                <input type="radio" id="ms" name="act_status" value="Crutches" >Crutches <br>
                <input type="radio" id="ms" name="act_status" value="Walker"  >Walker <br>
                <input type="radio" id="ms" name="act_status" value="Bedridden" >Bedridden <br>
                <input type="radio" id="ms" name="act_status" value="Wheelchair" >Wheelchair <br>
                <input type="radio" id="ms" name="act_status" value="Cart" >Cart 

              </div>

              <div class="col-sm-3">
              	<h4 for="ms">Mental Status</h4> <br>
                <input type="radio" id="ms" name="mental_status" value="Alert & Oriented"  >Alert & Oriented <br>
                <input type="radio" id="ms" name="mental_status" value="Algitated" >Algitated <br>
                <input type="radio" id="ms" name="mental_status" value="Confused"  >Confused <br>
                <input type="radio" id="ms" name="mental_status" value="Stuporous" >Stuporous <br>
                <input type="radio" id="ms" name="mental_status" value="Combative" >Combative <br>
                <input type="radio" id="ms" name="mental_status" value="Unresponsive" >Unresponsive 
              </div>

               <div class="col-sm-3">
              	<h4 for="ms">Respiratory Status</h4> <br>
                <input type="radio" id="ms" name="respiratory_status" value="Normal"  >Normal <br>
                <input type="radio" id="ms" name="respiratory_status" value="Labored" >Labored <br>
                <input type="radio" id="ms" name="respiratory_status" value="O2 Therapy"  >O2 Therapy <br>
                <input type="radio" id="ms" name="respiratory_status" value="Distressed" >Distressed 
              </div>

               <div class="col-sm-3">
              	<h4 for="ms">Gastrointestinal Status</h4> <br>
                <input type="checkbox" id="ms" name="gi_status[]" value="Incontinent"  >Incontinent <br>
                <input type="checkbox" id="ms" name="gi_status[]" value="Foley" >Foley <br>
                <input type="checkbox" id="ms" name="gi_status[]" value="Diarrhea"  >Diarrhea <br>
                <input type="checkbox" id="ms" name="gi_status[]" value="Vomiting" >Vomiting <br>
                <input type="checkbox" id="ms" name="gi_status[]" value="Nausea" >Nausea <br>
              </div>
</div>
<br>  			
<h2>Patient Dignostic Values</h2> <br>

<div class="row">
               <div class="form-group col-sm-4">
                <h4 for="hr">Current Heart Rate</h4> 
                <input id="hr" type=number class="form-control" name="heart_rate"> beat per minute
               </div>

              <div class="form-group col-sm-4">
                <h4 for="bs">Current Blood Sugar Level</h4> 
                <input id="bs" type=number class="form-control" name="blood_sugar"> millimoles per litre
               </div>

               <div class="form-group col-sm-4">
                <h4 for="dw">Daily Weight</h4> 
                <input id="dw" type=number class="form-control" name="daily_weight"> Kg 
               </div>
</div>
<div class="row">
               <div class="form-group col-sm-12 container-fluid">
                <h2 for="nn">Notes and Warnings</h2> <br> 
                <input id="nn" size="1000" type=text class="form-control" name="notes">   
               </div>
</div>
              
            
            
            <button type="submit" class="btn btn-primary btn-lg" >ADD</button> 




		</form>
</div>
<a href='logout.php'> <button class='btn btn-primary btn-lg '> LOG OUT </button></a>
<a href='patient.php'> <button class='btn btn-primary btn-lg'>Return to Main Patient Data</button></a> <br><br>

</body>
</html>