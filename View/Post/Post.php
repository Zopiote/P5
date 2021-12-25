<section id="section-post" class="page">
    <h1 class="page__title"><?= EscapeManager::clean($post->getTitle()) ?></h1>

    <div class="page-container">
        <p class="post-chapo"><?= EscapeManager::clean($post->getContent()) ?></p>
        <img src='./Uploads/<?= EscapeManager::clean($post->getImage()) ?>' alt='<?= EscapeManager::clean($post->getImage()) ?>' width='300px'>
        <p class="post-date">Dernière modification: <span><?= $post->getLastModificationDate() ?></span></p>

        <div class="comment-container">
            <?php foreach($comments as $comment){ ?>
                <div class="comment">
                    <p class="comment-content"><?= EscapeManager::clean($comment->getContent()) ?></p>
                    <p class="comment-date">publié le: <span><?= EscapeManager::clean($comment->getPublicationDate()) ?></span></p>
                </div>
            <?php } ?>

            <form method="POST" class="form__container">
                <h2 class="form__title">Ajouter un commentaire</h2>
                <div class="form__control">
                    <label class="form__label" for="content"><?= EscapeManager::clean($form->fields['content']['label']) ?></label>
                    <textarea class="form__input" name="content" type="text" id="content" value="<?= EscapeManager::clean($form->fields['content']['value']) ?>"></textarea>
                    <?php if(count($form->fields['content']['errors']) > 0) { ?>
                        <?php foreach($form->fields['content']['errors'] as $error) { ?>
                            <span class="alert alert-danger"><?= EscapeManager::clean($error) ?></span>
                        <?php } ?>
                    <?php } ?>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Ajouter</button>
            </form>
        </div>
    </div>
</section>