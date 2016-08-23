<?php 
session_start();
$menu= 1;
$patid = $_SESSION['id'];
$docid = $_SESSION['docid'];
if(isset($_POST['date']))
{
$_SESSION['comment'] = $_POST['comment'];
$_SESSION['adate'] = $_POST['date'];
$adate = $_SESSION['adate'];
$comment = $_SESSION['comment'];
}
else
{
$adate = $_SESSION['adate'];
$comment = $_SESSION['comment'];
}


$dt = $_GET['dt'];
//echo $patid."@@".$adate."@@".$docid."@@".$comment."@@".$dt;

include("header.php");
include("dbconnection.php");

if(!isset($_SESSION["docid"]) || !isset($_SESSION['id']))
{
	header("Location: appointment.php");
}
$is_already = 0;
if(isset($_POST["btnapp"]) && isset($_POST['radio']))
{
//echo $patid.$adate.$docid.$comment.$dt;

$ssql = "SELECT appointid FROM  `appointment` WHERE  `patid` ='$patid' AND  `adate` =  '$adate' AND  `docid` ='$docid'";
$seeres= mysql_query($ssql);
$already_exist = mysql_num_rows($seeres);


if($already_exist>0)
$is_already = 1;
else
$is_already = 0;

if(!$is_already)
	{
	$tt = $_POST['radio'];
	$sql = "INSERT INTO `appointment` VALUES (NULL, '$patid', CURRENT_TIMESTAMP, '$tt', '$adate', '$docid','Pending','$comment')";
	//echo $sql;
	$see = mysql_query($sql);
		if (!$see)
		{
		die('Error: ' . mysql_error());
		}
	}
}
include("menu.php");
?>
<div id="container">
  <div class="wrapper">
    <div id="content">
    	<?php if(isset($_POST["btnapp"]) && isset($see)  ) { if($see){ ?>
      <h1 style="color: #009933;"> Appointment Booked. :) </h1>
      <a href="patientaccount.php"  style="font-size:x-large"> Click here </a>
      	<?php }else { ?>
      	<h1 style="color: #CC0000;"> Appointment Not Booked. Already there is an Appointment on this date.</h1>
      	<?php }} ?>
      	
      	<?php if(isset($_POST["btnapp"]) && !isset($_POST['radio'])){ ?>
      	<h1 style="color: #CC0000;">Please select time of Appointment </h1>
      	<?php } ?>
      	
      	
      	<?php
      		if($is_already)
				{
				?>
				<h1 style="color: #CC0000;">You've already booked for appointment </h1>
				<a href="patientaccount.php"  style="font-size:x-large"> Click here </a>
				<?php
				}
      	?>
      	
      	<?php if(!isset($_POST["btnapp"]) || (isset($_POST["btnapp"])&& !isset($_POST["radio"]) )) { ?>
      <h3>Appointment Time</h3>
      <form id="form1" name="btnapp" method="post" action="">
      <table width="734" border="1">
  <tr>
    <th width="253" align="center"><strong>Morning</strong></th>
    <th width="186" align="center"><strong>Afternoon</strong></th>
    <th width="273" align="center"><strong>Evening</strong></th>
   </tr>
  <tr>
    <th align="center">
    <input type="radio" name="radio" id="radio" value="09:00:00" />
      09.00

        AM
</th>
    <th align="center"><input type="radio" name="radio" id="09:15:00" value="09:15:00" />
      12.00 PM</th>
    <th align="center"><input type="radio" name="radio" id="09:15:00" value="09:30:00" />
      04.00 PM</th>
    </tr>
  <tr>
    <th align="center"><input type="radio" name="radio" id="09:45:00" value="09:45:00" />
09.30

        <label for="radio2"></label>
AM</th>
    <th align="center"><input type="radio" name="radio" id="10:00:00" value="10:00:00" />
      12.15 PM</th>
    <th align="center"><input type="radio" name="radio" id="10:15:00" value="10:15:00" />
      04.15 PM</th>
    </tr>
  <tr>
    <th align="center"><input type="radio" name="radio" id="10:30:00" value="10:30:00" />
09.45

        <label for="radio3"></label>
AM</th>
    <th align="center"><input type="radio" name="radio" id="10:45:00" value="10:45:00" />
      12.30 PM</th>
    <th align="center"><input type="radio" name="radio" id="11:00:00" value="11:00:00" />
      04.30 PM</th>
    </tr>
  <tr>
    <th align="center"><input type="radio" name="radio" id="11:15:00" value="11:15:00" />
      10.00

        <label for="radio4"></label>
AM</th>
    <th align="center"><input type="radio" name="radio" id="11:30:00" value="11:30:00" />
      12.45 PM</th>
    <th align="center"><input type="radio" name="radio" id="11:45:00" value="11:45:00" />
      04.45 PM</th>
    </tr>
  <tr>
    <th align="center"><input type="radio" name="radio" id="12:00:00" value="12:00:00" />
      10.15

        <label for="radio5"></label>
AM</th>
    <th align="center"><input type="radio" name="radio" id="12:15:00" value="12:15:00" />
      01.00 PM</th>
    <th align="center"><input type="radio" name="radio" id="12:30:00" value="12:30:00" />
      05.00 PM</th>
    </tr>
  <tr>
    <th align="center"><input type="radio" name="radio" id="radio6" value="12:45:00" />
      10.30

        <label for="radio6"></label>
AM</th>
    <th align="center"><input type="radio" name="radio" id="radio18" value="01:00:00" />
      01.15 PM</th>
    <th align="center"><input type="radio" name="radio" id="radio18" value="01:15:00" />
      05.15 PM</th>
    </tr>
  <tr>
    <th align="center"><input type="radio" name="radio" id="radio7" value="11:00:00" /> 
      10.45


        <label for="radio7"></label>
AM</th>
    <th align="center"><input type="radio" name="radio" id="radio19" value="radio" />
      01.30 PM</th>
    <th align="center"><input type="radio" name="radio" id="radio19" value="radio" />
      05.30 PM</th>
    </tr>
  <tr>
    <th align="center"><input type="radio" name="radio" id="radio8" value="radio" />
11.00 

        <label for="radio8"></label>
AM</th>
    <th align="center"><input type="radio" name="radio" id="radio20" value="radio" />
      01.45 PM</th>
    <th align="center"><input type="radio" name="radio" id="radio20" value="radio" />
      05.45 PM</th>
    </tr>
  <tr>
    <th align="center"><input type="radio" name="radio" id="radio9" value="radio" />
11.15 

        <label for="radio9"></label>
AM</th>
    <th align="center"><input type="radio" name="radio" id="radio21" value="radio" />
      02.00 PM</th>
    <th align="center"><input type="radio" name="radio" id="radio21" value="radio" />
      06.00 PM</th>
    </tr>
  <tr>
    <th align="center"><input type="radio" name="radio" id="radio10" value="radio" /> 
      11.30


        <label for="radio10"></label>
AM</th>
    <th align="center"><input type="radio" name="radio" id="radio22" value="radio" />
      02.15 PM</th>
    <th align="center"><input type="radio" name="radio" id="radio22" value="radio" />
      06.15 PM</th>
    </tr>
  <tr>
    <th align="center"><input type="radio" name="radio" id="radio11" value="radio" />
11.45 

        <label for="radio11"></label>
AM</th>
    <th align="center"><input type="radio" name="radio" id="radio23" value="radio" />
      02.30 PM</th>
    <th align="center"><input type="radio" name="radio" id="radio23" value="radio" />
      06.30 PM</th>
    </tr>
  <tr>
    <th align="center">&nbsp;</th>
    <th align="center"><input type="radio" name="radio" id="radio24" value="radio" />
      02.45 PM</th>
    <th align="center"><input type="radio" name="radio" id="radio24" value="radio" />
    06.45 PM</th>
    </tr>
  <tr>
    <th align="center">&nbsp;</th>
    <th align="center"><input type="radio" name="radio" id="radio25" value="radio" />
      03.00 PM</th>
    <th align="center"><input type="radio" name="radio" id="radio25" value="radio" />
      07.00 PM</th>
    </tr>
  <tr>
    <th align="center">&nbsp;</th>
    <th align="center"><input type="radio" name="radio" id="radio26" value="radio" />
      03.15 PM</th>
    <th align="center"><input type="radio" name="radio" id="radio26" value="radio" />
      07.15 PM</th>
    </tr>
  <tr>
    <th align="center">&nbsp;</th>
    <th align="center"><input type="radio" name="radio" id="radio27" value="radio" />
      03.30PM</th>
    <th align="center"><input type="radio" name="radio" id="radio27" value="radio" />
      07.30PM</th>
    </tr>
  <tr>
    <th align="center">&nbsp;</th>
    <th align="center"><input type="radio" name="radio" id="radio28" value="radio" />
      03.45 PM</th>
    <th align="center"><input type="radio" name="radio" id="radio16" value="radio" />
07.45PM</th>
    </tr>
  <tr>
    <th colspan="3" align="center"><input type="submit" name="btnapp" id="btnapp" value="Click Here to Book an Appointment" /></th>
    </tr>
      </table>
    </form>
    
    <?php } ?>
    
      <h2>&nbsp;</h2>
</div>
    <div id="column">
      <div class="subnav">
        <h2>Patient Account</h2>
        <ul>
          <ul>
        <li><a href="patientaccount.php">
		  patientaccount</a></li>
          <li><a href="logout.php">
		  Logout</a></li>
          </ul>
      </div>
      
    </div>
    <br class="clear" />
  </div>
</div>
</body>
</html>
