<?php 

snippet('header');

if(!site()->pages()->has('urls')) {
	go('install');
}

?>




<div class="urls">

<?php
	$urls = page('urls')->children()->flip();

	if (page()->viewlastdays()->exists() ) { 
		$view = page()->viewlastdays()->value();
		$urls = $urls->limit($view);
	}

	foreach($urls as $linklist): 

		$urls = array_reverse($linklist->urls()->yaml());
		
		echo "<div class='list'>";
		
		echo "<h2>".strftime('%e %B, %A', $linklist->date())."</h2><ul>";
		
		foreach($urls as $url):
			echo "<li>";
			$parsed_url = parse_url($url);
			$path = isset($parsed_url['path']) ? $parsed_url['path'] : ''; 
			$host = isset($parsed_url['host']) ? $parsed_url['host'] : '';
			$query = isset($parsed_url['query']) ? '?' . $parsed_url['query'] : '';
			$parsed = $host . $path . $query;
			$parsed = str_replace("www.", "", $parsed);
			$shorten = substr($parsed, 0, 50);
			if (strlen($parsed) > 50 ):
				$shorten = $shorten . "&hellip;";
			endif;
				
				echo "<a href='".$url."'>". $shorten ."</a>";


			echo "</li>";
		endforeach;
	 	echo "</ul></div>";
	 endforeach;
?>

</div> <!-- .urls -->






<?php snippet('footer') ?>