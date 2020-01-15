<div class="row">
    <?php foreach($blogs as $blog): ?>
        <div class="col-lg-4 col-md-6">
            <article class="single_related article_one">
                <figure>
                    <?php
						$image = file_exists(ltrim(ASSETS, '/')."/.uploads/blogs/".$blog->image)? 
									ASSETS.'/.uploads/blogs/'.$blog->image :
									ASSETS.'/img/blogs/'.$blog->image;
                        ?>
                        
                    <div class="related_thumb">
                        <img src="<?=$image?>" alt="">
                        <div class="overlay">
                            <a href=""></a>
                        </div>
                    </div>
                    <figcaption class="related_content">
                        <h4><a href="#"><?=$blog->title?></a></h4>
                        <div class="blog_meta">
                            <span class="author">By : <a href="#"><?=$blog->author_name?></a> / </span>
                            <span class="meta_date"> <?=$blog->updated_at?> </span>
                        </div>
                    </figcaption>
                        <div class="short_note"><?=$blog->desc?></div>
                        <a href="/ui/blog/<?=$blog->id?>/<?=$blog->slug?>" class="btn btn-info">Read more...</a>
                </figure>
            </article>
        </div>
    <?php endforeach;?>
</div>