<?php 
session_start();
$menu= 1;
include("header.php");
include("dbconnection.php");
/*
if(isset($_GET["docid"]))
{
	$_SESSION["docid"] = $_GET["docid"]; 
	$_SESSION["docname"] = $_GET["docname"];
	$_SESSION["doctype"] = $_GET["sptype"];
	header("Location: makeappoint.php");
}
*/
?>
<!-- ####################################################################################################### -->
<?php include("menu.php"); ?>
<div id="container">
  <div class="wrapper">
    <div id="content">
      <h1>Appointment </h1>
      <table summary="Summary Here" cellpadding="0" cellspacing="0">
        <thead>
          <tr>
            <th>Doctor Name</th>
            <th>Specialist in</th>
            <th>Appointment</th>
          </tr>
        </thead>
        <tbody>
          
            <?php 
		
			$result = mysql_query("SELECT id_member,first_name,surname1,collegiate_number FROM  `staff_tbl` WHERE  `member_type` =  'Doctor'");
while($row = mysql_fetch_array($result))
  {
	echo "<tr>";
    echo "<td> &nbsp;".$row['first_name']." ".$row['surname1']."</td>";
    echo "<td> &nbsp;".$row['collegiate_number']."</td>";
	
    echo "<td><a href='makeappoint.php?docid=$row[id_member]&docname=$row[first_name] $row[surname1]&sptype=$row[collegiate_number]'>Make an Appointment</a></td>";
	echo "</tr>";
  }
  ?>
           
        
          
        </tbody>
      </table>
      <h2>&nbsp;</h2>
</div>
    <div id="column">
     <!-- <div class="subnav">
        <h2>Patient Account</h2>
        <ul>
          <li><a href="patientaccount.php">Patient Login</a> </li>
        </ul>
      </div>-->
      <div class="holder"></div>
    </div>
    <br class="clear" />
  </div>
</div>
