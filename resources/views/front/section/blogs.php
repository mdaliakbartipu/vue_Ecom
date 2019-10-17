<h2 class="h1 pt-3" style="text-align:left">Latest Blog</h2>
<div class="row">
    <?php
    foreach ($blogs as $blog) {
        ?>
        <div class="col-lg-4 col-md-6">
            <article class="single_related article_one">
                <figure>
                    <div class="related_thumb">
                        <img src="/uploads/blog/<?= $blog->image ?>" alt="">
                        <div class="overlay">
                            <a href=""></a>
                        </div>
                    </div>
                    <figcaption class="related_content">
                        <h4><a href="#"><?= $blog->title ?></a></h4>
                        <div class="blog_meta">
                            <span class="author">By : <a href="#"><?= $blog->author_name ?></a> / </span>
                            <span class="meta_date"> <?= date("d M Y", strtotime($blog->created_at)) ?> </span>
                        </div>
                    </figcaption>
                    <div class="short_note"><?= $blog->desc ?></div>
                    <button class="btn btn-info">Read more...</button>
                </figure>
            </article>
        </div>
    <?php } ?>

</div>