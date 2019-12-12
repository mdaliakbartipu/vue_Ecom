    <div class="categories_product_area">
       <div class="container">
            <div class="categories_product_inner">

                <h3 class="text-center" style="font-size: 24px;  font-weight: 600;letter-spacing: .2px;    margin-bottom: .5rem;">FROM GALLERY</h3>

                  <p class="text-center time-to mb-10">Time to shop special</p>
<?php foreach($cats as $cat): 
    if($cat->position == '0') continue; ?>
    <?php
$image = file_exists(ltrim(ASSETS, '/')."/.uploads/category/".$cat->image)? 
ASSETS.'/.uploads/banners/'.$cat->image :
ASSETS.'/img/category/'.$cat->image;
    ?>
                <catproduct
                    catname="<?=$cat->name?>" 
                    styletext = "background: url('<?=$image?>'); background-size:cover;"
                    catlink = "/cat/<?=$cat->id?>"
                    subcatlist = ""
                >
                <?php foreach($subCats[$cat->id] as $subcat): ?>
                    <vuelist  
                        listlink ="/subcat_products/<?=$subcat->id?>"
                        listdata ="<?=$subcat->name?>"
                    ></vuelist>
                <?php endforeach; ?>
                </catproduct> 
                
<?php endforeach; ?>
            </div>
        </div>

    </div>
