<!DOCTYPE html>
<html> 
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" > 
    <title>Hospital Management System</title> 
    <meta name="description" content="Hospital Management System is a website for the hospital"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <script>
  $(function() {
    $( "#accordion" ).accordion({
      heightStyle: "content"
    });
  });
  </script></head>
<body>
<?php
include("header.php");
?>
<?php
include("menu.php");
include("dbconnection.php");
?>

 
 <!-- ####################################################################################################### -->
<!-- ####################################################################################################### -->
<div id="container">
<div class="wrapper">
    <?php
    $result = mysql_query("SELECT * FROM doctor");
	while($row = mysql_fetch_array($result))
{
?>


<?php
}
?>
<br class="clear" />
  </div>
</div>

</body> 
</html>