<?php

			

	if( site()->pages()->has('urls') ) {
		go(site()->homePage());
	} else {
		
		

		try {
			$page->create('urls', 'view');

			//TODAY
			$links = ['https://workflow.is/workflows/918e6365d1d34c7abd7b4beca5951e3a', 'http://some.design', 'http://cemkesemen.com'];
			$page->create('urls/'.date('Ymd', strtotime('-1 days')), 'urls', array(
				    'urls' => yaml::encode($links),
				    'date' => date('Y-m-d', strtotime('-1 days'))
				  ));

			//YESTERDAY
			$links = ['http://www.newyorker.com/magazine/2016/12/19/how-to-be-a-stoic', 'https://theestablishment.co/hating-comic-sans-is-ableist-bc4a4de87093', 'https://arstechnica.com/cars/2017/02/have-you-looked-at-your-windshield-wipers-lately/'];
			$page->create('urls/'.date('Ymd', strtotime('-2 days')), 'urls', array(
				    'urls' => yaml::encode($links),
				    'date' => date('Y-m-d', strtotime('-2 days'))
				  ));

			//THE DAY BEFORE
			$links = ['https://www.netlify.com/blog/2016/11/17/serverless-file-uploads/', 'https://monzo.com/blog/2017/01/27/designing-product-mental-health-mind/', 'https://getkirby.com/'];
			$page->create('urls/'.date('Ymd', strtotime('-3 days')), 'urls', array(
				    'urls' => yaml::encode($links),
				    'date' => date('Y-m-d', strtotime('-3 days'))
				  ));


			// SAVE WITH SAFE WORDS
			$page->create('save', 'save', array(
				    'title' => 'Somebody save me...',
				    'safewords' => getWords()
				  ));

			// go(site()->homePage());
			go('install/done');

		} catch(Exception $e) {
			  echo $e->getMessage();
			  go('install/error');
		}
			

	}



?>