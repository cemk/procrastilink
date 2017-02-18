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
		<li><a href="/" <?php e($site->page('home')->isOpen(), ' class="active"') ?>>/latest <?php echo $site->view(); ?></a></li>
		<li><a href="/all" <?php e($site->page('all')->isOpen(), ' class="active"') ?>>/all</a></li>
		<li><a href="/settings" <?php e($site->page('settings')->isOpen(), ' class="active"') ?>>*settings</a></li>
	</ul>
</div>