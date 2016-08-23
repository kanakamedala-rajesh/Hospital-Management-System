<?php
$menu =0;
$det = 0;
if(isset($_GET['menu']))
$menu=$_GET['menu'];

?>
<div id="topbar">
  <div class="wrapper">
    <div id="topnav">
      <ul>
        <li <?php if($menu== 0) { echo  "class='active'"; } ?>><a href="index.php">Home</a></li>
        <li <?php if($menu== 1) { echo  "class='active'"; } ?>><a href="appointment.php?menu=1">Book an Appointment</a></li>
		<li <?php if($menu== 2) { echo  "class='active'"; } ?>><a href="patientaccount.php?menu=2">Patientlogin</a></li>
        <!-- <li ><a href="/admin/index.php" target="_blank">Admin Section</a></li> -->
      </ul>
    </div>
  </div>
</div>
 
<div class="fluid_container" style="margin-top:-30px;" >
        <div class="camera_wrap camera_azure_skin" style="margin-top:30px;" id="camera_random">
<?php
$slides = array(
            '<div data-thumb="images/slides/thumbs/1.jpg" data-src="images/slides/1.jpg">
                <div class="camera_caption fadeFromBottom">
                    This is a Caption for Image1
                </div>
            </div>',
            '<div data-thumb="images/slides/thumbs/2.jpg" data-src="images/slides/2.jpg">
                <div class="camera_caption fadeFromBottom">
                    This is a Caption for Image2
                </div>
            </div>',
            '<div data-thumb="images/slides/thumbs/3.jpg" data-src="images/slides/3.jpg">
                <div class="camera_caption fadeFromBottom">
                    This is a Caption for Image3
                </div>
            </div>',
            '<div data-thumb="images/slides/thumbs/4.jpg" data-src="images/slides/4.jpg">
                <div class="camera_caption fadeFromBottom">
                    This is a Caption for Image4
                </div>
            </div>',
            '<div data-thumb="images/slides/thumbs/5.jpg" data-src="images/slides/5.jpg">
                <div class="camera_caption fadeFromBottom">
                    This is a Caption for Image5
                </div>
            </div>',
            '<div data-thumb="images/slides/thumbs/6.jpg" data-src="images/slides/6.jpg">
                <div class="camera_caption fadeFromBottom">
                    This is a Caption for Image6
                </div>
            </div>',
            '<div data-thumb="images/slides/thumbs/7.jpg" data-src="images/slides/7.jpg">
                <div class="camera_caption fadeFromBottom">
                   This is a Caption for Image7
                </div>
            </div>',
            '<div data-thumb="images/slides/thumbs/8.jpg" data-src="images/slides/8.jpg">
                <div class="camera_caption fadeFromBottom">
                    This is a Caption for Image8
                </div>
            </div>',
            '<div data-thumb="images/slides/thumbs/9.jpg" data-src="images/slides/9.jpg">
                <div class="camera_caption fadeFromBottom">
                    This is a Caption for Image9
                </div>
            </div>'
);
shuffle($slides);
foreach ($slides as $slides) {
    echo "$slides\n";
}
?>
        </div><!-- #camera_random -->

    </div><!-- .fluid_container -->
