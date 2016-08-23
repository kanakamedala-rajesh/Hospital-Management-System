
<head>
<style type="text/css">
.style1 {
	text-align: left;
}
.style2 {
	text-align: right;
}
</style>
</head>

<?php 
session_start();
$menu= 1;
include("dbconnection.php");
include("header.php");
include("validation/header.php"); 
include("functions/patient.php");

$loginvalidation="";
//CHECKS login button is submitted or not
if(isset($_POST["btnlogin"]))
{
	//patient Login funtion..
$loginvalidation =  loginfuntion($_POST["loginid"],$_POST["password"]);
}
?>
<!-- ####################################################################################################### -->
<?php include("menu.php"); 
?>

<!-- Patient Login Form####################################################################################################### -->
<div id="container" >
  <div class="wrapper" style="margin-top:-320px; padding-top:100px">
    <div id="content">
     <?php 
 if(!isset($_SESSION["id"]))
{
?>
<br/>
<br/>
      <h1>Patient Login</h1>
      <p>&nbsp;</p>
     <?php if($loginvalidation!=""){ ?>
      	<h1 style="color: #CC0000;">Invalid Login </h1>
      	<?php } ?>

     
      <form method="post" action="" id="formID" class="formular" >
      <p>
      <center>  <img src="images/patient.jpg" alt="" width="125" height="125" /></center></p>
     <p><font color="#FF0000"><?php echo $loginvalidation; ?></font></p>
      <p>Login ID :
  <input type="text" name="loginid"  id="textfield" class="validate[required] text-input" value="" size="22" />
      </p>
      <p>      
        Password : <input type="password" name="password" id="password"  class="validate[required] text-input" value="" size="22" />
      </p>
      
      <p class="style2" style="float:right"><a href="Patient_Register/index.php"> Register </a></p>
		<p class="style1"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    
        <input name="btnlogin" type="submit" id="submit" value="Login"  class="submit" style="width: 129px;float:left"/>

      </p>
      <p>&nbsp;

      </p>
      </form>
            <p>&nbsp;</p>
<!-- Patient Login Form Ends Here####################################################################################################### -->
 <?php
}
 ?>

<?php
if(isset($_SESSION["id"]))
{   
$idd= $_SESSION["id"];
?> 

<h2>Patient</h2>
<table summary="Summary Here" cellpadding="0" cellspacing="0">
        <thead>
          <tr>
          	<th>S.No</th>
            <th>Doctor Name</th>
            <th>Specialist in</th>
            <th>Appointment</th>
            <th>Status</th>

          </tr>
        </thead>
        <tbody>
          
            <?php 
		
			$result = mysql_query("SELECT DISTINCT a.adate, a.atime, a.status, d.member_type, d.first_name, d.surname1,d.collegiate_number
FROM patient_tbl AS p, appointment AS a, staff_tbl AS d
WHERE a.patid = p.id_patient
AND d.id_member = a.docid AND a.patid = '$idd' ORDER BY a.adate DESC");
$count = 0;
while($row = mysql_fetch_array($result))
  {
  $count++;
	echo "<tr style='color:black;border-bottom:1px gray solid'>";
	echo "<td>".$count."</td>";
    echo "<td> &nbsp;".$row['first_name']." ".$row['surname1']."</td>";
    echo "<td> &nbsp;".$row['collegiate_number']."</td>";
	
	if($row['status']=="accepted")
    echo "<td>".$row['adate']." ".$row['atime']."<span style='color:red;font-size:small'><br> Please be in time. </span></td>";
    else
    echo "<td><span style='font-size:x-small'>".$row['adate']." ".$row['atime']."</td>";
    
    if($row['status']=="accepted")
    echo "<td><span style='font-weight:bold; color:green'> ACCEPTED </span>";
    else
    echo "<td><span style=' font-size:x-small'>pending</td>";
    

	echo "</tr>";
  }
  ?>
           
        
          
        </tbody>
      </table>


<div id="respond"></div>

<?php
}
?> 

</div>
    <div id="column">
      <div class="subnav">
      <?php
		if(isset($_SESSION["id"]))
		{    
		?> 
        <h2>Patient Account</h2>
        <ul>
          <li><a href="logout.php">Logout</a></li>
        </ul>
       <?php
		}
		?> 
      </div>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->

<!-- ####################################################################################################### -->
<div id="copyright">
  <div class="wrapper">
    <br/>
  </div>
</div>
</body>
</html>
