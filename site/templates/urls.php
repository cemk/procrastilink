<?php
snippet('header');

$urls = $page->urls()->yaml();

array_reverse($urls);

// a::show($urls);

foreach($urls as $url):
	echo kirbytext($url);
endforeach;


snippet('footer');
?>