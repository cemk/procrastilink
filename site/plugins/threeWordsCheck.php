<?php


function threeWordsCheck($sentSha = '') {
    
	$localSha = sha1(str_replace(' ', '', str::lower(page('save')->safeWords()->value())));

	if($sentSha == $localSha):
		return true;
	else:
		return false;
	endif;

}