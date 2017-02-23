<?php

header::contentType("application/json", $charset = 'UTF-8', $send = true);

if ( !r::is('POST') ):
	// IS IT POST?
	echo "{\"error\": \"(￢_￢;) Oh no. You need to use an app to post a URL.\"}";

else:

	//ARE THE THREE WORDS CORRECT?
	$sentSha = kirby()->request()->postData('sha1');
	if(threeWordsCheck($sentSha)) {

		// GET THE URL
		$newUrl = kirby()->request()->postData('url');
		
		//SANITIZE THE URL STRING
		$newUrl = filter_var($newUrl, FILTER_SANITIZE_STRING);

		//IS THIS A VALID URL?
		if ( substr($newUrl, 0, 4) == 'http' && filter_var($newUrl, FILTER_VALIDATE_URL) )
		{
			//DOES THE PAGE FOR TODAY EXIST?
			if ( $existingPage = $site->page('urls/'.date('Ymd')) ):
				$urls = yaml::decode($existingPage->urls());

				array_push($urls, $newUrl);

				$updated = yaml::encode($urls);

				try {
					$existingPage->update(array('urls' => $updated ));
					echo "{\"success\": \"Added to today: ".$newUrl." \" }";
				} catch(Exception $e) {
					echo "{\"error\": \"".$e->getMessage() . "Check folder permissions.\"}";
				}

			else:
				
				try {
				  $page->create('urls/'.date('Ymd'), 'urls', array(
				    'urls' => "\n- ".$newUrl,
				    'date' => date('Y-m-d')
				  ));
				  echo "{\"success\": \"Created a page for today, added: ".$newUrl."\" }";
				} catch(Exception $e) {

				  echo $e->getMessage();

				}
				endif;

		} //end url validation

		else {
			echo "{\"error\": \"Not a valid URL.\"}";
		}

	} else {
		echo "{\"error\": \"Your three words don't seem to check out.\"}";
	}

endif;
?>