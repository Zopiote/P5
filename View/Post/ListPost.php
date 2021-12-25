<section id="section-listpost" class="page">
    <h1 class="page__title">Liste des articles</h1>

    <div class="card-container">
        <?php foreach($posts as $post){ ?>
            <div class="card">
                <p class="card-title"><?= EscapeManager::clean($post->getTitle()) ?></p>
                <p class="card-chapo"><?= EscapeManager::clean($post->getChapo()) ?></p>
                <p class="card-date">Dernière modification: <span><?= EscapeManager::clean($post->getLastModificationDate()) ?></span></p>
                <a href="/post?id=<?= EscapeManager::clean($post->getId()) ?>" class="btn btn-primary">En savoir plus</a>
            </div>
        <?php } ?>
    </div>
</section>