<div style="display:flex;flex-direction:column;padding:1em">
    <?php foreach ($blogs as $blog) : ?>
        <div style="width:100%;margin-top:1em">
            <article class="article_one">
                <figure>
                    <?php
                    $image = file_exists(ltrim(ASSETS, '/') . "/.uploads/blogs/" . $blog->image) ?
                        ASSETS . '/.uploads/blogs/' . $blog->image :
                        ASSETS . '/img/blogs/' . $blog->image;
                    ?>
                    <a href="/ui/blog/<?= $blog->id ?>/<?= $blog->slug ?>">
                        <div class="" style="height:100%;width:100%">
                            <img src="<?= $image ?>" alt="">
                            <!-- <div class="overlay">
                            <a href="/ui/blog/<?= $blog->id ?>/<?= $blog->slug ?>"></a>
                        </div> -->
                    </a>
        </div>

        <figcaption class="mt-2">
            <h4><a href="/ui/blog/<?= $blog->id ?>/<?= $blog->slug ?>"><?= $blog->title ?></a></h4>
            <div class="blog_meta">
                <span class="author">By : <a href="#"><?= $blog->author_name ?></a> / </span>
                <span class="meta_date"> <?= $blog->updated_at ?> </span>
            </div>
        </figcaption>
        <div class="short_note"><?= $blog->desc ?></div>
        <a href="/ui/blog/<?= $blog->id ?>/<?= $blog->slug ?>" class="btn btn-info">Read more...</a>
        </figure>
        </article>
</div>
<?php endforeach; ?>
</div>