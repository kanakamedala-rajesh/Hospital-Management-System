<?php
  /**
   * Controlling vars
   */
  $tab = "home";
  $nav = "app";

  function mailthings(){
// multiple recipients
$to  = 'ashinga48@gmail.com' . ', '; // note the comma
$to .= 'ashinga48@gmail.com';

// subject
$subject = 'Appointment Confirmation';

// message
$message = '
<html>
<head>
  <title>This is regarding the Acceptance of your appointment at HMS</title>
</head>
<body>
  <h1>Here are the birthdays upcoming in August!</h1>
  <table>
    <tr>
      <th style="color:red">Person</th><th>Day</th><th>Month</th><th>Year</th>
    </tr>
    <tr>
      <td>Joe</td><td>3rd</td><td>August</td><td>1970</td>
    </tr>
    <tr>
      <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
    </tr>
  </table>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To: Mary <ashinga48@gmail.com>, Kelly <ashinga48@gmail.com>' . "\r\n";
$headers .= 'From: HMS <ashinga48@gmail.com>' . "\r\n";
$headers .= 'Cc: ashinga48@gmail.com' . "\r\n";
$headers .= 'Bcc: ashinga48@gmail.com' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);

  }

  require_once("../config/environment.php");
  if (isset($_SESSION['auth']['token']))
  {
    /**
     * Checking permissions
     */
    include_once("../auth/login_check.php");
    loginCheck();
  }

  $licenseFile = (is_file("../locale/" . OPEN_LANGUAGE . "/copying.txt"))
    ? "../locale/" . OPEN_LANGUAGE . "/copying.txt"
    : "../LICENSE";

  /**
   * Show page
   */
  //$title = _("License");
  require_once("../layout/header.php");

  /**
   * Breadcrumb
   */
  $links = array(
    _("Home") => "../home/index.php",
    $title => ""
  );
  echo HTML::breadcrumb($links);
  unset($links);

 
    $con = mysql_connect("localhost","root","kesanam");
      mysql_select_db("openclinic", $con);
      
      
      if(isset($GET['upd']) || isset($GET['rej']))
      {
      		if(isset($GET['upd']))
      		{
	      ?>
	      	<h1 style="color: #009933">Update Success</h1>
	      <?php
	      	}
	      	if(isset($GET['rej']))
      		{
	      ?>
	      	<h1 style="color: #CC0000">Appointment Cancelled</h1>
	      <?php
	      	}

      }
      
      if(!isset($_POST['aid']) && !isset($_POST['submit1']))
      {
      
?>
  <table summary="Summary Here" cellpadding="0" cellspacing="0">
        <thead>
          <tr>
          	<th>S.No</th>
            <th>Patient Name</th>
            <th>Appointment Date</th>
            <th>Appointment Time</th>
            <th>Comment</th>
            <th>Confirm / Reject</th>
          </tr>
        </thead>
        <tbody>
          
            <?php
           //print_r($_SESSION); 
           	//echo $_SESSION['auth']['member_user'];
			$datetime = date('Y-m-d');
			//echo $datetime;
			$doc_id = $_SESSION['auth']['member_user'];
			//echo $doc_id;
						
			$result = mysql_query("SELECT DISTINCT a.adate, a.atime, a.status, p.first_name, p.surname1,a.comment,a.appointid
FROM patient_tbl AS p, appointment AS a, staff_tbl AS d
WHERE a.adate >  '$datetime' AND a.patid = p.id_patient
AND a.docid =  '$doc_id'
ORDER BY a.adate DESC ");
$count = 0;
while($row = mysql_fetch_array($result))
  {
  $count++;
	echo "<tr style='color:black;border-bottom:1px gray solid'>";
	echo "<td>".$count."</td>";
    echo "<td> &nbsp;".$row['first_name']." ".$row['surname1']."</td>";
    echo "<td> &nbsp;".$row['adate']."</td>";
    echo "<td> &nbsp;".$row['atime']."</td>";
	echo "<td> &nbsp;".$row['comment']."</td>";
	$aid = $row['appointid'];
	
	if($row['status']=="accepted")
    echo "<td><span style='color:green;font-size:small;font-weight:bold'> Accepted </span>
    <br/><form action='appointment.php' method='post' "."onsubmit='return confirm(\"Are you sure you want to Cancel Appointment?\")'".">
    <input type='hidden' value='$aid' name='aid' id='aid' />
    <input type='hidden' value='rej' name='rej' id='rej' />
    <input type='submit' name='submit1' style='background:red' value='Cancel??'/>
    </form>";
    else
    echo "<td>
    <form action='appointment.php' method='post' "."onsubmit='return confirm(\"Are you sure you want to submit\")'".">
    <input type='hidden' value='$aid' name='aid' id='aid' />
    <input type='submit' name='submit1' value='Confirm'/>
    </form>
    </td>";
    

	echo "</tr>";
  }
  
  

  ?>
           
        
          
        </tbody>
      </table>
      
<?php
	}
	//table end 
	
	if(isset($_POST['aid']) && isset($_POST['submit1']) && !isset($_POST['rej']))
	{
		$aid = $_POST['aid'];
		$ssql = "UPDATE  appointment SET status =  'accepted' WHERE appointid ='$aid'";
		echo $ssql;
		$r = mysql_query($ssql);
		if($r)
		{
			?>
			<script type="text/javascript">window.location = "appointment.php?upd=1";</script>
			<?php
		}
	}
	
	if(isset($_POST['aid']) && isset($_POST['submit1']) && isset($_POST['rej']))
	{
		$aid = $_POST['aid'];
		$ssql = "UPDATE  appointment SET status =  'Pending' WHERE appointid ='$aid'";
		echo $ssql;
		$r = mysql_query($ssql);
		if($r)
		{
			?>
			<script type="text/javascript">window.location = "appointment.php?rej=1";</script>
			<?php
		}
	}

	mailthings();
?>      

<?php
  //echo HTML::tag('pre', $license);

  require_once("../layout/footer.php");
?>