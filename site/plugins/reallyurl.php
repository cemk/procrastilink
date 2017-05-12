<?php

function reallyurl($url) {
    
	$url = filter_var($url, FILTER_SANITIZE_STRING);

	if ( substr($url, 0, 4) == 'http' && filter_var($url, FILTER_VALIDATE_URL) ) {
		return $url;
	} else {
		return false;
	}

}