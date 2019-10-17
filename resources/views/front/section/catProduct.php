<div class="categories_product_area mb-55">

    <div class="container">
        <div class="categories_product_inner">

            <?php foreach($cats as $cat) { ?>
            <div class="single_categories_product" style="background: url('/uploads/category/<?=$cat->image?>'); background-size:cover;">
                <div class="categories_product_content text-center">
                    <h4 class="text-center"><?=$cat->name?></h4>
                    <div class="hover_content">
                        <ul class="mt-4 mb-4">
                            <?php
                            $limit = 5;
                            foreach($subCats[$cat->id] as $subCat) { ?>
                            <li><a class="text-la" href="#"><?=$subCat->name?></a></li>
                                <?php if(!(--$limit)) break; } ?>
                        </ul>
                        <button type="button" class="btn btn-primary">Shop Now</button>
                    </div>
                </div>
            </div>

            <?php }  ?>
        </div>
    </div>
</div>