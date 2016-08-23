<?php
if(!isset($_SESSION)){
    session_start();
}

// Login to patient account
function loginfuntion($loginid,$password)
{
mysql_select_db("openclinic");

	//LOGIN QUERY
$resultlogin = mysql_query("SELECT * FROM patient_tbl WHERE nif ='$loginid' AND birth_date='$password' ");

// LOGIN VALIDATON
	if(mysql_num_rows($resultlogin) == 1)
	{
 	$_SESSION["email"] =$loginid;
	$row = mysql_fetch_array($resultlogin);
	$_SESSION["id"] =$row['id_patient'];
	$_SESSION["patname"] =  $row['first_name']." ".$row['surname1'] ;
	//	$_SESSION["usertype"] = "PATIENT";
	}
	else
	{
	$in= "Invalid Login ID or invalid password. ";
	return $in;
	}
}

?>
