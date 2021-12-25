<div class="post__container">
	<form method="POST" class="form__container" enctype="multipart/form-data">
		<h2 class="form__title">Ajouter un post</h2>
		<div class="form__control">
			<label class="form__label" for="title"><?= EscapeManager::clean($form->fields['title']['label']) ?></label>
			<input class="form__input" name="title" type="text" id="title" value="<?= EscapeManager::clean($form->fields['title']['value']) ?>">
			<?php if(count($form->fields['title']['errors']) > 0) { ?>
				<?php foreach($form->fields['title']['errors'] as $error) { ?>
					<span class="alert alert-danger"><?= EscapeManager::clean($error) ?></span>
				<?php } ?>
			<?php } ?>
		</div>
        <div class="form__control">
			<label class="form__label" for="chapo"><?= EscapeManager::clean($form->fields['chapo']['label']) ?></label>
			<textarea class="form__input" name="chapo" type="text" id="chapo"><?= EscapeManager::clean($form->fields['chapo']['value']) ?></textarea>
			<?php if(count($form->fields['chapo']['errors']) > 0) { ?>
				<?php foreach($form->fields['chapo']['errors'] as $error) { ?>
					<span class="alert alert-danger"><?= EscapeManager::clean($error) ?></span>
				<?php } ?>
			<?php } ?>
		</div>
        <div class="form__control">
			<label class="form__label" for="content"><?= EscapeManager::clean($form->fields['content']['label']) ?></label>
			<textarea class="form__input" name="content" type="textarea" id="content"><?= EscapeManager::clean($form->fields['content']['value']) ?></textarea>
			<?php if(count($form->fields['content']['errors']) > 0) { ?>
				<?php foreach($form->fields['content']['errors'] as $error) { ?>
					<span class="alert alert-danger"><?= EscapeManager::clean($error) ?></span>
				<?php } ?>
			<?php } ?>
		</div>
		<div class="form__control">
			<label class="form__label" for="image"><?= EscapeManager::clean($form->fields['image']['label']) ?></label>
			<input class="form__input" name="image" type="file" id="image" value="<?= EscapeManager::clean($form->fields['image']['value']) ?>">
			<?php if(count($form->fields['image']['errors']) > 0) { ?>
				<?php foreach($form->fields['image']['errors'] as $error) { ?>
					<span class="alert alert-danger"><?= EscapeManager::clean($error) ?></span>
				<?php } ?>
			<?php } ?>
		</div>
		<input name="_token" id="_token" type="hidden" value="<?php echo EscapeManager::clean($_SESSION['_token']) ?>">
		<button type="submit" class="btn btn-primary" name="submit">Ajouter</button>
	</form>
</div>