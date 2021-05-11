<section id="section-post" class="page">
    <h1 class="page__title"><?= $post->getTitle() ?></h1>

    <div class="page-container">
        <p class="post-chapo"><?= $post->getContent() ?></p>
        <p class="post-date">Dernière modification: <span><?= $post->getLastModificationDate() ?></span></p>

        <div class="comment-container">
            <?php foreach($comments as $comment){ ?>
                <div class="comment">
                    <p class="comment-content"><?= $comment->getContent() ?></p>
                    <p class="comment-date">publié le: <span><?= $comment->getPublicationDate() ?></span></p>
                </div>
            <?php } ?>
        </div>
    </div>
</section>