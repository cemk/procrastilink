<?php

			

	if( site()->pages()->has('urls') ) {
		go(site()->homePage());
	} else {
		
		

		try {
			$page->create('urls', 'view');

			//TODAY
			$links = ['http://some.design', 'http://google.com', 'http://cemkesemen.com'];
			$page->create('urls/'.date('Ymd'), 'urls', array(
				    'urls' => yaml::encode($links),
				    'date' => date('Y-m-d')
				  ));
			echo "a";

			//YESTERDAY
			$links = ['http://dilekarasoy.com', 'http://twitter.com', 'http://abc.def'];
			$page->create('urls/'.date('Ymd', strtotime('-1 days')), 'urls', array(
				    'urls' => yaml::encode($links),
				    'date' => date('Y-m-d', strtotime('-1 days'))
				  ));

			//THE DAY BEFORE
			$links = ['http://yet.io', 'http://markme.io', 'http://procrastilinks.dev'];
			$page->create('urls/'.date('Ymd', strtotime('-2 days')), 'urls', array(
				    'urls' => yaml::encode($links),
				    'date' => date('Y-m-d', strtotime('-2 days'))
				  ));

			go(site()->homePage());

		} catch(Exception $e) {
			  echo $e->getMessage();
		}
			

	}



?>