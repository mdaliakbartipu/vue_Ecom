<?php 
$_GET['thisPage'] = 'Checkout' ;
include("partials/breadcumb.php"); ?>

<?php
// $cartProducts;
?>
<cart>
<cart_table>
<?php foreach($cartProducts as $c):?>
<cart_row 
name="<?=$c['name']?>"
price="<?=$c['price']?>"
size="<?=$c['size']?>"
color="<?=$c['color']?>"
variant_id="<?=$c['variant_id']?>"
qty="<?=$c['qty']?>"
image="<?=$c['image']?>"
> </cart_row>
<?php endforeach ?>
</cart_table>
</cart>