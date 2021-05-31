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

            <form method="POST" class="comment__form">
                <h2 class="form__title">Ajouter un commentaire</h2>
                <div class="form__control">
                    <label class="form__label" for="content"><?= $form->fields['content']['label'] ?></label>
                    <input class="form__input" name="content" type="text" id="content" value="<?= $form->fields['content']['value'] ?>">
                    <?php if(count($form->fields['content']['errors']) > 0) { ?>
                        <?php foreach($form->fields['content']['errors'] as $error) { ?>
                            <span class="alert alert-danger"><?= $error ?></span>
                        <?php } ?>
                    <?php } ?>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Ajouter</button>
            </form>
        </div>
    </div>
</section>