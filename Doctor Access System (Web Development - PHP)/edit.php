<?php

session_start();
require 'mySQLConnection.php';

 echo "<h1 style='color:#2275b0'>".$_SESSION["user"]."</h1>";

 if(isset($_GET["action"])== "edit" && isset($_GET["id"]))
 {
			$selected = $data->prepare("SELECT `ID`, `Admition Date`, `Allergies`, `Background`, `Height`, `Weight`, `Patient Meds`, `Comment` FROM `ICU Patient Background` WHERE ID=:id");
              if ($selected->execute(array(":id" => $_GET['id'])))
                {
                   echo "<h6 style='color:#2275b0'>"."The data of id " . $_GET['id'] . " has been selected for editing </h6>";
                  foreach($selected as $sel)
                  {
                    $Allergies=$sel['Allergies'];
                    $Background=$sel['Background'];
                    $Meds=$sel['Patient Meds'];
                    $Comment=$sel['Comment'];
                    $Weight=$sel['Weight'];
                  }

                }
                else 
                {
                   echo "<h6 style='color:#2275b0'>"."Error in Edit Selection!"."</h6>";
                }
 }

 if($_SERVER['REQUEST_METHOD']=="POST" )      
 {

                  
		$edit = $data->prepare("UPDATE `ICU Patient Background` SET `Allergies`=:allergies,`Background`=:background, `Weight`=:weight,`Patient Meds`=:meds,`Comment`=:comment WHERE  ID=:id");

		if($edit->execute(array(":allergies" =>$_POST['Allergies_val'],":background"=>$_POST['Background_val'],":weight"=>$_POST['Weight_val'],":meds"=>$_POST['Meds_val'],":comment"=>$_POST['Comment_val'], ":id"=>$_GET['id'])))
		{
			echo "<h6 style='color:#2275b0'>"."The data of id " . $_GET['id'] . " has been selected for updating </h6>";
		}
		else 
		{
			echo "<h6 style='color:#2275b0'>"."Error in updating "."</h6>";

		}
                  
 }  


$selectIcu= $data ->prepare ("SELECT `ID`, `Admition Date`, `Allergies`, `Background`, `Height`, `Weight`, `Patient Meds`, `Comment` FROM `ICU Patient Background` WHERE ID=:id");
$selectIcu->execute(array(":id" => $_GET['id'])); 
$id= $_GET['id'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Editing Patient's Background</title>
	<link rel="stylesheet" href="bootstrap.min.css">

	<style>
        body{ background-image: url(22.jpg);  font-family: 'Open Sans', sans-serif; background-size: cover; color: #2275b0}
        .beebz{width: 40%;background-color: rgba(255,255,255,0.7); border-radius: 1%; margin: 4%; padding: 3%; display: inline-block; }
        h1,h6{background-color: rgba(255,255,255,0.7); border-radius: 1%; width: 50%; margin: 1% 25%; padding: 1%  ;text-align: center;}
        button{float: right;margin: 0% 5% 5% 5%; display: block;}

    
       
    </style>
</head>
<body>
	

	<div class="beebz"  >
   	   <h2> Patient's Background Information </h2>
       <table class="table table-bordered table-condensed table-hover" style="display: inline-block;" >
         
                    <?php 

                        foreach ($selectIcu as $qurry) 
                        {
                          echo "<tr><th scope='col'>Admiton Date: </th><td>".$qurry['Admition Date']."</td></tr>";
                          echo "<tr><th scope='col'>Allergies</th><th scope='col'>Background</th></tr>";
                          echo " <tr><td> ".$qurry['Allergies']."</td><td> ".$qurry['Background']."</td></tr>";
                          echo " <tr><th scope='col'>Height</th><th scope='col'>Weight</th></tr>";
                          echo " <tr><td> ".$qurry['Height']."</td> <td> ".$qurry['Weight']."</td></tr>";
                          echo "<tr><th scope='col'>Patient Medicins</th><th scope='col'>Comment</th></tr>";
                          echo " <tr><td> ".$qurry['Patient Meds']."</td><td> ".$qurry['Comment']."</td>"; 
                        }

                    ?>
          
       </table>
        </div>
        <div class="beebz">
    <form action="" method="POST">

      <div class="form-group">
                <label for="Allergie">Allergies</label> 
                <input id="Allergie" type=text class="form-control" name="Allergies_val" value= "<?php if(isset($Allergies)){echo $Allergies;}?>">
              </div>

              <div class="form-group">
                <label for="back">Background</label> 
                <input id="back" type=text class="form-control" name="Background_val" value= "<?php if(isset($Background)){echo $Background;}?>">
              </div>

              <div class="form-group">
                <label for="meds">Patient's Meds</label> 
                <input id="meds" type=text class="form-control" name="Meds_val" value= "<?php if(isset($Meds)){echo $Meds;}?>">
              </div>

              <div class="form-group">
                <label for="weight">Weight</label> 
                <input id="weight" type=number class="form-control" name="Weight_val" value= "<?php if(isset($Weight)){echo $Weight;}?>">
              </div>

              <div class="form-group">
                <label for="com">Comment</label> 
                <textarea cols="40" rows="5" id="com" type=text class="form-control" name="Comment_val" value= "<?php if(isset($Comment)){echo $Comment;}?>"></textarea>
                <button class="btn btn-primary btn-lg" type="submit" style="margin-top: 3%"> Edit </button> 
              </div>
      
    </form>
  </div>
<a href='patient.php'> <button class='btn btn-primary btn-lg'>Return to Main Patient Data</button></a>
<a href='logout.php'> <button class='btn btn-primary btn-lg'> LOG OUT </button></a>

</body>
</html>