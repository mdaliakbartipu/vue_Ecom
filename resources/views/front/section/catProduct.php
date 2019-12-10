    <div class="categories_product_area">
       <div class="container">
            <div class="categories_product_inner">

                <h3 class="text-center" style="font-size: 24px;  font-weight: 600;letter-spacing: .2px;    margin-bottom: .5rem;">FROM GALLERY</h3>

                  <p class="text-center time-to mb-10">Time to shop special</p>
<?php foreach($cats as $cat): 
    if($cat->position == '0') continue; ?>
                <catproduct
                    catname="<?=$cat->name?>" 
                    styletext = "background: url('<?=ASSETS?>/.uploads/category/<?=$cat->image?>'); background-size:cover;"
                    catlink = "/cat/<?=$cat->id?>"
                    subcatlist = ""
                >
                <?php foreach($subCats[$cat->id] as $subcat): ?>
                    <li><a class="text-la" href="/subcat_products/<?=$subcat->id?>"><?=$subcat->name?></a></li>
                <?php endforeach; ?>
                </catproduct> 
                
<?php endforeach; ?>
            </div>
        </div>

    </div>
