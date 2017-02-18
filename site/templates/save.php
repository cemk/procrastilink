<?php

header::contentType("application/json", $charset = 'UTF-8', $send = true);

if ( !r::is('POST') ):
	echo "(￢_￢;) Oh no. You need to use an app to post a URL.";

else:

	$newUrl = kirby()->request()->postData('url');

	$newUrl = filter_var($newUrl, FILTER_SANITIZE_STRING);

	if
	(
	substr($newUrl, 0, 4) == 'http' &&
	filter_var($newUrl, FILTER_VALIDATE_URL)
	)
	{

		if ( $existingPage = $site->page('urls/'.date('Ymd')) ):
			$urls = yaml::decode($existingPage->urls());

			array_push($urls, $newUrl);

			$updated = yaml::encode($urls);

			try {
				$existingPage->update(array('urls' => $updated ));
				echo "Added to today: ".$newUrl;
			} catch(Exception $e) {
				echo $e->getMessage() . "Check folder permissions." ;
			}

		else:
			
		try {
		  $page->create('urls/'.date('Ymd'), 'urls', array(
		    'urls' => "\n- ".$newUrl,
		    'date' => date('Y-m-d')
		  ));
		  echo "Created a page for today, added: ".$newUrl;
		} catch(Exception $e) {

		  echo $e->getMessage();

		}
		endif;

	} //end url validation

	else {
		echo "Not a valid URL.";
	}

endif;
?>