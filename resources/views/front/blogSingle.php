<!doctype html>
<html class="no-js" lang="en">

<?php include('section/head.php'); ?>
<link rel="stylesheet" href="<?=ASSETS?>/css/jquery.sharebox.min.css">
<link rel="stylesheet" href="<?=ASSETS?>/css/jquery.sharebox.icons.css">

<!--Offcanvas menu area start-->
<?php include("section/offcanvas.php"); ?>
<!--Offcanvas menu area end-->
<!--header area start-->
<div class="new-mar-pad">
    <?php include("section/header.php"); ?>
</div>


<!--header area end-->
<div class="new-mar-pad">
    <?php include("section/blogSingle.php"); ?>
</div>
<!--footer area start-->
<?php include("section/footer.php"); ?>
<!--footer area end-->

<!-- modal area start-->
<modal :product="product">
</modal>
        <!-- modal area end-->
        <!-- Vuejs ended -->
        <?php include("section/script.php");?>
        <script src="<?=ASSETS?>/js/jquery.sharebox.min.js"></script>
        
        <script>
            jQuery(document).ready(function() {
                jQuery("#my-sharebox").sharebox();
            });
        </script>
        
        <script>
            var $share_button = document.getElementById('share_this');
            $share_button.addEventListener('click', function() {
                if (document.getElementById('share_options').style.display == 'block') {
                    document.getElementById('share_options').style.display = 'none'
                } else {
                    document.getElementById('share_options').style.display = 'block'
                }

            })
        </script>
        <?php include("section/foot.php"); ?>