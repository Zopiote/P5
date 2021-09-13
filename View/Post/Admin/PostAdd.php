<div class="post__container">
	<form method="POST" class="post__form">
		<h2 class="form__title">Ajouter un post</h2>
		<div class="form__control">
			<label class="form__label" for="title"><?= $form->fields['title']['label'] ?></label>
			<input class="form__input" name="title" type="text" id="title" value="<?= $form->fields['title']['value'] ?>">
			<?php if(count($form->fields['title']['errors']) > 0) { ?>
				<?php foreach($form->fields['title']['errors'] as $error) { ?>
					<span class="alert alert-danger"><?= $error ?></span>
				<?php } ?>
			<?php } ?>
		</div>
        <div class="form__control">
			<label class="form__label" for="chapo"><?= $form->fields['chapo']['label'] ?></label>
			<input class="form__input" name="chapo" type="text" id="chapo" value="<?= $form->fields['chapo']['value'] ?>">
			<?php if(count($form->fields['chapo']['errors']) > 0) { ?>
				<?php foreach($form->fields['chapo']['errors'] as $error) { ?>
					<span class="alert alert-danger"><?= $error ?></span>
				<?php } ?>
			<?php } ?>
		</div>
        <div class="form__control">
			<label class="form__label" for="content"><?= $form->fields['content']['label'] ?></label>
			<input class="form__input" name="content" type="textarea" id="content" value="<?= $form->fields['content']['value'] ?>">
			<?php if(count($form->fields['content']['errors']) > 0) { ?>
				<?php foreach($form->fields['content']['errors'] as $error) { ?>
					<span class="alert alert-danger"><?= $error ?></span>
				<?php } ?>
			<?php } ?>
		</div>
		<input name="_token" id="_token" type="hidden" value="<?php echo $_SESSION['_token'] ?>">
		<button type="submit" class="btn btn-primary" name="submit">Ajouter</button>
	</form>
</div>