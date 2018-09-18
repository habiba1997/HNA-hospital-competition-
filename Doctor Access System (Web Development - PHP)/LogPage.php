<?php

 session_start();

 if($_SERVER['REQUEST_METHOD']=="POST"){

 require 'mySQLConnection.php';

 $doc_pass="doctor";
 $nurse_pass="nurse";

 $id=check($_POST['login']);
 $pass=$_POST['pass'];

 $check="0";

 
$selectt=$data->prepare("SELECT * FROM `InPatients`");
$selectt->execute();
 
    foreach ($selectt as $val) 
    {
        if( $val["ID"]== $id)
        {
            $_SESSION["user"]=$val['Full Name'];
            $_SESSION["id"]=$val["ID"];
            $check ="1";

            if($pass == $doc_pass)

                { 
                 $_SESSION["entry"]="doctor";
                 header("Location:patient.php");
                }
            else if($pass == $nurse_pass)
                {
                 header("Location:patient.php");
                }

            header("Location:patient.php");
        } 
    }

$select=$data->prepare("SELECT * FROM `Doctors`");
$select->execute();
 
    foreach ($select as $val) 
    {
        if( $val["Usernumber"]== $id && $pass == $doc_pass)
        {
         $_SESSION["entry"]="doctor";
         $_SESSION["user"]=$val['Physician Name'];
         $check ="1";
         header("Location:doctor.php");

        }
       
    }

if ($check=="0")
{
echo "<h1 class='primary'>"."Error in User Information"."<br>"."Re-Enter Correct ID and Password "."</h1>";
}

}

function check($string)
    {
        $string=htmlspecialchars($string);
        return $string;
    } 
?>
<!DOCTYPE html>
<html>
<head>
    <script>
            
            function doctorClick()
            {
                
                document.getElementById("label_patient").innerHTML = "Doctor's ID";
                document.getElementById("doc").style.backgroundColor = "#62b4d9";
                document.getElementById("nur").style.backgroundColor = "#f5f5f5";
                document.getElementById("pat").style.backgroundColor = "#f5f5f5";


               

            }
            function nurseClick()
            {
                
                document.getElementById("label_patient").innerHTML = "Nurse's ID";
                document.getElementById("nur").style.backgroundColor = "#62b4d9";
                document.getElementById("doc").style.backgroundColor = "#f5f5f5";
                document.getElementById("pat").style.backgroundColor = "#f5f5f5";



            }
            function patientClick()
            {
                
                document.getElementById("label_patient").innerHTML = "Patient's ID";
                document.getElementById("pat").style.backgroundColor = "#62b4d9";
                document.getElementById("doc").style.backgroundColor = "#f5f5f5";
                document.getElementById("nur").style.backgroundColor = "#f5f5f5";



            }
        
    

          
    </script> 
   
    
    <title>Login Page</title>
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
        
    
        body{ background-image: url(7.jpg); background-size: cover ; font-family: 'Open Sans', sans-serif;}
        h1 {margin: 2% 2% ; padding: inherit ; background-color:rgba(91,192,222,0.7) ; border-radius: 10%;  color: #f5f5f5  } 
        button {opacity: 0.7; display: inline-block; margin-left: 1% ; margin-right: 1%}
        button img { height: 70px}
        form{ position: absolute; left: 25%; top: 25%; width: 50%;  padding: 2% 3%; background-color: rgba(255,255,255, 0.5); border-radius:5%;color: #145b6c}
        form input{ height: 40px}
    
        
        
    </style>
   
</head>
    <body>

        <h1 class="text-center" > Intensive Care Unit Information  </h1><br>
        
        <form action="" method="POST" class="signIn">
           <div class="text-center">
            <button type="button" class="btn btn-light" id="doc" onclick="doctorClick()"> <img src="Doctor.png"  ></button>
            <button type="button" class="btn btn-light" id="nur" onclick="nurseClick()" ><img src="nurse.png"  ></button>
            <button type="button" class="btn btn-light" id="pat" onclick="patientClick()" ><img src="patient.png"  ></button>
            </div> 
  
              <div class="form-group">
                <h5 for="user" id="label_patient">Patient ID</h5>
                <input type="patient" class="form-control" id="user" placeholder="Enter ID" name="login">
              </div>
            
              <div class="form-group">
                <label for="pass">Doctor's Password</label>
                <input type="password" class="form-control" id="pass" placeholder="Enter Password" name="pass">
              </div>
            
            <button type="submit" class="btn btn-primary btn-lg" >Sign In</button> <br>
        </form>


        
        
       
        
        
        
    </body>
</html>