    <div class="categories_product_area">
       <div class="container">
            <div class="categories_product_inner">

                <h3 class="text-center" style="font-size: 24px;  font-weight: 600;letter-spacing: .2px;    margin-bottom: .5rem;">FROM GALLERY</h3>

                  <p class="text-center time-to mb-10">Time to shop special</p>
<?php foreach($cats as $cat): 
    if($cat->position == '0') continue; ?>

                <div class="single_categories_product" style="background: url('<?=ASSETS?>/.uploads/category/<?=$cat->image?>'); background-size:cover;">
                    <div class="categories_product_content text-center">
                        <h4 class="text-center"><?=$cat->name?></h4>
                        <div class="hover_content">
                            <ul class="mt-4 mb-4">
                                <?php foreach($subCats[$cat->id] as $subcat): ?>
                                    <li><a class="text-la" href="/subcat/<?=$subcat->id?>"><?=$subcat->name?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <a href="/cat/<?=$cat->id?>" type="button" class="shopnow btn btn-primary" style="color:black">Shop Now</a>
                    </div>
                </div>
                
<?php endforeach; ?>
            </div>
        </div>

    </div>
