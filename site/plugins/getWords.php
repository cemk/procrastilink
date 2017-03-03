<?php

function getWords() {

	$options = array(
    	'method'   => 'GET',
	);

	$request = new Remote('http://nouns.cemkesemen.com/api', $options);

	$result = $request->response()->content();


	$nounArray = str::parse($result, 'json');
	$threeWords="";
	foreach ($nounArray as $nouns):
		$threeWords .= $nouns['noun']." ";
	endforeach;
	return $threeWords;
}

?>