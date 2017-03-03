<?php snippet('header') ?>

<div class="row">
	<div class="settings col-lg-8">
		<?php echo $page->text()->kirbytext() ?>
		<h1><?php echo page('save')->safewords()->value() ?>
	</div>
</div>
<?php snippet('footer') ?>