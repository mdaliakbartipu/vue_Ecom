<div class="container">
<div class="text-center" style="height:300px;margin-top:150px">
<?php
if(isset($pageContent->content)){

    echo $pageContent->content;

} else {
    echo "<h3>".$slug." Page Under Construction"."</h3>";
}
?>
</div>
</div>
