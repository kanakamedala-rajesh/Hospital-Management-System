<?php 
session_start();
$menu= 1;
include("dbconnection.php");
include("header.php");


if(isset($_GET["docid"]))
{
	$_SESSION["docid"] = $_GET["docid"]; 
	$_SESSION["docname"] = $_GET["docname"];
	$_SESSION["sptype"] = $_GET["sptype"];
	header("Location: makeappoint.php");
}


include("validation/header.php"); 
include("functions/patient.php");
$loginvalidation = "";
//CHECKS login button is submitted or not
if(isset($_POST["btnlogin"]))
{
	//patient Login funtion..
$loginvalidation =  loginfuntion($_POST["loginid"],$_POST["password"]);
}
?>
<!-- ####################################################################################################### -->


<!-- Patient Login Form####################################################################################################### -->
<div id="container" style="margin-top:-20px">
  <div class="wrapper">
    <div id="content">
     <?php 
 if(isset($_SESSION["email"]))
{
	$enable ="true";
$dt= date('Y-m-d H:i:s');
//echo $dt;
 ?>
<form id="formID" class="formular" method="post" action="appointmenttime.php?dt=<?php echo $dt;?>">


     <div align="center"><strong>Make An Appointment</strong></div>

  <p>Patient ID
       <label for="textfield"></label>
    <input type="text" name="patid" id="patid" class="validate[required] text-input" value="<?php echo $_SESSION["id"]; ?>"/>

  Patient Name
  <input type="text" name="patname" id="textfield2" class="validate[required] text-input" value="<?php echo $_SESSION["patname"]; ?>"/>
  <label for="select"></label>
        
  Doctor Name  
  <input type="hidden" name="docid" id="docid" class="validate[required] text-input"  value="<?php echo $_SESSION["docid"]; ?>" />
  <input type="text" name="docname" id="textfield3" class="validate[required] text-input"  value="<?php echo $_SESSION["docname"]; ?>"/>
   Specialist Type : 
    <input type="text" name="sptype" id="textfield4" class="validate[required] text-input" value="<?php echo $_SESSION["sptype"];?>"/>
  
  <?php
  	$datetime = new DateTime('tomorrow');
$tom = $datetime->format('Y-m-d');
?>
    Appointment Date :
    <input type="date" name="date" id="date" min="<?php echo $tom; ?>" value="<?php echo $tom; ?>" required="required"/>
    Comment
    <label for="textarea"></label>
    <textarea name="comment" id="textarea" cols="45" rows="5"></textarea>
  </p><br/>
  
       

     <div align="center">
     <input type="submit" name="button" id="button" value="Make An Appointment" />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="button2" id="button2" value="Reset" />
      </div>
       </form>
<?php
}
else
{
?>
      <h1>Patient Login</h1>
      <p>&nbsp;</p>
     
      <form method="post" action="makeappoint.php" id="formID" class="formular" >
      <p>
      <center>  <img src="images/patient.jpg" alt="" width="125" height="125" /></center></p>
     <p><font color="#FF0000"><?php echo $loginvalidation; ?></font></p>
      <p>Login ID :
  <input type="text" name="loginid"  id="textfield" class="validate[required] text-input" value="" size="22" required/>
      </p>
      <p>      
        Password :         
        <input type="password" name="password" id="password"  class="validate[required] text-input" value="" size="22" required/>
      </p>
      
      <p> &nbsp; <br />    
        <input name="btnlogin" type="submit" id="submit" value="Login"  class="submit"/>

      </p>
      <p>&nbsp;

      </p>
      </form>
      
<!-- Patient Login Form Ends Here####################################################################################################### -->
 <?php
}
 ?>
      
<h2>&nbsp;</h2>
<div id="respond"></div>
    </div>
    <div id="column" style="float:left">
      <div class="subnav">
        <h2>Patient Account</h2>
        <ul>
        <li><a href="patientaccount.php">Patient Account</a></li>
		<li><a href="Patient_Register/index.php">Patient Registration</a></li>
          <li><a href="logout.php">Logout</a></li>
          </ul>
      </div>
      
    </div>

    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<!-- ####################################################################################################### -->
</body>
</html>
