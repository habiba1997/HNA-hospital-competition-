<?php
 session_start();
 echo "<h1 style='color:#2275b0' class='beebz'>".$_SESSION["user"]."</h1>";

  require 'mySQLConnection.php';


 if(isset($_GET["id"])|| isset($_SESSION["id"]))
        {
            
           if(isset($_GET["id"]))
           {
           		$id=$_GET["id"];
           		$selecttt=$data ->prepare ("SELECT * FROM `InPatients` WHERE ID=$id");
           		$selecttt->execute();
           		foreach ($selecttt as $key ) {
					$_SESSION["user"]=   $key["Full Name"];
				}
           }
           else if(isset($_SESSION["id"]))
           {
           		$id=$_SESSION["id"];
           }

           	$selectPat= $data ->prepare ("SELECT `ID`, `ID Card`, `Full Name`, `Main Physician`, `Family Contact` FROM `InPatients` WHERE ID=:id");
            $selectPat->execute(array(":id" => $id));
            

            $selectIcu= $data ->prepare ("SELECT `ID`, `Admition Date`, `Allergies`, `Background`, `Height`, `Weight`, `Patient Meds`, `Comment` FROM `ICU Patient Background` WHERE ID=:id");

            $selectIcu->execute(array(":id" => $id));
   
          	$selectDPN= $data ->prepare ("SELECT `ID`, `Date`, `Activity Status`, `Mental Status`, `GI Status`, `Respiratory Status`,`Heart Rate`, `Blood Sugar`, `Daily Weight`, `Notes` FROM `ICU Daily Progress Notes` WHERE ID=:id");

            $selectDPN->execute(array(":id" => $id));
              

        }



 if(isset($_GET["action"])== "erase" && isset($_GET["id"]))
        {
             $delete = $data->prepare("DELETE FROM `ICU Patient Background` WHERE ID=:id");
                
                if ($delete->execute(array(":id" => $_GET['id']))) 
                {
                    echo "<h1>"."The data of id " . $_GET['id'] . " has been removed </h1>";
                }
                else 
                {
                    echo "<h1>"."Deletion  error </h1>";
                }
        }     

?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <style>
        body{ background-image: url(22.jpg);  font-family: 'Open Sans', sans-serif; background-size: cover; color: #2275b0; text-align: center;}
        .beebz{background-color: rgba(255,255,255,0.7); border-radius: 1%;; margin: 2% 3%; padding: 3% 3%; width: 94%; }
        .DPN{margin: 0% 1%;  width: 28%; display: inline-block; }
        table,.table-bordered{ border:2px solid #2275b0;}
    
       
    </style>
</head>
<body>  <div class="beebz">
        <table class="table table-bordered table-hover">
        	 <thead>
                  <tr>
                    <th scope="col">ID Card</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Main Physician</th>
                    <th scope="col">Family Contact</th>
                    
                  </tr>
            </thead>
            <tbody>    

                    <?php 
                    
                        foreach ($selectPat as $qury) 
                        {
                          echo "<tr><th>".$qury['ID Card']."</th>";
                          echo "<td> ".$qury['Full Name']."</td>";
                          echo " <td> ".$qury['Main Physician']."</td>";
                          echo " <td> ".$qury['Family Contact']."</td></tr>";
                        }

                    ?>
            </tbody>
       </table>
   </div>

   	   <div class="beebz"  >
   	   <h2 > Patient's Background Information </h2>
       <table class="table table-bordered table-hover" >
         
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
                      if(isset($_SESSION['entry'])) 
		     			{
		     			  echo "<tr><th scope='col'>Edit</th><th scope='col'>Delete</th></tr>";
		     			  echo "<tr><td> <a href='edit.php?action=edit&id=".$qurry['ID']."'><i class='far fa-edit'></i></a></td>";
		                  echo "<td> <a href='patient.php?action=erase&id=".$qurry['ID']."'><i class='fas fa-trash'></i></a></td></tr>";

		     			}
                          
                          
                        }

                    ?>
          
       </table>
        </div>



<div class="beebz">
			       
<h2 > Patient's Daily Progress Notes </h2>
			         
			  <?php 
			      
			   foreach ($selectDPN as $val) 
			   {
			 echo " <div class='DPN'> <table class='table table-hover table-bordered'>
			 <tr>
			 <th scope='col'>Date: </th>
			 <td>".$val['Date']."</td>
			 </tr>";
			echo "<tr>
			<th scope='col'>Activity  </th>
      <td>".$val['Activity Status']."</td></tr>";
			echo " <tr>
      <th scope='col'>Mental Status:</th>
			<td> ".$val['Mental Status']."</td></tr>";
			echo "<tr>
			<th scope='col'>GI Status:</th>
      <td> ".$val['GI Status']."</td>
			</tr>";
			echo "<tr>
      <th scope='col'>Respiratory Status:</th>
			<td> ".$val['Respiratory Status']."</td>
			</tr>";
			echo "<tr>
      <th scope='col'>Blood Sugar:</th>
      <td> ".$val['Blood Sugar']."</td>
			</tr>";
			echo " <tr>
     <th scope='col'>Heart Rate:</th>
			<td>".$val['Heart Rate']."</td>
			</tr>";
			echo "<tr>
			    <th scope='col'>Daily Weight: </th>
			    <td>".$val['Daily Weight']."</td>
			    </tr>";
			    echo " <tr>
			    <th scope='col'>Notes: </th>
			    <td>".$val['Notes']."</td></tr></table></div>";
			                          
				}

			     ?>
			          
 </div>
     <?php if(isset($_SESSION['entry'])) 
     			{
     				echo "<a href='DPN.php?id=$id'> <button class='btn btn-primary btn-lg text-center' style='width:20%; margin:3% 40%'> New Daily Progress Note </button></a>";
     			} 
    ?>

    <a href='logout.php'> <button class='btn btn-primary btn-lg'style='float: right;margin: 0% 5% 5% 5%'> LOG OUT </button></a>
    </body>
</html>
