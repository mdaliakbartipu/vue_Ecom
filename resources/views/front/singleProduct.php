<!doctype html>
<html class="no-js" lang="en">
<?php include('section/head.php');?>

<body>

   <!--Offcanvas menu area start-->
    <?php include("section/offcanvas.php");?>
    <!--Offcanvas menu area end-->
    <!--header area start-->
    
    <div class="new-mar-pad">
        <?php include("section/header.php");?>
    </div>
    <!--header area end-->
    <!--Product section bg area start-->  
    <div class="new-mar-pad">
     <?php include("section/productSingleViewSection.php");?>
    </div>
 
    <!--Product section bg area end-->


    <!--product area start-->
    <div class="container">
    <?php include("section/relatedProducts.php"); ?>
    </div>

    <!--product area end-->
    <!--footer area start-->
    <?php include("section/footer.php");?>
    <!--footer area end-->


    <?php include("section/script.php");?>
    <?php include("section/foot.php");?>
