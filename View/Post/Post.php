<section id="section-post" class="page">
    <h1 class="page__title"><?= $post->getTitle() ?></h1>

    <div class="page-container">
        <p class="post-chapo"><?= $post->getContent() ?></p>
        <p class="post-date">Dernière modification: <span><?= $post->getLastModificationDate() ?></span></p>
    </div>
</section>