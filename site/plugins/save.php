<?php

function saveTheUrl($newUrl) {

		if ( $existingPage = kirby()->site()->page('urls/'.date('Ymd')) ):
			$urls = yaml::decode($existingPage->urls());

			array_push($urls, $newUrl);

			$updated = yaml::encode($urls);

			try {
				$existingPage->update(array('urls' => $updated ));
				return response::success('Added new URL for today.', ['url'=>$newUrl], 200);

			} catch(Exception $e) {

				return response::error($e->getMessage() . '. Check folder permissions.');

			}

		else:
			
			try {
			  kirby()->site()->page()->create('urls/'.date('Ymd'), 'urls', array(
			    'urls' => "\n- ".$newUrl,
			    'date' => date('Y-m-d')
			  ));
			  return response::success('Created a page for today and added your URL in it.', ['url'=>$newUrl], 200);

			} catch(Exception $e) {

			  return response::error( $e->getMessage() );

			}
		endif;

}