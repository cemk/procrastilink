<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>

  <?php echo css('assets/css/style.css') ?>
</head>
<body>
<div class="container-fluid">

<div class="header">
	<h1><?php echo $site->title()->html() ?></h1>
	<ul class="menu">

	<?php
		$items = $pages->visible();
		foreach($items as $item): 
	?>
    <li><a<?php e($item->isOpen(), ' class="active"') ?> href="<?php echo $item->url() ?>"><?php echo $item->menu()->html() ?></a></li>
    
    <?php endforeach ?>

	</ul>
</div>