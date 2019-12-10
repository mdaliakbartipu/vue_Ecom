<!doctype html>
<html class="no-js" lang="en">

    <?php include('section/head.php');?>
<div id="app">
   <!--Offcanvas menu area start-->
    <?php include("section/offcanvas.php");?>
    <!--Offcanvas menu area end-->
    <!--header area start--> 
    <div class="new-mar-pad">
     <?php include("section/header.php");?>
    </div>
    
	<!--header area end-->
    <div class="new-mar-pad">
    <!--slider area start-->
    <?php include("section/slider.php");?>
    </div>

    <!--slider area end-->
    <div class="new-mar-pad">
    <!--shipping area start-->
    <?php include("section/shippingArea.php");?>
    <!--shipping area end-->
    </div>

<!--Categories product area start-->
    <?php include("section/catProduct.php");?>

    <br>
    <div class="new-mar-pad">
    <!--home section bg area start-->
    <?php include("section/homeSection.php");?>
    <!--home section bg area end-->
    </div>

    <?php include("section/promotions.php");?>

    <?php include("section/blogArea.php");?>
    <!--footer area start-->
    <?php include("section/footer.php");?>
    <!--footer area end-->

    <!-- modal area start-->
    <?php include("section/modelArea.php");?>
    <!-- modal area end-->
 

    </div> 
    <!-- Vuejs ended -->
    <?php include("section/script.php");?>
    
<?php include("section/foot.php");?>
